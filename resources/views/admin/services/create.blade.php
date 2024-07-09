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
 
    <x-validation-errors class="mb-4"/>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="card-gray mx-auto max-w-[1230px]">

            {{-- Campos --}}
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">
                    Nombre:
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre del servicio" name="name"
                    value="{{ old('name') }}" />
                <x-input-error for="name" />
            </div>
            
            {{-- Imagenes --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                <div class="col lg:mb-0">
                    <x-label class="text-[15px] font-black">
                        Imagen de la tarjeta:
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
                        Imagen de la portada:
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

            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">
                    Descripción para la tarjeta:
                </x-label>
                <textarea name="small_description"
                    class="w-full min-h-[100px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Ingrese una descripción muy breve del servicio" name="">{{ old('small_description') }}</textarea>
                <x-input-error for="small_description" />

            </div>

            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">
                    Descripción del servicio:
                </x-label>
                <textarea name="long_description"
                    class="w-full min-h-[350px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Ingrese la descripción completa del servicio" name="">{{ old('long_description') }}</textarea>
                <x-input-error for="long_description" />

            </div>

            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">
                    Información adicional del servicio:
                </x-label>
                <textarea name="additional_info"
                    class="w-full min-h-[350px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Puedes agregar información adicional del servicio (Opcional)" name="">{{ old('additional_info') }}</textarea>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear servicio
                </x-button>
            </div>

        </div>
    </form>
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
