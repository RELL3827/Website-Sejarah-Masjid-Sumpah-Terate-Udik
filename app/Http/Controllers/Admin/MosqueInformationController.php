<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MosqueInformation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MosqueInformationController extends Controller
{
    public function edit(): View
    {
        $mosque = MosqueInformation::first();

        return view('admin.mosque-information.edit', compact('mosque'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string', 'max:2000'],
            'history' => ['nullable', 'string'],
            'architecture' => ['nullable', 'string'],
            'cultural_value' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string', 'max:50'],
            'longitude' => ['nullable', 'string', 'max:50'],
        ]);

        $mosque = MosqueInformation::firstOrCreate();

        $mosque->update($validated);

        return redirect()
            ->route('admin.mosque-information.edit')
            ->with('success', 'Informasi masjid berhasil diperbarui.');
    }
}