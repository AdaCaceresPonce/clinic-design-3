<?php

namespace App\Services\Sidebar;

class ItemLink implements ItemInterface
{
    private string $title;
    private string $url;
    private string $icon;
    private bool $active;
    private array $can;

    //Recibir las variables y almacenarlas en las definidas arriba
    public function __construct(string $title, string $url, string $icon, bool $active, array $can = [])
    {
        $this->title = $title;
        $this->url = $url;
        $this->icon = $icon;
        $this->active = $active;
        $this->can = $can;
    }

    public function render(): string
    {

        $activeClass = $this->active ? 'active text-gray-900 bg-gray-200/70 dark:bg-gray-700' : '';

        return <<<HTML
        
            <a href="{$this->url}"
                class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-200/70 dark:hover:bg-gray-700 group {$activeClass}">
                <span class="text-gray-500 inline-flex w-6 h-6 justify-center items-center group-hover:text-gray-900 group-[.active]:text-gray-900">
                    <i class="{$this->icon}"></i>
                </span>
                <span class="ms-2">
                    {$this->title}
                </span>
            </a>

        HTML;
    }

    public function authorize(): bool
    {
        return true;
    }
}
