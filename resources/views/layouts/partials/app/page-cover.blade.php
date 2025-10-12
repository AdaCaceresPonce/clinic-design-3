@props(['image' => '', 'name' => 'Sin título', 'id' => '#'])

<section class="w-full bg-cover bg-no-repeat bg-center relative" style="background-image: url('{{ $image }}');"
    id="{{ $id }}">

    <div class="bg-blue-900/40 inset-0 absolute z-10"></div>

    <x-container class="px-4 py-24 lg:py-48 h-full flex align-middle items-center relative z-20">
        <p class="text-white text-3xl sm:text-5xl font-bold border-l-[7px] pl-6 tracking-normal">
            {{ $name }}
        </p>
    </x-container>
</section>
