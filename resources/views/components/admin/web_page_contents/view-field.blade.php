@props([
    'icon' => null,
    'label' => 'Sin label',
    'empty' => 'Sin contenido',
])

@php
    switch ($icon) {
        case 'title':
            
            $icon = '<svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message w-5 h-5 text-blue-600"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>';
            break;

        case 'description':

            $icon = '<svg  xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-align-left-2 w-5 h-5 text-blue-600"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4v16" /><path d="M8 6h12" /><path d="M8 12h6" /><path d="M8 18h10" /></svg>';
            break;

        default:
            
            $icon = null;

            break;
    }
@endphp

<div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
    <div class="flex items-center gap-2 mb-2">
        @if($icon)
            {!! $icon !!}
        @endif

        <x-label class="text-sm font-semibold text-gray-700">
            {{ $label }}
        </x-label>
    </div>

    <div class="">
        @if($slot->isEmpty())
            <span class="text-gray-400 italic">{{ $empty }}</span>
        @else
            {!! $slot !!}
        @endif
    </div>
</div>