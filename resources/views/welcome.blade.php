<x-app-layout title="Inicio">

    <x-slot name="title">
        Inicio
    </x-slot>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush


    {{-- Portada --}}
    <section class="w-full min-h-[calc(100vh-4.44rem)] relative" id="cover">

        {{-- Imagen de fondo --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ Storage::url(optional($contents)['cover_img'] ?? 'images/default.jpg') }}" alt="Clínica Dental"
                class="w-full h-full object-cover">

        </div>

        {{-- Fondo azulado con gradiente --}}
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/40 via-sky-400/30 to-teal-400/30 z-10"></div>
        {{-- <div class="absolute inset-0 bg-gradient-to-r from-teal-400/50 via-sky-400/30 to-blue-600/40 z-10"></div> --}}


        <x-container
            class="px-4 sm:px-8
            min-h-[calc(100dvh-4.44rem)] flex items-center justify-center lg:justify-start relative z-20
            py-16 sm:py-12">

            {{-- Tarjeta de bienvenida --}}
            <div
                class="bg-white/95 max-w-[570px] backdrop-blur-md rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl">

                {{-- Badge superior --}}
                <div
                    class="inline-flex items-center gap-2 bg-blue-50 text-[#0075FF] px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span>Clínica dental de confianza</span>
                </div>

                {{-- Título --}}
                <div class="mb-4">
                    <span class="text-3xl sm:text-4xl lg:text-5xl leading-tight lg:leading-tight">
                        {{-- Prepárate para una <span class="text-[#0075FF]"> grandiosa experiencia dental.</span> --}}
                        {!! $contents['cover_title'] ?? 'Titulo predeterminado' !!}
                    </span>
                </div>

                {{-- Descripción --}}
                <div class="mb-8 sm:mb-10">
                    <span class="text-base leading-relaxed">
                        {!! $contents['cover_description'] ?? 'Titulo de descripcion' !!}
                    </span>
                </div>

                {{-- Botones --}}
                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="{{ route('contact_us.index') }}"
                        class="group inline-flex flex-1 gap-2 items-center justify-center 
                            text-base sm:text-lg font-semibold text-white 
                            px-6 py-4 bg-gradient-to-r from-[#0075FF] to-[#00CAF7] 
                            hover:from-[#0060D9] hover:to-[#0075FF]
                            rounded-xl shadow-lg hover:shadow-xl 
                            transition-all duration-300 hover:-translate-y-0.5">

                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Agenda tu cita</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>

                    </a>

                    <a href="#services"
                        class="inline-flex items-center justify-center gap-2
                            text-base sm:text-lg font-semibold text-[#0075FF]
                            px-6 py-4 bg-white border-2 border-[#0075FF]
                            hover:bg-blue-100/70
                            rounded-xl shadow-lg hover:shadow-xl
                            transition-all duration-300 hover:-translate-y-0.5">

                        <span>Ver servicios</span>

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </a>
                </div>

            </div>
        </x-container>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 z-20">

            <div class="flex items-center text-white animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down w-9 h-9 drop-shadow-md">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 9l6 6l6 -6" />
                </svg>
            </div>

        </div>
    </section>

    {{-- Confianza --}}
    <section id="clinic_about">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">

                <div class="w-full lg:w-1/2">
                    <img class="h-[450px] sm:h-[550px] lg:h-[670px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ isset($contents['about_image']) ? Storage::url($contents['about_image']) : asset('images/default-about.jpg') }}">
                </div>

                <div class="w-full lg:w-1/2 px-4 pb-10 sm:px-20 lg:pl-16 lg:pr-0 lg:pb-0 text-start">

                    <span class="text-3xl sm:text-4xl lg:text-5xl leading-tight lg:leading-tight font-bold">
                        {{-- Una Clínica Dental en la que puedes <span class="text-[#0075FF]">confiar.</span> --}}
                        {!! $contents['about_title'] ?? 'titulo acerca de' !!}
                    </span>

                    <div class="mt-7">
                        <span class="text-base sm:text-lg lg:text-lg">
                            {!! $contents['about_description'] ?? 'descripcion acerca de nosotros' !!}
                        </span>
                    </div>

                    <p class="text-base font-bold sm:text-lg lg:text-xl mt-8">
                        Te ofrecemos:
                    </p>

                    <ul class="mt-4 space-y-3">
                        {{-- Dividir la cadena de texto en un array, con las 'comas' como delimitadores --}}
                        @php
                            $items = explode(',', $contents['about_we_offer_you'] ?? '');
                        @endphp

                        @foreach ($items as $item)
                            <li class="flex items-center">
                                <i class="fa-solid fa-circle-check text-2xl text-[#0075FF] mr-2"></i>
                                <span class="text-base sm:text-lg lg:text-xl font-bold">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9 flex justify-start">
                        <a href="{{ route('about_us.index') }}"
                            class="text-base sm:text-lg font-semibold text-white
                                bg-gradient-to-r from-[#0075FF] to-[#00CAF7] hover:from-[#0060D9] hover:to-[#0075FF]
                                rounded-xl px-6 py-4
                                transition-all duration-300 hover:-translate-y-0.5">
                            Conócenos
                        </a>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    {{-- Servicios --}}
    <section id="services">
        <x-container class="px-4 section__spacing flex-col">
            {{-- Titulo --}}
            <div class="mb-6 pb-4 text-center sm:px-15 lg:px-40">
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['our_services_title'] ?? 'Título de servicios no configurado' !!}

                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['our_services_description'] ?? 'Título de servicios no configurado' !!}
                    </span>
                </div>
            </div>

            {{-- Slider --}}
            <livewire:web.sliders.slider-services lazy />

            {{-- Ver todos los servicios --}}
            <div class="flex w-full justify-center">
                <a href="{{ route('our_services.index') }}"
                    class="text-base sm:text-lg font-semibold text-white
                        bg-gradient-to-r from-[#0075FF] to-[#00CAF7] hover:from-[#0060D9] hover:to-[#0075FF]
                        rounded-xl px-6 py-4
                        transition-all duration-300 hover:-translate-y-0.5">
                    Ver todos los servicios
                </a>
            </div>
        </x-container>
    </section>

    {{-- Profesionales --}}
    <section class=" " id="professionals">
        <x-container class="px-4 section__spacing">
            <div class="">
                {{-- Titulo --}}
                <div class="mb-5 px-2 sm:px-4 text-center sm:px-15 lg:px-40">
                    <div>
                        <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['our_professionals_title'] ?? 'Título de professionales no configurado' !!}
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="text-base sm:text-lg lg:text-xl">
                            {!! $contents['our_professionals_description'] ?? 'Título de professionales no configurado' !!}
                        </span>
                    </div>
                </div>

                {{-- Slider --}}
                <livewire:web.sliders.slider-professionals lazy />


                {{-- Ver todos los profesionales --}}
                <div class="flex w-full justify-center">
                    <a href="{{ route('our_professionals.index') }}"
                        class="text-base sm:text-lg font-semibold text-white
                            bg-gradient-to-r from-[#0075FF] to-[#00CAF7] hover:from-[#0060D9] hover:to-[#0075FF]
                            rounded-xl px-6 py-4
                            transition-all duration-300 hover:-translate-y-0.5">
                        Conoce al equipo completo
                    </a>
                </div>
            </div>

        </x-container>
    </section>

    {{-- Opiniones --}}
    <section id="testimonials">
        <x-container class="px-4 section__spacing">
            {{-- Titulo --}}
            <div class="mb-3 px-4 text-center sm:px-15 lg:px-40">
                <div>
                    <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                        {!! $contents['testimonials_title'] ?? 'Título de testimonios no configurado' !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['testimonials_description'] ?? 'Título de testimonios no configurado' !!}
                    </span>
                </div>
            </div>
            {{-- Slider Opiniones --}}

            <livewire:web.sliders.slider-opinions lazy />


            {{-- Enviar opinion --}}
            <div class="flex w-full justify-center mt-5">
                <a href="{{ route('contact_us.index') }}#opinions_form"
                    class="text-base sm:text-lg font-semibold text-white
                        bg-gradient-to-r from-[#0075FF] to-[#00CAF7] hover:from-[#0060D9] hover:to-[#0075FF]
                        rounded-xl px-6 py-4
                        transition-all duration-300 hover:-translate-y-0.5">
                    Envíanos tu opinión aquí
                </a>
            </div>

        </x-container>
    </section>

    {{-- Contacto --}}
    <x-contact-section />


    @push('js')
        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        {{-- Alerta para livewire --}}
        <script>
            Livewire.on('swal', data => {
                Swal.fire(data[0]);
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        
    @endpush

</x-app-layout>
