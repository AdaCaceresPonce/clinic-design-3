<div wire:poll.5s >

    {{-- Barra de busqueda --}}
    <div class="mb-4">
        <label
            class="mx-auto relative bg-white  flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-md focus-within:border-gray-300"
            for="search-bar">

            <input id="search-bar" placeholder="Buscar opiniones por nombres, apellidos o estado..."
                class="px-4 py-2 w-full rounded-md flex-1 outline-none bg-white"
                wire:model.live.debounce.500ms="search">

            <button wire:click="resetSearch"
                class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">

                <div class="relative">

                    <!-- Loading animation change opacity to display -->
                    <div
                        class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                        <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>

                    <div class="flex items-center transition-all opacity-1 valid:"><span
                            class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                            Limpiar búsqueda
                        </span>
                    </div>

                </div>

            </button>
        </label>
    </div>

    <div>
        @if ($opinions->count())
        
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
                                Situación
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opinions as $opinion)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100 hover:dark:bg-gray-900"
                                wire:key="opinion-{{ $opinion->id }}">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $opinion->id }}
                                </th>
                                <td class="px-6 py-4 items-center align-middle">

                                    <span class="{{ $this->getBgColor($opinion->created_at) }} whitespace-nowrap inline-flex items-center">
                                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                        </svg>
                                        {{ $opinion->created_at->diffForHumans() }}
                                    </span>

                                </td>
                                <td class="px-6 py-4">
                                    {{ $opinion->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $opinion->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($opinion->service)
                                        {{ $opinion->service->name }}
                                    @else
                                        Ninguno
                                    @endif
                                </td>
                                <td class="px-6 py-4">

                                    @php
                                        $state = collect($states)->firstWhere('name', $opinion->state);
                                    @endphp
                                    <span class="{{ $state['style'] ?? '' }}">
                                        {{ $opinion->state }}
                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    @if ($opinion->is_published)
                                        Aprobado
                                    @else
                                        Desaprobado
                                    @endif

                                </td>

                                <td class="px-6 py-4">
                                    <button wire:click="show({{ $opinion->id }})"
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
                {{ $opinions->links() }}
            </div>

            {{-- Ventana modal --}}
            <form wire:submit="update">

                <x-dialog-modal wire:model="open">

                    <x-slot name="title">
                        <div class="flex justify-between items-center">
                            <div>
                                Opinión de: {{ $opinionInfo['name'] }}, {{ $opinionInfo['lastname'] }}
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
                                    {{ $opinionInfo['created_at'] ? $opinionInfo['created_at']->format('d/m/Y') : 'N/A' }}
                                    a las
                                    {{ $opinionInfo['created_at'] ? $opinionInfo['created_at']->format('H:i a') : 'N/A' }}
                                </span>

                                <span class="{{ $this->getBgColor($opinionInfo['created_at']) }} text-sm">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    {{ $opinionInfo['created_at'] ? $opinionInfo['created_at']->diffForHumans() : 'N/A' }}
                                </span>
                            </x-label>
                        </div>
                        <div class="text-left mt-4">
                            <div class="text-base">
                                <div class="space-y-2">
                                    <p><strong>Servicio:</strong> {{ $opinionInfo['service'] }}</p>
                                    <p><strong>Opinion:</strong> {{ $opinionInfo['opinion'] }}</p>
                                    {{-- @dump($opinionInfo) --}}
                                    <div class="flex justify-end">
                                        <label class="inline-flex items-center me-5 cursor-pointer">
                                            <input type="checkbox" value="" wire:model.live='opinionInfo.is_published' class="sr-only peer" checked>
                                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
                                            <span class="ms-3 text-sm font-medium text-gray-900">Aprobar</span>
                                          </label>
                                    </div>
                                </div>

                                <div class="mt-4 pl-3 border-l-4 border-l-teal-500">
                                    <p class="mb-1 mt-2 flex items-center me-3">Cambia el estado de la opinión:</p>
                                    <x-select wire:model="opinionInfo.state" class="p-2 border rounded w-full">
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
