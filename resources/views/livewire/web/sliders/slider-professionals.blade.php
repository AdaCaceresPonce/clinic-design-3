<div x-data="{
    modalOpen: false,
    selectedProfessional: null,
    openModal(professional) {
        this.selectedProfessional = professional;
        this.modalOpen = true;
        document.body.style.overflow = 'hidden';
        // Resetear scroll del modal
        this.$nextTick(() => {
            const modalContent = this.$refs.modalContent;
            if (modalContent) modalContent.scrollTop = 0;
        });
    },
    closeModal() {
        this.modalOpen = false;
        document.body.style.overflow = 'auto';
    }
}"
    class="professionals__content w-full max-w-[400px] sm:max-w-[600px] min-[780px]:max-w-[800px] min-[968px]:w-full lg:max-w-[1150px]
        min-[968px]:px-8 mb-5 
        flex justify-center mx-auto align-middle">

    <div class="swiper w-full h-full professionals__slider px-4 min-[968px]:px-4 pt-6 pb-10 js-professionals-slider"
        x-init="let swiperProfessionals = new Swiper('.js-professionals-slider', {
            loop: true,
            spaceBetween: 30,
            grabCursor: true,
            pagination: {
                el: '.js-professionals-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });">
        <div class="swiper-wrapper">
            @foreach ($professionals as $professional)
                <article class="swiper-slide professional__card group">
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl 
                                transition-all duration-500 h-full flex flex-col border-2 border-gray-200 
                                hover:border-[#00CAF7] hover:-translate-y-2">

                        {{-- Contenedor de imagen --}}
                        <div class="relative overflow-hidden aspect-[5/5]">
                            <img src="{{ $professional->photo }}" alt="image"
                                class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10">
                            </div>

                            {{-- Badge certificado --}}
                            <div class="absolute top-3 right-3 z-20">
                                <div
                                    class="bg-white/95 backdrop-blur-md rounded-full px-3 py-1.5 shadow-lg flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-[#0075FF]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-xs font-bold text-gray-700">Certificado</span>
                                </div>
                            </div>

                            {{-- Redes sociales --}}
                            <div
                                class="absolute bottom-4 left-1/2 -translate-x-1/2 z-30
                                            opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0
                                            transition-all duration-500">
                                <div
                                    class="flex items-center gap-2 bg-white/95 backdrop-blur-md rounded-full px-4 py-2.5 shadow-xl">
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
                                                      hover:scale-110 text-white transition-all duration-300">
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
                        <div
                            class="px-6 py-6 flex-1 grow flex flex-col gap-4 bg-gradient-to-b from-white to-gray-50/30">
                            <h3 class="font-bold text-lg text-gray-900 line-clamp-2 leading-tight">
                                {{ $professional->name }} {{ $professional->lastname }}
                            </h3>

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

                            <div>
                                <button
                                    @click="openModal({
                                    name: '{{ $professional->name }}',
                                    lastname: '{{ $professional->lastname }}',
                                    photo: '{{ $professional->photo }}',
                                    description: `{!! addslashes($professional->description ?? 'Sin descripción disponible') !!}`,
                                    facebook: '{{ $professional->facebook_link }}',
                                    instagram: '{{ $professional->instagram_link }}',
                                    linkedin: '{{ $professional->linkedin_link }}',
                                    twitter: '{{ $professional->twitter_link }}',
                                    specialties: {{ json_encode($professional->specialties->pluck('name')) }}
                                })"
                                    class="w-full group/btn flex items-center justify-center gap-2 
                                               bg-[#0075FF]
                                               text-white font-semibold text-sm py-3 px-4 rounded-xl
                                               transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">

                                    <span>Ver perfil</span>

                                    <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="swiper-pagination js-professionals-pagination"></div>
    </div>

    {{-- Ventana Modal --}}
    <div x-show="modalOpen" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click.self="closeModal()" @keydown.escape.window="closeModal()"
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">

        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" x-ref="modalContent"
            class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">

            {{-- Header del modal --}}
            <div
                class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between z-10">
                <h2 class="text-2xl font-bold text-gray-900">Perfil Profesional</h2>
                <button @click="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Contenido del modal --}}
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-8 md:gap-6">

                    {{-- Foto --}}
                    <div class="block">
                        <div class="flex-shrink-0 w-full mx-auto max-w-80 md:w-64">
                            <img :src="selectedProfessional?.photo" :alt="selectedProfessional?.name"
                                class="w-full h-full aspect-[4/5] object-cover object-top rounded-xl shadow-lg">
                        </div>
                    </div>

                    {{-- Información --}}
                    <div class="flex-1 space-y-6">

                        {{-- Datos generales --}}
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900"
                                x-text="`${selectedProfessional?.name} ${selectedProfessional?.lastname}`"></h3>

                            {{-- Badge certificado --}}
                            <div class="mt-2 inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 rounded-full">
                                <svg class="w-4 h-4 text-[#0075FF]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold text-[#0075FF]">Profesional Certificado</span>
                            </div>
                        </div>

                        {{-- Especialidades --}}
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 uppercase mb-2">Especialidades</h4>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="specialty in selectedProfessional?.specialties"
                                    :key="specialty">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 
                                                bg-gradient-to-r from-blue-50 to-cyan-50
                                                border border-[#0075FF]/20
                                                rounded-full text-sm font-semibold text-[#0075FF]"
                                        x-text="specialty"></span>
                                </template>
                            </div>
                        </div>

                        {{-- Descripción --}}
                        <div x-show="selectedProfessional?.description">
                            <h4 class="text-sm font-semibold text-gray-500 uppercase mb-2">Sobre el profesional</h4>
                            <p class="text-gray-700 leading-relaxed" x-html="selectedProfessional?.description"></p>
                        </div>

                        {{-- Redes sociales --}}
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 uppercase mb-3">Redes Sociales</h4>
                            <div class="flex gap-3">
                                <a x-show="selectedProfessional?.facebook" :href="selectedProfessional?.facebook"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center rounded-full 
                                          bg-blue-600 hover:bg-blue-700 text-white
                                          transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </a>

                                <a x-show="selectedProfessional?.instagram" :href="selectedProfessional?.instagram"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center rounded-full 
                                          bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500
                                          hover:scale-110 text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>

                                <a x-show="selectedProfessional?.linkedin" :href="selectedProfessional?.linkedin"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center rounded-full 
                                          bg-blue-700 hover:bg-blue-800 text-white
                                          transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>

                                <a x-show="selectedProfessional?.twitter" :href="selectedProfessional?.twitter"
                                    target="_blank" rel="noopener noreferrer"
                                    class="w-10 h-10 flex items-center justify-center rounded-full 
                                          bg-black hover:bg-gray-800 text-white
                                          transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer del modal --}}
            <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-6 py-4 flex justify-end gap-3">
                <button @click="closeModal()"
                    class="px-6 py-2.5 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl
                               hover:bg-gray-50 transition-all duration-300">
                    Cerrar
                </button>
                {{-- <button class="px-6 py-2.5 bg-[#0075FF] text-white font-semibold rounded-xl
                               hover:bg-[#0066DD] transition-all duration-300 hover:shadow-lg">
                    Agendar Cita
                </button> --}}
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
