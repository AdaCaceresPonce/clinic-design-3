<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Profesionales',
        'route' => route('admin.professionals.index'),
    ],
    [
        'name' => $professional->name,
    ],
]">

    @push('css')
        {{-- Select2 CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        {{-- Select2 JS --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.professionals.index') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"
                    clip-rule="evenodd" />
            </svg>

            Regresar

        </x-wireui-button>
    </x-slot>

    <div class="mx-auto max-w-[1230px]">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        <form action="{{ route('admin.professionals.update', $professional) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col lg:flex-row gap-5">

                {{-- Foto del especialista --}}
                <div class="card-gray w-full self-start lg:w-1/2 xl:w-1/3 lg:sticky top-[72px]">
                    <x-label class="mb-1 text-[15px] font-black">
                        Foto del profesional
                    </x-label>
                    <figure class="relative">
                        <div class="absolute top-4 right-4">
                            <label
                                class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                <i class="fas fa-camera mr-2"></i>
                                Actualizar imagen
                                <input id="uploadImage1" name="photo_path" type="file" class="hidden"
                                    accept="image/*" onchange="previewImage(1);" />
                            </label>
                        </div>
                        <img id="uploadPreview1"
                            class="object-cover object-top size-full aspect-[4/5] bg-white border-[2px] border-blue-400 rounded-xl
                    @error('photo_path') border-red-500 @enderror"
                            src="{{ Storage::url($professional->photo_path) }}" alt="">
                    </figure>
                    {{-- Alerta de validacion --}}
                    <x-input-error class="mt-1" for="photo_path" />
                </div>

                {{-- Datos del doctor --}}
                <div class="card-gray w-full lg:w-1/2 xl:w-2/3">

                    {{-- Nombres --}}
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Nombres
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del profesional" name="name"
                            value="{{ old('name', $professional->name) }}" />
                    </div>

                    {{-- Apellidos --}}
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Apellidos
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el apellido del profesional" name="lastname"
                            value="{{ old('lastname', $professional->lastname) }}" />
                    </div>

                    {{-- Especialidades --}}
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Especialidades
                        </x-label>
                        <select
                            class="w-full select-multiple border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="specialties[]" multiple="multiple">
                            {{-- <option value="" disabled="disabled">Selecciona una o más especialidades</option> --}}
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ in_array($specialty->id, old('specialties', [])) || $professional->specialties->contains('id', $specialty->id) ? 'selected' : '' }}>
                                    {{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Descripción del profesional
                        </x-label>
                        <textarea name="description"
                            class="w-full h-64 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Ingrese la descripción completa del profesional">{{ old('description', $professional->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Facebook
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Facebook (Opcional)"
                            name="facebook_link" value="{{ old('facebook_link', $professional->facebook_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Linkedin
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Linkedin (Opcional)"
                            name="linkedin_link" value="{{ old('linkedin_link', $professional->linkedin_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Twitter
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                            name="twitter_link" value="{{ old('twitter_link', $professional->twitter_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Instagram
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                            name="instagram_link" value="{{ old('instagram_link', $professional->instagram_link) }}" />
                    </div>

                    <div class="flex justify-end">
                        <x-danger-button onclick="confirmDelete()">
                            Eliminar
                        </x-danger-button>
                        <x-button class="ml-2">
                            Actualizar Datos
                        </x-button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    {{-- Formulario que será enviado al presionar "Eliminar" --}}
    <form id="delete-form" action="{{ route('admin.professionals.destroy', $professional) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            //Previsualizar imagen
            function previewImage(nb) {
                var reader = new FileReader();
                reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
                reader.onload = function(e) {
                    document.getElementById('uploadPreview' + nb).src = e.target.result;
                };
            }

            $(document).ready(function() {
                $('.select-multiple').select2({
                    placeholder: 'Selecciona una o más especialidades',
                    width: '100%',
                });
            });

            //Alerta de confirmar eliminar
            function confirmDelete() {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, borralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }

                });

            }
        </script>
    @endpush


</x-admin-layout>
