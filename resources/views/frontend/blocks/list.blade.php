@php
    $style = $block['data']['style'] ?? 'unordered';
    $items = $block['data']['items'] ?? [];
    $tag = $style === 'ordered' ? 'ol' : 'ul';
    $classes = $style === 'ordered' ? 'list-decimal' : 'list-disc';
@endphp

<{{ $tag }} class="{{ $classes }} ml-6 mb-4 space-y-2">
    @foreach($items as $item)
        <li class="text-gray-700">{!! $item !!}</li>
    @endforeach
</{{ $tag }}>
