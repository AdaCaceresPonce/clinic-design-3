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

        <form action="{{ route('admin.professionals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-gray">

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
                                class="object-cover object-top w-full max-h-48 md:max-h-[660.6px] md:min-h-[660.6px] border-[2px] bg-white border-blue-400 rounded-xl
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
                            <x-input class="w-full " placeholder="Ingrese el nombre del profesional" name="name"
                                value="{{ old('name') }}" />
                        </div>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Apellidos:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese el apellido del profesional" name="lastname"
                                value="{{ old('lastname') }}" />
                        </div>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Especialidades:
                            </x-label>
                            <select
                                class="w-full select-multiple border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="specialties[]" multiple="multiple">
                                <option value="" disabled="disabled">Selecciona una o más especialidades</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}"
                                        {{ in_array($specialty->id, old('specialties', [])) ? 'selected' : '' }}>
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
                                placeholder="Ingrese la descripción completa del profesional">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Enlace Facebook:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Facebook (Opcional)"
                                name="facebook_link" value="{{ old('facebook_link') }}" />
                        </div>
                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Enlace Linkedin:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Linkedin (Opcional)"
                                name="linkedin_link" value="{{ old('linkedin_link') }}" />
                        </div>
                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Enlace Twitter:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                                name="twitter_link" value="{{ old('twitter_link') }}" />
                        </div>
                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">
                                Enlace Instagram:
                            </x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                                name="instagram_link" value="{{ old('instagram_link') }}" />
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
    </div>
    @push('js')
        <script>
            $(document).ready(function() {
                $('.select-multiple').select2({
                    placeholder: 'Selecciona una o más especialidades',
                    width: '100%',
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
