<?php
   
namespace Amk\SmileOne\Provider;

use Illuminate\Support\ServiceProvider;
use Amk\SmileOne\SmileOne;


class SmileServiceProvider extends ServiceProvider {
        
        
        public function boot()
        {
            if ($this->app->runningInConsole()) {
                $this->publishes([
                    __DIR__.'/../config/smileone.php' => config_path('smileone.php')
                ], 'smileone-config');
            }
        }

        public function register()
        {
            $this->app->bind(SmileOne::class, function ($app) {
                return new SmileOne();
            });
        }
   }
?>