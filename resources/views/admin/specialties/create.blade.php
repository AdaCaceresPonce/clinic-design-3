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

    <x-validation-errors class="mb-4" />

    <form action="{{ route('admin.specialties.store') }}" method="POST">
        @csrf

        <div class="card-gray mx-auto max-w-[1230px]">
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

</x-admin-layout>
