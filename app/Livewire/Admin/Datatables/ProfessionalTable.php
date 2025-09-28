<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Professional;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class ProfessionalTable extends DataTableComponent
{
    // protected $model = Professional::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchDebounce(500);
        $this->setDefaultSort('id', 'desc');
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Especialidad')
                ->options(
                    Specialty::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($specialty) => $specialty->name)
                        ->toArray()
                )
                ->filter(function (Builder $builder, array $values) {
                    // Apply the whereHas clause for many-to-many filtering
                    $builder->whereHas('specialties', function (Builder $query) use ($values) {
                        $query->whereIn('specialties.id', $values);
                    });
                }),
        ];
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
                ->searchable()
                ->sortable(),
            Column::make("Apellidos", "lastname")
                ->searchable()
                ->sortable(),

            Column::make("Especialidades")
                ->searchable()
                ->label(function ($row) {
                    return view('admin.professionals.specialties', [
                        'specialties' => $row->specialties
                    ]);
                }),

            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.professionals.actions', [
                        'professional' => $row
                    ]);
                }),


        ];
    }

    public function builder(): Builder
    {

        return Professional::query()
            ->with(['specialties']);
    }
}
