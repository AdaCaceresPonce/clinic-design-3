<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Servicios',
    ],
]">

    @push('css')
        <style>
            .service-image {
                border-radius: 5px;
                width: 4.5rem;
                height: 3.5rem;
                object-fit: cover;
                object-position: center;
            }
        </style>
    @endpush



    <x-slot name="action">
        <x-wireui-button href="{{ route('admin.services.create') }}" blue>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd"
                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z"
                    clip-rule="evenodd" />
            </svg>

            Nuevo

        </x-wireui-button>
    </x-slot>

    @livewire('admin.datatables.service-table')

    {{-- <div class="mx-auto max-w-[1230px]">

        <div class="inline-flex w-full justify-center mb-3">
            <a href="{{ route('our_services.index') }}" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-md">Ver página Servicios</a>
        </div>

        <livewire:admin.services.services-list />

    </div> --}}

    @push('js')
        <script>
            //Seleccionar todos los forms que tengan la siguiente clase
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

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
                            form.submit();
                        }

                    });


                });
            });
        </script>
    @endpush

</x-admin-layout>
