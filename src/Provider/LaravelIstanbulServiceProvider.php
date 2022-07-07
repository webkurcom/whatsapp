<?php

namespace webkurcom\whatsapp\Provider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use webkurcom\whatsapp\Models\Whatsapp;

class LaravelIstanbulServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../view', 'laravelIstanbul');
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');


        $phone      = "905445853225";
        $message    = "Nasıl yardımcı olabilirim";
        $position   = "left";
        View::composer('themes.*', function ($view) use ($phone, $message, $position) {
            echo "
                <div style='position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#25d366;
                color:#FFF;
                border-radius:50px;
                text-align:center;
              font-size:30px;
                box-shadow: 2px 2px 3px #999;
              z-index:100;'><a href='https://api.whatsapp.com/send?phone=$phone&text=$message' class='$position' target='_blank'>
                    <i class='fa fa-whatsapp' style='margin-top:16px;'></i>
                </div></a>";
        });
    }
}
