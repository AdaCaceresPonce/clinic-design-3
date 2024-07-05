<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'clinic_information',
    ],
    [
        'name' =>  $clinic_information->name,
    ],
]">
<form action="{{ route('admin.clinic_information.update', $clinic_information) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md"/>

    <div class="card-gray mx-auto max-w-[1230px]">
        <!-- Campos del formulario -->
        <x-page-section-title :section_title="'Sección sobre Informacion de la Empresa'" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 m-8">
            <div class="col lg:mb-0">
                
                <x-label class="mb-2 text-[15px] font-black">Imagen del Navbar:</x-label>
                <figure class="relative">
                    <div class="absolute top-4 right-4">
                        <label class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                            <i class="fas fa-camera mr-2"></i> Actualizar imagen 
                            <input id="uploadImage1" name="navbar_clinic_logo" type="file" class="hidden" accept="image/*" onchange="previewImage(1);" />
                        </label>
                    </div>
                    <img id="uploadPreview1" class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl @error('navbar_clinic_logo') border-red-500 @enderror" src="{{ Storage::url($clinic_information->navbar_clinic_logo) }}" alt="">
                </figure>
                <x-input-error for="navbar_clinic_logo" />
            </div>
            <div class="col">
                <x-label class="mb-2 text-[15px] font-black">Imagen del footer:</x-label>
                <figure class="relative">
                    <div class="absolute top-4 right-4">
                        <label class="flex items-center px-2.5 py-1.5 lg:px-4 lg:py-2 rounded-lg btn-blue cursor-pointer text-sm lg:text-base">
                            <i class="fas fa-camera mr-2"></i> Actualizar imagen
                            <input id="uploadImage2" name="footer_clinic_logo" type="file" class="hidden" accept="image/*" onchange="previewImage(2);" />
                        </label>
                    </div>
                    <img id="uploadPreview2" class="object-contain w-full aspect-[4/3] border-[2px] bg-white border-blue-400 rounded-xl @error('footer_clinic_logo') border-red-500 @enderror" src="{{ Storage::url($clinic_information->footer_clinic_logo) }}" alt="">
                </figure>
                <x-input-error for="footer_clinic_logo" />
            </div>
        </div>
        <div>
            <div class="mb-4 grid cols-1 gap-4">
                <div>
                    <x-label class="mb-1 text-[15px] font-black">Teléfono:</x-label>
                    <x-input class="w-full" placeholder="Ingrese el teléfono de la clínica" name="phone" value="{{ old('phone', $clinic_information->phone) }}" />
                    <x-input-error for="phone" />
                </div>
                <div>
                    <x-label class="mb-1 text-[15px] font-black">Celular:</x-label>
                    <x-input class="w-full" placeholder="Ingrese el celular de la clínica" name="cellphone" value="{{ old('cellphone', $clinic_information->cellphone) }}" />
                    <x-input-error for="cellphone" />
                </div>
            </div>
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Horario:</x-label>
                <x-input class="w-full" placeholder="Ingrese el horario de atencion de la clínica" name="schedule" value="{{ old('schedule', $clinic_information->schedule) }}" />
                <x-input-error for="schedule" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Correo electrónico:</x-label>
                <x-input class="w-full" placeholder="Ingrese el correo electrónico de la clínica" name="email" value="{{ old('email', $clinic_information->email) }}" />
                <x-input-error for="email" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Ingrese la direccion de la clinica:</x-label>
                <x-input class="w-full" placeholder="Ingrese el correo electrónico de la clínica" name="address" value="{{ old('address', $clinic_information->address) }}" />
                <x-input-error for="address" />
            </div> 
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Enlace Facebook:</x-label>
                <x-input class="w-full" placeholder="Ingrese el enlace de la página de Facebook (Opcional)" name="facebook_link" value="{{ old('facebook_link', $clinic_information->facebook_link) }}" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Enlace Twitter:</x-label>
                <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)" name="twitter_link" value="{{ old('twitter_link', $clinic_information->twitter_link) }}" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1 text-[15px] font-black">Enlace Instagram:</x-label>
                <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)" name="instagram_link" value="{{ old('instagram_link', $clinic_information->instagram_link) }}" />
            </div>
        </div>
        <div class="flex justify-end m-4">

            <x-button class="ml-2">Actualizar</x-button>
        </div>
    </div>
</form>


@push('js')
<script>
    function previewImage(nb) {
        var reader = new FileReader();
        reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
        reader.onload = function(e) {
            document.getElementById('uploadPreview' + nb).src = e.target.result;
        };
    }

</script>
@endpush
</x-admin-layout>
