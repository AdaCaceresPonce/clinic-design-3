<section id="opinions_form" 
    class="relative bg-[url('https://increnta.com/wp-content/uploads/2019/01/estrategia-de-posicionamiento-de-una-clinica-dental-increnta.jpg')] bg-cover bg-center bg-no-repeat py-16 px-4">

    <!-- Curva SVG superior aplicada al fondo -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-24 md:h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" 
                  fill="#ffffff"></path>
        </svg>
    </div>

    <!-- Capa blanca semitransparente para aclarar el fondo -->
    <div class="absolute inset-0 bg-white/80"></div>

    <!-- Contenido principal -->
    <x-container class="relative px-4 section__spacing z-10">
        {{-- Título --}}
        <div class="mb-10 px-4 text-center sm:px-15 lg:px-20">
            <div>
                <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold text-gray-800 drop-shadow-md">
                    {!! $opinion_section->opinions_title ?? 'Título por defecto' !!}
                </span>
            </div>
            <div class="mt-4">
                <span class="text-base sm:text-lg lg:text-xl font-bold text-gray-700 drop-shadow-sm">
                    {!! $opinion_section->opinions_description ?? 'Descripción por defecto' !!}
                </span>
            </div>
        </div>

        {{-- Cuadro de contacto --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mx-auto">
            <div class="w-full order-first lg:order-last">
                {{-- Formulario --}}
                @livewire('web.opinions.save-opinion')
            </div>

            {{-- Info de contacto --}}
            <div class="w-full h-full flex flex-col relative">
                {{-- Imagen principal (encima del fondo aclarado) --}}
                <img 
                    class="w-full h-full aspect-[3/3] object-cover object-center rounded-xl relative z-10"
                    src="{{ $opinion_section?->opinions_img ? Storage::url($opinion_section->opinions_img) : asset('img/default.jpg') }}" 
                    alt="Imagen de contacto"
                >
            </div>
        </div>
    </x-container>
</section>
