<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Content Pages --}}
    @foreach($contents as $content)
    <url>
        <loc>{{ route('content.show', $content->slug) }}</loc>
        <lastmod>{{ $content->updated_at->toAtomString() }}</lastmod>
        <changefreq>{{ $content->type === 'post' ? 'weekly' : 'monthly' }}</changefreq>
        <priority>{{ $content->type === 'post' ? '0.8' : '0.9' }}</priority>
    </url>
    @endforeach
</urlset>
