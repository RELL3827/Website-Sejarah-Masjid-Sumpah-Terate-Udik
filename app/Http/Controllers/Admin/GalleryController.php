<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderByDesc('created_at')
            ->paginate(12);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        $categories = Gallery::categories();

        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $image = $this->storeImage($request);

        Gallery::create([...$validated, 'image' => $image]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        $categories = Gallery::categories();

        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $this->validateData($request);

        $image = $gallery->image;
        if ($request->hasFile('image')) {
            if ($image && ! str_starts_with($image, 'images/')) {
                Storage::disk('public')->delete($image);
            }
            $image = $this->storeImage($request);
        }

        $gallery->update([...$validated, 'image' => $image]);

        return redirect()
            ->route('admin.galleries.edit', $gallery)
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && ! str_starts_with($gallery->image, 'images/')) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'category' => ['required', 'string', 'max:100'],
            'year' => ['nullable', 'string', 'max:20'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:8192'],
        ]);
    }

    protected function storeImage(Request $request): string
    {
        $filename = 'gallery-' . now()->format('YmdHis') . '-' . Str::random(6) . '.'
            . $request->file('image')->getClientOriginalExtension();

        return $request->file('image')->storeAs('galleries', $filename, 'public');
    }
}