<x-app-layout>
    
    {{-- Portada --}}
    <section class="w-full brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ Storage::url($service->cover_image_path) }}');">
        <div class="bg-blue-900 bg-opacity-50 inset-0 absolute z-10">
        </div>
        <x-container class="px-4 py-44 lg:py-48 h-full flex align-middle items-center relative z-20">
            <p class="text-white flex-1 text-center text-4xl font-bold tracking-normal">
                {{ $service->name }}
            </p>
        </x-container>
    </section>
    <section class="bg-center py-4">
        <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold text-center">
            <span class="block">Sobre este servicio</span>
            <div class="flex justify-center mt-2">
                <div class="w-8 h-1 bg-blue-500"></div>
            </div>
        </p>
    </section>
    <section>
        <x-container class="px-2 section__spacing">
            {{-- Tarjeta de bienvenida --}}
            <div class="flex items-center flex-wrap-reverse">
                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 md:px-40 lg:px-16">
                    <img class="h-auto sm:h-[420px] sm:w-[250px] lg:h-[350px] lg:w-full object-cover md:object-top object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/clinica-confianza.jpg') }}" alt="">
                </div>
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa cupiditate, laborum officia, ab
                        labore obcaecati error deleniti quo sit mollitia tempore omnis, cumque eos veniam voluptatibus
                        nulla doloribus magni assumenda aspernatur quisquam! In qui aspernatur accusamus laborum aperiam
                        eligendi. Nobis, eos id hic dolorem quis voluptates fuga maiores deserunt ab, officia molestiae
                        adipisci qui dolor autem sequi architecto quam ad a. Molestiae quos nulla ducimus facilis
                        aspernatur.
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sapiente deleniti eius
                        consequuntur nulla quidem quam soluta voluptatibus ratione libero. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Dolores porro rerum, animi quae quis ipsum, eos magni nihil
                        adipisci excepturi vero blanditiis qui temporibus officiis saepe numquam fuga obcaecati beatae.
                        Iure illum, corrupti dolorum at tenetur doloribus assumenda vel modi.
                    </p>
                </div>
        </x-container>
        
    </section>
    {{-- Sección destacada --}}
    <section class="bg-[#d3fffd] py-12 text-blue-700 mb-12">
        <div class="max-w-4xl mx-auto p-6">
            <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold text-center text-blue-700">
                <span class="block">Tu salud bucal es importante para nosotros, no dudes en consultar.</span>
            </p>
            <div class="flex justify-center mt-4">
                <button class="font-bold py-2 px-4 rounded" style="background-color: #3490dc; color: white;">
                    Solicita una cita aquí
                </button>
            </div>
        </div>
    </section>
    
    
    
</x-app-layout>
