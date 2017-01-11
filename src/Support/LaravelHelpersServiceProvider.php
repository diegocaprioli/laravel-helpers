<?php

namespace DiegoCaprioli\LaravelHelpers\Support;

//use DiegoCaprioli\LaravelHelpers\Helpers\Form;
use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->alias('dcform', Form::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //return ['dcform'];
    }

} 