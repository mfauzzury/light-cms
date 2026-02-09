@props(['data'])

<section class="py-20 gradient-primary-dark">
  <div class="w-full">
  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
  @foreach($data['items'] ?? [] as $stat)
    <div class="text-center">
    <div class="text-4xl md:text-5xl font-bold text-white mb-2">
    {{ $stat['value'] ?? '0' }}
    </div>
    <div class="text-white/90 text-lg">
    {{ $stat['label'] ?? '' }}
    </div>
    </div>
  @endforeach
  </div>
  </div>
</section>
