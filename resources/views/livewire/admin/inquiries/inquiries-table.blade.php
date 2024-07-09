<div wire:poll.5s >

    {{-- Barra de busqueda --}}
    <div class="mb-4 w-full flex sm:flex-wrap gap-3">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar consultas por nombres, apellidos o estado..."
            class="p-2 border flex-1 rounded">
        <x-button wire:click="resetSearch">Limpiar búsqueda</x-button>
    </div>

    <div>
        @if ($inquiries->count())
        
            {{-- Tabla que muestra las consultas --}}
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Recibido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombres
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Apellidos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Servicio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inquiries as $inquiry)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100 hover:dark:bg-gray-900"
                                wire:key="inquiry-{{ $inquiry->id }}">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $inquiry->id }}
                                </th>
                                <td class="px-6 py-4 items-center align-middle">

                                    <span class="{{ $this->getBgColor($inquiry->created_at) }} whitespace-nowrap inline-flex items-center">
                                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                        </svg>
                                        {{ $inquiry->created_at->diffForHumans() }}
                                    </span>

                                </td>
                                <td class="px-6 py-4">
                                    {{ $inquiry->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $inquiry->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($inquiry->service)
                                        {{ $inquiry->service->name }}
                                    @else
                                        Ninguno
                                    @endif
                                </td>
                                <td class="px-6 py-4">

                                    @php
                                        $state = collect($states)->firstWhere('name', $inquiry->state);
                                    @endphp
                                    <span class="{{ $state['style'] ?? '' }}">
                                        {{ $inquiry->state }}
                                    </span>

                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click="show({{ $inquiry->id }})"
                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-eye mr-2"></i>Ver
                                    </button>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $inquiries->links() }}
            </div>

            {{-- Ventana modal --}}
            <form wire:submit="update">

                <x-dialog-modal wire:model="open">

                    <x-slot name="title">
                        <div class="flex justify-between items-center">
                            <div>
                                Consulta de: {{ $inquiryInfo['name'] }}, {{ $inquiryInfo['lastname'] }}
                            </div>
                            <div>
                                <x-danger-button onclick="confirmDelete()">
                                    <i class="fa-solid fa-trash-can text-base"></i>
                                </x-danger-button>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <div class="mb-2">
                            <x-label class="mb-1">
                                Recibido el día:
                            </x-label>
                            <x-label class="flex flex-wrap gap-1">
                                <span class="bg-blue-100 text-blue-800 dark:text-[#60f0f5] text-sm font-medium me-1 px-2.5 py-0.5 dark:bg-gray-700 border border-blue-400 dark:border-[#00CAF7] rounded text-wrap">
                                    {{ $inquiryInfo['created_at'] ? $inquiryInfo['created_at']->format('d/m/Y') : 'N/A' }}
                                    a las
                                    {{ $inquiryInfo['created_at'] ? $inquiryInfo['created_at']->format('H:i a') : 'N/A' }}
                                </span>

                                <span class="{{ $this->getBgColor($inquiryInfo['created_at']) }} text-sm">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    {{ $inquiryInfo['created_at'] ? $inquiryInfo['created_at']->diffForHumans() : 'N/A' }}
                                </span>
                            </x-label>
                        </div>
                        <div class="text-left mt-4">
                            <div class="text-base">
                                <div class="space-y-2">
                                    <p><strong>Teléfono de contacto:</strong> {{ $inquiryInfo['contact_number'] }}</p>
                                    <p><strong>Servicio:</strong> {{ $inquiryInfo['service'] }}</p>
                                    <p><strong>Mensaje:</strong> {{ $inquiryInfo['message'] }}</p>
                                </div>

                                <div class="mt-4 pl-3 border-l-4 border-l-teal-500">
                                    <p class="mb-1 mt-2 flex items-center me-3">Cambia el estado de la consulta:</p>
                                    <x-select wire:model="inquiryInfo.state" class="p-2 border rounded w-full">
                                        @foreach ($states as $state)
                                            <option value="{{ $state['name'] }}">{{ $state['name'] }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                        </div>

                    </x-slot>

                    <x-slot name="footer">
                        <div class="flex justify-end">
                            <x-danger-button class="mr-2" wire:click="$set('open', false)">
                                Regresar
                            </x-danger-button>

                            <x-button>
                                Guardar estado
                            </x-button>
                        </div>
                    </x-slot>
                </x-dialog-modal>
            </form>
        @else
            {{-- Alerta que se muestra cuando no hay familias registradas --}}
            <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> No se encontró ninguna consulta en el buzón.
                </div>
            </div>
        @endif
    </div>
</div>

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
                    //Ejecutar funcion destroy
                    Livewire.dispatch('destroy');
                }

            });

        }
    </script>
@endpush
