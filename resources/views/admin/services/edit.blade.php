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
        'name' => $service->name,
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

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-gray">

                {{-- Campos --}}
                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Nombre
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre del servicio" name="name"
                        value="{{ old('name', $service->name) }}" />
                    <x-input-error for="name" />
                </div>

                {{-- Imagenes --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    <div class="col lg:mb-0">
                        <x-label class="font-black">
                            Imagen de la tarjeta
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
                                src="{{ Storage::url($service->card_img_path) }}" alt="">
                        </figure>
                        {{-- Alerta de validacion --}}
                        <x-input-error for="card_img_path" />
                    </div>

                    <div class="col">
                        <x-label class="text-[15px] font-black">
                            Imagen de portada
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
                                src="{{ Storage::url($service->cover_img_path) }}" alt="">
                        </figure>
                        {{-- Alerta de validacion --}}
                        <x-input-error for="cover_img_path" />
                    </div>
                </div>



                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Descripción para la tarjeta
                    </x-label>
                    <textarea name="small_description"
                        class="w-full min-h-[100px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Ingrese una descripción muy breve del servicio" name="">{{ old('small_description', $service->small_description) }}</textarea>
                    <x-input-error for="small_description" />

                </div>

                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Descripción del servicio
                    </x-label>
                    <textarea name="long_description"
                        class="w-full min-h-[350px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Ingrese la descripción completa del servicio" name="">{{ old('long_description', $service->long_description) }}</textarea>
                    <x-input-error for="long_description" />

                </div>

                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Información adicional del servicio
                    </x-label>
                    <textarea name="additional_info"
                        class="w-full min-h-[350px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Puedes agregar información adicional del servicio (Opcional)" name="">{{ old('additional_info', $service->additional_info) }}</textarea>
                </div>

                <div class="flex justify-end">
                    {{-- Eliminar --}}
                    <x-danger-button onclick="confirmDelete()">
                        Eliminar
                    </x-danger-button>

                    <x-button class="ml-2">
                        Actualizar
                    </x-button>
                </div>

            </div>
        </form>
    </div>


    {{-- Formulario que será enviado al presionar "Eliminar" --}}
    <form id="delete-form" action="{{ route('admin.services.destroy', $service) }}" method="POST">
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
