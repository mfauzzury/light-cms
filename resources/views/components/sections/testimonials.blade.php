@props(['data'])

<section class="py-20 bg-white">
  <div class="w-full">
  @if(!empty($data['title']))
  <div class=" text-center mb-16">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
    {{ $data['title'] }}
    </h2>
  </div>
  @endif

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
  @foreach($data['items'] ?? [] as $testimonial)
    <div class="bg-gray-50 rounded-2xl p-6 card-lift">
    <div class="flex items-center mb-4">
    @if(!empty($testimonial['avatar']))
      <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full mr-4 object-cover">
    @else
      <div class="w-12 h-12 bg-primary-100 rounded-full mr-4"></div>
    @endif

    <div>
      <h4 class="font-bold text-gray-900">{{ $testimonial['name'] ?? 'Anonymous' }}</h4>
      @if(!empty($testimonial['role']))
      <p class="text-sm text-gray-600">{{ $testimonial['role'] }}</p>
      @endif
    </div>
    </div>

    <p class="text-gray-700 italic leading-relaxed">
    "{{ $testimonial['quote'] ?? '' }}"
    </p>

    @if(!empty($testimonial['rating']))
    <div class="flex mt-4">
      @for($i = 0; $i < $testimonial['rating']; $i++)
      <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
      </svg>
      @endfor
    </div>
    @endif
    </div>
  @endforeach
  </div>
  </div>
</section>
