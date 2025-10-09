@props([
    'section_title' => 'Sin título',
    'description' => null,
    'route_name' => null,
    'section_id' => ''
])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="flex flex-col sm:flex-row sm:items-start lg:items-center sm:justify-between gap-3">
        
        {{-- Lado izquierdo: Título y descripción --}}
        <div class="flex-1 min-w-0 space-y-1 mb-1 md:mb-0">
            <h2 class="text-lg md:text-xl font-bold text-gray-900">
                {{ $section_title }}
            </h2>
            
            @if($description)
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>

        {{-- Lado derecho: Botón --}}
        @if($route_name)
            <a href="{{ route($route_name) }}{{ $section_id }}" 
               target="_blank"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-[#0075FF] to-[#00CAF7] hover:from-[#0060D9] hover:to-[#0075FF] rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex-shrink-0 group">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <span>Ver en web</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>
        @endif

    </div>
</div>