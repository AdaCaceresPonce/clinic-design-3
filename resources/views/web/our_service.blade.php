<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    {{-- Portada --}}
    {{-- <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'"/> --}}
    <x-page-cover :image="Storage::url($contents->cover_img ?? 'default_cover.jpg')" :name="$contents->cover_title ?? 'Nuestros Servicios'" :id="'cover'" />

    <section id="services">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">

                {{-- Imagen --}}
                {{-- <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">
                    <img class="size-full aspect-[4/5] lg:max-h-[540px] lg:w-full object-cover md:object-top object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ Storage::url($contents['our_services_img']) }}" alt="">
                </div> --}}
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 sm:px-32 md:px-40 lg:px-8 xl:px-10">
                    <img class="size-full aspect-[4/5] lg:max-h-[540px] lg:w-full object-cover md:object-top object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ Storage::url($contents->our_services_img ?? 'default_service.jpg') }}" alt="">
                </div>
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        {{-- {!! $contents['our_services_title'] !!} --}}
                        {!! $contents->our_services_title ?? 'Servicios que ofrecemos' !!}
                    </span>
                    <div class="mt-4">
                        <span>
                            {{-- {!! $contents['our_services_description'] !!} --}}
                            {!! $contents->our_services_description ?? 'Aquí va la descripción de tus servicios.' !!}
                        </span>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    {{-- Servicios --}}
    <section id="services_list">
        <x-container class="px-4 py-20 flex-col">
            {{-- Titulo --}}
            <div class="mb-8 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <span class="text-4xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        {!! $contents['services_we_offer_title'] ?? 'Título por defecto' !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['services_we_offer_description'] ?? 'Descripción por defecto' !!}
                    </span>
                </div>
            </div>

            <div class="sm:px-8 md:px-0 lg:px-0
                md:w-[684px] lg:w-full mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
                    @foreach ($services as $service)
                        <div class="border-[3px] rounded-xl border-[#1376F8] shadow-lg overflow-hidden">

                            <div class="flex justify-center items-center relative">
                                <h3
                                    class="service__name text-white text-2xl font-bold text-center px-4 w-full absolute z-10">
                                    {{ $service->name ?? 'Nombre del servicio' }}
                                </h3>
                                <img src="{{ Storage::url($service->card_img_path) }}" alt="image"
                                    class="card__img object-cover object-center aspect-[4/3] brightness-75">
                            </div>

                            <div class="p-5">
                                <p class="card__description mb-6 min-h-[120px] line-clamp-5">
                                    {{ $service->small_description ?? 'Descripción del servicio' }}
                                </p>
                                <div class="flex justify-center">
                                    <a href="{{ route('our_services.show_service', $service) }}"
                                        class="text-white items-center bg-blue-700 py-2 px-4 rounded-lg">
                                        Conoce más
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $services->links() }}
                </div>
            </div>
        </x-container>
    </section>

</x-app-layout>
