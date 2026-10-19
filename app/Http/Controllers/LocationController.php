<?php

namespace App\Http\Controllers;

use App\Models\MosqueInformation;

class LocationController extends Controller
{
    public function index()
    {
        $mosque = MosqueInformation::first();

        return view('location', compact('mosque'));
    }
}