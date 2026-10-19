<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('articles')
            ->orderBy('name')
            ->get();

        $articles = Article::published()
            ->with(['category', 'author'])
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->integer('category'));
            })
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show(string $slug)
    {
        $article = Article::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = $article->relatedArticles();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}