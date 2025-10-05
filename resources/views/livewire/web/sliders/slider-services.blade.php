<div class="flex justify-center align-middle w-full mb-5 mx-auto">

    <div class="card__container swiper pb-8 px-0 w-full min-[768px]:px-12" x-init="let swiperCards = new Swiper('.card__content', {
        loop: true,
        spaceBetween: 30,
        grabCursor: true,
        pagination: {
            el: '.service-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });">
        <div class="card__content px-0 md:px-5 py-6">
            <div class="swiper-wrapper">
                @foreach ($services as $service)
                    <article class="card__article swiper-slide group">
                        {{-- Card Container con hover effect --}}
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-[#0075FF] hover:-translate-y-2 h-full flex flex-col">

                            {{-- Imagen con overlay y título --}}
                            <div class="relative overflow-hidden aspect-[4/3]">
                                {{-- Imagen --}}
                                <img src="{{ Storage::url($service->card_img_path) }}" alt="{{ $service->name }}"
                                    class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">

                                {{-- Overlay gradient --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                                </div>

                                {{-- Título sobre la imagen --}}
                                <div class="absolute bottom-0 left-0 right-0 p-5">
                                    <h3 class="text-white text-xl font-bold leading-tight drop-shadow-lg">
                                        {{ $service->name ?? 'Nombre del servicio' }}
                                    </h3>
                                </div>

                            </div>

                            {{-- Contenido de la card --}}
                            <div class="p-5 flex flex-col flex-grow">
                                {{-- Descripción --}}
                                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow line-clamp-4">
                                    {{ $service->small_description ?? 'Descripción del servicio' }}
                                </p>

                                {{-- Botón "Conoce más" --}}
                                <div class="mt-auto">
                                    <a href="{{ route('our_services.show_service', $service) }}"
                                        class="group/btn relative inline-flex items-center justify-center w-full bg-[#0075FF] text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 overflow-hidden shadow-lg hover:shadow-xl">
                                        <span class="relative z-10 flex items-center gap-2">
                                            Conoce más
                                            <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        {{-- Botones de navegación mejorados --}}
        <div class="swiper-button-prev">
            <div
                class="bg-white hover:bg-[#0075FF] text-[#0075FF] hover:text-white rounded-full w-12 h-12 flex items-center justify-center shadow-xl transition-all duration-300 border-2 border-[#0075FF]">
                <i class="fa-solid fa-chevron-left text-xl"></i>
            </div>
        </div>
        <div class="swiper-button-next">
            <div
                class="bg-white hover:bg-[#0075FF] text-[#0075FF] hover:text-white rounded-full w-12 h-12 flex items-center justify-center shadow-xl transition-all duration-300 border-2 border-[#0075FF]">
                <i class="fa-solid fa-chevron-right text-xl"></i>
            </div>
        </div>

        {{-- Paginación mejorada --}}
        <div class="swiper-pagination service-pagination"></div>
    </div>

    <style>
        .card__content {

            overflow: hidden;
        }

        .card__article {
            height: auto;
        }

        /* Swiper Navigation Buttons */
        .swiper-button-prev:after,
        .swiper-button-next:after {
            content: "";
        }

        .swiper-button-prev,
        .swiper-button-next {
            width: initial;
            height: initial;
            display: none;
            z-index: 10;
        }

        /* .swiper-button-prev {
            left: -10px;
        }

        .swiper-button-next {
            right: -10px;
        } */



        /* Responsive */
        @media screen and (max-width: 640px) {
            .card__article .p-5 {
                padding: 1rem;
            }
        }

        @media screen and (min-width: 768px) {

            .swiper-button-prev,
            .swiper-button-next {
                display: flex;
            }
        }

        @media screen and (min-width: 1280px) {
            /* .swiper-button-next {
                right: 3px;
            }

            .swiper-button-prev {
                left: 3px;
            } */
        }

        /* Line clamp fallback para navegadores antiguos */
        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>
