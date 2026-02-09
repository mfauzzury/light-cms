@props(['data'])

<section class="py-20 bg-gray-50">
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

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  @foreach($data['images'] ?? [] as $image)
    <div class="group relative overflow-hidden rounded-2xl card-lift aspect-square">
    <img
    src="{{ $image['url'] ?? '' }}"
    alt="{{ $image['caption'] ?? '' }}"
    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
    >
    @if(!empty($image['caption']))
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
      <p class="text-white font-medium">{{ $image['caption'] }}</p>
    </div>
    @endif
    </div>
  @endforeach
  </div>
  </div>
</section>
