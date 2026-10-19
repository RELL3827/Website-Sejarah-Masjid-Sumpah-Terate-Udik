<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::ordered()->get();

        return view('admin.timelines.index', compact('timelines'));
    }

    public function create(): View
    {
        return view('admin.timelines.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $image = $this->storeImage($request);

        Timeline::create([...$validated, 'image' => $image]);

        return redirect()
            ->route('admin.timelines.index')
            ->with('success', 'Timeline berhasil ditambahkan.');
    }

    public function edit(Timeline $timeline): View
    {
        return view('admin.timelines.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $validated = $this->validateData($request);

        $image = $timeline->image;
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::disk('public')->delete($image);
            }
            $image = $this->storeImage($request);
        }

        $timeline->update([...$validated, 'image' => $image]);

        return redirect()
            ->route('admin.timelines.index')
            ->with('success', 'Timeline berhasil diperbarui.');
    }

    public function destroy(Timeline $timeline)
    {
        if ($timeline->image) {
            Storage::disk('public')->delete($timeline->image);
        }
        $timeline->delete();

        return redirect()
            ->route('admin.timelines.index')
            ->with('success', 'Timeline berhasil dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'year' => ['nullable', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:4096'],
        ]);
    }

    protected function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $filename = 'timeline-' . now()->format('YmdHis') . '-' . Str::random(6) . '.'
            . $request->file('image')->getClientOriginalExtension();

        return $request->file('image')->storeAs('timelines', $filename, 'public');
    }
}