@php
    $url = $block['data']['file']['url'] ?? '';
    $caption = $block['data']['caption'] ?? '';
@endphp

@if($url)
    <figure class="mb-6">
        <img src="{{ $url }}" alt="{{ $caption }}" class="w-full rounded-lg">
        @if($caption)
            <figcaption class="text-sm text-gray-500 text-center mt-2">{{ $caption }}</figcaption>
        @endif
    </figure>
@endif
