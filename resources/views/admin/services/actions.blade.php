<div class="flex items-center space-x-2">

    @can('services.update')
        <x-wireui-button href="{{ route('admin.services.edit', $service) }}" blue sm>
            Editar
        </x-wireui-button>
    @endcan

    @can('services.delete')

        <form action="{{ route('admin.services.destroy', $service) }}" class="delete-form" method="POST">
            @csrf
            @method('DELETE')

            <x-wireui-button type="submit" red sm>
                Eliminar
            </x-wireui-button>
        </form>
        
    @endcan

</div>
