<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\MosqueController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TimelineController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Public JSON API untuk konsumsi frontend eksternal (misal SPA/Next.js
| yang di-host di Vercel). Semua endpoint membaca data publik saja.
|
*/

Route::get('/health', fn (): JsonResponse => response()->json(['status' => 'ok']));

Route::get('/settings', [SettingController::class, 'index']);
Route::get('/mosque', [MosqueController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{slug}', [ArticleController::class, 'show']);

Route::get('/timeline', [TimelineController::class, 'index']);
Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/search', [ArticleController::class, 'search']);