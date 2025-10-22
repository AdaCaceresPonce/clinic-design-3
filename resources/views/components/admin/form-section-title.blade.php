<div {{ $attributes->merge() }}>

    <div class="text-lg md:text-xl font-bold text-gray-900">{{ $title }}</div>

    @isset($description)
        <p class="mt-1 text-sm md:text-base text-gray-600">
            {{ $description }}
        </p>
    @endisset

</div>