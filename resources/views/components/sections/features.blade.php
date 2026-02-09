@props(['data'])

<section class="py-20 bg-white">
  <div class="w-full">
  @if(!empty($data['title']))
  <div class=" text-center mb-16">
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

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
  @foreach($data['items'] ?? [] as $feature)
    <div class="group p-6 border border-gray-200 rounded-2xl card-lift hover:border-primary-300 transition-all">
    @if(!empty($feature['icon']))
    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
      <span class="text-2xl">{{ $feature['icon'] }}</span>
    </div>
    @endif

    <h3 class="text-xl font-bold text-gray-900 mb-2">
    {{ $feature['title'] ?? 'Feature' }}
    </h3>

    <p class="text-gray-600">
    {{ $feature['description'] ?? '' }}
    </p>
    </div>
  @endforeach
  </div>
  </div>
</section>
