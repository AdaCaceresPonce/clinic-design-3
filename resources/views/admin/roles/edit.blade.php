<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
        'route' => route('admin.roles.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.roles.index') }}" blue>

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

        <form action="{{ route('admin.roles.update', $role) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-wireui-card padding="large">

                <x-admin.form-section-title class="mb-6">

                    <x-slot name="title">
                        Editar Rol
                    </x-slot>

                </x-admin.form-section-title>

                <div class="mb-6">
                    <x-wireui-input label="Nombre del rol" name="display_name" placeholder="Ejemplo: Admin"
                        value="{{ old('display_name', $role->display_name) }}" />
                </div>

                <div>
                    <p class="text-sm font-semibold mb-4 text-gray-600">
                        Permisos por módulo:
                    </p>

                    <div class="columns-1 md:columns-2 space-y-5 gap-12" style="column-rule: 1px solid #D1D5DB;">

                        @foreach ($permissions->groupBy('module') as $module => $modulePermissions)
                            <div>
                                <p class="font-bold text-sm mb-2">
                                    {{ ucfirst($module) }}
                                </p>
                                <ul class="columns-1 md:columns-2 space-y-1.5 gap-4">
                                    @foreach ($modulePermissions as $permission)
                                        <li class="flex flex-row gap-2">
                                            <label class="flex items-start gap-2">
                                                <x-checkbox class="mt-0.5" name="permissions[]"
                                                    value="{{ $permission->id }}" :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))" />
                                                <span class="text-sm text-gray-700">
                                                    {{ $permission->display_name }}
                                                </span>
                                            </label>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </div>
                </div>

                <x-slot name="footer" class="flex items-center justify-end">
                    <x-button>
                        Actualizar Rol
                    </x-button>
                </x-slot>

            </x-wireui-card>
        </form>

    </div>

</x-admin-layout>
