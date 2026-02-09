@props(['data'])

<section class="py-20 gradient-primary-dark">
  <div class="w-full">
  <div class=" text-center">
  <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
    {{ $data['title'] ?? 'Ready to get started?' }}
  </h2>

  @if(!empty($data['subtitle']))
    <p class="text-xl text-white/90 mb-8">
    {{ $data['subtitle'] }}
    </p>
  @endif

  @if(!empty($data['buttons']))
    <div class="flex flex-wrap gap-4 justify-center">
    @foreach($data['buttons'] as $button)
    <a href="{{ $button['url'] ?? '#' }}"
      class="px-8 py-3 rounded-lg font-semibold transition-all btn-press {{ $button['primary'] ?? false ? 'bg-white text-primary-600 hover:bg-gray-100 shadow-soft' : 'bg-transparent text-white border-2 border-white hover:bg-white hover:text-primary-600' }}">
      {{ $button['text'] ?? 'Get Started' }}
    </a>
    @endforeach
    </div>
  @endif
  </div>
  </div>
</section>
