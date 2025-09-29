<?php

namespace App\Services\Sidebar;

use Illuminate\Support\Facades\Gate;

class ItemGroup implements ItemInterface
{

    private string $title;
    private string $icon;
    private bool $active;
    private array $items = [];
    private array $can;

    //Recibir las variables y almacenarlas en las definidas arriba
    public function __construct(string $title, string $icon, bool $active, array $can = [])
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->active = $active;
        $this->can = $can;
    }

    public function add(ItemInterface $item): self
    {
        $this->items[] = $item;
        return $this;
    }


    public function render(): string
    {
        // Filtrar solo los items autorizados
        $authorizedItems = collect($this->items)
            ->filter(function (ItemInterface $item) {
                return $item->authorize();
            });

        // Si no hay items autorizados, no mostrar el grupo
        if ($authorizedItems->isEmpty()) {
            return '';
        }

        $open = $this->active ? 'true' : 'false';

        // Renderizar cada item autorizado dentro de un <li> y concatenarlos con saltos de línea
        $itemsHtml = $authorizedItems
            ->map(function (ItemInterface $item) {
                return '<li class="pl-4">' . $item->render() . '</li>';
            })->implode("\n");

        return <<<HTML
            <div x-data="{
                open: {$open}
            }">

                <!-- Botón -->
                <button type="button" @click="open = !open"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200/70 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                    <span class="text-gray-500 inline-flex w-6 h-6 justify-center items-center group-hover:text-gray-900">
                        <i class="{$this->icon}"></i>
                    </span>

                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{$this->title}</span>

                    <svg :class="{ 'rotate-180': open }" class="w-3 h-3 transition-transform" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Submenu -->
                <ul x-show="open" x-cloak x-collapse class="py-2 space-y-2">

                    {$itemsHtml}
                    
                </ul>

            </div>
        HTML;
    }

    public function authorize(): bool
    {
        // Si hay permisos específicos para el grupo, verificarlos
        if (count($this->can)) {
            return Gate::any($this->can);
        }

        // Si no hay permisos específicos, verificar si al menos un item hijo está autorizado
        foreach ($this->items as $item) {
            if ($item->authorize()) {
                return true;
            }
        }

        return false;
    }
}
