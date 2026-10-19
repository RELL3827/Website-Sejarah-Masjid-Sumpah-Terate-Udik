<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->string('q'));

        $articles = collect();

        if ($q !== '') {
            $articles = Article::published()
                ->with(['category', 'author'])
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('seo_title', 'like', "%{$q}%");
                })
                ->orWhereHas('category', function ($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%");
                })
                ->orderByDesc('published_at')
                ->paginate(10)
                ->withQueryString();
        }

        $popularCategories = Category::withCount('articles')
            ->orderByDesc('articles_count')
            ->take(6)
            ->get();

        return view('search', compact('articles', 'q', 'popularCategories'));
    }
}