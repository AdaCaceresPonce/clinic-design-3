<div class="flex items-center space-x-2">

    @can('users.update')
        <x-wireui-button href="{{ route('admin.users.edit', $user) }}" blue sm>
            Editar
        </x-wireui-button>
    @endcan

    @can('users.delete')
        <form action="{{ route('admin.users.destroy', $user) }}" class="delete-form" method="POST">
            @csrf
            @method('DELETE')

            <x-wireui-button type="submit" red sm>
                Eliminar
            </x-wireui-button>
        </form>
    @endcan
</div>
