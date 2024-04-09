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
        'name' => 'Crear Nuevo',
    ],
]">

    <form action="{{ route('admin.professionals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            class="object-contain w-full max-h-48 md:max-h-[365px] md:min-h-[365px] border-[2px] bg-white border-blue-400 rounded-xl
                    @error('photo_path') border-red-500 @enderror"
                            src="{{ asset('img/no-image.jpg') }}" alt="">
                    </figure>
                    {{-- Alerta de validacion --}}
                    <x-input-error class="mt-1" for="photo_path" />
                </div>

                <div class="col">
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Nombre:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del profesional" name="name"
                            value="{{ old('name') }}" />
                        <x-input-error for="name" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Apellidos:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el apellido del profesional" name="lastname"
                            value="{{ old('lastname') }}" />
                        <x-input-error for="lastname" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Especialidades:
                        </x-label>
                        <select class="w-full select-multiple" name="specialties[]" multiple="multiple">
                            <option value="" disabled="disabled">Selecciona una o más especialidades</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="specialties" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Descripción del profesional
                        </x-label>
                        <textarea name="description"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Ingrese la descripción completa del profesional" name="">{{ old('description') }}</textarea>
                        <x-input-error for="description" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Facebook:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Facebook (Opcional)"
                            name="facebook_link" value="{{ old('facebook_link') }}" />
                        <x-input-error for="facebook_link" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Linkedin:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Linkedin (Opcional)"
                            name="linkedin_link" value="{{ old('linkedin_link') }}" />
                        <x-input-error for="linkedin_link" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Twitter:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                            name="twitter_link" value="{{ old('twitter_link') }}" />
                        <x-input-error for="twitter_link" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">
                            Enlace Instagram:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                            name="instagram_link" value="{{ old('instagram_link') }}" />
                        <x-input-error for="instagram_link" />
                    </div>

                </div>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Registrar Profesional
                </x-button>
            </div>
        </div>
    </form>

    @push('js')
        <script>
            $(document).ready(function() {
                $('.select-multiple').select2({
                    placeholder: 'Selecciona una o más especialidades',
                });
            });

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
