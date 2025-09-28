<?php

namespace App\Providers;

use App\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Compartirle a la vista layouts/admin.php.blade el array con los items del sidebar, que seria el archivo de configuracion creado.
        //La logica se encuentra en SidebarComposer
        View::composer('layouts.admin',SidebarComposer::class);
    }
}
