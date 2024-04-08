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

    <x-validation-errors class="mb-4" />

    <form action="{{ route('admin.specialties.update', $specialty) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-gray mx-auto max-w-[1230px]">
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
                {{-- Eliminar --}}
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>

        </div>
    </form>

    {{-- Formulario que será enviado al presionar "Eliminar" --}}
    <form id="delete-form" action="{{ route('admin.specialties.destroy', $specialty) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
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
        </script>
    @endpush

</x-admin-layout>
