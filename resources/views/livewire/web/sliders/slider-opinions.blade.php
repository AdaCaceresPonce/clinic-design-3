<div class="testimonials__content">
    <div class="swiper pt-6 pb-14 lg:px-4 js-testimonials-slider" x-init="let swiperTestimonials = new Swiper('.js-testimonials-slider', {
        loop: true,
        spaceBetween: 30,
        grabCursor: true,
        pagination: {
            el: '.js-testimonials-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 8500,
            disableOnInteraction: false
        },
        breakpoints: {
            600: {
                slidesPerView: 1,
            },
            968: {
                slidesPerView: 2,
            },
            1280: {
                slidesPerView: 3,
            },
        },
    });">

        <div class="swiper-wrapper flex items-center">

            {{-- Verificamos si hay opiniones --}}
            @if ($opinions->count())
                @foreach ($opinions as $opinion)
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-xl rounded-2xl p-6 flex flex-col border-2 border-gray-100 hover:border-[#0075FF] transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">

                            {{-- Header: Estrellas y comillas --}}
                            <div class="flex items-start justify-between mb-4">
                                {{-- Estrellas dinámicas --}}
                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $opinion->rating)
                                            {{-- Estrella amarilla --}}
                                            <svg class="w-5 h-5 text-yellow-400" 
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" 
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>

                                        @else
                                            {{-- Estrella gris --}}
                                            <svg class="w-5 h-5 text-gray-300" 
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" 
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="text-sm font-semibold text-gray-700 ml-1">{{ $opinion->rating }}.0</span>
                                </div>

                                {{-- Ícono de comillas --}}
                                <div class="flex-shrink-0">
                                    <svg class="w-8 h-8 text-[#0075FF] opacity-30" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z" />
                                    </svg>
                                </div>
                            </div>

                           {{-- Texto de la opinión --}}
                            <div x-data="{ expanded: false }">
                                @php
                                    // Cortamos a 20 palabras
                                    $words = str_word_count($opinion->opinion, 1);
                                    $shortText = implode(' ', array_slice($words, 0, 20));
                                    $isLong = count($words) > 20;
                                @endphp

                                <p class="text-gray-600 text-[15px] leading-relaxed">
                                    <span x-show="!expanded">
                                        "{{ $shortText }}@if($isLong)...@endif"
                                    </span>
                                    <span x-show="expanded">
                                        "{{ $opinion->opinion }}"
                                    </span>
                                </p>

                                @if ($isLong)
                                    <button 
                                        @click="expanded = !expanded" 
                                        class="text-[#0075FF] text-sm font-semibold mt-2"
                                    >
                                        <span x-show="!expanded">Leer más</span>
                                        <span x-show="expanded">Leer menos</span>
                                    </button>
                                @endif
                            </div>
                            {{-- Separador --}}
                            <div class="border-t border-gray-100 my-3"></div>

                            {{-- Info del usuario --}}
                            <div class="flex items-center gap-3 mt-auto ">
                                <div class="relative flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($opinion->name . ' ' . $opinion->lastname) }}&background=0075FF&color=fff&size=48&bold=true"
                                        alt="{{ $opinion->name }}"
                                        class="w-12 h-12 rounded-full border-2 border-[#0075FF] object-cover shadow-md">
                                    {{-- Badge de verificación
                                    <div
                                        class="absolute -bottom-1 -right-1 bg-green-500 rounded-full p-1 border-2 border-white">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div> --}}
                                </div>

                                {{-- <div class="flex-1 min-w-0">
                                    <h4 class="text-gray-900 font-bold text-sm truncate">
                                        {{ $opinion->name }} {{ $opinion->lastname }}
                                    </h4>
                                    @if ($opinion->service)
                                        <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $opinion->service->name }}
                                        </p>
                                    @else
                                        <p class="text-xs text-gray-500 mt-0.5">Paciente verificado</p>
                                    @endif
                                </div> --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-1">
                                        <h4 class="text-gray-900 font-bold text-sm truncate">
                                            {{ $opinion->name }} {{ $opinion->lastname }}
                                        </h4>
                                        {{-- Badge de verificación --}}
                                        <div class="bg-green-500 rounded-full p-0.5">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>

                                    @if ($opinion->service)
                                        <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $opinion->service->name }}
                                        </p>
                                    @else
                                        <p class="text-xs text-gray-500 mt-0.5">Paciente verificado</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="w-full text-center py-10">
                    <div class="flex flex-col items-center justify-center">
                        <div class="bg-blue-50 rounded-full p-6 mb-4">
                            <svg class="w-16 h-16 text-[#0075FF]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            ¡Sé el primero en opinar!
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Comparte tu experiencia y ayuda a otros pacientes
                        </p>

                    </div>
                </div>
            @endif
        </div>

        {{-- Paginación --}}
        <div class="swiper-pagination js-testimonials-pagination"></div>
    </div>
</div>
