<?php

namespace Gii\ModuleOrganization;

use Gii\ModuleOrganization\Models\Organization;
use Gii\ModuleOrganization\Services\Organization as ServiceOrganization;
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
        $this->registerMainClass(ServiceOrganization::class)
             ->registerCommandService(Providers\CommandServiceProvider::class)
             ->registers([
                '*',
             ]);
    }
}
