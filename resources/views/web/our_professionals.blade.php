<x-app-layout>
    {{-- Portada --}}
    <x-page-cover :image="asset('img/nuestros_profesionales.jpg')" :name="'Nuestros Profesionales'" />

    <section>
        <x-container class="px-4 py-20">
            <div class="flex items-center flex-wrap-reverse">
                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 px-16">
                    <img class="h-[600px] w-full object-cover object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/doctor.jpg') }}" alt="">
                </div>
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        <span class="text-[#0075FF]">Nuestros Profesionales</span>
                    </p>
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
            </div>
        </x-container>
    </section>

    <section>
        <x-container class="px-4 py-20">
            {{-- Titulo --}}
            <div class="mb-10 px-2 text-center sm:px-15 lg:px-20">
                <p class="text-2xl sm:text-3xl lg:text-4xl text-[#0075FF] leading-tight lg:leading-tight font-bold">
                    Conoce a nuestro equipo de Profesionales
                </p>
                <p class="text-base sm:text-lg lg:text-xl mt-4">
                    Disponemos de un equipo de profesionales altamente capacitados.
                </p>
            </div>
            {{-- Profesionales --}}
            <div>
                @foreach ($professionals as $professional)
                    <div>
                        <div>

                        </div>
                        <div>
                            <p>
                                {{ $professional->name }}
                            </p>
                        </div>

                    </div>
                @endforeach

                
            </div>
        </x-container>
    </section>
</x-app-layout>
