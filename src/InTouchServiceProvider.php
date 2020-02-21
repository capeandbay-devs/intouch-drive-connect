<?php

namespace CapeAndBay\InTouch;

use Illuminate\Support\ServiceProvider;
use CapeAndBay\InTouch\Services\LibraryService;

class InTouchServiceProvider extends ServiceProvider
{
    const VERSION = '0.1.0';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfigs();
        $this->publishFiles();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind the InTouch object to Laravel's service container
        $this->app->singleton('InTouch', function ($app) {
            $lib = new LibraryService();
            return new \CapeAndBay\InTouch\InTouch($lib);
        });
    }

    public function loadConfigs()
    {
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(__DIR__ . '/config/intouch.php', 'intouch');
    }

    public function publishFiles()
    {
        $capeandbay_config_files = [__DIR__ . '/config' => config_path()];

        $minimum = array_merge(
            $capeandbay_config_files
        );

        // register all possible publish commands and assign tags to each
        $this->publishes($capeandbay_config_files, 'config');
        $this->publishes($minimum, 'minimum');
    }
}
