<?php

namespace Gii\ModuleOrganization;

use Gii\ModuleOrganization\Models\Organization;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ModuleOrganizationServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('organization', function ($app) {
            return new Organization();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../assets/config/module-organization.php' => config_path('module-organization.php'),
        ], 'config');
    }
}
