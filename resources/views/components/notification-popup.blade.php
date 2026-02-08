@php
    $notification = \App\Models\Notification::active()->first();
@endphp

@if($notification)
<div
    x-data="{
        show: true,
        init() {
            @if($notification->auto_close_seconds)
            setTimeout(() => this.show = false, {{ $notification->auto_close_seconds * 1000 }});
            @endif
        }
    }"
    x-show="show"
    x-transition
    @class([
        'fixed z-50 left-0 right-0 mx-auto max-w-2xl px-4',
        'top-4' => $notification->position === 'top',
        'top-1/2 -translate-y-1/2' => $notification->position === 'center',
        'bottom-4' => $notification->position === 'bottom',
    ])
>
    <div @class([
        'rounded-lg shadow-2xl p-6 border-l-4 backdrop-blur-sm',
        'bg-blue-50 border-blue-500 text-blue-900' => $notification->type === 'info',
        'bg-green-50 border-green-500 text-green-900' => $notification->type === 'success',
        'bg-yellow-50 border-yellow-500 text-yellow-900' => $notification->type === 'warning',
        'bg-red-50 border-red-500 text-red-900' => $notification->type === 'error',
    ])>
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <h3 class="text-lg font-bold mb-2">{{ $notification->title }}</h3>
                <p class="text-sm mb-4">{{ $notification->message }}</p>

                @if($notification->button_text && $notification->button_url)
                    <a
                        href="{{ $notification->button_url }}"
                        @class([
                            'inline-block px-4 py-2 rounded font-medium text-sm transition-colors',
                            'bg-blue-600 text-white hover:bg-blue-700' => $notification->type === 'info',
                            'bg-green-600 text-white hover:bg-green-700' => $notification->type === 'success',
                            'bg-yellow-600 text-white hover:bg-yellow-700' => $notification->type === 'warning',
                            'bg-red-600 text-white hover:bg-red-700' => $notification->type === 'error',
                        ])
                    >
                        {{ $notification->button_text }}
                    </a>
                @endif
            </div>

            @if($notification->show_close_button)
                <button
                    @click="show = false"
                    class="ml-4 text-current opacity-60 hover:opacity-100 transition-opacity"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            @endif
        </div>
    </div>
</div>
@endif
