<?php

namespace Gii\ModuleOrganization;

use Gii\ModuleOrganization\Models\Organization;
use Gii\ModuleOrganization\Services\Organization as ServiceOrganization;
use Zahzah\LaravelSupport\Providers\BaseServiceProvider;

class ModuleOrganizationServiceProvider extends BaseServiceProvider
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
                'Services'  => function(){
                    $this->binds([
                        Contracts\ModuleOrganization::class => new Organization()
                    ]);
                },
             ]);
    }

    protected function dir(): string{
        return __DIR__.'/';
    }

    protected function migrationPath(string $path = ''): string{
        return database_path($path);
    }
}
