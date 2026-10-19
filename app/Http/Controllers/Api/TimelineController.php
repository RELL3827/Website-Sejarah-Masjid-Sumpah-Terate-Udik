<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::active()
            ->ordered()
            ->get()
            ->map(fn (Timeline $item) => [
                'id' => $item->id,
                'year' => $item->year,
                'title' => $item->title,
                'description' => $item->description,
                'image_url' => $item->image_url,
                'sort_order' => $item->sort_order,
            ]);

        return response()->json(['data' => $timelines]);
    }
}