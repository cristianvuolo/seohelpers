<?php


namespace CristianVuolo\SeoHelpers\Providers;


use Illuminate\Support\ServiceProvider;

class SeoHelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
       $this->publishes([__DIR__ . '/../../resources/publish/config/' => base_path('config')], 'config');
        require __DIR__ . "/../Helpers/CvSeoHelpers.php";

    }

    public function register()
    {

    }
}