@php
    $service = $block['data']['service'] ?? '';
    $embed = $block['data']['embed'] ?? '';
    $caption = $block['data']['caption'] ?? '';
@endphp

@if($embed)
    <figure class="mb-6">
        <div class="aspect-video">
            {!! $embed !!}
        </div>
        @if($caption)
            <figcaption class="text-sm text-gray-500 text-center mt-2">{{ $caption }}</figcaption>
        @endif
    </figure>
@endif
