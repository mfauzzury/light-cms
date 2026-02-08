@php
    $content = $block['data']['content'] ?? [];
    $withHeadings = $block['data']['withHeadings'] ?? false;
@endphp

@if(count($content) > 0)
    <div class="overflow-x-auto mb-6">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
            @if($withHeadings && isset($content[0]))
                <thead class="bg-gray-50">
                    <tr>
                        @foreach($content[0] as $heading)
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200 last:border-r-0">
                                {{ $heading }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach(array_slice($content, 1) as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td class="px-4 py-3 text-sm text-gray-700 border-r border-gray-200 last:border-r-0">
                                    {{ $cell }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            @else
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($content as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td class="px-4 py-3 text-sm text-gray-700 border-r border-gray-200 last:border-r-0">
                                    {{ $cell }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endif
