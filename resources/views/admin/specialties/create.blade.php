<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Especialidades',
        'route' => route('admin.specialties.index'),
    ],
    [
        'name' => 'Crear Nuevo',
    ],
]">

    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.specialties.index') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm10.25.75a.75.75 0 0 0 0-1.5H6.56l1.22-1.22a.75.75 0 0 0-1.06-1.06l-2.5 2.5a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06L6.56 8.75h4.69Z"
                    clip-rule="evenodd" />
            </svg>


            Regresar

        </x-wireui-button>
    </x-slot>

    <div class="mx-auto max-w-[1230px]">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        <form action="{{ route('admin.specialties.store') }}" method="POST">
            @csrf

            <div class="card-gray">
                {{-- Campos --}}
                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Nombre:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre de la especialidad" name="name"
                        value="{{ old('name') }}" />
                    <x-input-error for="name" />
                </div>

                <div class="flex justify-end">
                    <x-button>
                        Crear especialidad
                    </x-button>
                </div>

            </div>
        </form>
    </div>

</x-admin-layout>
