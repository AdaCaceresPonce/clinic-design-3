<div class="testimonials__content">
    <div class="swiper pt-6 pb-14  lg:px-4 testimonials__slider js-testimonials-slider" x-init="let swiperTestimonials = new Swiper('.js-testimonials-slider', {
        // Optional parameters
        loop: true,
        spaceBetween: 30,
        grabCursor: true,
        // If we need pagination
        pagination: {
            el: '.js-testimonials-pagination',
            clickable: true,
        },
    
        autoplay: {
            delay: 8500,
            disableOnInteraction: false
        },
    
        breakpoints: {
            600: {
                slidesPerView: 1,
            },
            968: {
                slidesPerView: 2,
            },
        },
    });">
        <div class="swiper-wrapper">
            {{-- Carta de opinion --}}
            @if ($opinions->count())
                @foreach ($opinions as $opinion)
                    <div
                        class="testimonials__item swiper-slide bg-[#EFFFFF] rounded-xl p-[30px] border-[2.5px] border-[#0075FF] shadow-lg">
                        <div class="info flex items-center justify-between">
                            {{-- <img class="mr-4 size-16 object-cover object-center rounded-full"
                src="{{ asset('img/ceo.jpg') }}" alt=""> --}}
                            <span class="name text-2xl font-extrabold">
                                {{ $opinion->name }} {{ $opinion->lastname }}
                            </span>
                            <i class="fa-solid fa-quote-right text-[#0075FF] text-[45px]"></i>
                        </div>
                        <p class="text-[#0075FF]">
                            @if ($opinion->service)
                                {{ $opinion->service->name }}
                            @endif
                        </p>
                        <p class="mt-[10px] text-base">
                            {{ $opinion->opinion }}
                        </p>
                    </div>
                @endforeach
            @else
                <div class=" w-full text-center text-2xl font-bold pt-10">
                    <span>Todavía no tenemos opiniones. ¡Anímate a enviar la tuya!</span>
                </div>
            @endif


        </div>

        {{-- Paginacion --}}
        <div class="swiper-pagination js-testimonials-pagination"></div>
    </div>


</div>
