<div class="flex flex-wrap gap-1">
    @forelse ($roles as $role)
        <x-wireui-badge>
            {{ $role->display_name }}
        </x-wireui-badge>
    @empty
        <x-wireui-badge secondary>
            Sin roles
        </x-wireui-badge>
    @endforelse
</div>
