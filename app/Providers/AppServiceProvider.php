<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\theloaitruyen;
use App\Models\theloai;
use App\Models\tacgia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::withoutDoubleEncoding();
       view()->composer('page.layout.nav', function($view) {
            $theloaitruyen=theloaitruyen::all();
           $tacgia=tacgia::take(10)->get();
            $view->with('data2', array('theloaitruyen'=>$theloaitruyen,'tacgia'=>$tacgia));
          });
        view()->composer('page.layout.header', function($view) {
            $theloai=theloai::all();
            $view->with('data', array('theloai'=>$theloai));
          });
    }
}
