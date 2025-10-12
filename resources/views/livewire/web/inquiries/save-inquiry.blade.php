{{-- <form wire:submit="save" id="form">
    <div class="bg-[#F1FDFF] h-full rounded-xl px-6 py-6 sm:px-8 sm:py-8 size-full border-[3px] border-[#00CAF7] space-y-5"> --}}

        {{-- Nombres y Apellidos --}}
        {{-- <div class="flex flex-col space-y-5 md:flex-row md:space-y-0 md:space-x-4 lg:flex-col lg:space-y-5 lg:space-x-0"> --}}
            
            {{-- Nombres --}}
            {{-- <div class="flex-1">
                <x-label class="mb-1 text-[15px] font-black">
                    Nombres:
                    <span class="text-red-500">*</span>
                </x-label>
                <x-input class="w-full" placeholder="Ingrese sus nombres" wire:model.live="inquiry.name"/>
                <x-input-error for="inquiry.name" />
            </div>
 --}}
            {{-- Apellidos --}}
            {{-- <div class="flex-1">
                <x-label class="mb-1 text-[15px] font-black">
                    Apellidos:
                    <span class="text-red-500">*</span>
                </x-label>
                <x-input class="w-full" placeholder="Ingrese sus apellidos" wire:model.live="inquiry.lastname" />
                <x-input-error for="inquiry.lastname" />
            </div>

        </div> --}}

        {{-- Servicio --}}
        {{-- <div>
            <x-label class="mb-1 text-[15px] font-black">
                Servicio:
            </x-label>

            <x-select id="" class="w-full" wire:model.live="inquiry.service_id">
                <option value="">
                    Seleccione un servicio (Opcional)
                </option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error for="inquiry.service_id" />
        </div>
 --}}
        {{-- Número de contacto --}}
        {{-- <div>
            <x-label class="mb-1 text-[15px] font-black">
                Teléfono o celular:
                <span class="text-red-500">*</span>
            </x-label>
            <x-input class="w-full" placeholder="Ingrese su número de contacto" wire:model.live="inquiry.contact_number" />
            <x-input-error for="inquiry.contact_number" />
        </div>
 --}}
        {{-- Mensaje de Consulta --}}
        {{-- <div>
            <x-label class="mb-1 text-[15px] font-black">
                Mensaje:
                <span class="text-red-500">*</span>
            </x-label>
            <textarea name="message"
                class="w-full h-60 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Ingresa tu mensaje aquí" wire:model.live="inquiry.message"></textarea>

            <x-input-error for="inquiry.message" />
        </div>
 --}}
        {{-- Botón de enviar --}}
        {{-- <div class="flex w-full justify-center">

            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                class="text-white text-lg font-medium bg-blue-700 py-2 px-6 rounded-lg">

                <div wire:loading.remove wire:target="save">
                    Enviar <i class="fa-solid fa-paper-plane ml-1"></i>
                </div>

                <div wire:loading wire:loading.flex wire:target="save" class="flex items-center justify-center">
                    Cargando 
                    <svg aria-hidden="true" class="ml-2 w-5 h-5 animate-spin fill-slate-500"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>

            </button>
        </div>
    </div>
</form> --}}

<form wire:submit="save" id="form" class="bg-gradient-to-br  py-10 px-6 rounded-2xl  max-w-6xl mx-auto  ">
    <!-- Sección de Tarjetas de Información -->
    {{-- Contenedor de tarjetas de contacto --}}
    <!-- Sección del Formulario -->
    <div class="bg-white rounded-2xl p-8 shadow-md space-y-6 border border-gray-200 shadow-[0_4px_6px_#C8F8FF] ">
      <!-- Nombres y Apellidos -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <x-label class="mb-1 text-[15px] font-semibold">Nombres:<span class="text-red-500">*</span></x-label>
          <x-input class="w-full" placeholder="Ingrese sus nombres" wire:model.live="inquiry.name"/>
          <x-input-error for="inquiry.name" />
        </div>
  
        <div>
          <x-label class="mb-1 text-[15px] font-semibold">Apellidos:<span class="text-red-500">*</span></x-label>
          <x-input class="w-full" placeholder="Ingrese sus apellidos" wire:model.live="inquiry.lastname"/>
          <x-input-error for="inquiry.lastname" />
        </div>
      </div>
  
      <!-- Servicio -->
      <div>
        <x-label class="mb-1 text-[15px] font-semibold">Servicio:</x-label>
        <x-select class="w-full" wire:model.live="inquiry.service_id">
          <option value="">Seleccione un servicio (Opcional)</option>
          @foreach ($services as $service)
          <option value="{{ $service->id }}">{{ $service->name }}</option>
          @endforeach
        </x-select>
        <x-input-error for="inquiry.service_id" />
      </div>
  
      <!-- Número de contacto -->
      <div>
        <x-label class="mb-1 text-[15px] font-semibold">Teléfono o celular:<span class="text-red-500">*</span></x-label>
        <x-input class="w-full" placeholder="Ingrese su número de contacto" wire:model.live="inquiry.contact_number"/>
        <x-input-error for="inquiry.contact_number" />
      </div>
  
      <!-- Mensaje -->
      <div>
        <x-label class="mb-1 text-[15px] font-semibold">Mensaje:<span class="text-red-500">*</span></x-label>
        <textarea name="message" class="w-full h-40 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm placeholder-gray-400" placeholder="Ingresa tu mensaje aquí" wire:model.live="inquiry.message"></textarea>
        <x-input-error for="inquiry.message" />
      </div>
  
      <!-- Botón -->
      <div class="flex justify-center">
        <button type="submit" wire:loading.attr="disabled" wire:target="save"
          class="bg-gradient-to-r from-blue-600 to-teal-500 text-white px-8 py-2 rounded-full text-lg font-medium shadow-md hover:opacity-90 transition">
          <div wire:loading.remove wire:target="save">
            Enviar <i class="fa-solid fa-paper-plane ml-1"></i>
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
    </div>
  </form>
  