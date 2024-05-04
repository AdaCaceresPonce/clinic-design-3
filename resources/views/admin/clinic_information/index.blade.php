<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Información de la Clínica',
    ],
]">


    <x-validation-errors class="mb-4" />

    <form action="{{ route('admin.clinic_information.update', $clinic_information) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mx-auto max-w-[1230px]">

            <div class="card-gray">

                <div class="mb-4 grid cols-1 gap-4">

                    <div>
                        <x-label class="mb-1 text-[15px] font-black">
                            Teléfono:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el teléfono de la clínica" name="phone"
                            value="{{ old('phone', $clinic_information['phone']) }}" />
                        <x-input-error for="name" />
                    </div>

                    <div>
                        <x-label class="mb-1 text-[15px] font-black">
                            Celular:
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el celular de la clínica" name="cellphone"
                            value="{{ old('cellphone', $clinic_information['cellphone']) }}" />
                        <x-input-error for="name" />
                    </div>

                </div>

                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Correo electrónico:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el correo electrónico de la clínica" name="email"
                        value="{{ old('email', $clinic_information['email']) }}" />
                    <x-input-error for="name" />
                </div>


                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Enlace Facebook:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el enlace de la página de Facebook (Opcional)"
                        name="facebook_link" value="{{ old('facebook_link', $clinic_information['facebook_link']) }}" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Enlace Twitter:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                        name="twitter_link" value="{{ old('twitter_link', $clinic_information['twitter_link']) }}" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1 text-[15px] font-black">
                        Enlace Instagram:
                    </x-label>
                    <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                        name="instagram_link" value="{{ old('instagram_link', $clinic_information['instagram_link']) }}" />
                </div>

                <div class="flex justify-end">
                    <x-button>
                        Actualizar información
                    </x-button>
                </div>

            </div>

        </div>
    </form>

</x-admin-layout>
