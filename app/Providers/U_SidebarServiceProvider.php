<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\FiscalYear;
use App\Models\MainMenuShow;
use App\Models\SubMenuShow;

class U_SidebarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('index_template.patials_show.sidebar', function ($view) {
            $fiscalYear = FiscalYear::all();
            $view->with('fiscalYear', $fiscalYear);
            $mainMenuShow = MainMenuShow::all();
            $view->with('mainMenuShow', $mainMenuShow);
            $subMenuShow = SubMenuShow::all();
            $view->with('subMenuShow', $subMenuShow);
        });
    }
}
