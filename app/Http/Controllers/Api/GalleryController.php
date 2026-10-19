<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::active();

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $galleries = $query->orderBy('id')
            ->paginate((int) $request->query('per_page', 24))
            ->through(fn (Gallery $photo) => [
                'id' => $photo->id,
                'title' => $photo->title,
                'description' => $photo->description,
                'image_url' => $photo->image_url,
                'category' => $photo->category,
                'year' => $photo->year,
            ]);

        return response()->json([
            'data' => $galleries->items(),
            'categories' => Gallery::categories(),
            'meta' => [
                'current_page' => $galleries->currentPage(),
                'last_page' => $galleries->lastPage(),
                'per_page' => $galleries->perPage(),
                'total' => $galleries->total(),
            ],
        ]);
    }
}