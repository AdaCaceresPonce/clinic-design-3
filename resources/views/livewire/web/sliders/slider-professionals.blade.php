<div
    class="professionals__content w-[307px] sm:w-[543px] min-[780px]:w-[600px] min-[968px]:w-full lg:max-w-[1045px]
                    min-[968px]:px-8 mb-5 
                    flex justify-center mx-auto align-middle">
    <div class="swiper w-full h-full professionals__slider min-[968px]:px-4 pt-6 pb-14 js-professionals-slider">
        <div class="swiper-wrapper">
            @foreach ($professionals as $professional)
                {{-- Carta --}}
                <article
                    class="swiper-slide professional__card bg-white overflow-hidden rounded-xl border-[1px] border-[#636363] shadow-lg"
                    style="">
                    {{-- Foto del profesional --}}
                    <div class="">
                        <img src="{{ $professional->photo }}" alt="image"
                            class="professional__photo w-full object-cover object-top">
                    </div>
                    {{-- Datos del profesional --}}
                    <div class="px-4 py-6 text-center">
                        <p class="font-bold text-lg line-clamp-2">{{ $professional->name }}</p>
                        <p class="text-[#0075FF] font-bold">
                            @foreach ($professional->specialties as $specialty)
                                {{ $specialty->name }}
                                @if (!$loop->last)
                                    /
                                @endif
                            @endforeach
                        </p>

                    </div>
                </article>
            @endforeach
        </div>

        {{-- Paginacion --}}
        <div class="swiper-pagination js-professionals-pagination"></div>
    </div>

</div>
