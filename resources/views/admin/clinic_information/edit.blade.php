<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ajustes',
        'route' => route('admin.clinic_information.index'),
    ],
    [
        'name' => 'Editar información',
    ],
]">

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.clinic_information.index') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"
                    clip-rule="evenodd" />
            </svg>

            Regresar

        </x-wireui-button>
    </x-slot>


    <div class="mx-auto max-w-[1230px]">

        <x-wireui-errors class="mb-3" />

        <form action="{{ route('admin.clinic_information.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-rows-1 gap-6">

                {{-- Logos --}}
                <div class="card">

                    <x-admin.form-section-title class="mb-4">

                        <x-slot name="title">
                            <div class="inline-flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-photo shrink-0 text-sky-500">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 8h.01" />
                                    <path
                                        d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                                <span>
                                    Logos de la Clínica
                                </span>
                            </div>
                        </x-slot>

                    </x-admin.form-section-title>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <div class="text-center p-6 border rounded-lg bg-gray-100">
                            <x-label>
                                Logo del Navbar
                            </x-label>

                            <div class="w-full mx-auto max-w-[300px] mt-2">
                                <label
                                    class="flex w-full items-center justify-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i> Actualizar imagen
                                    <input id="uploadImage1" name="navbar_clinic_logo" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(1);" />
                                </label>

                                <div
                                    class="aspect-[4/3] mt-2 w-full bg-white rounded-lg border border-blue-400 @error('navbar_clinic_logo') border-red-500 @enderror">

                                    <img id="uploadPreview1"
                                        src="{{ Storage::url($clinic_information->navbar_clinic_logo) }}"
                                        alt="Logo del Navbar" class="w-full h-full object-contain object-center">

                                </div>

                                <x-label class="mt-2 text-start">
                                    (Formatos aceptados: JPG, JPEG, PNG, WEBP. / Máx: 1mb)
                                </x-label>

                                <x-input-error class="mt-1" for="navbar_clinic_logo" />

                            </div>

                        </div>

                        <div class="text-center p-6 border rounded-lg bg-gray-100">
                            <x-label>
                                Logo del Footer
                            </x-label>
                            <div class="w-full mx-auto max-w-[300px] mt-2">
                                <label
                                    class="flex w-full items-center justify-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i> Actualizar imagen
                                    <input id="uploadImage2" name="footer_clinic_logo" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>

                                <div
                                    class="aspect-[4/3] mt-2 w-full bg-white rounded-lg border border-blue-400 @error('footer_clinic_logo') border-red-500 @enderror">

                                    <img id="uploadPreview2"
                                        src="{{ Storage::url($clinic_information->footer_clinic_logo) }}"
                                        alt="Logo del Navbar" class="w-full h-full object-contain object-center">

                                </div>

                                <x-label class="mt-2 text-start">
                                    (Formatos aceptados: JPG, JPEG, PNG, WEBP. / Máx: 1mb)
                                </x-label>

                                <x-input-error class="mt-1" for="footer_clinic_logo" />

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contacto y Horarios --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Información de contacto --}}
                    <div class="card">

                        <x-admin.form-section-title class="mb-4">

                            <x-slot name="title">
                                <div class="inline-flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-address-book shrink-0 text-blue-600">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                                        <path d="M10 16h6" />
                                        <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M4 8h3" />
                                        <path d="M4 12h3" />
                                        <path d="M4 16h3" />
                                    </svg>
                                    <span>
                                        Información de Contacto
                                    </span>
                                </div>
                            </x-slot>

                        </x-admin.form-section-title>

                        {{-- Campos --}}
                        <div class="space-y-4">

                            <x-wireui-input label="Teléfono" name="phone"
                                placeholder="Ingrese el teléfono de contacto"
                                value="{{ old('phone', $clinic_information->phone) }}" />

                            <x-wireui-input label="Celular" name="cellphone"
                                placeholder="Ingrese el celular de contacto"
                                value="{{ old('cellphone', $clinic_information->cellphone) }}" />

                            <x-wireui-input label="Correo electrónico" name="email"
                                placeholder="Ingrese el correo de contacto"
                                value="{{ old('email', $clinic_information->email) }}" />

                            <x-wireui-input label="Dirección" name="address" placeholder="Ingrese la dirección"
                                value="{{ old('address', $clinic_information->address) }}" />

                        </div>

                    </div>

                    {{-- Horario de Atención --}}
                    <div class="card flex flex-col">

                        <x-admin.form-section-title class="mb-4">

                            <x-slot name="title">
                                <div class="inline-flex gap-2 items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4 shrink-0 text-green-600">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 12l3 2" />
                                        <path d="M12 7v5" />
                                    </svg>

                                    <span>Horarios de Atención</span>

                                </div>
                            </x-slot>

                        </x-admin.form-section-title>

                        <div class="flex align-middle h-full w-full items-center justify-center px-10">

                            <div class="text-center w-full">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week h-16 w-16 text-green-600 mx-auto">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h16" />
                                    <path d="M7 14h.013" />
                                    <path d="M10.01 14h.005" />
                                    <path d="M13.01 14h.005" />
                                    <path d="M16.015 14h.005" />
                                    <path d="M13.015 17h.005" />
                                    <path d="M7.01 17h.005" />
                                    <path d="M10.01 17h.005" />
                                </svg>

                                <div class="mt-4">
                                    <x-wireui-input label="Horario de atención" name="schedule"
                                        placeholder="Ej:. L-V: 8:00 am - 7:00 pm"
                                        value="{{ old('schedule', $clinic_information->schedule) }}" />
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Redes Sociales --}}
                <div class="card">

                    <x-admin.form-section-title class="mb-4">

                        <x-slot name="title">
                            <div class="inline-flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-share shrink-0">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M8.7 10.7l6.6 -3.4" />
                                    <path d="M8.7 13.3l6.6 3.4" />
                                </svg>
                                <span>
                                    Redes Sociales
                                </span>
                            </div>
                        </x-slot>

                    </x-admin.form-section-title>

                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">

                        {{-- Enlace Facebook --}}
                        <div class="flex items-center p-4 border rounded-md">

                            {{-- Icono --}}
                            <div class="me-3 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook text-blue-500 size-10">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                            </div>

                            <div class="flex-1">

                                <x-wireui-input label="Facebook" name="facebook_link"
                                    placeholder="Ingrese el enlace de Facebook"
                                    value="{{ old('facebook_link', $clinic_information->facebook_link) }}" />

                            </div>
                        </div>

                        {{-- Enlace Twitter --}}
                        <div class="flex items-center p-4 border rounded-md">

                            {{-- Icono --}}
                            <div class="me-3 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x size-10">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                </svg>
                            </div>

                            <div class="flex-1">

                                <x-wireui-input label="Twitter" name="twitter_link"
                                    placeholder="Ingrese el enlace de Twitter"
                                    value="{{ old('twitter_link', $clinic_information->twitter_link) }}" />

                            </div>
                        </div>

                        {{-- Enlace Instagram --}}
                        <div class="flex items-center p-4 border rounded-md">

                            {{-- Icono --}}
                            <div class="me-3 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram size-10 text-pink-600">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    <path d="M16.5 7.5v.01" />
                                </svg>

                            </div>

                            <div class="flex-1">

                                <x-wireui-input label="Instagram" name="instagram_link"
                                    placeholder="Ingrese el enlace de Instagram"
                                    value="{{ old('instagram_link', $clinic_information->instagram_link) }}" />

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Botón actualizar --}}
                <div class="flex justify-end">

                    <x-button class="ml-2">
                        Guardar todos los cambios
                    </x-button>

                </div>

            </div>

        </form>

    </div>
    @push('js')
        <script>
            function previewImage(nb) {
                var reader = new FileReader();
                reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
                reader.onload = function(e) {
                    document.getElementById('uploadPreview' + nb).src = e.target.result;
                };
            }
        </script>
    @endpush

</x-admin-layout>
