<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Professional;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class ProfessionalTable extends DataTableComponent
{
    // protected $model = Professional::class;

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

            Column::make("Photo path", "photo_path")
                ->hideIf(true),
            ImageColumn::make('Foto')
                ->location(
                    fn($row) => $row->photo
                )->attributes(
                    fn($row) => [
                        'class' => 'professional-photo'
                    ]
                ),

            Column::make("Nombres", "name")
                ->sortable(),
            Column::make("Apellidos", "lastname")
                ->sortable(),


        ];
    }

    public function builder(): Builder
    {

        return Professional::query()
            ->with(['specialties']);
    }
}
