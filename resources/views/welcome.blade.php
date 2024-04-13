<x-app-layout>

    <section
        class="w-full h-[580px] md:h-[600px] lg:h-[680px] brightness-90 contrast-150 bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('img/bienvenida.jpg') }}');">
        {{-- Fondo azulado para la imagen --}}
        <div class="bg-blue-700 bg-opacity-20 inset-0 absolute z-10">
        </div>
        <x-container class="px-8 h-full flex align-middle items-center justify-center lg:justify-start relative z-20">
            {{-- Tarjeta de bienvenida --}}
            <div class="bg-[#EAFBFF] bg-opacity-75 rounded-3xl px-11 py-12 max-w-[570px] text-center lg:text-start">

                <p class="text-4xl lg:text-5xl leading-tight lg:leading-tight font-bold">
                    Prepárate para una <span class="text-[#0075FF]"> grandiosa experiencia dental.</span>
                </p>

                <p class="mt-6 text-base lg:text-lg font-medium">
                    En Clínica Dental utilizamos las mejores herramientas y materiales para brindarte un servicio y
                    atención de calidad velando siempre por tu comodidad.</p>

                <div class="mt-12">
                    <button class="text-base lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                        Agenda una cita
                    </button>
                </div>

            </div>
        </x-container>
    </section>

    <section>
        <x-container class="px-4">
            <div class="flex py-36 space-x-16 align-middle items-center justify-center">
                <img class="h-[600px] max-w-[580px] object-cover border-[4px] border-[#00CAF7] rounded-3xl" src="{{ asset('img/clinica-confianza.jpg') }}"
                    alt="">
                <div>
                    <p class="text-5xl leading-tight font-bold">
                        Una Clínica Dental en la que puedes <span class="text-[#0075FF]">confiar.</span>
                    </p>
                    <p class="text-xl mt-7">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.
                    </p>
                    <p class="text-xl mt-6">
                        Te ofrecemos:
                    </p>
                    <div class="mt-12">
                        <button class="text-base lg:text-xl text-white px-8 py-4 bg-blue-600 rounded-xl">
                            Conócenos
                        </button>
                    </div>
                </div>
            </div>
        </x-container>
    </section>

</x-app-layout>
