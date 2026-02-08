@php
    $metaDescription = setting('site_description', 'A minimal, secure Laravel CMS');
@endphp

@extends('layouts.frontend', compact('metaDescription'))

@section('content')
    <div class="space-y-6">
        <div class="border-b border-gray-200 pb-4">
            <h2 class="text-2xl font-bold text-gray-900">Latest Posts</h2>
            <p class="text-sm text-gray-600 mt-1">Discover our latest content</p>
        </div>

        @if($posts->count() > 0)
            <div class="space-y-6">
                @foreach($posts as $post)
                    <article class="border-b border-gray-200 pb-6 hover:bg-gray-50 -mx-4 px-4 py-4 transition-colors">
                        <div class="flex gap-4">
                            @if($post->hasMedia('featured_image'))
                                <a href="{{ route('content.show', $post->slug) }}" class="flex-shrink-0">
                                    <img
                                        src="{{ $post->getFirstMediaUrl('featured_image', 'medium') }}"
                                        alt="{{ $post->title }}"
                                        class="w-32 h-32 object-cover rounded"
                                    >
                                </a>
                            @endif

                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">
                                    <a href="{{ route('content.show', $post->slug) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span>{{ $post->author->name }}</span>
                                    <span class="mx-2">•</span>
                                    <time datetime="{{ $post->published_at->toDateString() }}">
                                        {{ $post->published_at->format('M j, Y') }}
                                    </time>
                                </div>

                                @if(isset($post->meta_description))
                                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $post->meta_description }}</p>
                                @endif

                                <a
                                    href="{{ route('content.show', $post->slug) }}"
                                    class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium"
                                >
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="border border-gray-200 rounded-lg p-8 text-center">
                <p class="text-gray-500">No posts published yet.</p>
            </div>
        @endif
    </div>
@endsection
