<x-app-layout>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    {{-- Portada --}}
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" />

    {{-- Contactanos --}}
    <x-contact-section service_selected="{{ $service }}" />

    <x-opinion-section />

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
