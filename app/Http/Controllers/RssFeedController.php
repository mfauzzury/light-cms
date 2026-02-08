<?php

namespace App\Http\Controllers;

use App\Models\Content;

class RssFeedController extends Controller
{
    /**
     * Generate RSS feed for published posts.
     */
    public function index()
    {
        $posts = Content::published()
            ->posts()
            ->orderBy('published_at', 'desc')
            ->take(20)
            ->get();

        return response()->view('feed.rss', [
            'posts' => $posts,
        ])->header('Content-Type', 'application/xml');
    }
}
