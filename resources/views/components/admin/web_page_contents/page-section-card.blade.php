@props([
    'section_title' => null,
    'description' => null,
    'route_name' => null,
    'section_id' => ''
])

<x-wireui-card padding="none" {{ $attributes->merge(['class' => 'overflow-hidden']) }}>

    {{-- Header / Título --}}
    <div class="px-6 py-5 border-b border-gray-200">
        <x-admin.web_page_contents.page-section-title 
            :section_title="$section_title"
            :description="$description"
            :route_name="$route_name"
            :section_id="$section_id"
        />
    </div>

    {{-- Contenido dinámico --}}
    <div class="p-6">
        {{ $slot }}
    </div>

</x-wireui-card>