<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount([
            'articles' => fn ($query) => $query->where('status', 'published'),
        ])->whereHas('articles', fn ($query) => $query->where('status', 'published'))
            ->orderBy('name')
            ->get()
            ->map(fn (Category $category) => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'description' => $category->description,
                'articles_count' => $category->articles_count,
            ]);

        return response()->json(['data' => $categories]);
    }
}