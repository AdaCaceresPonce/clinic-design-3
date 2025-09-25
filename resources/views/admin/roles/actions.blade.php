<div class="flex items-center space-x-2">

    <x-wireui-button href="{{ route('admin.roles.edit', $role) }}" blue sm>
        Editar
    </x-wireui-button>

    <form action="{{ route('admin.roles.destroy', $role) }}" class="delete-form" method="POST">
        @csrf
        @method('DELETE')

        <x-wireui-button type="submit" red sm>
            Eliminar
        </x-wireui-button>
    </form>

</div>
