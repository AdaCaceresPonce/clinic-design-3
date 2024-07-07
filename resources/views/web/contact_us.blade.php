<x-app-layout>

    {{-- Portada --}}
    <x-page-cover :image="asset('img/contacto.jpg')" :name="'Contacto'" />

    {{-- Contactanos --}}
    <x-contact-section />

    @push('js')
        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Alerta para livewire --}}
        <script>
            Livewire.on('swal', data => {
                Swal.fire(data[0]);
            });
        </script>
    @endpush
    
</x-app-layout>
