<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <section class="w-full  brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('img/bienvenida.jpg') }}');">
        {{-- Fondo azulado para la imagen --}}
        <div class="bg-blue-700 bg-opacity-20 inset-0 absolute z-10">
        </div>
        <x-container
            class="px-8 py-24 h-full flex align-middle items-center justify-center lg:justify-start relative z-20">
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
        <x-container class="px-4 pt-24 pb-20">
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
                        {{-- <button class="text-base lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                            Conócenos
                        </button> --}}
                        <a href="{{ route('about_us.index') }}" class="text-white text-lg font-medium bg-blue-700 py-4 px-8 rounded-xl">
                            Conócenos
                        </a>
                    </div>
                </div>
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
            {{-- Slider --}}
            <div class="flex justify-center align-middle mb-5">
                <div class="card__container swiper pb-14 px-10">
                    <div class="card__content rounded-xl">
                        <div class="swiper-wrapper ">
                            @foreach ($services as $service)
                                <article
                                    class="card__article swiper-slide border-[3px] rounded-xl border-[#1376F8] shadow-lg">

                                    <div class="card__image w-full flex justify-center items-center relative">
                                        <h3
                                            class="service__name text-white text-2xl font-bold text-center px-4 w-full absolute z-10">
                                            {{ $service->name }}
                                        </h3>
                                        <img src="{{ $service->image }}" alt="image"
                                            class="card__img object-cover object-center w-full brightness-75">
                                    </div>

                                    <div class="card__data">
                                        {{-- <h3 class="card__name font-bold text-lg mb-2 line-clamp-2 min-h-[56px]">
                                            {{ $service->name }}
                                        </h3> --}}
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
            {{-- Ver todos los servicios --}}
            <div class="flex w-full justify-center">
                <a href="#" class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                    Ver todos los servicios
                </a>
            </div>
        </x-container>
    </section>

    {{-- Profesionales --}}
    <section>
        <x-container class="py-20">
            <div class="bg-[#DEFFFE] py-16 px-4 rounded-2xl">
                {{-- Titulo --}}
                <div class="mb-10 px-2 sm:px-4 text-center sm:px-15 lg:px-40">
                    <div>
                        <p class="text-4xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                            Nuestros <span class="text-[#0075FF]">Profesionales.</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-base sm:text-lg lg:text-xl mt-3">
                            Disponemos de un equipo de profesionales altamente capacitados.
                        </p>
                    </div>
                </div>
                {{-- Slider --}}
                <div class="professionals__content w-full h-full mb-8 lg:px-16">
                    <div class="swiper w-full h-full professionals__slider pt-6 pb-14 px-4 js-professionals-slider">
                        <div class="swiper-wrapper">
                            @foreach ($professionals as $professional)
                                {{-- Carta --}}
                                <article
                                    class="swiper-slide professional__card bg-white w-[260px] overflow-hidden rounded-xl border-[1px] border-[#636363] shadow-lg"
                                    style="">
                                    {{-- Foto del profesional --}}
                                    <div class="">
                                        <img src="{{ $professional->photo }}" alt="image"
                                            class="card__img w-full object-cover object-center">
                                    </div>
                                    {{-- Datos del profesional --}}
                                    <div class="px-4 py-6 text-center">
                                        <p class="font-bold text-lg">{{ $professional->name }}</p>
                                        <p class="text-[#0075FF] font-bold">
                                            @foreach ($professional->specialties as $specialty)
                                                {{ $specialty->name }}
                                                @if (!$loop->last)
                                                    /
                                                @endif
                                            @endforeach
                                        </p>

                                    </div>
                                </article>
                            @endforeach
                        </div>

                        {{-- Paginacion --}}
                        <div class="swiper-pagination js-professionals-pagination"></div>
                    </div>

                </div>
                {{-- Ver todos los profesionales --}}
                <div class="flex w-full justify-center">
                    <a href="{{ route('our_professionals.index') }}" class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                        Conoce al equipo completo
                    </a>
                </div>
            </div>

        </x-container>
    </section>

    {{-- Opiniones --}}
    <section>
        <x-container class="px-4 py-20">
            {{-- Titulo --}}
            <div class="mb-5 px-4 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <p class="text-4xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        <span class="text-[#0075FF]">Lo que nuestros pacientes opinan.</span>
                    </p>
                </div>
                <div>
                    <p class="text-base sm:text-lg lg:text-xl mt-3">
                        Pacientes de diferentes lugares nos dejan sus opiniones.
                    </p>
                </div>
            </div>
            {{-- Slider Opiniones --}}
            <div class="testimonials__content">
                <div class="swiper pt-6 pb-14  lg:px-4 testimonials__slider js-testimonials-slider">
                    <div class="swiper-wrapper">
                        {{-- Carta de opinion --}}
                        <div
                            class="testimonials__item swiper-slide bg-[#EFFFFF] rounded-xl p-[30px] border-[2.5px] border-[#0075FF] shadow-lg">
                            <div class="info flex items-center relative">
                                <img class="mr-4 size-16 object-cover object-center rounded-full"
                                    src="{{ asset('img/ceo.jpg') }}" alt="">
                                <span class="name text-2xl font-extrabold">
                                    Pedro Alberto.
                                </span>
                                <i
                                    class="fa-solid fa-quote-right text-[#0075FF] text-[45px] absolute z-10 top-0 right-0"></i>
                            </div>
                            <p class="mt-[20px] text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis dignissimos ullam
                                molestias ex dolorum exercitationem incidunt. Aliquam repellat ipsum a non sunt deserunt
                                veniam velit delectus sint, cum, assumenda facilis itaque modi explicabo illum nobis ab
                                sequi voluptatibus reiciendis vero molestias. Quisquam omnis maxime repellat adipisci
                                dolor at voluptatem atque!
                            </p>
                        </div>

                        {{-- Carta de opinion --}}
                        <div
                            class="testimonials__item swiper-slide bg-[#EFFFFF] rounded-xl p-[30px] border-[2.5px] border-[#0075FF]">
                            <div class="info flex items-center relative">
                                <img class="mr-4 size-16 object-cover object-center rounded-full"
                                    src="{{ asset('img/ceo.jpg') }}" alt="">
                                <span class="name text-2xl font-extrabold">
                                    Pedro Alberto.
                                </span>
                                <i
                                    class="fa-solid fa-quote-right text-[#0075FF] text-[45px] absolute z-10 top-0 right-0"></i>
                            </div>
                            <p class="mt-[20px] text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis dignissimos ullam
                                molestias ex dolorum exercitationem incidunt. Aliquam repellat ipsum a non sunt deserunt
                                veniam velit delectus sint, cum, assumenda facilis itaque modi explicabo illum nobis ab
                                sequi voluptatibus reiciendis vero molestias. Quisquam omnis maxime repellat adipisci
                                dolor at voluptatem atque!
                            </p>
                        </div>
                        {{-- Carta de opinion --}}
                        <div
                            class="testimonials__item swiper-slide bg-[#EFFFFF] rounded-xl p-[30px] border-[2.5px] border-[#0075FF]">
                            <div class="info flex items-center relative">
                                <img class="mr-4 size-16 object-cover object-center rounded-full"
                                    src="{{ asset('img/ceo.jpg') }}" alt="">
                                <span class="name text-2xl font-extrabold">
                                    Pedro Alberto.
                                </span>
                                <i
                                    class="fa-solid fa-quote-right text-[#0075FF] text-[45px] absolute z-10 top-0 right-0"></i>
                            </div>
                            <p class="mt-[20px] text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis dignissimos ullam
                                molestias ex dolorum exercitationem incidunt. Aliquam repellat ipsum a non sunt deserunt
                                veniam velit delectus sint, cum, assumenda facilis itaque modi explicabo illum nobis ab
                                sequi voluptatibus reiciendis vero molestias. Quisquam omnis maxime repellat adipisci
                                dolor at voluptatem atque!
                            </p>
                        </div>
                        {{-- Carta de opinion --}}
                        <div
                            class="testimonials__item swiper-slide bg-[#EFFFFF] rounded-xl p-[30px] border-[2.5px] border-[#0075FF]">
                            <div class="info flex items-center relative">
                                <img class="mr-4 size-16 object-cover object-center rounded-full"
                                    src="{{ asset('img/ceo.jpg') }}" alt="">
                                <span class="name text-2xl font-extrabold">
                                    Pedro Alberto.
                                </span>
                                <i
                                    class="fa-solid fa-quote-right text-[#0075FF] text-[45px] absolute z-10 top-0 right-0"></i>
                            </div>
                            <p class="mt-[20px] text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis dignissimos ullam
                                molestias ex dolorum exercitationem incidunt. Aliquam repellat ipsum a non sunt deserunt
                                veniam velit delectus sint, cum, assumenda facilis itaque modi explicabo illum nobis ab
                                sequi voluptatibus reiciendis vero molestias. Quisquam omnis maxime repellat adipisci
                                dolor at voluptatem atque!
                            </p>
                        </div>
                    </div>

                    {{-- Paginacion --}}
                    <div class="swiper-pagination js-testimonials-pagination"></div>
                </div>


            </div>

        </x-container>
    </section>

    {{-- Contacto --}}
    <section>
        <x-container class="px-4 py-20">
            {{-- Titulo --}}
            <div class="mb-10 px-4 text-center sm:px-15 lg:px-20">
                <div>
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        Comunícate con nosotros. Estamos a tu servicio.
                    </p>
                </div>
                <div>
                    <p class="text-base sm:text-lg lg:text-xl mt-4 text-[#0075FF] font-bold">
                        Solicita una cita o envía una consulta. Nos contactaremos contigo lo más antes posible.
                    </p>
                </div>
            </div>
            {{-- Cuadro de contacto --}}
            <div class="flex items-center flex-wrap-reverse">
                
                <div class="w-full h-full lg:w-1/2">
                    {{-- Formulario --}}
                    <div class="bg-[#F1FDFF] rounded-xl px-6 py-6 sm:px-8 sm:py-8 w-full border-[2px] border-[#00CAF7] space-y-5">

                        <div class="flex flex-col space-y-5 md:flex-row md:space-y-0 md:space-x-4 lg:flex-col lg:space-y-5 lg:space-x-0">
                            <div class="flex-1">
                                <x-label class="mb-1 text-[15px] font-black">
                                    Nombres:
                                </x-label>
                                <x-input class="w-full" placeholder="Ingrese sus nombres" name="name"
                                    value="{{ old('name') }}" />
                                <x-input-error for="name" />
                            </div>
                            <div class="flex-1">
                                <x-label class="mb-1 text-[15px] font-black">
                                    Apellidos:
                                </x-label>
                                <x-input class="w-full" placeholder="Ingrese sus apellidos" name="lastname"
                                    value="{{ old('lastname') }}" />
                                <x-input-error for="lastname" />
                            </div>
                            
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Servicio:
                            </x-label>
            
                            <x-select name="service_id" id="" class="w-full">
                                <option value="">
                                    Seleccione un servicio (Opcional)
                                </option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Teléfono o celular:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese su número de contacto" name="lastname"
                                value="{{ old('lastname') }}" />
                            <x-input-error for="lastname" />
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Mensaje:
                            </x-label>
                            <textarea name="message"
                            class="w-full h-40 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Ingresa tu mensaje aquí">{{ old('message') }}</textarea>
                        </div>
                        <div class="flex w-full justify-center">
                            <a href="#" class="text-white text-lg font-medium bg-blue-700 py-2 px-6 rounded-lg">
                                Enviar <i class="fa-solid fa-paper-plane ml-1"></i>
                            </a>
                        </div>
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
                                <span class="font-medium leading-5">Lunes a Viernes: 8:00 am - 6:00 pm<br>Sábados y
                                    Domingos: 8:00 am - 3:00 pm</span>
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
            overflow: hidden;
        }

        .card__article {
            width: 250px;
            overflow: hidden;
        }


        .card__data {
            padding: 1.2rem 1.2rem;
        }

        .card__img {
            height: 260px;
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

        @media screen and(min-width: 1120px) {
            .card__container {}

            .swiper-button-next {
                right: -1rem;
            }

            .swiper-button-prev {
                left: -1rem;
            }
        }


        .professional__card {
            height: calc((100% - 30px) / 2) !important;
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
                    el: '.service-pagination',
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

            let swiperTestimonials = new Swiper('.js-testimonials-slider', {
                // Optional parameters
                loop: true,
                spaceBetween: 30,
                grabCursor: true,
                // If we need pagination
                pagination: {
                    el: '.js-testimonials-pagination',
                    clickable: true,
                },

                breakpoints: {
                    600: {
                        slidesPerView: 1,
                    },
                    968: {
                        slidesPerView: 2,
                    },
                },
            });

            let swiperProfessionals = new Swiper('.js-professionals-slider', {
                // Optional parameters
                spaceBetween: 30,
                grabCursor: true,


                // If we need pagination
                pagination: {
                    el: '.js-professionals-pagination',
                    clickable: true,
                },

                breakpoints: {
                    600: {
                        slidesPerView: 2,
                        grid: {
                            rows: 1,
                            fill: "row",
                        },
                    },
                    968: {
                        slidesPerView: 3,
                        grid: {
                            rows: 2,
                            fill: "row",
                        },
                    },
                },
            });
        </script>
    @endpush

</x-app-layout>
