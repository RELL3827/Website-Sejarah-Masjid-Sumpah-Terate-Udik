<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MosqueInformation;

class MosqueController extends Controller
{
    public function show()
    {
        $mosque = MosqueInformation::first();

        if (! $mosque) {
            return response()->json(['data' => null], 404);
        }

        return response()->json([
            'data' => [
                'name' => $mosque->name,
                'address' => $mosque->address,
                'description' => $mosque->description,
                'history' => $mosque->history,
                'architecture' => $mosque->architecture,
                'cultural_value' => $mosque->cultural_value,
                'latitude' => $mosque->latitude !== null ? (float) $mosque->latitude : null,
                'longitude' => $mosque->longitude !== null ? (float) $mosque->longitude : null,
                'maps' => [
                    'embed_url' => $mosque->google_maps_embed_url,
                    'link' => $mosque->google_maps_link,
                ],
            ],
        ]);
    }
}