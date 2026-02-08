@php
    $text = $block['data']['text'] ?? '';
    $caption = $block['data']['caption'] ?? '';
@endphp

<blockquote class="border-l-4 border-gray-300 pl-4 py-2 mb-4 italic text-gray-700">
    <p>{!! $text !!}</p>
    @if($caption)
        <footer class="text-sm text-gray-500 mt-2">— {{ $caption }}</footer>
    @endif
</blockquote>
