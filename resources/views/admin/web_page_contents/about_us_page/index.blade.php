<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Nosotros',
    ],
]">
    <form action="{{ route('admin.about_us_page_content.update', $contents) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px] space-y-12 divide-y-4 divide-blue-500">

            {{-- Seccion de portada --}}
            <section>
                <div class="mb-1 section__title__container">

                    {{-- Nombre de seccion --}}
                    <span class="text-2xl font-bold mr-1">
                        Sección de portada
                    </span>

                    {{-- Botón de redireccion a la web --}}
                    <a href="{{ route('welcome.index') }}#cover" target="_blank"
                        class="section__button">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>

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
                    <div class="h-full flex flex-col">
                        <div>
                            <x-label class="mb-1 mt-2 text-[15px] font-black">
                                Imagen
                            </x-label>
                        </div>

                        <div class="grow bg-yellow-400">

                        </div>
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
            padding-top: 48px;
        }
        .section__title__container{
            display: flex;
            align-items: center;
        }

        .section__button{
            @apply px-2 py-2 text-white bg-[#0075FF] rounded-lg;
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
                    height: 200,
                    language: 'es',
                    menubar: false,
                    toolbar: 'undo redo | formatselect | ' +
                        'bold | forecolor |' +
                        '| bullist numlist | ' +
                        'removeformat',
                });
            });
        </script>
    @endpush

</x-admin-layout>