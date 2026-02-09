@props(['data'])

<section class="py-20 {{ ($data['background'] ?? 'white') === 'gray' ? 'bg-gray-50' : 'bg-white' }}">
  <div class="w-full">
  <div class="grid md:grid-cols-2 gap-12 items-center {{ ($data['image_position'] ?? 'right') === 'left' ? 'md:flex-row-reverse' : '' }}">
    {{-- Content Column --}}
    <div class="{{ ($data['image_position'] ?? 'right') === 'left' ? 'md:order-2' : '' }}">
    @if(!empty($data['tag']))
    <span class="inline-block bg-primary-100 text-primary-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
      {{ $data['tag'] }}
    </span>
    @endif

    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
    {{ $data['title'] ?? 'Content Title' }}
    </h2>

    @if(!empty($data['content']))
    <div class="prose prose-lg text-gray-600 mb-8">
      {!! nl2br(e($data['content'])) !!}
    </div>
    @endif

    @if(!empty($data['features']))
    <ul class="space-y-3 mb-8">
      @foreach($data['features'] as $feature)
      <li class="flex items-start">
      <svg class="w-6 h-6 text-primary-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
      <span class="text-gray-700">{{ $feature }}</span>
      </li>
      @endforeach
    </ul>
    @endif

    @if(!empty($data['button']))
    <a href="{{ $data['button']['url'] ?? '#' }}" class="inline-flex items-center px-8 py-3 bg-primary-500 text-white rounded-xl font-semibold hover:bg-primary-600 transition-all btn-press shadow-soft hover:shadow-soft-lg">
      {{ $data['button']['text'] ?? 'Learn More' }}
      <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </a>
    @endif
    </div>

    {{-- Image Column --}}
    <div class="{{ ($data['image_position'] ?? 'right') === 'left' ? 'md:order-1' : '' }}">
    @if(!empty($data['image']))
    <img
      src="{{ $data['image'] }}"
      alt="{{ $data['title'] }}"
      class="rounded-2xl shadow-soft-xl w-full"
    >
    @endif
    </div>
  </div>
  </div>
</section>
