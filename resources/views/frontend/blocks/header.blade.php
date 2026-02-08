@php
    $level = $block['data']['level'] ?? 2;
    $text = $block['data']['text'] ?? '';
    $tag = 'h' . min(max($level, 1), 6); // Ensure level is between 1 and 6
@endphp

<{{ $tag }} class="font-bold text-gray-900 mb-4 {{ $level === 1 ? 'text-4xl' : ($level === 2 ? 'text-3xl' : ($level === 3 ? 'text-2xl' : 'text-xl')) }}">
    {!! $text !!}
</{{ $tag }}>
