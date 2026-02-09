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

  <div class=" overflow-x-auto">
  <table class="w-full border-collapse">
    <thead>
    <tr class="bg-gray-50">
    <th class="p-4 text-left font-semibold text-gray-900 border-b-2 border-gray-200">
      {{ $data['feature_label'] ?? 'Feature' }}
    </th>
    @foreach($data['columns'] ?? [] as $column)
      <th class="p-4 text-center font-semibold {{ $column['highlight'] ?? false ? 'bg-primary-50 text-primary-900' : 'text-gray-900' }} border-b-2 {{ $column['highlight'] ?? false ? 'border-primary-500' : 'border-gray-200' }}">
      {{ $column['name'] ?? '' }}
      </th>
    @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data['rows'] ?? [] as $row)
    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
      <td class="p-4 font-medium text-gray-900">
      {{ $row['feature'] ?? '' }}
      </td>
      @foreach($row['values'] ?? [] as $value)
      <td class="p-4 text-center">
      @if($value === true)
        <svg class="w-6 h-6 text-green-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
      @elseif($value === false)
        <svg class="w-6 h-6 text-gray-300 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      @else
        <span class="text-gray-600">{{ $value }}</span>
      @endif
      </td>
      @endforeach
    </tr>
    @endforeach
    </tbody>
  </table>
  </div>
  </div>
</section>
