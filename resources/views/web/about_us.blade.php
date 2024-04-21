<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Portada --}}
    <section class="w-full brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
    style="background-image: url('{{ asset('img/nosotros.jpg') }}');">
        <div class="bg-blue-950 bg-opacity-50 inset-0 absolute z-10">
        </div>
        <x-container class="px-4 py-44 h-full flex align-middle items-center relative z-20">
            <p class="text-white text-5xl font-bold border-l-[7px] pl-4 tracking-normal">
                Sobre Nosotros
            </p>
        </x-container>
    </section>

    <section>

    </section>
</x-app-layout>
