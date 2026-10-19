<?php

namespace App\Http\Controllers;

use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::active()->ordered()->get();

        return view('timeline', compact('timelines'));
    }
}