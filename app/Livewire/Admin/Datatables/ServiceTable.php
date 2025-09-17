<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;

use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;


class ServiceTable extends DataTableComponent
{
    protected $model = Service::class;

    public function configure(): void
    {
        $this->setPrimaryKey('slug');
        $this->setSearchDebounce(500);
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Slug", "slug")
                ->hideIf(true),


            Column::make("Card img path", "card_img_path")
                ->hideIf(true),
            ImageColumn::make('Imagen')
                ->location(
                    fn($row) => $row->card_img
                )->attributes(
                    fn($row) => [
                        'class' => 'service-image'
                    ]
                ),

            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),

            Column::make("Acciones")->label(function ($row) {
                return view('admin.services.actions', ['service' => $row]);
            })

        ];
    }
}
