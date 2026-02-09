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

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
  @foreach($data['logos'] ?? [] as $logo)
    <div class="flex items-center justify-center p-6 bg-white rounded-xl card-lift">
    @if(!empty($logo['image']))
    <img
      src="{{ $logo['image'] }}"
      alt="{{ $logo['name'] ?? 'Client logo' }}"
      class="max-h-12 w-auto grayscale hover:grayscale-0 transition-all duration-300"
    >
    @else
    <span class="text-2xl text-gray-400">{{ $logo['name'] ?? 'Logo' }}</span>
    @endif
    </div>
  @endforeach
  </div>
  </div>
</section>
