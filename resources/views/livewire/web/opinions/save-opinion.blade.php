{{-- Sección de Contacto - Opiniones --}}
<form wire:submit="save" id="form" class="max-w-4xl mx-auto bg-white rounded-2xl p-8 shadow-[0_4px_12px_#C8F8FF] border border-[#C8F8FF] space-y-6">
    
    {{-- Título --}}
    {{-- <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800">Déjanos tu Opinión ✨</h2>
        <p class="text-gray-500 mt-1 text-sm">Tu experiencia nos ayuda a mejorar cada día</p>
    </div> --}}

    {{-- Nombres y Apellidos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <x-label class="mb-1 text-[15px] font-semibold text-gray-800">
                Nombres: <span class="text-red-500">*</span>
            </x-label>
            <x-input class="w-full rounded-lg border-gray-300 focus:border-[#00CAF7] focus:ring-[#00CAF7]" placeholder="Ingrese sus nombres" wire:model.live="opinion.name"/>
            <x-input-error for="opinion.name" />
        </div>

        <div>
            <x-label class="mb-1 text-[15px] font-semibold text-gray-800">
                Apellidos: <span class="text-red-500">*</span>
            </x-label>
            <x-input class="w-full rounded-lg border-gray-300 focus:border-[#00CAF7] focus:ring-[#00CAF7]" placeholder="Ingrese sus apellidos" wire:model.live="opinion.lastname"/>
            <x-input-error for="opinion.lastname" />
        </div>
    </div>

    {{-- Servicio --}}
    <div>
        <x-label class="mb-1 text-[15px] font-semibold text-gray-800">Servicio:</x-label>
        <x-select class="w-full rounded-lg border-gray-300 focus:border-[#00CAF7] focus:ring-[#00CAF7]" wire:model.live="opinion.service_id">
            <option value="">Seleccione un servicio (Opcional)</option>
            @foreach ($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </x-select>
        <x-input-error for="opinion.service_id" />
    </div>

    {{-- Valoración con Estrellas --}}
    <div x-data="{ rating: @entangle('opinion.rating').live, hover: 0 }">
        <x-label class="mb-2 text-[15px] font-semibold text-gray-800">
            Valoración: <span class="text-red-500">*</span>
        </x-label>
        <div class="flex items-center space-x-1">
            <template x-for="star in 5" :key="star">
                <button type="button" 
                    @click="rating = star" 
                    @mouseenter="hover = star" 
                    @mouseleave="hover = 0"
                    class="transition-transform duration-200 hover:scale-110 focus:outline-none">
                    <svg class="w-8 h-8 sm:w-9 sm:h-9"
                        :class="star <= (hover || rating) ? 'text-yellow-400 fill-current drop-shadow-md' : 'text-yellow-300 fill-white stroke-yellow-400'"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </button>
            </template>

            <span x-show="rating > 0" x-text="rating" class="ml-2 text-lg font-semibold text-gray-700"></span>
        </div>
        <x-input-error for="opinion.rating" />
    </div>

    {{-- Opinión --}}
    <div>
        <x-label class="mb-1 text-[15px] font-semibold text-gray-800">
            Opinión: <span class="text-red-500">*</span>
        </x-label>
        <textarea 
            class="w-full h-40 rounded-lg border-gray-300 focus:border-[#00CAF7] focus:ring-[#00CAF7] placeholder-gray-400 shadow-sm resize-none" 
            placeholder="Ingresa tu opinión aquí" 
            wire:model.live="opinion.opinion"></textarea>
        <x-input-error for="opinion.opinion" />
    </div>

    {{-- Botón de Enviar --}}
    <div class="flex justify-center pt-2">
        <button type="submit" wire:loading.attr="disabled" wire:target="save"
            class="bg-gradient-to-r from-blue-600 to-teal-500 text-white px-10 py-2.5 rounded-full text-lg font-semibold shadow-md hover:shadow-lg hover:opacity-90 transition-all duration-300 flex items-center">
            <div wire:loading.remove wire:target="save" class="flex items-center">
                Enviar <i class="fa-solid fa-paper-plane ml-2"></i>
            </div>
            <div wire:loading wire:loading.flex wire:target="save" class="flex items-center justify-center">
                Cargando
                <svg aria-hidden="true" class="ml-2 w-5 h-5 animate-spin fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </button>
    </div>
</form>
