<x-filament-panels::page>
    <div class="space-y-8">

        {{-- ============================================================ --}}
        {{-- BADGES --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Badges</x-slot>
            <div class="flex flex-wrap gap-2">
                <x-filament::badge color="primary">Primary</x-filament::badge>
                <x-filament::badge color="success">Success</x-filament::badge>
                <x-filament::badge color="warning">Warning</x-filament::badge>
                <x-filament::badge color="danger">Danger</x-filament::badge>
                <x-filament::badge color="info">Info</x-filament::badge>
                <x-filament::badge color="gray">Gray</x-filament::badge>
            </div>
            <div class="flex flex-wrap gap-2 mt-3">
                <x-filament::badge color="success" icon="heroicon-m-check-circle">Verified</x-filament::badge>
                <x-filament::badge color="warning" icon="heroicon-m-clock">Pending</x-filament::badge>
                <x-filament::badge color="danger" icon="heroicon-m-x-circle">Rejected</x-filament::badge>
                <x-filament::badge color="info" icon="heroicon-m-information-circle">Info</x-filament::badge>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- BUTTONS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Buttons</x-slot>

            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Standard</p>
            <div class="flex flex-wrap gap-2 mb-4">
                <x-filament::button color="primary">Primary</x-filament::button>
                <x-filament::button color="success">Success</x-filament::button>
                <x-filament::button color="warning">Warning</x-filament::button>
                <x-filament::button color="danger">Danger</x-filament::button>
                <x-filament::button color="gray">Gray</x-filament::button>
            </div>

            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Outlined</p>
            <div class="flex flex-wrap gap-2 mb-4">
                <x-filament::button color="primary" outlined>Primary</x-filament::button>
                <x-filament::button color="success" outlined>Success</x-filament::button>
                <x-filament::button color="danger" outlined>Danger</x-filament::button>
                <x-filament::button color="gray" outlined>Gray</x-filament::button>
            </div>

            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">With Icons</p>
            <div class="flex flex-wrap gap-2 mb-4">
                <x-filament::button color="primary" icon="heroicon-m-plus">Add New</x-filament::button>
                <x-filament::button color="success" icon="heroicon-m-check">Save</x-filament::button>
                <x-filament::button color="danger" icon="heroicon-m-trash">Delete</x-filament::button>
            </div>

            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Icon Only (Project Standard for Table Actions)</p>
            <div class="flex flex-wrap gap-2">
                <x-filament::icon-button icon="heroicon-m-pencil" color="primary" tooltip="Edit" />
                <x-filament::icon-button icon="heroicon-m-eye" color="info" tooltip="View" />
                <x-filament::icon-button icon="heroicon-m-trash" color="danger" tooltip="Delete" />
                <x-filament::icon-button icon="heroicon-m-arrow-down-tray" color="gray" tooltip="Download" />
                <x-filament::icon-button icon="heroicon-m-arrow-top-right-on-square" color="gray" tooltip="Open in new tab" />
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- TYPOGRAPHY --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Typography</x-slot>
            <div class="space-y-3">
                <h1 class="text-4xl font-bold text-gray-900">Heading 1 — Bold 4xl</h1>
                <h2 class="text-3xl font-bold text-gray-900">Heading 2 — Bold 3xl</h2>
                <h3 class="text-2xl font-semibold text-gray-800">Heading 3 — Semibold 2xl</h3>
                <h4 class="text-xl font-semibold text-gray-800">Heading 4 — Semibold xl</h4>
                <p class="text-base text-gray-700">Body text — Regular 16px. The quick brown fox jumps over the lazy dog.</p>
                <p class="text-sm text-gray-600">Small text — 14px. Used for helper text and descriptions.</p>
                <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Label / Caption — 12px uppercase</p>
                <p class="text-sm text-gray-400 italic">Muted / Placeholder text — italic gray</p>
                <code class="text-sm font-mono bg-gray-100 text-gray-800 px-2 py-1 rounded">inline code snippet</code>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- COLORS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Color Palette</x-slot>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                @foreach([
                    ['label' => 'Primary', 'bg' => 'bg-primary-500', 'text' => 'text-white'],
                    ['label' => 'Success', 'bg' => 'bg-green-500', 'text' => 'text-white'],
                    ['label' => 'Warning', 'bg' => 'bg-amber-400', 'text' => 'text-gray-900'],
                    ['label' => 'Danger', 'bg' => 'bg-red-500', 'text' => 'text-white'],
                    ['label' => 'Info', 'bg' => 'bg-sky-500', 'text' => 'text-white'],
                    ['label' => 'Gray', 'bg' => 'bg-gray-400', 'text' => 'text-white'],
                ] as $color)
                <div class="rounded-lg overflow-hidden border border-gray-200">
                    <div class="{{ $color['bg'] }} h-12"></div>
                    <p class="text-center text-xs font-medium text-gray-700 py-1.5">{{ $color['label'] }}</p>
                </div>
                @endforeach
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- ALERTS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Alerts</x-slot>
            <div class="space-y-3">
                <div class="flex items-start gap-3 p-4 rounded-lg bg-green-50 border border-green-200">
                    <x-filament::icon icon="heroicon-o-check-circle" class="h-5 w-5 text-green-600 mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-green-800">Success</p>
                        <p class="text-sm text-green-700">Your changes have been saved successfully.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 rounded-lg bg-amber-50 border border-amber-200">
                    <x-filament::icon icon="heroicon-o-exclamation-triangle" class="h-5 w-5 text-amber-600 mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-amber-800">Warning</p>
                        <p class="text-sm text-amber-700">This action cannot be undone. Please review before proceeding.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 rounded-lg bg-red-50 border border-red-200">
                    <x-filament::icon icon="heroicon-o-x-circle" class="h-5 w-5 text-red-600 mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-red-800">Error</p>
                        <p class="text-sm text-red-700">Something went wrong. Please try again later.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 rounded-lg bg-sky-50 border border-sky-200">
                    <x-filament::icon icon="heroicon-o-information-circle" class="h-5 w-5 text-sky-600 mt-0.5 shrink-0" />
                    <div>
                        <p class="text-sm font-semibold text-sky-800">Info</p>
                        <p class="text-sm text-sky-700">New features have been added. Check the References page for details.</p>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- FORM ELEMENTS (display-only) --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Form Elements <span class="text-xs font-normal text-gray-400 ml-2">(display reference — not functional)</span></x-slot>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- Text Input --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Text Input</label>
                    <input type="text" value="Sample value" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500" readonly>
                </div>

                {{-- Select --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500" disabled>
                        <option>Option A</option>
                        <option selected>Option B</option>
                    </select>
                </div>

                {{-- Textarea --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Textarea</label>
                    <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500" readonly>Multi-line text content goes here.</textarea>
                </div>

                {{-- Date --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date Picker</label>
                    <input type="date" value="{{ now()->format('Y-m-d') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm" readonly>
                </div>

                {{-- Toggle --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Toggle</label>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-6 bg-primary-500 rounded-full relative">
                            <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full shadow"></div>
                        </div>
                        <span class="text-sm text-gray-700">Enabled</span>
                        <div class="w-10 h-6 bg-gray-300 rounded-full relative ml-4">
                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow"></div>
                        </div>
                        <span class="text-sm text-gray-500">Disabled</span>
                    </div>
                </div>

                {{-- Checkbox & Radio --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Checkbox &amp; Radio</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" checked class="rounded border-gray-300 text-primary-600" readonly> Checked option
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600" readonly> Unchecked option
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="radio" checked class="border-gray-300 text-primary-600" readonly> Selected
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="radio" class="border-gray-300 text-primary-600" readonly> Unselected
                        </label>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- TABLE EXAMPLE --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Table (Compact with Icon Actions — Project Standard)</x-slot>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="border-b border-gray-200">
                        <tr>
                            <th class="pb-2 pr-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Title</th>
                            <th class="pb-2 pr-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                            <th class="pb-2 pr-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Type</th>
                            <th class="pb-2 pr-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Author</th>
                            <th class="pb-2 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach([
                            ['title' => 'Homepage', 'status' => 'published', 'type' => 'page', 'author' => 'Admin'],
                            ['title' => 'About Us', 'status' => 'draft', 'type' => 'page', 'author' => 'Admin'],
                            ['title' => 'Latest News', 'status' => 'published', 'type' => 'post', 'author' => 'Editor'],
                            ['title' => 'Contact', 'status' => 'archived', 'type' => 'page', 'author' => 'Admin'],
                        ] as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 pr-4 font-medium text-gray-900">{{ $row['title'] }}</td>
                            <td class="py-2 pr-4">
                                @php $statusColors = ['published'=>'bg-green-100 text-green-700','draft'=>'bg-amber-100 text-amber-700','archived'=>'bg-red-100 text-red-700']; @endphp
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$row['status']] }}">
                                    {{ ucfirst($row['status']) }}
                                </span>
                            </td>
                            <td class="py-2 pr-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-700">
                                    {{ ucfirst($row['type']) }}
                                </span>
                            </td>
                            <td class="py-2 pr-4 text-gray-600">{{ $row['author'] }}</td>
                            <td class="py-2">
                                <div class="flex items-center gap-1">
                                    <button class="p-1.5 rounded-md text-gray-400 hover:text-primary-600 hover:bg-primary-50 transition-colors" title="Edit">
                                        <x-filament::icon icon="heroicon-m-pencil" class="h-4 w-4" />
                                    </button>
                                    <button class="p-1.5 rounded-md text-gray-400 hover:text-sky-600 hover:bg-sky-50 transition-colors" title="View">
                                        <x-filament::icon icon="heroicon-m-eye" class="h-4 w-4" />
                                    </button>
                                    <button class="p-1.5 rounded-md text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                        <x-filament::icon icon="heroicon-m-trash" class="h-4 w-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- STATS CARDS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Stats Cards</x-slot>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach([
                    ['label' => 'Total Pages', 'value' => '24', 'icon' => 'heroicon-o-document-text', 'color' => 'text-primary-600', 'bg' => 'bg-primary-50', 'desc' => '+3 this week', 'desc_color' => 'text-green-600'],
                    ['label' => 'Published', 'value' => '18', 'icon' => 'heroicon-o-check-circle', 'color' => 'text-green-600', 'bg' => 'bg-green-50', 'desc' => '75% of total', 'desc_color' => 'text-gray-500'],
                    ['label' => 'Drafts', 'value' => '6', 'icon' => 'heroicon-o-pencil', 'color' => 'text-amber-600', 'bg' => 'bg-amber-50', 'desc' => 'Needs review', 'desc_color' => 'text-amber-600'],
                    ['label' => 'Team Members', 'value' => '3', 'icon' => 'heroicon-o-users', 'color' => 'text-purple-600', 'bg' => 'bg-purple-50', 'desc' => '1 admin, 2 editors', 'desc_color' => 'text-gray-500'],
                ] as $stat)
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-medium text-gray-600">{{ $stat['label'] }}</p>
                        <div class="{{ $stat['bg'] }} p-2 rounded-lg">
                            <x-filament::icon icon="{{ $stat['icon'] }}" class="h-5 w-5 {{ $stat['color'] }}" />
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                    <p class="text-xs mt-1 {{ $stat['desc_color'] }}">{{ $stat['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- SECTIONS / PANELS --}}
        {{-- ============================================================ --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-filament::section>
                <x-slot name="heading">Default Section</x-slot>
                <p class="text-sm text-gray-600">Standard section with heading and body content.</p>
            </x-filament::section>

            <x-filament::section collapsible>
                <x-slot name="heading">Collapsible Section</x-slot>
                <p class="text-sm text-gray-600">Click the heading to expand or collapse this section.</p>
            </x-filament::section>

            <x-filament::section compact>
                <x-slot name="heading">Compact Section</x-slot>
                <p class="text-sm text-gray-600">Reduced padding for dense layouts.</p>
            </x-filament::section>
        </div>

        {{-- ============================================================ --}}
        {{-- ICONS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Heroicons Used in This Project</x-slot>

            @php
            $iconGroups = [
                'Navigation & Layout' => [
                    'heroicon-o-bars-3', 'heroicon-o-home', 'heroicon-o-arrow-left',
                    'heroicon-o-arrow-right', 'heroicon-m-chevron-right', 'heroicon-m-chevron-down',
                    'heroicon-m-chevron-up', 'heroicon-m-ellipsis-vertical', 'heroicon-m-ellipsis-horizontal',
                ],
                'Content & Media' => [
                    'heroicon-o-document-text', 'heroicon-o-photo', 'heroicon-o-book-open',
                    'heroicon-o-clipboard-document-list', 'heroicon-m-pencil', 'heroicon-m-eye',
                    'heroicon-m-tag', 'heroicon-m-folder', 'heroicon-m-link',
                    'heroicon-m-arrow-top-right-on-square', 'heroicon-m-document-duplicate',
                ],
                'Actions' => [
                    'heroicon-m-plus', 'heroicon-m-trash', 'heroicon-m-check', 'heroicon-m-x-mark',
                    'heroicon-m-arrow-down-tray', 'heroicon-m-magnifying-glass', 'heroicon-m-funnel',
                    'heroicon-m-share', 'heroicon-m-archive-box', 'heroicon-m-star',
                ],
                'Users & System' => [
                    'heroicon-o-users', 'heroicon-o-cog-6-tooth', 'heroicon-o-bell',
                    'heroicon-m-user', 'heroicon-m-user-circle', 'heroicon-m-user-plus',
                    'heroicon-m-key', 'heroicon-m-finger-print', 'heroicon-m-shield-check',
                ],
                'Status & Feedback' => [
                    'heroicon-o-check-circle', 'heroicon-o-x-circle', 'heroicon-o-exclamation-triangle',
                    'heroicon-o-information-circle', 'heroicon-m-clock', 'heroicon-m-calendar',
                    'heroicon-o-arrow-trending-up', 'heroicon-o-chart-bar', 'heroicon-m-bolt',
                ],
                'Data & Dev' => [
                    'heroicon-o-beaker', 'heroicon-o-circle-stack', 'heroicon-o-code-bracket',
                    'heroicon-m-table-cells', 'heroicon-m-server', 'heroicon-m-cpu-chip',
                    'heroicon-m-command-line', 'heroicon-m-variable', 'heroicon-m-wrench-screwdriver',
                ],
            ];
            $groupColors = [
                'Navigation & Layout' => ['bg' => 'bg-slate-50', 'border' => 'border-slate-200', 'dot' => 'bg-slate-400', 'hover' => 'hover:bg-slate-100 hover:text-slate-700'],
                'Content & Media'     => ['bg' => 'bg-primary-50', 'border' => 'border-primary-200', 'dot' => 'bg-primary-400', 'hover' => 'hover:bg-primary-100 hover:text-primary-700'],
                'Actions'             => ['bg' => 'bg-purple-50', 'border' => 'border-purple-200', 'dot' => 'bg-purple-400', 'hover' => 'hover:bg-purple-100 hover:text-purple-700'],
                'Users & System'      => ['bg' => 'bg-amber-50', 'border' => 'border-amber-200', 'dot' => 'bg-amber-400', 'hover' => 'hover:bg-amber-100 hover:text-amber-700'],
                'Status & Feedback'   => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'dot' => 'bg-green-400', 'hover' => 'hover:bg-green-100 hover:text-green-700'],
                'Data & Dev'          => ['bg' => 'bg-rose-50', 'border' => 'border-rose-200', 'dot' => 'bg-rose-400', 'hover' => 'hover:bg-rose-100 hover:text-rose-700'],
            ];
            @endphp

            <div class="space-y-5">
                @foreach($iconGroups as $groupName => $icons)
                @php $c = $groupColors[$groupName]; @endphp
                <div class="border {{ $c['border'] }} rounded-xl overflow-hidden">
                    <div class="{{ $c['bg'] }} px-4 py-2 flex items-center gap-2 border-b {{ $c['border'] }}">
                        <span class="w-2 h-2 rounded-full {{ $c['dot'] }}"></span>
                        <span class="text-xs font-semibold text-gray-600 uppercase tracking-wide">{{ $groupName }}</span>
                        <span class="text-xs text-gray-400 ml-auto">{{ count($icons) }} icons</span>
                    </div>
                    <div class="p-3" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(68px, 1fr)); gap: 4px;">
                        @foreach($icons as $icon)
                        <div class="group flex flex-col items-center gap-1 p-2 rounded-lg cursor-default transition-colors {{ $c['hover'] }}">
                            <x-filament::icon :icon="$icon" class="h-5 w-5 text-gray-500 group-hover:scale-110 transition-transform duration-150" />
                            <span class="text-[9px] text-gray-400 text-center leading-tight font-mono">{{ str_replace(['heroicon-o-','heroicon-m-'], '', $icon) }}</span>
                            <span class="text-[8px] text-gray-300 font-mono">{{ str_starts_with($icon, 'heroicon-o') ? 'outline' : 'mini' }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- DROPDOWN --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Dropdown</x-slot>
            <div class="flex flex-wrap gap-4">
                <x-filament::dropdown>
                    <x-slot name="trigger">
                        <x-filament::button icon="heroicon-m-ellipsis-vertical" color="gray" outlined>
                            Actions
                        </x-filament::button>
                    </x-slot>
                    <x-filament::dropdown.list>
                        <x-filament::dropdown.list.item icon="heroicon-m-pencil">
                            Edit
                        </x-filament::dropdown.list.item>
                        <x-filament::dropdown.list.item icon="heroicon-m-arrow-top-right-on-square">
                            View Live
                        </x-filament::dropdown.list.item>
                        <x-filament::dropdown.list.item icon="heroicon-m-document-duplicate">
                            Duplicate
                        </x-filament::dropdown.list.item>
                        <x-filament::dropdown.list.item icon="heroicon-m-trash" color="danger">
                            Delete
                        </x-filament::dropdown.list.item>
                    </x-filament::dropdown.list>
                </x-filament::dropdown>

                <x-filament::dropdown placement="bottom-end">
                    <x-slot name="trigger">
                        <x-filament::icon-button icon="heroicon-m-ellipsis-horizontal" color="gray" tooltip="More options" />
                    </x-slot>
                    <x-filament::dropdown.list>
                        <x-filament::dropdown.list.item icon="heroicon-m-star">
                            Mark as Featured
                        </x-filament::dropdown.list.item>
                        <x-filament::dropdown.list.item icon="heroicon-m-archive-box">
                            Archive
                        </x-filament::dropdown.list.item>
                    </x-filament::dropdown.list>
                </x-filament::dropdown>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- TABS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Tabs</x-slot>
            <x-filament::tabs label="Content tabs">
                <x-filament::tabs.item active icon="heroicon-m-document-text">
                    Published
                </x-filament::tabs.item>
                <x-filament::tabs.item icon="heroicon-m-pencil">
                    Drafts
                </x-filament::tabs.item>
                <x-filament::tabs.item icon="heroicon-m-archive-box">
                    Archived
                </x-filament::tabs.item>
                <x-filament::tabs.item icon="heroicon-m-trash">
                    Trashed
                </x-filament::tabs.item>
            </x-filament::tabs>
            <p class="text-sm text-gray-500 mt-3 italic">Tab content would render here depending on the active tab.</p>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- PROGRESS BARS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Progress Bars</x-slot>
            <div class="space-y-4">
                @foreach([
                    ['label' => 'Storage Used', 'value' => 72, 'color' => 'bg-primary-500', 'text' => 'text-primary-700'],
                    ['label' => 'Published Content', 'value' => 85, 'color' => 'bg-green-500', 'text' => 'text-green-700'],
                    ['label' => 'Pending Review', 'value' => 40, 'color' => 'bg-amber-400', 'text' => 'text-amber-700'],
                    ['label' => 'Error Rate', 'value' => 8, 'color' => 'bg-red-500', 'text' => 'text-red-700'],
                ] as $bar)
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <span class="text-sm font-medium text-gray-700">{{ $bar['label'] }}</span>
                        <span class="text-sm font-semibold {{ $bar['text'] }}">{{ $bar['value'] }}%</span>
                    </div>
                    <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="{{ $bar['color'] }} h-2 rounded-full transition-all duration-500" style="width: {{ $bar['value'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- LOADING / SPINNER --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Loading States</x-slot>
            <div class="space-y-6">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Spinners</p>
                    <div class="flex items-center gap-6">
                        <div class="flex flex-col items-center gap-2">
                            <x-filament::loading-indicator class="h-4 w-4 text-primary-600" />
                            <span class="text-xs text-gray-500">Small</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <x-filament::loading-indicator class="h-6 w-6 text-primary-600" />
                            <span class="text-xs text-gray-500">Medium</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <x-filament::loading-indicator class="h-8 w-8 text-primary-600" />
                            <span class="text-xs text-gray-500">Large</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <x-filament::loading-indicator class="h-6 w-6 text-green-600" />
                            <span class="text-xs text-gray-500">Success</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <x-filament::loading-indicator class="h-6 w-6 text-amber-500" />
                            <span class="text-xs text-gray-500">Warning</span>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Skeleton Placeholders</p>
                    <div class="space-y-2">
                        <div class="h-4 bg-gray-200 rounded animate-pulse w-3/4"></div>
                        <div class="h-4 bg-gray-200 rounded animate-pulse w-full"></div>
                        <div class="h-4 bg-gray-200 rounded animate-pulse w-5/6"></div>
                        <div class="h-4 bg-gray-200 rounded animate-pulse w-2/3"></div>
                    </div>
                    <div class="mt-3 flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-200 rounded-full animate-pulse shrink-0"></div>
                        <div class="flex-1 space-y-2">
                            <div class="h-3 bg-gray-200 rounded animate-pulse w-32"></div>
                            <div class="h-3 bg-gray-200 rounded animate-pulse w-48"></div>
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- AVATARS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Avatars</x-slot>
            <div class="space-y-4">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Sizes</p>
                    <div class="flex items-end gap-4">
                        @foreach([
                            ['size' => 'h-6 w-6 text-xs', 'label' => 'XS'],
                            ['size' => 'h-8 w-8 text-sm', 'label' => 'SM'],
                            ['size' => 'h-10 w-10 text-base', 'label' => 'MD'],
                            ['size' => 'h-12 w-12 text-lg', 'label' => 'LG'],
                            ['size' => 'h-16 w-16 text-xl', 'label' => 'XL'],
                        ] as $av)
                        <div class="flex flex-col items-center gap-2">
                            <div class="{{ $av['size'] }} rounded-full bg-primary-100 text-primary-700 font-bold flex items-center justify-center">
                                A
                            </div>
                            <span class="text-xs text-gray-500">{{ $av['label'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Colors &amp; with status ring</p>
                    <div class="flex items-center gap-4">
                        @foreach([
                            ['bg' => 'bg-primary-100', 'text' => 'text-primary-700', 'initials' => 'JD', 'ring' => 'ring-green-400', 'name' => 'John D.'],
                            ['bg' => 'bg-purple-100', 'text' => 'text-purple-700', 'initials' => 'SA', 'ring' => 'ring-amber-400', 'name' => 'Sara A.'],
                            ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'initials' => 'MB', 'ring' => 'ring-gray-300', 'name' => 'Mike B.'],
                            ['bg' => 'bg-rose-100', 'text' => 'text-rose-700', 'initials' => 'LK', 'ring' => 'ring-green-400', 'name' => 'Lisa K.'],
                        ] as $av)
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="h-10 w-10 rounded-full {{ $av['bg'] }} {{ $av['text'] }} font-bold text-sm flex items-center justify-center ring-2 {{ $av['ring'] }}">
                                {{ $av['initials'] }}
                            </div>
                            <span class="text-xs text-gray-500">{{ $av['name'] }}</span>
                        </div>
                        @endforeach
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center ring-2 ring-gray-300">
                                <x-filament::icon icon="heroicon-m-user" class="h-5 w-5 text-gray-500" />
                            </div>
                            <span class="text-xs text-gray-500">No photo</span>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Avatar Group</p>
                    <div class="flex -space-x-2">
                        @foreach(['bg-primary-100 text-primary-700', 'bg-purple-100 text-purple-700', 'bg-green-100 text-green-700', 'bg-rose-100 text-rose-700'] as $i => $cls)
                        <div class="h-8 w-8 rounded-full {{ $cls }} font-bold text-xs flex items-center justify-center ring-2 ring-white">
                            {{ chr(65 + $i) }}
                        </div>
                        @endforeach
                        <div class="h-8 w-8 rounded-full bg-gray-200 text-gray-600 font-bold text-xs flex items-center justify-center ring-2 ring-white">
                            +5
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- EMPTY STATE --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Empty State</x-slot>
            <div class="text-center py-12 border-2 border-dashed border-gray-200 rounded-xl">
                <div class="mx-auto w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <x-filament::icon icon="heroicon-o-document-text" class="h-7 w-7 text-gray-400" />
                </div>
                <h3 class="text-base font-semibold text-gray-900 mb-1">No content yet</h3>
                <p class="text-sm text-gray-500 mb-5 max-w-xs mx-auto">Get started by creating your first page or post. It only takes a minute.</p>
                <x-filament::button icon="heroicon-m-plus" color="primary">
                    Create Content
                </x-filament::button>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- BREADCRUMBS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Breadcrumbs</x-slot>
            <div class="space-y-3">
                <nav class="flex items-center gap-1 text-sm">
                    @foreach([['label' => 'Dashboard', 'href' => '#'], ['label' => 'Content', 'href' => '#'], ['label' => 'Pages', 'href' => '#'], ['label' => 'About Us', 'href' => null]] as $crumb)
                    @if(!$loop->first)
                        <x-filament::icon icon="heroicon-m-chevron-right" class="h-3.5 w-3.5 text-gray-400 shrink-0" />
                    @endif
                    @if($crumb['href'] && !$loop->last)
                        <a href="{{ $crumb['href'] }}" class="text-primary-600 hover:text-primary-800 hover:underline">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-gray-900 font-medium">{{ $crumb['label'] }}</span>
                    @endif
                    @endforeach
                </nav>
                <nav class="flex items-center gap-1.5 text-sm">
                    <x-filament::icon icon="heroicon-m-home" class="h-4 w-4 text-gray-400" />
                    @foreach([['label' => 'Settings', 'href' => '#'], ['label' => 'Site Miscellaneous', 'href' => '#'], ['label' => 'Kitchen Sink', 'href' => null]] as $crumb)
                        <x-filament::icon icon="heroicon-m-chevron-right" class="h-3.5 w-3.5 text-gray-400 shrink-0" />
                        @if($crumb['href'] && !$loop->last)
                            <a href="{{ $crumb['href'] }}" class="text-primary-600 hover:underline">{{ $crumb['label'] }}</a>
                        @else
                            <span class="text-gray-500">{{ $crumb['label'] }}</span>
                        @endif
                    @endforeach
                </nav>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- KEY-VALUE LIST --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Key-Value List</x-slot>
            <dl class="divide-y divide-gray-100">
                @foreach([
                    ['key' => 'Site Name', 'value' => setting('site_name', 'Light-CMS')],
                    ['key' => 'Status', 'value' => '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Published</span>'],
                    ['key' => 'Author', 'value' => auth()->user()->name ?? 'Admin'],
                    ['key' => 'Created At', 'value' => now()->format('F j, Y')],
                    ['key' => 'Last Modified', 'value' => now()->diffForHumans()],
                    ['key' => 'Slug', 'value' => '<code class="text-xs font-mono bg-gray-100 px-1.5 py-0.5 rounded text-indigo-700">/about-us</code>'],
                ] as $row)
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">{{ $row['key'] }}</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{!! $row['value'] !!}</dd>
                </div>
                @endforeach
            </dl>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- CODE BLOCK --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Code Block</x-slot>
            <div class="space-y-4">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Inline Code</p>
                    <p class="text-sm text-gray-700">Use <code class="text-xs font-mono bg-gray-100 text-indigo-700 px-1.5 py-0.5 rounded">setting('site_name')</code> to retrieve a setting value, or <code class="text-xs font-mono bg-gray-100 text-indigo-700 px-1.5 py-0.5 rounded">Setting::set('key', 'value')</code> to save one.</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Block Code (dark theme — matches JSON editor)</p>
                    <div class="relative">
                        <div class="flex items-center justify-between px-4 py-2 bg-gray-800 rounded-t-lg">
                            <span class="text-xs text-gray-400 font-mono">JSON Template Example</span>
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            </div>
                        </div>
                        <pre class="bg-gray-900 text-gray-300 text-xs font-mono p-4 rounded-b-lg overflow-x-auto leading-relaxed"><code>{
  <span class="text-blue-400">"sections"</span>: [
    {
      <span class="text-blue-400">"type"</span>: <span class="text-green-400">"hero"</span>,
      <span class="text-blue-400">"data"</span>: {
        <span class="text-blue-400">"title"</span>: <span class="text-green-400">"Welcome to Our Site"</span>,
        <span class="text-blue-400">"subtitle"</span>: <span class="text-green-400">"The modern CMS for developers"</span>,
        <span class="text-blue-400">"cta_text"</span>: <span class="text-green-400">"Get Started"</span>,
        <span class="text-blue-400">"cta_link"</span>: <span class="text-green-400">"/signup"</span>
      }
    }
  ]
}</code></pre>
                    </div>
                </div>
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- TIMELINE --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Timeline</x-slot>
            <div>
                @foreach([
                    ['icon' => 'heroicon-m-check-circle', 'bg' => 'bg-green-100',   'text' => 'text-green-600',   'badge' => 'Published', 'badge_bg' => 'bg-green-100',   'badge_text' => 'text-green-700',   'title' => 'About Us page published',            'desc' => 'Page went live on production. All SEO meta tags applied.',                'time' => 'Today, 10:42 AM',    'user' => 'Admin'],
                    ['icon' => 'heroicon-m-pencil',       'bg' => 'bg-primary-100', 'text' => 'text-primary-600', 'badge' => 'Updated',   'badge_bg' => 'bg-primary-100', 'badge_text' => 'text-primary-700', 'title' => 'Homepage hero content revised',       'desc' => 'Updated headline copy and changed the CTA button label.',                'time' => 'Today, 09:15 AM',    'user' => 'Editor'],
                    ['icon' => 'heroicon-m-photo',         'bg' => 'bg-purple-100', 'text' => 'text-purple-600',  'badge' => 'Uploaded',  'badge_bg' => 'bg-purple-100',  'badge_text' => 'text-purple-700',  'title' => '3 images added to media library',    'desc' => 'banner-hero.png, team-photo.jpg, og-image.png were uploaded.',           'time' => 'Today, 08:03 AM',    'user' => 'Admin'],
                    ['icon' => 'heroicon-m-user-plus',     'bg' => 'bg-amber-100',  'text' => 'text-amber-600',   'badge' => 'Created',   'badge_bg' => 'bg-amber-100',   'badge_text' => 'text-amber-700',   'title' => 'New editor account created',         'desc' => 'sarah@example.com was invited and assigned the Editor role.',            'time' => 'Yesterday, 4:30 PM', 'user' => 'Admin'],
                    ['icon' => 'heroicon-m-cog-6-tooth',   'bg' => 'bg-gray-100',   'text' => 'text-gray-600',    'badge' => 'Changed',   'badge_bg' => 'bg-gray-100',    'badge_text' => 'text-gray-600',    'title' => 'Site settings updated',              'desc' => 'Site name, tagline, and logo were changed from the Settings panel.',     'time' => 'Yesterday, 2:10 PM', 'user' => 'Admin'],
                    ['icon' => 'heroicon-m-trash',          'bg' => 'bg-red-100',    'text' => 'text-red-600',     'badge' => 'Deleted',   'badge_bg' => 'bg-red-100',     'badge_text' => 'text-red-700',     'title' => '"Old Blog Post" permanently deleted','desc' => 'Post was in the trash for 30 days and was force-deleted.',                'time' => '3 days ago',         'user' => 'System'],
                ] as $event)
                {{-- Inline styles guarantee correct centering regardless of Tailwind JIT --}}
                <div style="display:flex; gap:1rem; {{ !$loop->last ? 'padding-bottom:1.5rem;' : '' }}">
                    {{-- Left column: fixed 40px wide, flex-col, center-align children --}}
                    <div style="display:flex; flex-direction:column; align-items:center; flex:none; width:2.5rem;">
                        <div class="w-10 h-10 rounded-full {{ $event['bg'] }} {{ $event['text'] }} flex items-center justify-center ring-2 ring-white" style="flex-shrink:0;">
                            <x-filament::icon :icon="$event['icon']" class="h-4 w-4" />
                        </div>
                        @if(!$loop->last)
                        <div style="width:2px; flex:1; background:#e5e7eb; margin-top:4px;"></div>
                        @endif
                    </div>
                    {{-- Right: content --}}
                    <div style="flex:1; min-width:0; padding-top:0.25rem;">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <div class="flex items-center gap-2 mb-0.5">
                                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $event['badge_bg'] }} {{ $event['badge_text'] }}">{{ $event['badge'] }}</span>
                                    <p class="text-sm font-semibold text-gray-900">{{ $event['title'] }}</p>
                                </div>
                                <p class="text-sm text-gray-500">{{ $event['desc'] }}</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-xs text-gray-400">{{ $event['time'] }}</p>
                                <p class="text-xs text-gray-400">by {{ $event['user'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-filament::section>

        {{-- ============================================================ --}}
        {{-- NOTIFICATION TOASTS --}}
        {{-- ============================================================ --}}
        <x-filament::section>
            <x-slot name="heading">Notification Toasts</x-slot>
            <div class="space-y-3 max-w-sm">
                @foreach([
                    ['color' => 'bg-green-50 border-green-200', 'icon' => 'heroicon-o-check-circle', 'icon_color' => 'text-green-600', 'title' => 'Saved successfully', 'body' => 'Your changes have been saved.', 'title_color' => 'text-green-900'],
                    ['color' => 'bg-amber-50 border-amber-200', 'icon' => 'heroicon-o-exclamation-triangle', 'icon_color' => 'text-amber-600', 'title' => 'Action required', 'body' => 'Review the pending items before publishing.', 'title_color' => 'text-amber-900'],
                    ['color' => 'bg-red-50 border-red-200', 'icon' => 'heroicon-o-x-circle', 'icon_color' => 'text-red-600', 'title' => 'An error occurred', 'body' => 'Something went wrong. Please try again.', 'title_color' => 'text-red-900'],
                    ['color' => 'bg-sky-50 border-sky-200', 'icon' => 'heroicon-o-information-circle', 'icon_color' => 'text-sky-600', 'title' => 'New update available', 'body' => 'Light-CMS v1.2 is ready to install.', 'title_color' => 'text-sky-900'],
                ] as $toast)
                <div class="flex items-start gap-3 px-4 py-3 rounded-xl border shadow-sm {{ $toast['color'] }}">
                    <x-filament::icon :icon="$toast['icon']" class="h-5 w-5 shrink-0 mt-0.5 {{ $toast['icon_color'] }}" />
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold {{ $toast['title_color'] }}">{{ $toast['title'] }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">{{ $toast['body'] }}</p>
                    </div>
                    <button class="shrink-0 text-gray-400 hover:text-gray-600">
                        <x-filament::icon icon="heroicon-m-x-mark" class="h-4 w-4" />
                    </button>
                </div>
                @endforeach
            </div>
        </x-filament::section>

    </div>
</x-filament-panels::page>
