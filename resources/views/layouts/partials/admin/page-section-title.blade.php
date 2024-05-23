@props(['section_title', 'route_name', 'section_id'])

<div class="flex items-center">

    <span class="text-2xl font-bold mr-2">
        {{ $section_title }}
    </span>

    <a href="{{ route($route_name) }}{{ $section_id }}" target="_blank"
        class="px-3 py-2 text-white bg-[rgb(0,117,255)] rounded-xl">
        <i class="fa-solid fa-eye"></i>
    </a>

</div>