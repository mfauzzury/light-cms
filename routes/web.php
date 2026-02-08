<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\EditorImageUploadController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [ContentController::class, 'index'])->name('home');

// Preview route (authenticated users only)
Route::get('/preview/{content:slug}', [ContentController::class, 'preview'])
    ->middleware('auth')
    ->name('content.preview');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// RSS Feed
Route::get('/feed', [RssFeedController::class, 'index'])->name('feed.rss');

Route::get('/{content:slug}', [ContentController::class, 'show'])->name('content.show');

// Editor.js image upload endpoint
Route::post('/admin/upload-image', [EditorImageUploadController::class, 'upload'])
    ->middleware(['auth', 'throttle:60,1'])
    ->name('admin.upload-image');
