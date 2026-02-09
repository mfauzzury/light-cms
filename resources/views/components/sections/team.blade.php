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

  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
  @foreach($data['members'] ?? [] as $member)
    <div class="text-center">
    @if(!empty($member['photo']))
    <img src="{{ $member['photo'] }}" alt="{{ $member['name'] }}" class="w-32 h-32 rounded-full mb-4 object-cover shadow-soft">
    @else
    <div class="w-32 h-32 bg-primary-100 rounded-full mb-4"></div>
    @endif

    <h3 class="text-xl font-bold text-gray-900 mb-1">
    {{ $member['name'] ?? 'Team Member' }}
    </h3>

    @if(!empty($member['role']))
    <p class="text-gray-600 mb-2">{{ $member['role'] }}</p>
    @endif

    @if(!empty($member['bio']))
    <p class="text-sm text-gray-500">{{ $member['bio'] }}</p>
    @endif
    </div>
  @endforeach
  </div>
  </div>
</section>
