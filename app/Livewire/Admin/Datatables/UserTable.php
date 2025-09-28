<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Role;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class UserTable extends DataTableComponent
{
    // protected $model = User::class;

    public function builder(): Builder
    {
        return User::query()
            ->with('roles');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchDebounce(500);
        $this->setDefaultSort('id', 'desc');
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Roles')
                ->options(
                    Role::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($role) => $role->display_name)
                        ->toArray()
                        + ['none' => 'Sin roles']
                )
                ->filter(function (Builder $builder, array $values) {
                    // Apply the whereHas clause for many-to-many filtering
                    $builder->where(function (Builder $query) use ($values) {
                        
                        // Se seleccionó "sin roles"
                        if (in_array('none', $values)) {
                            $query->doesntHave('roles');
                        }

                        // Se eligieron roles normales
                        $roleIds = array_filter($values, fn($v) => $v !== 'none');
                        if (!empty($roleIds)) {
                            $query->orWhereHas('roles', function (Builder $q) use ($roleIds) {
                                $q->whereIn('roles.id', $roleIds);
                            });
                        }
                    });
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),

            Column::make("Roles")->label(function ($row) {
                return view('admin.users.roles', ['roles' => $row->roles]);
            }),

            Column::make("Acciones")->label(function ($row) {
                return view('admin.users.actions', ['user' => $row]);
            })
        ];
    }
}
