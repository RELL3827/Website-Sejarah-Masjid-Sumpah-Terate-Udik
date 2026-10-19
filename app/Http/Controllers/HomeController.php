<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\MosqueInformation;
use App\Models\Setting;
use App\Models\Timeline;

class HomeController extends Controller
{
    public function index()
    {
        $featuredArticles = Article::published()
            ->with(['category', 'author'])
            ->featured()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $latestArticles = Article::published()
            ->with(['category', 'author'])
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $timelines = Timeline::active()->ordered()->get();
        $galleries = Gallery::active()
            ->orderByDesc('created_at')
            ->take(6)
            ->get();
        $mosque = MosqueInformation::first();
        $heroImage = Setting::get('hero_image', 'images/masjid/hero.jpg');

        return view('home', compact(
            'featuredArticles',
            'latestArticles',
            'timelines',
            'galleries',
            'mosque',
            'heroImage'
        ));
    }

    public function history()
    {
        $mosque = MosqueInformation::first();

        return view('history', compact('mosque'));
    }
}