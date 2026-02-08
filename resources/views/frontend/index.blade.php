@extends('layouts.frontend')

@section('content')
    <div class="space-y-12">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Latest Posts</h2>
            <p class="text-gray-600">Discover our latest content</p>
        </div>

        @if($posts->count() > 0)
            <div class="space-y-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        @if($post->hasMedia('featured_image'))
                            <a href="{{ route('content.show', $post->slug) }}">
                                <img
                                    src="{{ $post->getFirstMediaUrl('featured_image', 'medium') }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-64 object-cover"
                                >
                            </a>
                        @endif

                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                <a href="{{ route('content.show', $post->slug) }}" class="hover:text-gray-700">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span>By {{ $post->author->name }}</span>
                                <span class="mx-2">•</span>
                                <time datetime="{{ $post->published_at->toDateString() }}">
                                    {{ $post->published_at->format('F j, Y') }}
                                </time>
                            </div>

                            @if(isset($post->meta_description))
                                <p class="text-gray-600 mb-4">{{ $post->meta_description }}</p>
                            @endif

                            <a
                                href="{{ route('content.show', $post->slug) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium"
                            >
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <p class="text-gray-500 text-lg">No posts published yet.</p>
            </div>
        @endif
    </div>
@endsection
