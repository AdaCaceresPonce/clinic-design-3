<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Página Profesionales',
    ],
]">

    @can('our_professionals_page.update')
        <x-slot name="action">
            <x-wireui-button amber href="{{ route('admin.our_professionals_page_content.edit') }}">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path
                        d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                    <path
                        d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                </svg>

                Editar

            </x-wireui-button>
        </x-slot>
    @endcan

    <div class="mx-auto max-w-7xl">

        <div class="space-y-6">

            {{-- Sección Portada --}}
            <x-admin.web_page_contents.page-section-card :section_title="'Portada'" :description="'Primera sección con imagen de fondo'" :route_name="'our_professionals.index'"
                :section_id="'#cover'">

                {{-- Contenido --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Columna de texto --}}
                    <div class="space-y-5">

                        {{-- Titulo --}}
                        <x-admin.web_page_contents.view-field icon="title" label="Título Principal">
                            {!! $contents->cover_title !!}
                        </x-admin.web_page_contents.view-field>

                    </div>

                    {{-- Columna de imagen --}}
                    <div>
                        <x-admin.web_page_contents.view-image label="Imagen de Fondo" :src="$contents->cover_img"
                            size_recommended="1920x1080px" />
                    </div>

                </div>
            </x-admin.web_page_contents.page-section-card>

            {{-- Sección General Sobre los Profesionales --}}
            <x-admin.web_page_contents.page-section-card :section_title="'Nuestros Profesionales'" :description="'Información general acerca de los profesionales'" :route_name="'our_professionals.index'"
                :section_id="'#professionals'">

                {{-- Contenido --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Columna de imagen --}}
                    <div>
                        <x-admin.web_page_contents.view-image label="Imagen" :src="$contents->our_professionals_img"
                            size_recommended="1920x1080px" />
                    </div>

                    {{-- Columna de texto --}}
                    <div class="space-y-5">

                        {{-- Titulo --}}
                        <x-admin.web_page_contents.view-field icon="title" label="Título Principal">
                            {!! $contents->our_professionals_title !!}
                        </x-admin.web_page_contents.view-field>

                        {{-- Descripcion --}}
                        <x-admin.web_page_contents.view-field icon="description" label="Descripción">
                            {!! $contents->our_professionals_description !!}
                        </x-admin.web_page_contents.view-field>

                    </div>

                </div>
            </x-admin.web_page_contents.page-section-card>

            {{-- Sección Listado de Profesionales --}}
            <x-admin.web_page_contents.page-section-card :section_title="'Listado de Profesionales'" :description="'Títulos de la sección donde se listan los Profesionales'" :route_name="'our_professionals.index'"
                :section_id="'#professionals_team'">

                {{-- Contenido --}}
                <div class="space-y-5">

                    {{-- Titulo --}}
                    <x-admin.web_page_contents.view-field icon="title" label="Título Principal">
                        {!! $contents->our_professionals_team_title !!}
                    </x-admin.web_page_contents.view-field>

                    {{-- Descripción --}}
                    <x-admin.web_page_contents.view-field icon="description" label="Descripción">
                        {!! $contents->our_professionals_team_description !!}
                    </x-admin.web_page_contents.view-field>

                </div>

            </x-admin.web_page_contents.page-section-card>
        </div>

    </div>

</x-admin-layout>
