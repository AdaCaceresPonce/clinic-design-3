<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Contacto',
    ],
]">

    <x-validation-errors class="mb-4"/>

    <form action="{{ route('admin.contact_us_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-gray mx-auto max-w-[1230px] space-y-14">

            {{-- Seccion de portada --}}
            <section>
                
                <x-page-section-title :section_title="'Sección de portada'" :route_name="'contact_us.index'" :section_id="'#cover'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 lg:gap-6">
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
                                class="object-contain w-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('cover_img') border-red-500 @enderror rounded-xl"
                                src="{{ Storage::url( $contents['cover_img']) }}" alt="">
                        </figure>

                        <x-input-error class="mt-1" for="cover_img" />

                    </div>

                </div>

            </section>

            {{-- Seccion de Profesionales --}}
            <section class="section">

                <x-page-section-title :section_title="'Sección de Contacto'" :route_name="'contact_us.index'" :section_id="'#contact_section'" />

                {{-- Columnas --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 lg:gap-6">
                    <div>

                        <x-label for="contact_us_title" class="mb-1 mt-2 text-[15px] font-black">
                            Título
                        </x-label>

                        <div class="rounded-lg @error('contact_us_title') border-[2px] border-red-500 @enderror">
                            <textarea id="contact_us_title" class="textarea" name="contact_us_title">
                            @if (isset($contents['contact_us_title']))
                            {{ old('contact_us_title', $contents['contact_us_title'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="contact_us_title" />

                    </div>

                    <div>

                        <x-label for="contact_us_description" class="mb-1 mt-2 text-[15px] font-black">
                            Descripción
                        </x-label>

                        <div id="contact_us_description" class="rounded-lg @error('contact_us_description') border-[2px] border-red-500 @enderror">
                            <textarea class="textarea" name="contact_us_description">
                            @if (isset($contents['contact_us_description']))
                            {{ old('contact_us_description', $contents['contact_us_description'] ) }}
                            @endif
                            </textarea>
                        </div>

                        <x-input-error class="mt-1" for="contact_us_description" />

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