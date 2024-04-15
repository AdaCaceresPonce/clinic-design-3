<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <section
        class="w-full h-[600px] md:h-[620px] lg:h-[680px] brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('img/bienvenida.jpg') }}');">
        {{-- Fondo azulado para la imagen --}}
        <div class="bg-blue-700 bg-opacity-20 inset-0 absolute z-10">
        </div>
        <x-container class="px-8 h-full flex align-middle items-center justify-center lg:justify-start relative z-20">
            {{-- Tarjeta de bienvenida --}}
            <div class="bg-[#EAFBFF] bg-opacity-75 rounded-3xl px-11 py-12 max-w-[570px] text-center lg:text-start">

                <p class="text-4xl lg:text-5xl leading-tight lg:leading-tight font-bold">
                    Prepárate para una <span class="text-[#0075FF]"> grandiosa experiencia dental.</span>
                </p>

                <p class="mt-6 text-base lg:text-lg font-medium">
                    En Clínica Dental utilizamos las mejores herramientas y materiales para brindarte un servicio y
                    atención de calidad velando siempre por tu comodidad.</p>

                <div class="mt-12">
                    <button class="text-base lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                        Agenda una cita
                    </button>
                </div>

            </div>
        </x-container>
    </section>

    <section>
        <x-container class="px-4 py-24 lg:py-36">
            <div class="flex items-center flex-wrap-reverse">
                <div class="w-full lg:w-1/2">
                    <img class="h-[450px] sm:h-[550px] lg:h-[670px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/clinica-confianza.jpg') }}" alt="">
                </div>
                <div class="w-full lg:w-1/2 px-8 pb-10 sm:px-20 lg:pl-16 lg:pr-0 lg:pb-0 text-start">
                    <p class="text-4xl lg:text-5xl leading-tight lg:leading-tight font-bold">
                        Una Clínica Dental en la que puedes <span class="text-[#0075FF]">confiar.</span>
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl mt-7">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl mt-8">
                        Te ofrecemos:
                    </p>
                    <div class="mt-4">
                        <ul class="space-y-4">
                            <li class="flex items-center">
                                <i class="fa-solid fa-circle-check text-2xl text-[#0075FF] mr-2"></i>
                                <span class="text-base sm:text-lg lg:text-xl font-bold">Equipamiento moderno</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-circle-check text-2xl text-[#0075FF] mr-2"></i>
                                <span class="text-base sm:text-lg lg:text-xl font-bold">Monitoreo continuo</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-circle-check text-2xl text-[#0075FF] mr-2"></i>
                                <span class="text-base sm:text-lg lg:text-xl font-bold">Equipo de profesionales
                                    capacitado</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12">
                        <button class="text-base lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                            Conócenos
                        </button>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

    {{-- Servicios --}}
    <section>
        <x-container class="px-4 pb-24 lg:pb-36 lg:pt-10 flex-col">
            {{-- Titulo --}}
            <div class="mb-10 px-4 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        Nuestros <span class="text-[#0075FF]">Servicios Dentales.</span>
                    </p>
                </div>
                <div>
                    <p class="text-base sm:text-lg lg:text-2xl mt-4">
                        Descubre los servicios que ponemos a tu disposición, siempre con la mejor atención médica
                        dental.
                    </p>
                </div>
            </div>
            {{-- Slider --}}
            <div class="flex justify-center align-middle">
                <div class="card__container swiper pb-14">
                    <div class="card__content lg:px-6">
                        <div class="swiper-wrapper">
                            @foreach ($services as $service)
                                <article class="card__article swiper-slide border-[2px] border-[#1376F8]">
                                    <div class="card__image">
                                        <img src="{{ $service->image }}" alt="image"
                                            class="card__img object-cover object-center">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">{{ $service->name }}</h3>
                                        <p class="card__description">
                                            {{ $service->small_description }}
                                        </p>
                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>
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
                    <div class="swiper-pagination"></div>

                </div>
            </div>
            </div>
        </x-container>
    </section>

    <section>
        <x-container class="px-4">
            {{-- Titulo --}}
            <div class="mb-10 px-4 text-center sm:px-15 lg:px-20">
                <div>
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        Comunícate con nosotros. Estamos a tu servicio.
                    </p>
                </div>
                <div>
                    <p class="text-base sm:text-lg lg:text-2xl mt-4 text-[#0075FF] font-bold">
                        Solicita una cita o envía una consulta. Nos contactaremos contigo lo más antes posible.
                    </p>
                </div>
            </div>
            {{-- Cuadro de contacto --}}
            <div class="flex items-center flex-wrap-reverse">
                {{-- Formulario --}}
                <div class="w-full lg:w-1/2">
                    <div class="card">

                    </div>
                </div>
                {{-- Info de contacto --}}
                <div class="w-full lg:w-1/2">
                    {{-- Datos --}}
                    <div class="pl-4 space-y-4">
                        {{-- Elemento --}}
                        <div class="w-full h-[83px] px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                            {{-- Icono --}}
                            <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                                <i class="fa-solid fa-phone text-xl text-white"></i>
                            </div>
                            {{-- Texto --}}
                            <div class="ml-4 flex flex-1 flex-col">
                                <span class="font-bold">Teléfono</span>
                                <span class="font-medium">999 999 999</span>
                            </div>
                        </div>

                        {{-- Elemento --}}
                        <div class="w-full h-[83px] px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                            {{-- Icono --}}
                            <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                                <i class="fa-regular fa-clock text-2xl text-white"></i>
                            </div>
                            {{-- Texto --}}
                            <div class="ml-4 flex flex-1 flex-col">
                                <span class="font-bold">Horarios de atención</span>
                                <span class="font-medium leading-5">Lunes a Viernes: 8:00 am - 6:00 pm<br>Sábados y Domingos: 8:00 am - 3:00 pm</span>
                            </div>
                        </div>
                    </div>
                    {{-- Imagen --}}
                    <div>

                    </div>
                </div>
            </div>
        </x-container>
    </section>

    <style>
        .card__content {
            margin-inline: 1.75rem;
            border-radius: 1.25rem;
            overflow: hidden;
        }

        .card__article {
            width: 300px;
            border-radius: 1.25rem;
            overflow: hidden;
        }

        .card__image {
            position: relative;
        }

        .card__data {
            padding: 1.5rem 1.5rem;
        }

        .card__img {
            width: 100%;
            height: 240px;
            margin: 0 auto;
        }

        /* Swiper class */
        .swiper-button-prev:after,
        .swiper-button-next:after {
            content: "";
        }

        .swiper-button-prev,
        .swiper-button-next {
            width: initial;
            height: initial;
            font-size: 3rem;
            color: #0075FF;
            display: none;
        }

        .swiper-button-prev {
            left: 0;
        }

        .swiper-button-next {
            right: 0;
        }

        @media screen and (max-width: 320px) {
            .card__data {
                padding: 1rem;
            }
        }

        @media screen and (min-width: 768px) {
            .card__content {
                margin__inline: 3rem;
            }
            .swiper-button-prev,
            .swiper-button-next {
                display: block;
            }
        }

        @media screen and(min-width: 1120px){
            .card__container{
                
            }
            .swiper-button-next{
                right: -1rem;
            }
            .swiper-button-prev{
                left: -1rem;
            }
        }
    </style>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            let swiperCards = new Swiper('.card__content', {
                // Optional parameters
                loop: true,
                spaceBetween: 25,
                grabCursor: true,
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                breakpoints: {
                    600: {
                        slidesPerView: 2,
                    },
                    968: {
                        slidesPerView: 3,
                    },
                },
            });
        </script>
    @endpush

</x-app-layout>
