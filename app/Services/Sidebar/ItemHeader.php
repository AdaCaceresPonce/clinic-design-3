<?php

namespace App\Services\Sidebar;

class ItemHeader implements ItemInterface
{

    private string $title;
    private array $can;

    //Recibir las variables y almacenarlas en las definidas arriba
    public function __construct(string $title, array $can = [] )
    {
        $this->title = $title;
        $this->can = $can;
    }

    public function render(): string
    {
        //Se añade el html de la cabecera
        return <<<HTML
            <div class="px-2 py-2 text-[13px] font-semibold text-gray-500 uppercase">
               {$this->title}             
            </div>
        HTML;
    }

    public function authorize(): bool
    {
        return true;
    }
}
