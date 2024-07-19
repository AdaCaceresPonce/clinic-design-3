<x-app-layout>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <x-slot name="title">
        Nuestros Profesionales
    </x-slot>

    {{-- Portada --}}
    <x-page-cover :image="Storage::url($contents['cover_img'])" :name="$contents['cover_title']" :id="'cover'" />

    <section id="professionals">
        <x-container class="px-4 section__spacing">
            <div class="flex items-center flex-wrap-reverse">

                {{-- Imagen --}}
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center px-0 md:px-44 lg:px-16">
                    <img class="h-auto sm:h-[510px] sm:w-[350px] lg:h-[600px] lg:w-full object-cover md:object-top object-center border-[4px] border-[#00CAF7] rounded-3xl"
                        src="{{ asset('img/doctor.jpg') }}" alt="">
                </div>

                {{-- Texto --}}
                <div class="w-full lg:w-1/2 px-4">
                    <span class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        {!! $contents['our_professionals_title'] !!}

                    </span>
                    <div class="mt-4">
                        <span>
                            {!! $contents['our_professionals_description'] !!}
                        </span>
                    </div>

                </div>
            </div>
        </x-container>
    </section>

    <section id="professionals_team">
        <x-container class="px-4 section__spacing">
            {{-- Titulo --}}
            <div class="mb-10 px-2 text-center sm:px-15 lg:px-20">
                <span class="text-3xl sm:text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                    {!! $contents['our_professionals_team_title'] !!}
                </span>

                <div class="mt-4">
                    <span class="text-lg sm:text-lg lg:text-xl">
                        {!! $contents['our_professionals_team_description'] !!}
                    </span>
                </div>

            </div>

            {{-- Seccion Profesionales --}}
            <div class="sm:px-8 md:px-0 lg:px-0
                md:w-[684px] lg:w-full mx-auto">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 lg:gap-10">

                    {{-- Listar Profesionales --}}
                    @foreach ($professionals as $professional)
                        {{-- Carta de profesional --}}
                        <div
                            class="flex flex-col lg:flex-row bg-[#E0FFFF] rounded-lg overflow-hidden shadow-lg 
                        border-[1px] border-[#9B9B9B]
                        w-[295px] min-[540px]:w-[340px] sm:w-[450px] md:w-[330px] lg:w-full mx-auto">

                            <div class="aspect-[5/6] lg:w-1/3">
                                <img src="{{ $professional->photo }}"
                                    class="object-cover object-top w-full h-full border-b-[1px] border-b-[#9B9B9B] lg:border-b-0 lg:border-r-[1px] lg:border-r-[#9B9B9B]"
                                    alt="">
                            </div>

                            {{-- Informacion del profesional --}}
                            <div class="p-6 w-full lg:w-2/3 flex grow flex-col">

                                {{-- Nombres --}}
                                <p class="text-xl m-0 p-0 font-bold">
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

                                {{-- Descripcion --}}
                                <p class="mt-4 mb-4 text-sm lg:text-sm xl:text-base text-ellipsis overflow-hidden">
                                    {{ $professional->description }}
                                </p>

                                {{-- Redes sociales --}}
                                <div class="text-[#0075FF] mt-auto text-2xl flex space-x-3 items-center justify-center lg:justify-end">
                                    @if ($professional->facebook_link)
                                        <a href="{{ $professional->facebook_link }}"
                                            class="hover:text-[#0048ff] hover:scale-110">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    @endif
                                    @if ($professional->linkedin_link)
                                        <a href="{{ $professional->linkedin_link }}"
                                            class="hover:text-[#0048ff] hover:scale-110">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    @endif
                                    @if ($professional->twitter_link)
                                        <a href="{{ $professional->twitter_link }}"
                                            class="hover:text-[#0048ff] hover:scale-110">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if ($professional->instagram_link)
                                        <a href="{{ $professional->instagram_link }}"
                                            class="hover:text-[#0048ff] hover:scale-110">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $professionals->links() }}
                </div>
            </div>
        </x-container>
    </section>
</x-app-layout>
