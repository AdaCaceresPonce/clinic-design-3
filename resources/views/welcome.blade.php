<x-app-layout>

    <x-slot name="title">
        Inicio
    </x-slot>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush


    {{-- Portada --}}
    <section class="w-full  brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative" id="cover"
        style="background-image: url('{{ asset('img/bienvenida.jpg') }}');">

        {{-- Fondo azulado para la imagen --}}
        <div class="bg-blue-700 bg-opacity-20 inset-0 absolute z-10">
        </div>

        <x-container
            class="px-2 sm:px-8 section__spacing 
            h-full flex align-middle items-center justify-center lg:justify-start relative z-20">

            {{-- Tarjeta de bienvenida --}}
            <div
                class="bg-[#EAFBFF] bg-opacity-65 sm:bg-opacity-75 rounded-3xl px-6 py-10 sm:px-11 sm:py-12 max-w-[570px] text-center lg:text-start">

                <span class="text-3xl sm:text-4xl lg:text-5xl leading-tight lg:leading-tight">
                    {{-- Prepárate para una <span class="text-[#0075FF]"> grandiosa experiencia dental.</span> --}}
                    {!! $contents['cover_title'] ?? 'Titulo predeterminado' !!}
                </span>

                <div class="mt-6">
                    <span class="text-base lg:text-lg font-medium">
                        {!! $contents['cover_description'] ?? 'Titulo de descripcion' !!}
                    </span>
                </div>

                <div class="mt-8 sm:mt-12">
                    <a href=" {{ route('contact_us.index') }}" class="text-base inline-flex lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                        Agenda una cita
                    </a>
                </div>

            </div>
        </x-container>
    </section>

    {{-- Confianza --}}
    <section id="clinic_about">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">

                <div class="w-full lg:w-1/2">
                    <img class="h-[450px] sm:h-[550px] lg:h-[670px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/clinica-confianza.jpg') }}" alt="">
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
                            class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
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
                        {!! $contents['our_services_title'] !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['our_services_description'] !!}
                    </span>
                </div>
            </div>

            {{-- Slider --}}
            <livewire:web.sliders.slider-services lazy/>
            
            {{-- Ver todos los servicios --}}
            <div class="flex w-full justify-center">
                <a href="{{ route('our_services.index') }}" class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                    Ver todos los servicios
                </a>
            </div>
        </x-container>
    </section>

    {{-- Profesionales --}}
    <section class="bg-[#DEFFFE] border-y-[3px] border-y-[#00CAF7]" id="professionals">
        <x-container class="px-4 section__spacing">
            <div class="">
                {{-- Titulo --}}
                <div class="mb-5 px-2 sm:px-4 text-center sm:px-15 lg:px-40">
                    <div>
                        <span class="text-3xl sm:text-4xl lg:text-4xl leading-tight lg:leading-tight">
                            {!! $contents['our_professionals_title'] !!}
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="text-base sm:text-lg lg:text-xl">
                            {!! $contents['our_professionals_description'] !!}
                        </span>
                    </div>
                </div>

                {{-- Slider --}}
                <livewire:web.sliders.slider-professionals lazy />

                
                {{-- Ver todos los profesionales --}}
                <div class="flex w-full justify-center">
                    <a href="{{ route('our_professionals.index') }}"
                        class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
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
                        {!! $contents['testimonials_title'] !!}
                    </span>
                </div>
                <div class="mt-3">
                    <span class="text-base sm:text-lg lg:text-xl">
                        {!! $contents['testimonials_description'] !!}
                    </span>
                </div>
            </div>
            {{-- Slider Opiniones --}}

            <livewire:web.sliders.slider-opinions lazy />
            

            {{-- Enviar opinion --}}
            <div class="flex w-full justify-center mt-5">
                <a href="{{ route('contact_us.index') }}#opinions_form"
                    class="text-white text-lg font-medium bg-blue-700 py-3 px-6 rounded-lg">
                    Envíanos tu opinión aquí
                </a>
            </div>

        </x-container>
    </section>

    {{-- Contacto --}}
    <x-contact-section />

    <style>
    
        /* Slider profesionales */
        .professional__card {
            height: calc((100% - 30px) / 2) !important;
        }

        .professional__photo {
            height: 310px;
            margin: 0 auto;
        }
    </style>

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
        <script>
            

            //Swiper Opiniones
            

            //Swiper Profesionales
            
        </script>
    @endpush

</x-app-layout>
