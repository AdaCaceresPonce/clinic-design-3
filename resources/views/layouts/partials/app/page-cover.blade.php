@props(['image', 'name'])

<section class="w-full brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
    style="background-image: url('{{ $image }}');">
    <div class="bg-blue-900 bg-opacity-50 inset-0 absolute z-10">
    </div>
    <x-container class="px-4 py-44 h-full flex align-middle items-center relative z-20">
        <p class="text-white text-5xl font-bold border-l-[7px] pl-4 tracking-normal">
            {{ $name }}
        </p>
    </x-container>
</section>