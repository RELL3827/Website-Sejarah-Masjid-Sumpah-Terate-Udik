<?php

namespace App\Http\Controllers;

use App\Models\MosqueInformation;

class AboutController extends Controller
{
    public function index()
    {
        $mosque = MosqueInformation::first();

        return view('about', compact('mosque'));
    }
}