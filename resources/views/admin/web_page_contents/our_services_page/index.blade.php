@php
    $page_sections = [
        [
            'name' => 'Sección de Portada',
            'id' => '#cover',
        ],

        [
            'name' => 'Sección de Servicios',
            'id' => '#services',
        ],

        [
            'name' => 'Sección de Lista de Servicios',
            'id' => '#services_list',
        ],

    ];
@endphp

<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Servicios',
    ],
]">

<div class="max-w-[1230px] mx-auto">

    <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md"/>

    <div class="text-xs md:text-base mb-3 p-4 border border-gray-800 border-l-4">
        {{-- <p class="mb-3">
            Aquí puedes modificar los contenidos que se muestran en la <strong>Página de Inicio</strong>, se recomienda considerar los colores representativos del sitio y cargar las imágenes de acuerdo a lo recomendado. Al final de esta página se encuentra el botón para guardar todos los cambios.
        </p> --}}

        <p class="mb-2">
            Para una rápida navegación estas son las secciones de ésta página:
        </p>

        <ul class="list-disc list-inside">
            
            @foreach ($page_sections as $section)

                <li><a class="no-underline hover:underline hover:underline-offset-2 text-blue-800" href="{{ $section['id'] }}">{{ $section['name'] }}</a></li>

            @endforeach
            
        </ul>
    </div>

    <form action="{{ route('admin.our_services_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-gray space-y-14">

            {{-- Seccion de portada --}}
            <section id="cover">
                
                <x-page-section-title :section_title="'Sección de portada'" :route_name="'our_services.index'" :section_id="'#cover'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label for="cover_title" class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <x-input class="w-full" id="cover_title" placeholder="Ingrese el título a mostrar en la portada" name="cover_title"
                                value="{{ old('cover_title', $contents['cover_title'] ) }}" />
                            <x-input-error for="cover_title" />
                        </div>
        
                    </div>
                    <div class="h-full">
                        <div>
                            <x-label class="mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>
                            <x-label class="mb-1">
                                (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                            </x-label>
                        </div>

                        <figure class="relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage1" name="cover_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(1);" />
                                </label>
                            </div>
                            <img id="uploadPreview1"
                                class="object-contain h-full w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('cover_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="cover_img" />

                    </div>

                </div>

            </section>

            {{-- Sección con texto Sobre Servicios --}}
            <section id="services">
                
                <x-page-section-title :section_title="'Sección sobre Servicios'" :route_name="'our_services.index'" :section_id="'#services'" />
                
                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <div class="rounded-lg @error('our_services_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="our_services_title">
                                    @if (isset($contents['our_services_title']))
                                    {{ old('our_services_title', $contents['our_services_title'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="our_services_title" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion
                            </x-label>
                            
                            <div class="rounded-lg @error('our_services_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="our_services_description">
                                    @if (isset($contents['our_services_description']))
                                    {{ old('our_services_description', $contents['our_services_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="our_services_description" />
                                
                        </div>
                    </div>
                    <div class="h-full flex flex-col">
                        <div>
                            <x-label class="mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>
                            <x-label class="mb-1">
                                (Formatos aceptados: JPG, JPEG, PNG, SVG. / Máx: 1mb)
                            </x-label>
                        </div>
                        <figure class="grow relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="our_services_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('our_services_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['our_services_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="our_services_img" />
                        
                    </div>

                </div>
            </section>

            {{-- Seccion de Lista de Servicios --}}
            <section id="services_list">

                <x-page-section-title :section_title="'Sección de Lista de Servicios'" :route_name="'our_services.index'" :section_id="'#services_list'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <div class="rounded-lg @error('services_we_offer_title') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="services_we_offer_title">
                            @if (isset($contents['services_we_offer_title']))
                            {{ old('services_we_offer_title', $contents['services_we_offer_title'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="services_we_offer_title" />

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <div class="rounded-lg @error('services_we_offer_description') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="services_we_offer_description">
                            @if (isset($contents['services_we_offer_description']))
                            {{ old('services_we_offer_description', $contents['services_we_offer_description'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="services_we_offer_description" />

                    </div>

                </div>

            </section>

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
        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/ptkarmvvxs48norvninijsbe8qx8zwy0ouzu9mp22f5kn99n/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/plugins/language/langs/es.js" referrerpolicy="origin">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                tinymce.init({
                    selector: '.textarea',
                    height: 220,
                    language: 'es',
                    menubar: false,
                    toolbar: 'undo redo | formatselect | ' +
                        'bold | forecolor |' +
                        '| bullist numlist | ' +
                        'removeformat',
                });
            });

            //Previsualizar imagen
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