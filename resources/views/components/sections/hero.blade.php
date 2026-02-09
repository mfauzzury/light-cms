@props(['data'])

<section class="relative gradient-primary py-20 lg:py-32 overflow-hidden">
  <div class="w-full">
  <div class="text-center">
  @if(!empty($data['tag']))
    <span class="inline-block bg-primary-100 text-primary-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
    {{ $data['tag'] }}
    </span>
  @endif

  <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
    {{ $data['title'] ?? 'Welcome' }}
  </h1>

  @if(!empty($data['subtitle']))
    <p class="text-xl text-gray-600 mb-8">
    {{ $data['subtitle'] }}
    </p>
  @endif

  @if(!empty($data['buttons']))
    <div class="flex flex-wrap gap-4 justify-center">
    @foreach($data['buttons'] as $button)
    <a href="{{ $button['url'] ?? '#' }}"
      class="px-8 py-3 rounded-lg font-semibold transition-all btn-press {{ $button['primary'] ?? false ? 'bg-primary-500 text-white hover:bg-primary-600 shadow-soft hover:shadow-soft-lg' : 'bg-white text-primary-600 border-2 border-primary-500 hover:bg-primary-50' }}">
      {{ $button['text'] ?? 'Learn More' }}
    </a>
    @endforeach
    </div>
  @endif

  @if(!empty($data['image']))
    <div class="mt-12">
    <img src="{{ $data['image'] }}" alt="{{ $data['title'] }}" class="rounded-2xl shadow-soft-xl ">
    </div>
  @endif
  </div>
  </div>
</section>
