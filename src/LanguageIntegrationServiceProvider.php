<?php

namespace DanielDoinov\LanguageIntegration;

use Illuminate\Support\ServiceProvider;
Use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

class LanguageIntegrationServiceProvider extends ServiceProvider
{
     /**
      * Perform post-registration booting of services.
      *
      * @return void
      */
     public function boot(\Illuminate\Routing\Router $router,Request $request)
     {
          $this->publishes([
              __DIR__ . '/config/languages.php' => config_path('languages.php')
          ], 'config');
          $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
          $router->pushMiddlewareToGroup('web', 'DanielDoinov\LanguageIntegration\Http\CheckLocale');
     }

     /**
      * Register any package services.
      *
      * @return void
      */
     public function register()
     {
          //
     }
}