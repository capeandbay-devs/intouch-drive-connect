<?php

namespace CapeAndBay\InTouch;

use Illuminate\Support\ServiceProvider;
use CapeAndBay\InTouch\Services\LibraryService;

class InTouchServiceProvider extends ServiceProvider
{
    const VERSION = '0.2.0';

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

        if ($this->app->runningInConsole()) {
            //$this->publishMiddleware();
            $this->publishMigrations();
        }
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

    /**
     * Publish the package's migrations.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        if (class_exists('CreateIntouchTables')) {
            return;
        }

        $timestamp = date('Y_m_d_His', time());

        $stub = __DIR__.'/migrations/create_intouch_tables.php';

        $target = $this->app->databasePath().'/database/migrations/'.$timestamp.'_create_bouncer_tables.php';

        $this->publishes([$stub => $target], 'intouch.migrations');
    }
}
