<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('admin.users.index'),
    ],
    [
        'name' => 'Crear Nuevo',
    ],
]">

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.users.index') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"
                    clip-rule="evenodd" />
            </svg>


            Regresar

        </x-wireui-button>
    </x-slot>

    <div class="mx-auto max-w-[1230px]">

        <x-wireui-errors class="mb-3" />

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-wireui-card padding="large">

                <x-admin.form-section-title class="mb-6">

                    <x-slot name="title">
                        Nuevo Usuario
                    </x-slot>

                </x-admin.form-section-title>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <x-wireui-input label="Nombre" name="name" placeholder="Ingrese el nombre del usuario"
                        icon="user" value="{{ old('name') }}" />

                    <x-wireui-input label="Correo Electrónico" name="email" type="email"
                        placeholder="Ingrese el correo del usuario" icon="envelope" value="{{ old('email') }}" />

                    <x-wireui-input label="Contraseña" name="password" type="password" icon="key"
                        placeholder="Ingrese la contraseña del usuario" description="8 caracteres mínimo" />

                    <x-wireui-input label="Confirmar contraseña" name="password_confirmation" type="password"
                        icon="key" placeholder="Confirma la contraseña del usuario" description="8 caracteres mínimo" />

                </div>

                <x-slot name="footer" class="flex items-center justify-end">
                    <x-button>
                        Crear usuario
                    </x-button>
                </x-slot>

            </x-wireui-card>
        </form>
    </div>

</x-admin-layout>
