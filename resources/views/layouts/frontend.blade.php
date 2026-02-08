<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>{{ $metaTitle ?? config('app.name', 'Light CMS') }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'A minimal, secure Laravel CMS' }}">

    @if(isset($canonicalUrl))
    <link rel="canonical" href="{{ $canonicalUrl }}">
    @endif

    {{-- OpenGraph Meta Tags --}}
    <meta property="og:title" content="{{ $ogTitle ?? $metaTitle ?? config('app.name', 'Light CMS') }}">
    <meta property="og:description" content="{{ $ogDescription ?? $metaDescription ?? 'A minimal, secure Laravel CMS' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    @if(isset($ogImage))
    <meta property="og:image" content="{{ $ogImage }}">
    @endif

    {{-- RSS Feed --}}
    <link rel="alternate" type="application/rss+xml" title="{{ config('app.name') }} RSS Feed" href="{{ route('feed.rss') }}">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    {{-- Header --}}
    <header class="bg-white shadow-sm">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">
                    <a href="{{ route('home') }}" class="hover:text-gray-700">
                        {{ config('app.name', 'Light CMS') }}
                    </a>
                </h1>
                <x-menu location="header" />
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-center mb-4">
                <x-menu location="footer" />
            </div>
            <p class="text-sm text-gray-600 text-center">
                &copy; {{ date('Y') }} {{ config('app.name', 'Light CMS') }}. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
