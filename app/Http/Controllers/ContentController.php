<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display the homepage with latest published posts.
     */
    public function index()
    {
        $posts = Content::published()
            ->posts()
            ->orderBy('published_at', 'desc')
            ->take(10)
            ->get();

        return view('frontend.index', compact('posts'));
    }

    /**
     * Display a specific content page.
     */
    public function show(Content $content)
    {
        // Check if content is published
        if ($content->status !== 'published' || ($content->published_at && $content->published_at->isFuture())) {
            abort(404);
        }

        return view('frontend.show', compact('content'));
    }

    /**
     * Preview content (authenticated users only).
     */
    public function preview(Content $content)
    {
        // Only authenticated users can preview
        if (!auth()->check()) {
            abort(403, 'You must be logged in to preview content.');
        }

        return view('frontend.show', compact('content'));
    }
}
