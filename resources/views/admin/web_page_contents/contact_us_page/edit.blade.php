@php
    $page_sections = [
        [
            'name' => 'Sección de Portada',
            'id' => '#cover',
        ],

        [
            'name' => 'Sección de Contacto',
            'id' => '#contact_section',
        ],

        [
            'name' => 'Sección de Opiniones',
            'id' => '#opinions_section',
        ],
    ];
@endphp

<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Contacto',
        'route' => route('admin.contact_us_page_content.index'),
    ],
    [
        'name' => 'Editar contenido',
    ],
]">

    @push('css')
        <!-- Include stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

        <style>
            .text__editor {
                height: 180px;
                font-size: 15.5px;
            }
        </style>
    @endpush

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.contact_us_page_content.index') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"
                    clip-rule="evenodd" />
            </svg>

            Regresar

        </x-wireui-button>
    </x-slot>

    <div class="max-w-[1230px] mx-auto">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        <div class="text-xs md:text-base mb-3 p-4 border border-gray-800 border-l-4">
            {{-- <p class="mb-3">
                Aquí puedes modificar los contenidos que se muestran en la <strong>Página de Inicio</strong>, se recomienda considerar los colores representativos del sitio y cargar las imágenes de acuerdo a lo recomendado. Al final de esta página se encuentra el botón para guardar todos los cambios.
            </p> --}}

            <p class="mb-2">
                Para una rápida navegación estas son las secciones de ésta página:
            </p>

            <ul class="list-disc list-inside">

                @foreach ($page_sections as $section)
                    <li><a class="no-underline hover:underline hover:underline-offset-2 text-blue-800"
                            href="{{ $section['id'] }}">{{ $section['name'] }}</a></li>
                @endforeach

            </ul>
        </div>

        <form action="{{ route('admin.contact_us_page_content.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6"">

                {{-- Sección Portada --}}
                <x-admin.web_page_contents.page-section-card id="cover" :section_title="'Portada'" :description="'Primera sección con imagen de fondo'"
                    :route_name="'contact_us.index'" :section_id="'#cover'">
                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">

                        <div class="space-y-4">

                            <div>
                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Título
                                </x-label>

                                <x-input class="w-full" placeholder="Ingrese el título a mostrar en la portada"
                                    name="cover_title" value="{{ old('cover_title', $contents->cover_title) }}" />
                                <x-input-error for="cover_title" />
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
                                    class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('cover_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url($contents['cover_img']) }}" alt="">
                            </figure>

                            <x-label class="mt-2">
                                (Formatos aceptados: JPG, JPEG, PNG, WEBP. / Máx: 1mb)
                            </x-label>

                            <x-input-error class="mt-1" for="cover_img" />

                        </div>

                    </div>
                </x-admin.web_page_contents.page-section-card>

                {{-- Seccion de Contacto --}}
                <x-admin.web_page_contents.page-section-card id="contact_section" :section_title="'Sección de Contacto'" :description="'Títulos de la sección donde se encuentra el formulario de contacto'"
                    :route_name="'contact_us.index'" :section_id="'#contact'">
                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                        <div class="space-y-4">

                            <div>
                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Título
                                </x-label>

                                <div>
                                    <div class="text__editor" data-textarea="contact_us_title">
                                        {!! old('contact_us_title', $contents->contact_us_title) !!}</div>
                                    <textarea class="hidden" name="contact_us_title" id="contact_us_title">{!! old('contact_us_title', $contents->contact_us_title) !!}</textarea>
                                </div>

                                <x-input-error class="mt-1" for="contact_us_title" />

                            </div>

                            <div>

                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Descripcion
                                </x-label>

                                <div>
                                    <div class="text__editor" data-textarea="contact_us_description">
                                        {!! old('contact_us_description', $contents->contact_us_description) !!}</div>
                                    <textarea class="hidden" name="contact_us_description" id="contact_us_description">{!! old('contact_us_description', $contents->contact_us_description) !!}</textarea>
                                </div>

                                <x-input-error class="mt-1" for="contact_us_description" />


                            </div>
                        </div>
                        <div class="h-full flex flex-col">

                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>

                            <figure class="grow relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage2" name="contact_us_img" type="file"
                                            class="hidden" accept="image/*" onchange="previewImage(2);" />
                                    </label>
                                </div>
                                <img id="uploadPreview2"
                                    class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('contact_us_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url($contents->contact_us_img) }}" alt="">
                            </figure>

                            <x-label class="mt-2">
                                (Formatos aceptados: JPG, JPEG, PNG, WEBP. / Máx: 1mb)
                            </x-label>

                            <x-input-error class="mt-1" for="contact_us_img" />

                        </div>

                    </div>
                </x-admin.web_page_contents.page-section-card>

                {{-- Seccion de Contacto --}}
                <x-admin.web_page_contents.page-section-card id="opinions_section" :section_title="'Sección de Opiniones'" :description="'Títulos de la sección donde se encuentra el formulario de opinión'"
                    :route_name="'contact_us.index'" :section_id="'#opinions_form'">
                    {{-- Columnas --}}
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6">
                        <div class="space-y-4">

                            <div>
                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Título
                                </x-label>

                                <div>
                                    <div class="text__editor" data-textarea="opinions_title">
                                        {!! old('opinions_title', $contents->opinions_title) !!}</div>
                                    <textarea class="hidden" name="opinions_title" id="opinions_title">{!! old('opinions_title', $contents->opinions_title) !!}</textarea>
                                </div>

                                <x-input-error class="mt-1" for="opinions_title" />

                            </div>

                            <div>

                                <x-label class="mb-1 mt-2 text-[15px] font-black">
                                    Descripcion
                                </x-label>

                                <div>
                                    <div class="text__editor" data-textarea="opinions_description">
                                        {!! old('opinions_description', $contents->opinions_description) !!}</div>
                                    <textarea class="hidden" name="opinions_description" id="opinions_description">{!! old('opinions_description', $contents->opinions_description) !!}</textarea>
                                </div>

                                <x-input-error class="mt-1" for="opinions_description" />


                            </div>
                        </div>
                        <div class="h-full flex flex-col">

                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>

                            <figure class="grow relative">
                                <div class="absolute top-4 right-4">
                                    <label
                                        class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                                        <i class="fas fa-camera mr-2"></i>
                                        Actualizar imagen
                                        <input id="uploadImage2" name="opinions_img" type="file"
                                            class="hidden" accept="image/*" onchange="previewImage(2);" />
                                    </label>
                                </div>
                                <img id="uploadPreview2"
                                    class="object-contain w-full h-full aspect-[3/2] border-[2px] bg-white border-blue-400 @error('opinions_img') border-red-500 @enderror rounded-xl"
                                    src="{{ Storage::url($contents->opinions_img) }}" alt="">
                            </figure>

                            <x-label class="mt-2">
                                (Formatos aceptados: JPG, JPEG, PNG, WEBP. / Máx: 1mb)
                            </x-label>

                            <x-input-error class="mt-1" for="opinions_img" />

                        </div>

                    </div>
                </x-admin.web_page_contents.page-section-card>

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
        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            const toolbarOptions = [
                // [{ 'header': [1, 2, 3, 4, 5, false] }],

                ['bold', 'italic', 'underline', 'strike'],

                [{
                    'color': ["#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff",
                        "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff",
                        "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff",
                        "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2",
                        "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466",
                        "#0075ff",
                    ]
                }, {
                    'background': []
                }],

                // [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                // [{ 'indent': '-1'}, { 'indent': '+1' }],

                ['clean']
            ];

            document.querySelectorAll('.text__editor').forEach(editorDiv => {
                const textareaId = editorDiv.dataset.textarea;
                const textarea = document.getElementById(textareaId);

                const quill = new Quill(editorDiv, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                // Inicializamos el contenido con el valor del textarea (en caso de old() o DB)
                // quill.root.innerHTML = textarea.value;

                // Sincronizamos el editor con el textarea oculto
                quill.on('text-change', function() {
                    textarea.value = quill.root.innerHTML;
                });
            });
        </script>

        <script>
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
