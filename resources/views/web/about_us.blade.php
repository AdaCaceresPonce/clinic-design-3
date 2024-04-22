<x-app-layout>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    {{-- Portada --}}
    <x-page-cover :image="asset('img/nosotros.jpg')" :name="'Sobre Nosotros'" />

    {{-- Quienes somos --}}
    <section>
        <x-container class="px-4 py-20">
            <div class="flex items-center flex-wrap">
                {{-- Texto --}}
                <div class="w-full lg:w-1/2 p-4 lg:pr-12">
                    <p class="text-3xl lg:text-4xl leading-tight lg:leading-tight font-bold">
                        <span class="text-[#0075FF]">¿Quiénes somos?</span>
                    </p>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa cupiditate, laborum officia, ab labore obcaecati error deleniti quo sit mollitia tempore omnis, cumque eos veniam voluptatibus nulla doloribus magni assumenda aspernatur quisquam! In qui aspernatur accusamus laborum aperiam eligendi. Nobis, eos id hic dolorem quis voluptates fuga maiores deserunt ab, officia molestiae adipisci qui dolor autem sequi architecto quam ad a. Molestiae quos nulla ducimus facilis aspernatur. Vel exercitationem in maxime aut, vero excepturi dignissimos, quasi ut odio praesentium corrupti.
                        <br><br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, unde placeat aliquid reprehenderit aut natus ratione rem libero totam tempore odit, deserunt, esse et eveniet! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id saepe ipsa quisquam, hic ad nostrum placeat qui modi aliquam laudantium excepturi nihil facilis doloribus? Ipsum.
                    </p>
                </div>
                {{-- Imagen --}}
                <div class="w-full pt-4 lg:w-1/2 flex justify-center">
                    <div class="">
                        <div class="flex items-center 
                            size-[300px] sm:size-[400px] md:size-[450px] lg:size-[500px] 
                            justify-center rounded-full bg-[#E3FFFE] border-[3.5px] border-[#23B0FF] relative">

                            <img class="rounded-full 
                                size-[250px] sm:size-[340px] md:size-[390px] lg:size-[440px] 
                                border-[3.5px] border-[#23B0FF] object-cover object-center " src="{{ asset('img/quienes-somos.jpg') }}" alt="">

                            {{-- Bolitas del lado superior izquierdo --}}
                            <div class="bg-[#23B0FF] size-[14px] top-[18.6%] left-[6.2%] rounded-full 
                                sm:size-[20px] sm:top-[18.8%] 
                                md:size-[22px] md:top-[19.5%] 
                                lg:size-[22px] lg:top-[19.5%]
                                absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[18px] top-[26%] left-[1%] rounded-full 
                                sm:size-[24px] sm:top-[27%] 
                                md:size-[26px] md:top-[27.6%] sm:left-[0.5%]
                                lg:size-[30px] lg:top-[27.4%] absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[24px] top-[36.33%] left-[-3.6%] rounded-full 
                                sm:size-[32px] sm:top-[38%]
                                md:size-[36px] ms:top-[34%]
                                lg:size-[42px] lg:top-[38.2%] lg:left-[-4%] absolute inset-0">
                            </div>

                            {{-- Bolitas del lado superior derecho --}}
                            <div class="bg-[#23B0FF] size-[14px] top-[-1%] left-[60%] rounded-full 
                                sm:size-[20px] sm:top-[-1.5%]
                                absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[44px] flex items-center justify-center top-[-3%] left-[67%] rounded-full 
                                sm:size-[60px] sm:top-[-3%]
                                absolute inset-0">

                                <i class="fa-solid fa-face-laugh-beam text-[30px]
                                    sm:text-[38px]
                                    text-white rotate-[20deg]"></i>

                            </div>

                            {{-- Bolitas del lado derecho al medio --}}
                            <div class="bg-[#23B0FF] size-[28px] top-[32%] left-[93.7%] rounded-full 
                                sm:size-[35px] sm:top-[31%]
                                absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[20px] top-[45%] left-[97%] rounded-full 
                                sm:size-[26px] sm:top-[44%]
                                absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[14px] top-[55.8%] left-[97.5%] rounded-full 
                                sm:size-[19px] sm:top-[55%]
                                absolute inset-0">
                            </div>

                            {{-- Bolitas de la esquina inferior derecha --}}
                            <div class="bg-[#23B0FF] size-[16px] top-[80%] left-[85.8%] rounded-full 
                                 absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[44px] flex items-center justify-center top-[85%] left-[71%] rounded-full 
                            
                                absolute inset-0">
                                <i class="fa-solid fa-stethoscope text-white text-[25px] rotate-[-20deg]"></i>
                            </div>

                            {{-- Bolitas de la esquina inferior izquierda --}}
                            <div class="bg-[#23B0FF] size-[14px] top-[93%] left-[25%] rounded-full 
                                 absolute inset-0">
                            </div>

                            <div class="bg-[#23B0FF] size-[44px] flex items-center justify-center top-[82%] left-[9%] rounded-full 
                            
                                absolute inset-0">
                                <i class="fa-solid fa-tooth text-white text-[25px] rotate-[-25deg]"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-app-layout>
