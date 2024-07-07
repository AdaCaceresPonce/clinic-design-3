<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Portada --}}
    <x-page-cover :image="asset('img/servicio.jpg')" :name="'Servicios'" />

    <section>
        <x-container class="px-4 section__spacing">
            {{-- Tarjeta de bienvenida --}}
            <div class="flex items-center flex-wrap-reverse">
                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 md:px-44 lg:px-16">
                    <img class="h-auto sm:h-[510px] sm:w-[350px] lg:h-[600px] lg:w-full object-cover md:object-top object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/clinica-confianza.jpg') }}" alt="">
                </div>
                {{-- <div class="rounded-3xl px-11 py-12 max-w-[570px] text-center lg:text-start">

                    <div class="w-full lg:w-1/2">
                        <img class="h-[450px] sm:h-[550px] lg:h-[670px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                            src="{{ asset('img/clinica-confianza.jpg') }}" alt="">
                    </div>
                </div> --}}
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        <span class="text-[#0075FF]">Nuestros Servicios</span>
                    </p>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa cupiditate, laborum officia, ab
                        labore obcaecati error deleniti quo sit mollitia tempore omnis, cumque eos veniam voluptatibus
                        nulla doloribus magni assumenda aspernatur quisquam! In qui aspernatur accusamus laborum aperiam
                        eligendi. Nobis, eos id hic dolorem quis voluptates fuga maiores deserunt ab, officia molestiae
                        adipisci qui dolor autem sequi architecto quam ad a. Molestiae quos nulla ducimus facilis
                        aspernatur.
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sapiente deleniti eius
                        consequuntur nulla quidem quam soluta voluptatibus ratione libero. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Dolores porro rerum, animi quae quis ipsum, eos magni nihil
                        adipisci excepturi vero blanditiis qui temporibus officiis saepe numquam fuga obcaecati beatae.
                        Iure illum, corrupti dolorum at tenetur doloribus assumenda vel modi.
                    </p>
                </div>
        </x-container>
    </section>

    {{-- Servicios --}}
    <section>
        <x-container class="px-4 py-20 flex-col">
            {{-- Titulo --}}
            <div class="mb-8 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <p class="text-4xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        Nuestros <span class="text-[#0075FF]">Servicios Dentales.</span>
                    </p>
                </div>
                <div>
                    <p class="text-base sm:text-lg lg:text-xl mt-3">
                        Descubre los servicios que ponemos a tu disposición, siempre con la mejor atención médica
                        dental.
                    </p>
                </div>
            </div>

            <div class="sm:px-8 md:px-0 lg:px-0
                md:w-[684px] lg:w-full mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-10">
                    @foreach ($services as $service)

                            <div class="border-[3px] rounded-xl border-[#1376F8] shadow-lg overflow-hidden">

                                <div class="flex justify-center items-center relative">
                                    <h3
                                        class="service__name text-white text-2xl font-bold text-center px-4 w-full absolute z-10">
                                        {{ $service->name ?? 'Nombre del servicio' }}
                                    </h3>
                                    <img src="{{ $service->image }}" alt="image"
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
