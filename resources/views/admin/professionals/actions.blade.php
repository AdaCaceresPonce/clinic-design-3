<div class="flex items-center space-x-2">

    @can('professionals.update')

        <x-wireui-button href="{{ route('admin.professionals.edit', $professional) }}" blue sm>
            Editar
        </x-wireui-button>

    @endcan

    @can('professionals.delete')

        <form action="{{ route('admin.professionals.destroy', $professional) }}" class="delete-form" method="POST">
            @csrf
            @method('DELETE')

            <x-wireui-button type="submit" red sm>
                Eliminar
            </x-wireui-button>
        </form>

    @endcan

</div>
