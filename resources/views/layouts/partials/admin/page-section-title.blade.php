@props(['section_title', 'route_name', 'section_id'])

<div class="flex items-center border-b-[3px] border-b-slate-400 pb-2 mb-1">

    <span class="text-2xl font-bold mr-3">
        {{ $section_title }}
    </span>

    <a href="{{ route($route_name) }}{{ $section_id }}" target="_blank"
        class="px-3 py-[7px] text-white bg-[rgb(0,117,255)] rounded-xl">
        <i class="fa-solid fa-eye"></i>
    </a>

</div>