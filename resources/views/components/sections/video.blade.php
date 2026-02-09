@props(['data'])

<section class="py-20 {{ ($data['background'] ?? 'white') === 'gray' ? 'bg-gray-50' : 'bg-white' }}">
  <div class="w-full">
  <div >
  @if(!empty($data['title']))
    <div class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
    {{ $data['title'] }}
    </h2>
    @if(!empty($data['subtitle']))
    <p class="text-xl text-gray-600">
      {{ $data['subtitle'] }}
    </p>
    @endif
    </div>
  @endif

  {{-- Video Container with 16:9 aspect ratio --}}
  <div class="relative rounded-3xl overflow-hidden shadow-soft-xl" style="padding-bottom: 56.25%;">
    @if(!empty($data['youtube_id']))
    <iframe
    class="absolute inset-0 w-full h-full"
    src="https://www.youtube.com/embed/{{ $data['youtube_id'] }}{{ !empty($data['autoplay']) && $data['autoplay'] ? '?autoplay=1&mute=1' : '' }}"
    title="{{ $data['title'] ?? 'Video' }}"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
    ></iframe>
    @elseif(!empty($data['vimeo_id']))
    <iframe
    class="absolute inset-0 w-full h-full"
    src="https://player.vimeo.com/video/{{ $data['vimeo_id'] }}{{ !empty($data['autoplay']) && $data['autoplay'] ? '?autoplay=1&muted=1' : '' }}"
    title="{{ $data['title'] ?? 'Video' }}"
    frameborder="0"
    allow="autoplay; fullscreen; picture-in-picture"
    allowfullscreen
    ></iframe>
    @elseif(!empty($data['video_url']))
    <video
    class="absolute inset-0 w-full h-full object-cover"
    {{ !empty($data['autoplay']) && $data['autoplay'] ? 'autoplay muted loop' : 'controls' }}
    >
    <source src="{{ $data['video_url'] }}" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    @endif
  </div>

  @if(!empty($data['caption']))
    <p class="text-center text-gray-600 mt-6">
    {{ $data['caption'] }}
    </p>
  @endif
  </div>
  </div>
</section>
