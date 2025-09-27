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
        'name' => $specialty->name,
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

        <form action="{{ route('admin.specialties.update', $specialty) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-gray">
                {{-- Campos --}}
                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Nombre:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el nombre de la especialidad" name="name"
                        value="{{ old('name', $specialty->name) }}" />
                    <x-input-error for="name" />
                </div>

                <div class="flex justify-end">

                    @can('specialties.delete')
                        {{-- Eliminar --}}
                        <x-danger-button onclick="confirmDelete()">
                            Eliminar
                        </x-danger-button>
                    @endcan

                    <x-button class="ml-2">
                        Actualizar
                    </x-button>
                </div>

            </div>
        </form>

    </div>

    @can('specialties.delete')
        {{-- Formulario que será enviado al presionar "Eliminar" --}}
        <form id="delete-form" action="{{ route('admin.specialties.destroy', $specialty) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    @endcan


    @push('js')
        <script>
            @can('specialties.delete')

                //Alerta de confirmar eliminar
                function confirmDelete() {
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "¡No podrás revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "¡Sí, borralo!",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form').submit();
                        }

                    });

                }
            @endcan
        </script>
    @endpush

</x-admin-layout>
