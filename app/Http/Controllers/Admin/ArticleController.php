<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'author'])
            ->latest()
            ->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $thumbnail = $this->storeThumbnail($request);

        $article = Article::create([
            ...$validated,
            'slug' => $this->generateUniqueSlug($validated['title']),
            'thumbnail' => $thumbnail,
            'user_id' => $request->user()->id,
            'is_featured' => $request->boolean('is_featured'),
            'published_at' => $validated['status'] === 'published' ? now() : null,
        ]);

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $article): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $this->validateData($request, $article);

        $thumbnail = $article->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }
            $thumbnail = $this->storeThumbnail($request);
        }

        $article->update([
            ...$validated,
            'slug' => Str::slug($validated['title']),
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'published_at' => $article->status === 'published'
                ? $article->published_at
                : ($validated['status'] === 'published' ? now() : null),
        ]);

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    public function togglePublish(Article $article)
    {
        $article->update([
            'status' => $article->status === 'published' ? 'draft' : 'published',
            'published_at' => $article->status === 'published' ? null : now(),
        ]);

        $message = $article->status === 'published'
            ? 'Artikel berhasil dipublikasikan.'
            : 'Artikel disimpan sebagai draf.';

        return back()->with('success', $message);
    }

    protected function validateData(Request $request, ?Article $article = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:published,draft'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:4096'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);
    }

    protected function storeThumbnail(Request $request): ?string
    {
        if (! $request->hasFile('thumbnail')) {
            return null;
        }

        $name = Str::slug($request->input('title', 'artikel'));
        $filename = $name . '-' . now()->format('YmdHis') . '-' . Str::random(6) . '.'
            . $request->file('thumbnail')->getClientOriginalExtension();

        return $request->file('thumbnail')->storeAs('articles', $filename, 'public');
    }

    protected function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}