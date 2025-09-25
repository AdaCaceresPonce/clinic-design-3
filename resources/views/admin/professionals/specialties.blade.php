<div class="flex flex-wrap gap-1">
    @forelse ($specialties as $specialty)
        <x-wireui-badge blue>
            {{ $specialty->name }}
        </x-wireui-badge>
    @empty
        <x-wireui-badge secondary>
            Sin especialidades
        </x-wireui-badge>
    @endforelse
</div>
