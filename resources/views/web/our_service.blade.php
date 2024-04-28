<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Portada --}}
    <x-page-cover :image="asset('img/servicio.jpg')" :name="'Servicios'" />

    <section>
        <x-container
            class="px-8 py-24 h-full flex align-middle items-center justify-center lg:justify-start relative z-20">
            {{-- Tarjeta de bienvenida --}}
            <div class="rounded-3xl px-11 py-12 max-w-[570px] text-center lg:text-start">
AA
                <p class="mt-6 text-base lg:text-lg font-medium">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam molestiae quisquam impedit.
                    Fugit nihil incidunt vero cum aspernatur, nesciunt quae alias exercitationem facere voluptas
                    suscipit culpa facilis ea vel eligendi, dolorem quaerat hic enim eos voluptatum. Repudiandae
                    reApellendus magni deserunt illum eius corporis, dolorum incidunt obcaecati saepe, ducimus cum
                    aliquam rerum ratione, inventore reprehenderit accusantium! Similique natus libero molestias,
                    consectetur ab vel repellendus quibusdam sapiente possimus quaerat sed animi.
                </p>
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
            {{-- Slider --}}
            <div class="flex justify-center align-middle mb-5">
                <div class="card__container swiper pb-14 px-10">
                    <div class="card__content rounded-xl">
                        <div class="swiper-wrapper">
                            @foreach ($services->chunk(3) as $row)
                                <div class="swiper-slide">
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                                        @foreach ($row as $service)
                                            <article
                                                class="card__article border-[3px] rounded-xl border-[#1376F8] shadow-lg">
                                                <div
                                                    class="card__image w-full flex justify-center items-center relative">
                                                    <h3
                                                        class="service__name text-white text-2xl font-bold text-center px-4 w-full absolute z-10">
                                                        {{ $service->name }}
                                                    </h3>
                                                    <img src="{{ $service->image }}" alt="image"
                                                        class="card__img object-cover object-center w-full brightness-75">
                                                </div>
                                                <div class="card__data">
                                                    <p class="card__description mb-6 min-h-[120px] line-clamp-5">
                                                        {{ $service->small_description }}
                                                    </p>
                                                    <div class="flex justify-center">
                                                        <a href="#"
                                                            class="text-white items-center bg-blue-700 py-2 px-6 rounded-lg">
                                                            Conoce más
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Botones de navegacion --}}
                    <div class="swiper-button-prev">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div class="swiper-button-next">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>

                    {{-- Paginacion --}}
                    <div class="swiper-pagination service-pagination"></div>

                </div>
                
            </div> 

        </x-container>
        {{-- </section> --}}


    </section>
</x-app-layout>
