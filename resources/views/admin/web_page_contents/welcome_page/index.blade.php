<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Inicio',
    ],
]">

    <x-validation-errors class="mb-4"/>

    <form action="{{ route('admin.welcome_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px] space-y-12 divide-y-[3px]">

            {{-- Seccion de portada --}}
            <section>
                
                <x-page-section-title :section_title="'Sección de Portada'" :route_name="'welcome.index'" :section_id="'#cover'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <div class="rounded-lg @error('cover_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="cover_title">
                                    @if (isset($contents['cover_title']))
                                    {{ old('cover_title', $contents['cover_title'] ) }}
                                    @endif
                                    </textarea>
                            </div>

                            <x-input-error class="mt-1" for="cover_title" />

                        </div>
        
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">
                                Descripcion
                            </x-label>
                            
                            <div class="rounded-lg @error('cover_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="cover_description">
                                    @if (isset($contents['cover_description']))
                                    {{ old('cover_description', $contents['cover_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="cover_description" />
                                
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
                                    <input id="uploadImage1" name="cover_img" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(1);" />
                                </label>
                            </div>
                            <img id="uploadPreview1"
                                class="object-contain h-full aspect-[3/2] border-[2px] bg-white border-blue-400 rounded-xl"
                                src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="cover_img" />
                        
                    </div>

                </div>

            </section>

            {{-- Seccion de Info Clinica --}}
            <section class="section">

                <x-page-section-title :section_title="'Sección de Detalles de la Clínica'" :route_name="'welcome.index'" :section_id="'#clinic_about'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div class="space-y-4">

                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Título
                            </x-label>
        
                            <div class="rounded-lg @error('about_title') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="about_title">
                                    @if (isset($contents['about_title']))
                                    {{ old('about_title', $contents['about_title'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="about_title" />

                        </div>
        
                        <div>
        
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Descripcion
                            </x-label>
        
                            <div class="rounded-lg @error('about_description') border-[2px] border-red-500 @enderror">
                                <textarea class="textarea" name="about_description">
                                    @if (isset($contents['about_description']))
                                    {{ old('about_description', $contents['about_description'] ) }}
                                    @endif
                                    </textarea>
                            </div>
                            
                            <x-input-error class="mt-1" for="about_description" />

            
                        </div>
                    </div>
                    <div class="h-full flex flex-col">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Lista de ofrecemos (Separa cada elemento de la lista usando una coma)
                            </x-label>
    
                            <x-input class="w-full" placeholder="Ingresa los elementos de la lista" name="about_we_offer_you"
                                value="{{ old('about_we_offer_you', $contents['about_we_offer_you']) }}" />
                            
                            <x-input-error class="mt-1" for="about_we_offer_you" />
                            
                        </div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Imagen
                        </x-label>
        
                        <figure class="grow relative">
                            <div class="absolute top-4 right-4">
                                <label
                                    class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                    <i class="fas fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input id="uploadImage2" name="about_image" type="file" class="hidden"
                                        accept="image/*" onchange="previewImage(2);" />
                                </label>
                            </div>
                            <img id="uploadPreview2"
                                class="object-contain h-full aspect-[3/2] border-[2px] bg-white border-blue-400 rounded-xl"
                                src="{{ Storage::url( $contents['about_image']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="about_image" />

                    </div>

                </div>
            </section>
            
            {{-- Seccion de Servicios --}}
            <section class="section">
                <x-page-section-title :section_title="'Sección de Servicios'" :route_name="'welcome.index'" :section_id="'#services'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
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

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
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
            </section>

            {{-- Seccion de Profesionales --}}
            <section class="section">

                <x-page-section-title :section_title="'Sección de Profesionales'" :route_name="'welcome.index'" :section_id="'#professionals'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <div class="rounded-lg @error('our_professionals_title') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="our_professionals_title">
                            @if (isset($contents['our_professionals_title']))
                            {{ old('our_professionals_title', $contents['our_professionals_title'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="our_professionals_title" />

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <div class="rounded-lg @error('our_professionals_description') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="our_professionals_description">
                            @if (isset($contents['our_professionals_description']))
                            {{ old('our_professionals_description', $contents['our_professionals_description'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="our_professionals_description" />

                    </div>

                </div>
            </section>

            {{-- Seccion de Opiniones --}}
            <section class="section">

                <x-page-section-title :section_title="'Sección de Opiniones'" :route_name="'welcome.index'" :section_id="'#testimonials'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>
    
                        <div class="rounded-lg @error('testimonials_title') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="testimonials_title">
                            @if (isset($contents['testimonials_title']))
                            {{ old('testimonials_title', $contents['testimonials_title'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="testimonials_title" />

                    </div>

                    <div>

                        <x-label class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>
    
                        <div class="rounded-lg @error('testimonials_description') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="testimonials_description">
                            @if (isset($contents['testimonials_description']))
                            {{ old('testimonials_description', $contents['testimonials_description'] ) }}
                            @endif
                            </textarea>
                        </div>
                        
                        <x-input-error class="mt-1" for="testimonials_description" />

                    </div>

                </div>

            </section>


            {{-- Botón actualizar --}}
            <div class="flex pt-6 justify-end">

                <x-button class="ml-2">
                    Guardar todos los cambios
                </x-button>

            </div>
        </div>
    </form>

    <style>
        .section{
            padding-top: 34px;
        }
    </style>

    @push('js')
        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/ptkarmvvxs48norvninijsbe8qx8zwy0ouzu9mp22f5kn99n/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/plugins/language/langs/es.js" referrerpolicy="origin">
        </script>
        <script>

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
