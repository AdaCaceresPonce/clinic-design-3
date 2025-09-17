<div class="flex flex-wrap gap-2">
    @forelse ($specialties as $specialty)
        <span
            class="bg-blue-100 text-blue-800 dark:text-[#60f0f5] text-sm font-medium px-2.5 py-0.5 dark:bg-gray-700 border border-blue-400 dark:border-[#00CAF7] rounded-full">
            {{ $specialty->name }}
        </span>
    @empty



    @endforelse
</div>
