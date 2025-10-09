@props([
    'label' => 'Imagen',
    'src' => null,
    'size_recommended' => null,
    'formats' => 'JPG, JPEG, PNG, WEBP',
])

<div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
    <div class="flex items-center gap-2 mb-3">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-photo w-5 h-5 text-blue-600">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M15 8h.01" />
            <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
        </svg>
        <x-label class="text-sm font-semibold text-gray-700">
            {{ $label }}
        </x-label>
    </div>

    @if ($src)
        <figure class="relative group overflow-hidden rounded-lg">
            <img class="object-contain object-center w-full aspect-video border bg-white border-gray-300 rounded-lg transition-transform duration-300 group-hover:scale-105"
                src="{{ Storage::url($src) }}" alt="{{ $label }}">

            <div
                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-opacity duration-300 flex items-center justify-center">
                <a href="{{ Storage::url($src) }}" target="_blank"
                    class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white text-gray-800 px-4 py-2 rounded-lg font-semibold text-sm flex items-center gap-2">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-zoom-in w-4 h-4">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M7 10l6 0" />
                        <path d="M10 7l0 6" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                    Ver original
                    
                </a>
            </div>
        </figure>

        <div class="mt-3 flex items-center gap-4 text-xs text-gray-500">
            <span class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-description w-4 h-4">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    <path d="M9 17h6" />
                    <path d="M9 13h6" />
                </svg>
                Formato: {{ $formats }}
            </span>
            @if ($size_recommended)
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-maximize w-4 h-4">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M16 4l4 0l0 4" />
                        <path d="M14 10l6 -6" />
                        <path d="M8 20l-4 0l0 -4" />
                        <path d="M4 20l6 -6" />
                        <path d="M16 20l4 0l0 -4" />
                        <path d="M14 14l6 6" />
                        <path d="M8 4l-4 0l0 4" />
                        <path d="M4 4l6 6" />
                    </svg>
                    Recomendado: {{ $size_recommended }}
                </span>
            @endif
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-12 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-photo-question w-16 h-16 mb-3">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 8h.01" />
                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" />
                <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" />
                <path d="M19 22v.01" />
                <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
            </svg>
            <p class="text-sm font-medium">Sin imagen configurada</p>
        </div>
    @endif
</div>
