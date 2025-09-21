<div class="flex items-center space-x-2">

    <x-wireui-button href="{{ route('admin.users.edit', $user) }}" blue sm>
        Editar
    </x-wireui-button>

    <form action="{{ route('admin.users.destroy', $user) }}" class="delete-form" method="POST">
        @csrf
        @method('DELETE')

        <x-wireui-button type="submit" red sm>
            Eliminar
        </x-wireui-button>
    </form>

</div>
