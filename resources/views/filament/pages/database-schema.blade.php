<x-filament-panels::page>
    @php
        $tables = $this->getTables();
    @endphp

    <div class="space-y-2 mb-6">
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-2 px-3 py-1.5 bg-primary-50 border border-primary-200 rounded-lg">
                <x-filament::icon icon="heroicon-m-circle-stack" class="h-4 w-4 text-primary-600" />
                <span class="text-sm font-medium text-primary-700">{{ count($tables) }} Tables</span>
            </div>
            <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg">
                <x-filament::icon icon="heroicon-m-server" class="h-4 w-4 text-gray-500" />
                <span class="text-sm text-gray-600">{{ DB::getDatabaseName() }}</span>
            </div>
            <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg">
                <x-filament::icon icon="heroicon-m-clock" class="h-4 w-4 text-gray-500" />
                <span class="text-sm text-gray-600">Snapshot: {{ now()->format('M j, Y H:i') }}</span>
            </div>
        </div>
    </div>

    @if(empty($tables))
        <x-filament::section>
            <div class="text-center py-8">
                <x-filament::icon icon="heroicon-o-exclamation-circle" class="h-10 w-10 text-gray-400 mx-auto mb-3" />
                <p class="text-gray-500">Could not connect to the database.</p>
            </div>
        </x-filament::section>
    @else
        {{-- Table index --}}
        <x-filament::section compact collapsible collapsed>
            <x-slot name="heading">Quick Jump</x-slot>
            <div class="flex flex-wrap gap-2">
                @foreach($tables as $table)
                <a href="#table-{{ $table['name'] }}"
                   class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium bg-gray-100 hover:bg-primary-100 hover:text-primary-700 text-gray-700 rounded-md transition-colors">
                    <x-filament::icon icon="heroicon-m-table-cells" class="h-3 w-3" />
                    {{ $table['name'] }}
                    <span class="text-gray-400">({{ $table['row_count'] }})</span>
                </a>
                @endforeach
            </div>
        </x-filament::section>

        {{-- Each table --}}
        @foreach($tables as $table)
        <div id="table-{{ $table['name'] }}" class="scroll-mt-20">
            <x-filament::section compact collapsible>
                <x-slot name="heading">
                    <div class="flex items-center gap-3">
                        <x-filament::icon icon="heroicon-m-table-cells" class="h-4 w-4 text-primary-600" />
                        <span class="font-mono font-semibold text-gray-900">{{ $table['name'] }}</span>
                        <x-filament::badge color="gray" size="sm">{{ count($table['columns']) }} cols</x-filament::badge>
                        <x-filament::badge color="primary" size="sm">{{ number_format($table['row_count']) }} rows</x-filament::badge>
                    </div>
                </x-slot>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50">
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Column</th>
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Type</th>
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Null</th>
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Key</th>
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Default</th>
                                <th class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Extra</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($table['columns'] as $col)
                            <tr class="hover:bg-gray-50 {{ $col->Key === 'PRI' ? 'bg-amber-50/50' : '' }}">
                                <td class="px-3 py-2">
                                    <div class="flex items-center gap-1.5">
                                        @if($col->Key === 'PRI')
                                            <x-filament::icon icon="heroicon-m-key" class="h-3.5 w-3.5 text-amber-500 shrink-0" title="Primary Key" />
                                        @elseif($col->Key === 'MUL')
                                            <x-filament::icon icon="heroicon-m-link" class="h-3.5 w-3.5 text-blue-400 shrink-0" title="Index / Foreign Key" />
                                        @elseif($col->Key === 'UNI')
                                            <x-filament::icon icon="heroicon-m-finger-print" class="h-3.5 w-3.5 text-purple-400 shrink-0" title="Unique" />
                                        @else
                                            <span class="w-3.5 shrink-0"></span>
                                        @endif
                                        <span class="font-mono font-semibold text-gray-900 text-xs">{{ $col->Field }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <span class="font-mono text-xs text-indigo-700 bg-indigo-50 px-1.5 py-0.5 rounded">{{ $col->Type }}</span>
                                </td>
                                <td class="px-3 py-2">
                                    @if($col->Null === 'YES')
                                        <x-filament::badge color="warning" size="sm">NULL</x-filament::badge>
                                    @else
                                        <x-filament::badge color="gray" size="sm">NOT NULL</x-filament::badge>
                                    @endif
                                </td>
                                <td class="px-3 py-2">
                                    @if($col->Key === 'PRI')
                                        <x-filament::badge color="warning" size="sm">PRI</x-filament::badge>
                                    @elseif($col->Key === 'MUL')
                                        <x-filament::badge color="info" size="sm">INDEX</x-filament::badge>
                                    @elseif($col->Key === 'UNI')
                                        <x-filament::badge color="primary" size="sm">UNI</x-filament::badge>
                                    @else
                                        <span class="text-gray-400 text-xs">—</span>
                                    @endif
                                </td>
                                <td class="px-3 py-2">
                                    <span class="font-mono text-xs text-gray-500">
                                        {{ $col->Default ?? ($col->Null === 'YES' ? 'NULL' : '—') }}
                                    </span>
                                </td>
                                <td class="px-3 py-2">
                                    <span class="text-xs text-gray-500 italic">{{ $col->Extra ?: '—' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Indexes --}}
                @if(count($table['indexes']) > 1 || (count($table['indexes']) === 1 && !isset($table['indexes']['PRIMARY'])))
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Indexes</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($table['indexes'] as $indexName => $indexCols)
                        @if($indexName !== 'PRIMARY')
                        <div class="flex items-center gap-1.5 text-xs px-2 py-1 bg-gray-100 rounded-md">
                            <x-filament::icon icon="heroicon-m-bolt" class="h-3 w-3 text-gray-500" />
                            <span class="font-mono text-gray-600">{{ $indexName }}</span>
                            <span class="text-gray-400">({{ collect($indexCols)->pluck('Column_name')->join(', ') }})</span>
                            @if(!$indexCols[0]->Non_unique)
                                <x-filament::badge color="primary" size="sm">unique</x-filament::badge>
                            @endif
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

            </x-filament::section>
        </div>
        @endforeach
    @endif
</x-filament-panels::page>
