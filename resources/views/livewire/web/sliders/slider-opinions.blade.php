<div class="testimonials__content">
  <div class="swiper pt-6 pb-14 lg:px-4 testimonials__slider js-testimonials-slider" 
       x-init="let swiperTestimonials = new Swiper('.js-testimonials-slider', {
          loop: true,
          spaceBetween: 30,
          grabCursor: true,
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
              1280: {
                  slidesPerView: 3,
              },
          },
      });">

      <div class="swiper-wrapper">

        {{-- Verificamos si hay opiniones --}}
        @if ($opinions->count())
            @foreach ($opinions as $opinion)
                <div class="swiper-slide">
                    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col h-[300px] border-[2.5px] border-[#0075FF]">
                        
                        {{-- Ícono de comillas en la esquina superior derecha --}}
                        <div class="flex justify-end">
                            <i class="fa-solid fa-quote-right text-[#0075FF] text-[40px]"></i>
                        </div>

                        {{-- Texto de la opinión (máx. 15 palabras) --}}
                        <p class="text-gray-700 text-sm mb-4 flex-grow">
                            {{ \Illuminate\Support\Str::words($opinion->opinion, 15, '...') }}
                        </p>

                        {{-- Info del usuario --}}
                        <div class="flex items-center space-x-3 mt-auto">
                            <img src="https://via.placeholder.com/60"
                                 alt="{{ $opinion->name }}"
                                 class="w-12 h-12 rounded-full border-2 border-[#0075FF] object-cover">
                            
                            <div>
                                <h4 class="text-gray-900 font-semibold">
                                    {{ $opinion->name }} {{ $opinion->lastname }}
                                </h4>
                                @if ($opinion->service)
                                    <p class="text-xs text-gray-600">{{ $opinion->service->name }}</p>
                                @endif

                                {{-- Estrellas --}}
                                <div class="flex text-yellow-500 text-sm mt-1">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-3 text-center text-2xl font-bold text-[#0075FF] pt-10">
                <span>Todavía no tenemos opiniones. ¡Anímate a enviar la tuya!</span>
            </div>
        @endif
      </div>

      {{-- Paginación --}}
      <div class="js-testimonials-pagination flex justify-center mt-6"></div>
  </div>
</div>
