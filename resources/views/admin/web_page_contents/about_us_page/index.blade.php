<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Nosotros',
    ],
]">

    <x-validation-errors class="mb-4"/>

    <form action="{{ route('admin.about_us_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-gray mx-auto max-w-[1230px] space-y-14">

            {{-- Seccion de portada --}}
            <section>
                
                <x-page-section-title :section_title="'Sección de portada'" :route_name="'about_us.index'" :section_id="'#cover'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <x-input class="w-full" placeholder="Ingrese el título a mostrar en la portada" name="cover_title"
                                value="{{ old('cover_title', $contents['cover_title'] ) }}" />
                            <x-input-error for="cover_title" />
                        </div>
        
                    </div>
                    <div class="h-full">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
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
                                class="object-contain w-full aspect-[3/2] border-[2px] bg-white border-blue-400 rounded-xl"
                                src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="cover_img" />

                    </div>

                </div>

            </section>

            {{-- Sección sobre la Clínica --}}
            <section>
                
                <x-page-section-title :section_title="'Sección sobre la Clínica'" :route_name="'about_us.index'" :section_id="'#cover'" />
                
                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <div class="rounded-lg @error('about_us_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="about_us_title">
                                    @if (isset($contents['about_us_title']))
                                    {{ old('about_us_title', $contents['about_us_title'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="about_us_title" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion
                            </x-label>
                            
                            <div class="rounded-lg @error('about_us_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="about_us_description">
                                    @if (isset($contents['about_us_description']))
                                    {{ old('about_us_description', $contents['about_us_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="about_us_description" />
                                
                        </div>
                    </div>
                    <div class="h-full flex flex-col">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>
                        </div>
                        <figure class="grow relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="about_us_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain h-full aspect-[3/2] border-[2px] bg-white border-blue-400 rounded-xl"
                                src="{{ Storage::url( $contents['about_us_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="about_us_img" />
                        
                    </div>

                </div>
            </section>

            {{-- Sección con contenido libre --}}
            <section>
                
                <x-page-section-title :section_title="'Sección con contenido libre'" :route_name="'about_us.index'" :section_id="'#cover'" />
            
                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título texto 1
                            </x-label>
        
                            <div class="rounded-lg @error('free_title_1') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="free_title_1">
                                    @if (isset($contents['free_title_1']))
                                    {{ old('free_title_1', $contents['free_title_1'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="free_title_1" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion texto 1
                            </x-label>
                            
                            <div class="rounded-lg @error('free_description_1') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="free_description_1">
                                    @if (isset($contents['free_description_1']))
                                    {{ old('free_description_1', $contents['free_description_1'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="free_description_1" />
                                
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título texto 2
                            </x-label>
        
                            <div class="rounded-lg @error('free_title_2') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="free_title_2">
                                    @if (isset($contents['free_title_2']))
                                    {{ old('free_title_2', $contents['free_title_2'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="free_title_2" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion texto 2
                            </x-label>
                            
                            <div class="rounded-lg @error('free_description_2') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="free_description_2">
                                    @if (isset($contents['free_description_2']))
                                    {{ old('free_description_2', $contents['free_description_2'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="free_description_2" />
                                
                        </div>
                    </div>

                </div>

                <div class="mt-4 max-w-[650px] mx-auto">
                    <div>
                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Imagen
                        </x-label>
                    </div>
                    <figure class="relative">
                        <div class="absolute top-4 right-4">
                            <label
                                class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                <i class="fas fa-camera mr-2"></i>
                                Actualizar imagen
                                <input id="uploadImage3" name="free_img" type="file" class="hidden"
                                    accept="image/*" onchange="previewImage(3);" />
                            </label>
                        </div>
                        <img id="uploadPreview3"
                            class="object-contain w-full aspect-[3/2] border-[2px] bg-white border-blue-400 rounded-xl"
                            src="{{ Storage::url( $contents['free_img']) }}" alt="">
                    </figure>

                    <x-input-error class="mt-1" for="free_img" />
                    
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

    <style>
        .section{
            padding-top: 48px;
        }

    </style>

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