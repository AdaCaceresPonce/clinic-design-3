<x-app-layout>

    {{-- Portada --}}
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'"/>

    {{-- Contactanos --}}
    <x-contact-section :service="$service->id ?? ''" />

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
