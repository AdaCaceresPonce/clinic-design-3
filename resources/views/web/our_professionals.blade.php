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
                <p class="text-3xl sm:text-3xl lg:text-4xl text-[#0075FF] leading-tight lg:leading-tight font-bold">
                    Conoce a nuestro equipo de Profesionales
                </p>
                <p class="text-base sm:text-lg lg:text-xl mt-4">
                    Disponemos de un equipo de profesionales altamente capacitados.
                </p>
            </div>
            {{-- Profesionales --}}
            <div class="px-2 sm:px-16 md:px-8 lg:px-8 space-y-8">
                @foreach ($professionals as $professional)
                    {{-- Carta de profesional --}}
                    <div class="flex flex-wrap bg-[#E0FFFF] border-[1px] border-[#9B9B9B] rounded-lg overflow-hidden shadow-lg">
                        
                        {{-- Foto del profesional --}}
                        <div class="w-full md:w-1/3 border-b-[1px] lg:border-b-[0px] lg:border-r-[1px] border-r-[#9B9B9B] rounded-l-lg">
                            
                            <img class="w-full h-[400px] object-cover object-center" src="{{ $professional->photo }}" alt="">

                        </div>
                        
                        {{-- Informacion del profesional --}}
                        <div class="w-full md:w-2/3 p-8 flex flex-col">
                            {{-- Nombres --}}
                            <p class="text-xl font-bold">
                                {{ $professional->name }} {{ $professional->lastname }}
                            </p>
                            {{-- Especialidades --}}
                            <p class="text-[#0075FF] text-lg font-bold">
                                @foreach ($professional->specialties as $specialty)
                                    {{ $specialty->name }}
                                    @if (!$loop->last)
                                        /
                                    @endif
                                @endforeach
                            </p>
                            {{-- Informacion --}}
                            <p class="mt-4 grow">
                                {{ $professional->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cupiditate doloremque maiores voluptates unde nostrum, in saepe error, perspiciatis odio officiis corrupti expedita! Cumque placeat sequi numquam magnam debitis cupiditate, quidem quibusdam, nemo accusantium deserunt qui dolorum blanditiis rem laboriosam commodi nihil modi pariatur culpa? Optio quas sit possimus nostrum.
                            </p>

                            <div class="text-[#0075FF] text-2xl flex space-x-3 justify-end">
                                @if ($professional->facebook_link)
                                    <a href="{{ $professional->facebook_link }}">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                @endif
                                @if ($professional->linkedin_link)
                                    <a href="{{ $professional->linkedin_link }}">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                @endif
                                @if ($professional->twitter_link)
                                    <a href="{{ $professional->twitter_link }}">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                @endif
                                @if ($professional->instagram_link)
                                    <a href="{{ $professional->instagram_link }}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
                <div class="mt-3">
                    {{ $professionals->links() }}
                </div>
            </div>
        </x-container>
    </section>
</x-app-layout>
