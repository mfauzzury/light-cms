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

  <div >
  @foreach($data['steps'] ?? [] as $index => $step)
    <div class="relative flex items-start mb-12 last:mb-0">
    {{-- Timeline Line --}}
    @if(!$loop->last)
    <div class="absolute left-8 top-16 bottom-0 w-0.5 bg-gradient-to-b from-primary-500 to-primary-200"></div>
    @endif

    {{-- Step Number --}}
    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold shadow-soft-lg z-10">
    {{ $index + 1 }}
    </div>

    {{-- Step Content --}}
    <div class="ml-8 flex-1 bg-gray-50 rounded-2xl p-8 card-lift">
    <h3 class="text-2xl font-bold text-gray-900 mb-3">
      {{ $step['title'] ?? 'Step Title' }}
    </h3>
    <p class="text-gray-600 leading-relaxed">
      {{ $step['description'] ?? '' }}
    </p>

    @if(!empty($step['features']))
      <ul class="mt-4 space-y-2">
      @foreach($step['features'] as $feature)
      <li class="flex items-center text-gray-700">
        <svg class="w-5 h-5 text-primary-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        {{ $feature }}
      </li>
      @endforeach
      </ul>
    @endif
    </div>
    </div>
  @endforeach
  </div>
  </div>
</section>
