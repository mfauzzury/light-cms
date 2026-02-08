<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ config('app.name') }}</title>
        <link>{{ url('/') }}</link>
        <description>Latest posts from {{ config('app.name') }}</description>
        <language>en-us</language>
        <lastBuildDate>{{ now()->toRfc2822String() }}</lastBuildDate>
        <atom:link href="{{ route('feed.rss') }}" rel="self" type="application/rss+xml"/>

        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('content.show', $post->slug) }}</link>
            <guid>{{ route('content.show', $post->slug) }}</guid>
            <pubDate>{{ $post->published_at->toRfc2822String() }}</pubDate>
            <description><![CDATA[{{ $post->meta_description ?? strip_tags(substr($post->title, 0, 160)) }}]]></description>
            @if($post->author)
            <author>{{ $post->author->email }} ({{ $post->author->name }})</author>
            @endif
            @foreach($post->categories as $category)
            <category>{{ $category->name }}</category>
            @endforeach
        </item>
        @endforeach
    </channel>
</rss>
