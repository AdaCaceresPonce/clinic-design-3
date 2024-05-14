<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Inicio',
    ],
]">

    <form action="{{ route('admin.welcome_page_content.update', $contents) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px]">

            <div>
                <span class="text-2xl font-bold mr-1">
                    Sección de portada
                </span>
                <a href="{{ route('welcome.index') }}#cover" target="_blank" class="px-2 py-2 text-white bg-[#0075FF] rounded-lg">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </div>

            <div class="mb-4">

                <x-label class="mb-1 mt-2 text-[15px] font-black">
                    Título
                </x-label>

                <textarea class="textarea" id="seccion4" name="cover_title">
                @if (isset($contents['cover_title']))
{{ $contents['cover_title'] }}
@endif
            </textarea>

            </div>

            <div class="mb-4">

                <x-label class="mb-1 text-[15px] font-black">
                    Descripcion
                </x-label>

                <x-input class="w-full" placeholder="Ingrese la descripcion de la portada" name="cover_description"
                    value="{{ old('cover_description', $contents['cover_description']) }}" />
                <x-input-error for="cover_description" />

            </div>

            {{-- Botón actualizar --}}
            <div class="flex justify-end">

                <x-button class="ml-2">
                    Actualizar
                </x-button>

            </div>

        </div>
    </form>

    @push('js')
        <script src="https://cdn.tiny.cloud/1/ptkarmvvxs48norvninijsbe8qx8zwy0ouzu9mp22f5kn99n/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/plugins/language/langs/es.js" referrerpolicy="origin">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                tinymce.init({
                    selector: '.textarea',
                    height: 150,
                    language: 'es',
                    menubar: false,
                    toolbar: 'undo redo | formatselect | ' +
                        'bold | forecolor |' +
                        '| bullist numlist | ' +
                        'removeformat',
                });
            });

            const tabsElement = document.getElementById('tabs-example');

            // create an array of objects with the id, trigger element (eg. button), and the content element
            const tabElements = [{
                    id: 'profile',
                    triggerEl: document.querySelector('#profile-tab-example'),
                    targetEl: document.querySelector('#profile-example'),
                },
                {
                    id: 'dashboard',
                    triggerEl: document.querySelector('#dashboard-tab-example'),
                    targetEl: document.querySelector('#dashboard-example'),
                },
                {
                    id: 'settings',
                    triggerEl: document.querySelector('#settings-tab-example'),
                    targetEl: document.querySelector('#settings-example'),
                },
                {
                    id: 'contacts',
                    triggerEl: document.querySelector('#contacts-tab-example'),
                    targetEl: document.querySelector('#contacts-example'),
                },
            ];

            // options with default values
            const options = {
                defaultTabId: 'settings',
                activeClasses: 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
                inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
                onShow: () => {
                    console.log('tab is shown');
                },
            };

            // instance options with default values
            const instanceOptions = {
                id: 'tabs-example',
                override: true
            };
        </script>
    @endpush
</x-admin-layout>
