@php
    $text = $block['data']['text'] ?? '';
@endphp

<p class="text-gray-700 leading-relaxed mb-4">
    {!! $text !!}
</p>
