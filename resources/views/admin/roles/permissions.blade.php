<div class="flex flex-wrap gap-2">

    @forelse ($permissions->groupBy('module') as $module => $modulePermissions)

        <div class="p-2 bg-white rounded-lg shadow-md flex flex-col border border-l-blue-500 border-l-[3px]">
            <span class="font-semibold text-gray-700 mb-1.5">{{ ucfirst($module) }}</span>
            <div class="flex flex-wrap gap-1">

                @foreach ($modulePermissions as $permission)
                    <x-wireui-badge blue>
                        {{ $permission->display_name ?? $permission->name }}
                    </x-wireui-badge>
                @endforeach
            </div>
        </div>

    @empty

        <x-wireui-badge secondary>
            Sin permisos
        </x-wireui-badge>

    @endforelse

</div>
