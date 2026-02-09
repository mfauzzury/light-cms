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

  <div class=" space-y-4" x-data="{ activeIndex: null }">
  @foreach($data['items'] ?? [] as $index => $faq)
    <div class="border border-gray-200 rounded-2xl overflow-hidden card-lift">
    <button
    @click="activeIndex = activeIndex === {{ $index }} ? null : {{ $index }}"
    class="w-full flex items-center justify-between p-6 text-left bg-white hover:bg-gray-50 transition-colors"
    >
    <span class="text-lg font-semibold text-gray-900 pr-4">
      {{ $faq['question'] ?? '' }}
    </span>
    <svg
      class="w-5 h-5 text-primary-500 transition-transform duration-300 flex-shrink-0"
      :class="{ 'rotate-180': activeIndex === {{ $index }} }"
      fill="none"
      stroke="currentColor"
      viewBox="0 0 24 24"
    >
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
    </button>

    <div
    x-show="activeIndex === {{ $index }}"
    x-collapse
    class="px-6 pb-6"
    >
    <p class="text-gray-600 leading-relaxed">
      {{ $faq['answer'] ?? '' }}
    </p>
    </div>
    </div>
  @endforeach
  </div>
  </div>
</section>
