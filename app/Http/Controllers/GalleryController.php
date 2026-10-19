<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Gallery::categories();

        $galleries = Gallery::active()
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category', $request->string('category'));
            })
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        return view('gallery.index', compact('galleries', 'categories'));
    }
}