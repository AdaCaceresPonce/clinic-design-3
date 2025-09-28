
<section id="opinions_form" class="">
    <x-container class="px-4 section__spacing">
        {{-- Titulo --}}
        <div class="mb-10 px-4 text-center sm:px-15 lg:px-20">
            <div>
                <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                    {!! $opinion_section->opinions_title ?? 'Título por defecto' !!}
                </span>
            </div>
            <div class="mt-4">
                <span class="text-base sm:text-lg lg:text-xl font-bold">
                    {{-- {!! $opinion_section['opinions_description'] !!} --}}
                    {!! $opinion_section->opinions_description ?? 'Descripción por defecto' !!}
                </span>
            </div>
        </div>
        {{-- Cuadro de contacto --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <div class="w-full order-first lg:order-last">
                {{-- Formulario --}}
                @livewire('web.opinions.save-opinion')
            </div>

            {{-- Info de contacto --}}
            <div class="w-full h-full flex flex-col">
                {{-- Imagen --}}
                <img class="w-full size-full aspect-[3/3] object-cover object-center border-[3px] border-[#00CAF7] rounded-xl"
                src="{{ $opinion_section?->opinions_img ? Storage::url($opinion_section->opinions_img) : asset('img/default.jpg') }}" 
                alt="">
            </div>
        </div>
    </x-container>
</section>