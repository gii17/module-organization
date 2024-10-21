<?php

namespace Gii\ModuleOrganization;

use Gii\ModuleOrganization\Models\Organization;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ModuleOrganizationServiceProvider extends EnvironmentServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerNamespace()->registerModel()->registerProvider(); 
        $this->app->singleton('organization', function ($app) {
            return new Organization();
        });
    }
}
