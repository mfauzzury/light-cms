@if($menu && $items->count())
<nav class="menu menu-{{ $location }}" aria-label="{{ $menu->name }}">
    <ul class="flex space-x-4">
        @foreach($items as $item)
            <li class="relative group">
                <a
                    href="{{ $item->full_url }}"
                    target="{{ $item->target }}"
                    class="text-gray-600 hover:text-gray-900 px-2 py-1 text-sm font-medium transition-colors"
                >
                    {{ $item->title }}
                </a>

                @if($item->children->count())
                    <ul class="absolute left-0 mt-1 w-48 bg-white border border-gray-200 shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        @foreach($item->children as $child)
                            <li>
                                <a
                                    href="{{ $child->full_url }}"
                                    target="{{ $child->target }}"
                                    class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
                                >
                                    {{ $child->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
@endif