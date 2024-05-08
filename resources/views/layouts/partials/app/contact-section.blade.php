<section class="">
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
        <div class="grid grid-cols-1 lg:grid-cols-2">

            <div class="w-full order-last lg:order-first">
                {{-- Formulario --}}
                <div
                    class="bg-[#F1FDFF] rounded-xl px-6 py-6 sm:px-8 sm:py-8 size-full border-[3px] border-[#00CAF7] space-y-5">

                    <div
                        class="flex flex-col space-y-5 md:flex-row md:space-y-0 md:space-x-4 lg:flex-col lg:space-y-5 lg:space-x-0">
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
                            class="w-full h-60 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
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
            <div class="w-full lg:pl-4 mb-4 lg:mb-0">
                {{-- Datos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-3 mb-3">

                    {{-- Telefono --}}
                    <div class="w-full h-[83px] px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-solid fa-phone text-xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Teléfono</span>
                            <span class="font-medium text-sm text-[#535353]">
                                {{ $clinic_information['cellphone'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Horarios --}}
                    <div
                        class="w-full sm:h-[83px] p-[10px] sm:px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-regular fa-clock text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Horarios de atención</span>
                            <span class="font-medium text-xs leading-4 sm:text-sm text-[#535353]">
                                {{ $clinic_information['schedule'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="w-full h-[83px] px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-regular fa-envelope text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Correo electrónico</span>
                            <span class="font-medium text-sm sm:text-base text-[#535353]">
                                {{ $clinic_information['email'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Direccion --}}
                    <div class="w-full h-[83px] px-[17px] bg-[#C8F8FF] rounded-full flex items-center">
                        {{-- Icono --}}
                        <div class="rounded-full bg-[#0075FF] size-[50px] flex items-center justify-center">
                            <i class="fa-solid fa-map-location-dot text-2xl text-white"></i>
                        </div>

                        {{-- Texto --}}
                        <div class="ml-2 sm:ml-3 flex flex-1 flex-col">
                            <span class="font-bold">Dirección</span>
                            <span class="font-medium text-sm sm:text-base text-[#535353]">
                                {{ $clinic_information['address'] }}
                            </span>
                        </div>
                    </div>

                </div>
                {{-- Imagen --}}
                <img class="w-full h-[35vh] sm:h-[380px] md:h-[430px] lg:h-[368px] object-cover object-center border-[3px] border-[#00CAF7] rounded-xl"
                    src="{{ asset('img/nosotros.jpg') }}" alt="">
            </div>
        </div>
    </x-container>
</section>