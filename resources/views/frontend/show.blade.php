@php
    $metaTitle = $content->meta_title ?? $content->title;
    $metaDescription = $content->meta_description ?? null;
    $canonicalUrl = $content->canonical_url ?? route('content.show', $content->slug);
    $ogTitle = $content->og_title ?? $content->meta_title ?? $content->title;
    $ogDescription = $content->og_description ?? $content->meta_description ?? null;
    $ogType = $content->og_type ?? 'article';
    $ogImage = $content->hasMedia('featured_image') ? $content->getFirstMediaUrl('featured_image', 'large') : null;
@endphp

@extends('layouts.frontend', compact('metaTitle', 'metaDescription', 'canonicalUrl', 'ogTitle', 'ogDescription', 'ogType', 'ogImage'))

@section('content')
    {{-- Preview Banner --}}
    @if(request()->routeIs('content.preview'))
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="text-sm font-medium text-yellow-800">
                        Preview Mode
                        <span class="ml-2 px-2 py-1 text-xs font-semibold rounded bg-yellow-200 text-yellow-800">
                            {{ ucfirst($content->status) }}
                        </span>
                    </p>
                    <p class="text-xs text-yellow-700 mt-1">You are viewing a preview. This content may not be published yet.</p>
                </div>
            </div>
        </div>
    @endif

    <article>
        {{-- Title --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $content->title }}</h1>

        {{-- Meta Information --}}
        <div class="flex items-center text-xs text-gray-500 mb-6 pb-4 border-b border-gray-200">
            <span>{{ $content->author->name }}</span>
            <span class="mx-2">•</span>
            <time datetime="{{ $content->published_at->toDateString() }}">
                {{ $content->published_at->format('M j, Y') }}
            </time>
            @if($content->type)
                <span class="mx-2">•</span>
                <span class="capitalize">{{ $content->type }}</span>
            @endif
        </div>

        {{-- Featured Image --}}
        @if($content->hasMedia('featured_image'))
            <div class="mb-6">
                <img
                    src="{{ $content->getFirstMediaUrl('featured_image', 'large') }}"
                    alt="{{ $content->title }}"
                    class="w-full max-h-96 object-cover rounded"
                >
            </div>
        @endif

        {{-- Content Blocks --}}
        <div class="prose max-w-none">
                @if(isset($content->content_json['blocks']) && is_array($content->content_json['blocks']))
                    @foreach($content->content_json['blocks'] as $block)
                        @if(isset($block['type']))
                            @includeIf('frontend.blocks.' . $block['type'], ['block' => $block])
                        @endif
                    @endforeach
                @else
                    <p class="text-gray-500">No content available.</p>
                @endif
            </div>

        {{-- Back to Home --}}
        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                ← Back to Home
            </a>
        </div>
    </article>
@endsection
