<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::published()
            ->with(['category', 'author:id,name'])
            ->orderByDesc('published_at');

        if ($request->boolean('featured')) {
            $query->featured();
        }

        if ($request->filled('category')) {
            $category = $request->input('category');

            $query->whereHas('category', function ($builder) use ($category) {
                if (ctype_digit((string) $category)) {
                    $builder->where('id', (int) $category);
                } else {
                    $builder->where('slug', $category);
                }
            });
        }

        $articles = $query->paginate((int) $request->query('per_page', 12));

        return response()->json([
            'data' => collect($articles->items())->map(
                fn (Article $article) => $this->summary($article)
            ),
            'meta' => [
                'current_page' => $articles->currentPage(),
                'last_page' => $articles->lastPage(),
                'per_page' => $articles->perPage(),
                'total' => $articles->total(),
            ],
        ]);
    }

    public function show(string $slug)
    {
        $article = Article::published()
            ->with(['category', 'author:id,name'])
            ->where('slug', $slug)
            ->first();

        if (! $article) {
            return response()->json(['message' => 'Artikel tidak ditemukan.'], 404);
        }

        return response()->json([
            'data' => $this->detail($article),
            'related' => collect($article->relatedArticles())->map(
                fn (Article $related) => $this->summary($related)
            ),
        ]);
    }

    public function search(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        if ($q === '') {
            return response()->json(['data' => [], 'meta' => ['total' => 0]]);
        }

        $articles = Article::published()
            ->with(['category', 'author:id,name'])
            ->where(function ($builder) use ($q) {
                $builder->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('content', 'like', "%{$q}%");
            })
            ->orderByDesc('published_at')
            ->paginate((int) $request->query('per_page', 12));

        return response()->json([
            'data' => collect($articles->items())->map(
                fn (Article $article) => $this->summary($article)
            ),
            'meta' => [
                'query' => $q,
                'current_page' => $articles->currentPage(),
                'last_page' => $articles->lastPage(),
                'per_page' => $articles->perPage(),
                'total' => $articles->total(),
            ],
        ]);
    }

    private function summary(Article $article): array
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'excerpt' => $article->excerpt,
            'thumbnail_url' => $article->thumbnail_url,
            'published_at' => $article->published_at?->toIso8601String(),
            'published_date' => $article->published_date,
            'is_featured' => $article->is_featured,
            'category' => $article->category ? [
                'id' => $article->category->id,
                'name' => $article->category->name,
                'slug' => $article->category->slug,
            ] : null,
            'author' => $article->author?->name,
            'url' => route('articles.show', $article->slug),
        ];
    }

    private function detail(Article $article): array
    {
        return array_merge($this->summary($article), [
            'content' => $article->content,
            'meta_description' => $article->meta_description,
        ]);
    }
}