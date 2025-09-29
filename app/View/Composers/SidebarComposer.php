<?php

namespace App\View\Composers;

use App\Services\Sidebar\ItemGroup;
use App\Services\Sidebar\ItemHeader;
use App\Services\Sidebar\ItemLink;

class SidebarComposer
{
    public function compose($view)
    {
        //Mapear los datos del array, ya que en el archivo de configuracion son datos en bruto, y tienen que ser parseados con la funcion
        $items = collect(config('sidebar'))
            ->map(function ($item) {
                return $this->parseItem($item);
            })
            ->filter(function ($item) {
                // Después del parseo, se hace un filtro de solo los items que el usuario puede ver, es decir, remueve aquellos que el usuario no tiene permiso
                // authorize() ejecuta el método según el tipo de item (ItemLink, ItemGroup o ItemHeader)
                return $item && $item->authorize();
            });

        //Compartir los items parseados en una variable llamada itemsSidebar
        $view->with('itemsSidebar', $items);
    }

    //Funcion para parsear los elementos del array
    public function parseItem(array $item)
    {
        switch ($item['type']) {

            case 'header':

                return new ItemHeader(
                    title: $item['title'],
                    can: $item['can'] ?? [],
                );

                break;

            case 'link':

                return new ItemLink(
                    title: $item['title'],
                    url: isset($item['route']) ? route($item['route']) : '#',
                    icon: $item['icon'] ?? 'fa-regular fa-circle',
                    active: isset($item['active']) ? request()->routeIs($item['active']) : false,
                    can: $item['can'] ?? [],
                );

                break;

            case 'group':

                $group = new ItemGroup(
                    title: $item['title'],
                    icon: $item['icon'] ?? 'fa-regular fa-circle',
                    active: isset($item['active']) ? request()->routeIs($item['active']) : false,
                    can: $item['can'] ?? [],
                );

                foreach ($item['items'] as $subItem) {
                    $group->add($this->parseItem($subItem));
                }

                return $group;

                break;

            default:

                throw new \InvalidArgumentException("Unknown item type: {$item['type']}");

                break;
        }
    }
}
