@props(['service_selected' => ''])

<section id="contact" class="py-16 bg-white">
    <x-container class="px-4">
        {{-- Título --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                {!! $contact_section['contact_us_title'] ?? 'Título de contacto no configurado' !!}
            </h2>
            <p class="text-base sm:text-lg lg:text-xl text-gray-700 font-medium">
                {!! $contact_section['contact_us_description'] ?? 'Descripción de contacto no configurada' !!}
            </p>
        </div>
        {{-- Formulario --}}
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Dirección --}}
            <div class="bg-white shadow-[0_4px_6px_#C8F8FF] rounded-xl shadow-md p-6 text-center flex flex-col items-center hover:shadow-lg transition">
                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-teal-400 mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4.5 8-12a8 8 0 10-16 0c0 7.5 8 12 8 12z" />
                    </svg>
                </div>
                <p class="text-gray-700 text-sm md:text-base font-medium text-center">
                    {{ $clinic_information['address'] ?? 'Dirección no disponible' }}
                </p>
            </div>

            {{-- Teléfono --}}
            <div class="bg-gradient-to-r from-blue-600 to-teal-500 rounded-xl shadow-md p-6 text-center flex flex-col items-center text-white hover:shadow-lg transition">
                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-blue-600 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.516 4.547a1 1 0 01-.272 1.026l-2.2 2.2a11.04 11.04 0 005.198 5.198l2.2-2.2a1 1 0 011.026-.272l4.547 1.516a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <p class="font-semibold text-sm md:text-base">
                    {{ data_get($clinic_information, 'cellphone', '') }}
                    {{ data_get($clinic_information, 'cellphone') && data_get($clinic_information, 'phone') ? ' - ' : '' }}
                    {{ data_get($clinic_information, 'phone', '') }}
                </p>
            </div>

            {{-- Email --}}
            <div class="bg-white rounded-xl shadow-md p-6 text-center flex flex-col items-center hover:shadow-lg shadow-[0_4px_6px_#C8F8FF] transition">
                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-teal-400 mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-gray-700 text-sm md:text-base font-medium break-all text-center max-w-[200px] sm:max-w-[250px]">
                    {{ $clinic_information['email'] ?? 'Correo no disponible' }}
                </p>
            </div>

            {{-- Horarios --}}
            <div class="bg-gradient-to-r from-blue-600 to-teal-500 rounded-xl shadow-md p-6 text-center flex flex-col items-center text-white hover:shadow-lg transition">
                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-blue-600 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="font-semibold text-sm md:text-base">
                    {{ $clinic_information['schedule'] ?? 'Horario no disponible' }}
                </p>
            </div>
        </div>
               
        <div class="order-last lg:order-first  rounded-2xl  ">
            @livewire('web.inquiries.save-inquiry', compact('service_selected'))
        </div>
        

        {{-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-10"> --}}
            
            {{-- Información de contacto --}}
            {{-- <div class="flex flex-col space-y-5"> --}}
                {{-- Tarjetas de información --}}
                {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4"> --}}
                    {{-- Teléfono --}}
                    {{-- <div class="flex items-center gap-3 bg-white rounded-xl border border-[#00CAF7] shadow-[0_4px_15px_#C8F8FF] p-4 transition hover:shadow-[0_6px_25px_#C8F8FF]">
                        <div class="rounded-full bg-[#0075FF] w-12 h-12 flex items-center justify-center text-white">
                            <i class="fa-solid fa-phone text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Números de contacto</p>
                            <p class="text-sm text-gray-600">
                                {{ data_get($clinic_information, 'cellphone', '') }}
                                {{ data_get($clinic_information, 'cellphone') && data_get($clinic_information, 'phone') ? ' - ' : '' }}
                                {{ data_get($clinic_information, 'phone', '') }}
                            </p>
                        </div>
                    </div> --}}

                    {{-- Horarios --}}
                    {{-- <div class="flex items-center gap-3 bg-white rounded-xl border border-[#00CAF7] shadow-[0_4px_15px_#C8F8FF] p-4 transition hover:shadow-[0_6px_25px_#C8F8FF]">
                        <div class="rounded-full bg-[#0075FF] w-12 h-12 flex items-center justify-center text-white">
                            <i class="fa-regular fa-clock text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Horarios de atención</p>
                            <p class="text-sm text-gray-600">
                                {{ $clinic_information['schedule'] ?? 'Horario no disponible' }}
                            </p>
                        </div>
                    </div> --}}

                    {{-- Email --}}
                    {{-- <div class="flex items-center gap-3 bg-white rounded-xl border border-[#00CAF7] shadow-[0_4px_15px_#C8F8FF] p-4 transition hover:shadow-[0_6px_25px_#C8F8FF]">
                        <div class="rounded-full bg-[#0075FF] w-12 h-12 flex items-center justify-center text-white">
                            <i class="fa-regular fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Correo electrónico</p>
                            <p class="text-sm text-gray-600">
                                {{ $clinic_information['email'] ?? 'Correo no disponible' }}
                            </p>
                        </div>
                    </div> --}}

                    {{-- Dirección --}}
                    {{-- <div class="flex items-center gap-3 bg-white rounded-xl border border-[#00CAF7] shadow-[0_4px_15px_#C8F8FF] p-4 transition hover:shadow-[0_6px_25px_#C8F8FF]">
                        <div class="rounded-full bg-[#0075FF] w-12 h-12 flex items-center justify-center text-white">
                            <i class="fa-solid fa-map-location-dot text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Dirección</p>
                            <p class="text-sm text-gray-600">
                                {{ $clinic_information['address'] ?? 'Dirección no disponible' }}
                            </p>
                        </div>
                    </div> --}}

                {{-- Imagen --}}
                {{-- <div class="mt-4">
                    <img 
                        class="w-full rounded-2xl border-2 border-[#00CAF7] object-cover aspect-[2/1] shadow-[0_4px_20px_#C8F8FF]" 
                        src="{{ optional($contact_section)['contact_us_img'] 
                                ? Storage::url(optional($contact_section)['contact_us_img']) 
                                : asset('images/default-contact.jpg') }}" 
                        alt="Imagen de contacto">
                </div> --}}
            {{-- </div>
        </div> --}}
    </x-container>
</section> 
