<div
    class="professionals__content w-full max-w-[400px] sm:w-[543px] min-[780px]:w-[600px] min-[968px]:w-full lg:max-w-[1150px]
        min-[968px]:px-8 mb-5 
        flex justify-center mx-auto align-middle">

    <div class="swiper w-full h-full professionals__slider px-4 min-[968px]:px-4 pt-6 pb-14 js-professionals-slider"
        x-init="let swiperProfessionals = new Swiper('.js-professionals-slider', {
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
                        fill: 'row',
                    },
                },
                968: {
                    slidesPerView: 3,
                    grid: {
                        rows: 2,
                        fill: 'row',
                    },
                },
            },
        });">
        <div class="swiper-wrapper">
            @foreach ($professionals as $professional)
                {{-- Carta --}}
                <article class="swiper-slide professional__card group">

                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl 
                                transition-all duration-500 h-full flex flex-col border-2 border-gray-200 
                                hover:border-[#00CAF7] hover:-translate-y-2">

                        {{-- Contenedor de imagen --}}
                        <div class="relative overflow-hidden aspect-[5/6]">

                            {{-- Foto del Profesional --}}
                            <img src="{{ $professional->photo }}" alt="image"
                                class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">

                            {{-- Overlay con gradiente --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10">
                            </div>

                            {{-- Badge flotante superior derecha --}}
                            <div class="absolute top-3 right-3 z-20">
                                <div
                                    class="bg-white/95 backdrop-blur-md rounded-full px-3 py-1.5 
                                            shadow-lg flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-[#0075FF]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-xs font-bold text-gray-700">Certificado</span>
                                </div>
                            </div>

                            {{-- Redes sociales que aparecen en hover --}}
                            <div
                                class="absolute bottom-4 left-1/2 -translate-x-1/2 z-30
                                            opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0
                                            transition-all duration-500">
                                <div
                                    class="flex items-center gap-2 bg-white/95 backdrop-blur-md 
                                                rounded-full px-4 py-2.5 shadow-xl">
                                    @if ($professional->facebook_link)
                                        <a href="{{ $professional->facebook_link }}" target="_blank"
                                            rel="noopener noreferrer"
                                            class="w-8 h-8 flex items-center justify-center rounded-full 
                                                      bg-blue-600 hover:bg-blue-700 text-white
                                                      transition-all duration-300 hover:scale-110">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($professional->instagram_link)
                                        <a href="{{ $professional->instagram_link }}" target="_blank"
                                            rel="noopener noreferrer"
                                            class="w-8 h-8 flex items-center justify-center rounded-full 
                                                      bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500
                                                      hover:scale-110 text-white
                                                      transition-all duration-300">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($professional->linkedin_link)
                                        <a href="{{ $professional->linkedin_link }}" target="_blank"
                                            rel="noopener noreferrer"
                                            class="w-8 h-8 flex items-center justify-center rounded-full 
                                                      bg-blue-700 hover:bg-blue-800 text-white
                                                      transition-all duration-300 hover:scale-110">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($professional->twitter_link)
                                        <a href="{{ $professional->twitter_link }}" target="_blank"
                                            rel="noopener noreferrer"
                                            class="w-8 h-8 flex items-center justify-center rounded-full 
                                                      bg-black hover:bg-gray-800 text-white
                                                      transition-all duration-300 hover:scale-110">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>

                        {{-- Datos del profesional --}}
                        <div class="px-6 py-6 flex-1 grow flex flex-col bg-gradient-to-b from-white to-gray-50/30">

                            {{-- Nombre --}}
                            <h3 class="font-bold text-lg text-gray-900 mb-4 line-clamp-2 leading-tight">
                                {{ $professional->name }} {{ $professional->lastname }}
                            </h3>

                            {{-- Especialidades como badges --}}
                            <div class="flex flex-wrap gap-2">
                                @foreach ($professional->specialties as $specialty)
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 
                                                bg-gradient-to-r from-blue-50 to-cyan-50
                                                border border-[#0075FF]/20
                                                rounded-full text-sm font-semibold text-[#0075FF]">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $specialty->name }}
                                    </span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Paginacion --}}
        <div class="swiper-pagination js-professionals-pagination"></div>
    </div>


    <style>

        /* .professional__card {
            height: calc((100% - 30px) / 2) !important;
        } */

        /* .professional__card {
            height: calc((100% - 24px) / 2) !important;
        } */

        /* .professional__photo {
            height: 310px;
            margin: 0 auto;
        } */
    </style>

</div>
