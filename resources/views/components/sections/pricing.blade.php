@props(['data'])

<section class="py-20 bg-gray-50">
  <div class="w-full">
  @if(!empty($data['title']))
  <div class="text-center mb-16">
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

  <div class="grid md:grid-cols-3 gap-8">
  @foreach($data['plans'] ?? [] as $plan)
    <div class="bg-white rounded-2xl shadow-soft-lg p-8 card-lift {{ $plan['featured'] ?? false ? 'border-2 border-primary-500 transform scale-105 relative' : '' }}">
    @if($plan['featured'] ?? false)
    <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-soft">Popular</span>
    @endif

    <h3 class="text-2xl font-bold text-gray-900 mt-4 mb-2">
    {{ $plan['name'] ?? 'Plan' }}
    </h3>

    <div class="mb-6">
    <span class="text-4xl font-bold text-gray-900">{{ $plan['price'] ?? '$0' }}</span>
    @if(!empty($plan['period']))
      <span class="text-gray-600">/{{ $plan['period'] }}</span>
    @endif
    </div>

    <ul class="space-y-3 mb-8">
    @foreach($plan['features'] ?? [] as $feature)
      <li class="flex items-start">
      <svg class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
      <span class="text-gray-600">{{ $feature }}</span>
      </li>
    @endforeach
    </ul>

    <a href="{{ $plan['button_url'] ?? '#' }}"
    class="block w-full text-center px-6 py-3 rounded-lg font-semibold transition-all btn-press {{ $plan['featured'] ?? false ? 'bg-primary-500 text-white hover:bg-primary-600 shadow-soft' : 'bg-gray-100 text-gray-900 hover:bg-gray-200' }}">
    {{ $plan['button_text'] ?? 'Get Started' }}
    </a>
    </div>
  @endforeach
  </div>
  </div>
</section>
