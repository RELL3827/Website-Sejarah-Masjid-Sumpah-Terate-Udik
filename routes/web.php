<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MosqueInformationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TimelineController as AdminTimelineController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sejarah', [HomeController::class, 'history'])->name('history');
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/lokasi', [LocationController::class, 'index'])->name('location');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/sitemap.xml', function () {
    $urls = [
        route('home'),
        route('history'),
        route('timeline'),
        route('articles.index'),
        route('gallery'),
        route('about'),
        route('location'),
        route('contact'),
    ];

    $articles = \App\Models\Article::published()
        ->orderByDesc('published_at')
        ->get(['slug', 'updated_at']);

    foreach ($articles as $article) {
        $urls[] = route('articles.show', $article->slug);
    }

    return response()
        ->view('sitemap', compact('urls', 'articles'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->middleware('guest')
    ->name('admin.login.attempt');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('articles', AdminArticleController::class);
        Route::post('/articles/{article}/toggle-publish', [AdminArticleController::class, 'togglePublish'])
            ->name('articles.toggle-publish');

        Route::resource('categories', AdminCategoryController::class);

        Route::resource('timelines', AdminTimelineController::class);

        Route::resource('galleries', AdminGalleryController::class);

        Route::get('/mosque-information', [MosqueInformationController::class, 'edit'])
            ->name('mosque-information.edit');
        Route::put('/mosque-information', [MosqueInformationController::class, 'update'])
            ->name('mosque-information.update');

        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });