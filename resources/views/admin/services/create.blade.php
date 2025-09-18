<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Servicios',
        'route' => route('admin.services.index'),
    ],
    [
        'name' => 'Crear Nuevo',
    ],
]">

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.services.index') }}" blue>

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

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-wireui-card padding="large">

                {{-- Información principal --}}
                <div>
                    <x-admin.form-section-title class="mb-6">

                        <x-slot name="title">
                            Información Principal
                        </x-slot>

                    </x-admin.form-section-title>

                    {{-- Campos --}}
                    <div class="space-y-6">

                        <x-wireui-input label="Nombre" name="name" placeholder="Ingrese el nombre del servicio"
                            value="{{ old('name') }}" />

                        <x-wireui-textarea label="Descripción corta"
                            placeholder="Ingrese una descripción breve del servicio" name="small_description">
                            {{ old('small_description') }}
                        </x-wireui-textarea>

                        <x-wireui-textarea label="Descripción completa"
                            placeholder="Ingrese una descripción detallada del servicio" name="long_description"
                            description="Información completa que aparecerá en la página del servicio">
                            {{ old('long_description') }}
                        </x-wireui-textarea>

                    </div>
                </div>

                <x-admin.form-separator />

                {{-- Imagenes --}}
                <div>
                    <x-admin.form-section-title class="mb-6">

                        <x-slot name="title">
                            Imágenes del Servicio
                        </x-slot>

                    </x-admin.form-section-title>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="col lg:mb-0">
                            <x-label class="text-[15px] font-black">
                                Imagen de Tarjeta
                            </x-label>
                            <x-label class="mb-2">
                                (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                            </x-label>
                            <figure class="relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage1" name="card_img_path" type="file" class="hidden"
                                            accept="image/*" onchange="previewImage(1);" />
                                    </label>
                                </div>
                                <img id="uploadPreview1"
                                    class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl
                            @error('card_img_path') border-red-500 @enderror"
                                    src="{{ asset('img/no-image.jpg') }}" alt="">
                            </figure>
                            {{-- Alerta de validacion --}}
                            <x-input-error class="mt-1" for="card_img_path" />
                        </div>

                        <div class="col">
                            <x-label class="text-[15px] font-black">
                                Imagen de Portada
                            </x-label>
                            <x-label class="mb-2">
                                (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                            </x-label>
                            <figure class="relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage2" name="cover_img_path" type="file" class="hidden"
                                            accept="image/*" onchange="previewImage(2);" />
                                    </label>
                                </div>
                                <img id="uploadPreview2"
                                    class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl
                            @error('cover_img_path') border-red-500 @enderror"
                                    src="{{ asset('img/no-image.jpg') }}" alt="">
                            </figure>
                            {{-- Alerta de validacion --}}
                            <x-input-error class="mt-1" for="cover_img_path" />
                        </div>
                    </div>
                </div>

                <x-admin.form-separator />

                <div>
                    <x-admin.form-section-title class="mb-6">

                        <x-slot name="title">
                            Información Adicional (Opcional)
                        </x-slot>

                    </x-admin.form-section-title>

                    <div class="">

                        <x-wireui-textarea label="Información adicional del servicio"
                            placeholder="Información extra: contraindicaciones, tiempo de recuperación, etc."
                            name="additional_info"
                            description="Información complementaria que puede ser útil para los pacientes">
                            {{ old('additional_info') }}
                        </x-wireui-textarea>

                    </div>
                </div>


                <x-slot name="footer" class="flex items-center justify-end">
                    <x-button>
                        Crear servicio
                    </x-button>
                </x-slot>


            </x-wireui-card>

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
