<?php

namespace Gii\ModuleOrganization;

use Gii\ModuleOrganization\{
    Schemas\Organization as OrganizationSchema,
    Models\Organization  as OrganizationModel,
    Contracts,
};
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
        $this->registerMainClass(ModuleOrganization::class)
             ->registerCommandService(Providers\CommandServiceProvider::class)
             ->registers([
                '*',
                'Services'  => function(){
                    $this->binds([
                        Contracts\ModuleOrganization::class  => new OrganizationModel(),
                        Contracts\Organization::class        => new OrganizationSchema(),
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
