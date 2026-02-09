@props(['data'])

<section class="py-20 gradient-primary-dark">
  <div class="w-full">
  <div class=" text-center">
  @if(!empty($data['icon']))
    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-2xl mb-6">
    <span class="text-4xl">{{ $data['icon'] }}</span>
    </div>
  @endif

  <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
    {{ $data['title'] ?? 'Subscribe to our newsletter' }}
  </h2>

  @if(!empty($data['subtitle']))
    <p class="text-xl text-white/90 mb-8">
    {{ $data['subtitle'] }}
    </p>
  @endif

  <form action="{{ $data['action'] ?? '/newsletter' }}" method="POST" >
    @csrf
    <div class="flex flex-col sm:flex-row gap-4">
    <input
    type="email"
    name="email"
    placeholder="Enter your email"
    required
    class="flex-1 px-6 py-4 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:border-white focus:bg-white/20 transition-all"
    >
    <button
    type="submit"
    class="px-8 py-4 bg-white text-primary-600 rounded-xl font-semibold hover:bg-gray-100 transition-all btn-press whitespace-nowrap shadow-soft"
    >
    {{ $data['button_text'] ?? 'Subscribe' }}
    </button>
    </div>

    @if(!empty($data['disclaimer']))
    <p class="text-sm text-white/70 mt-4">
    {{ $data['disclaimer'] }}
    </p>
    @endif
  </form>
  </div>
  </div>
</section>
