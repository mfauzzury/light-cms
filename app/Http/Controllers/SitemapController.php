<?php

namespace App\Http\Controllers;

use App\Models\Content;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap for published content.
     */
    public function index()
    {
        $contents = Content::published()
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('sitemap.xml', [
            'contents' => $contents,
        ])->header('Content-Type', 'application/xml');
    }
}
