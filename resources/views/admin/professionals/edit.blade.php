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

    <form action="{{ route('admin.professionals.update', $professional) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px]">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                {{-- Foto  --}}
                <div class="col lg:mb-0">
                    <x-label class="mb-1 text-[15px] font-black">
                        Foto del doctor:
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
                            class="object-contain w-full max-h-96 md:max-h-[660.6px] md:min-h-[660.6px] border-[2px] bg-white border-blue-400 rounded-xl
                    @error('photo_path') border-red-500 @enderror"
                            src="{{ Storage::url($professional->photo_path) }}" alt="">
                    </figure>
                    {{-- Alerta de validacion --}}
                    <x-input-error class="mt-1" for="photo_path" />
                </div>

                <div class="col">
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Nombre:
                        </x-label>
                        <x-input class="w-full " placeholder="Ingrese el nombre del profesional" name="name"
                            value="{{ old('name', $professional->name) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Apellidos:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el apellido del profesional" name="lastname"
                            value="{{ old('lastname', $professional->lastname) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Especialidades:
                        </x-label>
                        <select
                            class="w-full select-multiple border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="specialties[]" multiple="multiple">
                            {{-- <option value="" disabled="disabled">Selecciona una o más especialidades</option> --}}
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ (in_array($specialty->id, old('specialties', [])) || $professional->specialties->contains('id', $specialty->id)) ? 'selected' : '' }}>
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
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Ingrese la descripción completa del profesional">{{ old('description', $professional->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Facebook:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Facebook (Opcional)"
                            name="facebook_link" value="{{ old('facebook_link', $professional->facebook_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Linkedin:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Linkedin (Opcional)"
                            name="linkedin_link" value="{{ old('linkedin_link', $professional->linkedin_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Twitter:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                            name="twitter_link" value="{{ old('twitter_link', $professional->twitter_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Instagram:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                            name="instagram_link" value="{{ old('instagram_link', $professional->instagram_link) }}" />
                    </div>

                </div>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Actualizar Datos
                </x-button>
            </div>
        </div>
    </form>

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
