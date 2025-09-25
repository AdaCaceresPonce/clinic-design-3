<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends DataTableComponent
{
    // protected $model = Role::class;

    public function builder(): Builder
    {
        return Role::query()
            ->withCount('users')
            ->with('permissions');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchDebounce(500);
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "display_name")
                ->sortable()
                ->searchable(),
            // Column::make("Is active", "is_active")
            //     ->sortable(),

            Column::make('N° Usuarios')
                ->label(fn($row) => $row->users_count),

            Column::make("Permisos")
                ->label(function ($row) {
                    return view('admin.roles.permissions', [
                        'permissions' => $row->permissions
                    ]);
                }),

            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.roles.actions', [
                        'role' => $row
                    ]);
                }),

        ];
    }
}
