<?php

namespace Gii\ModuleOrganization;

use Illuminate\Database\Eloquent\Relations\Relation;
use Zahzah\LaravelSupport\Providers\BaseServiceProvider;

class EnvironmentServiceProvider extends BaseServiceProvider{
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    protected function dir(): string{
        return __DIR__.'/';
    }

    /**
     * Registers the morph map for the models.
     *
     * @return $this The current instance of the class.
     */
    protected function registerModel(): self{
        $this->morphMap($this->__config["microtenant"]["database"]["models"]);
        config(['database.models' => Relation::morphMap()]);
        return $this;
    }

    /**
     * Registers the CommandServiceProvider with the application.
     *
     * This method will register the CommandServiceProvider, register the tenant
     * and then register the MicroTenantServiceProvider if the file exists.
     *
     * @return $this The current instance of the class.
     */
    protected function registerProvider(): self{
        $this->app->register(Providers\CommandServiceProvider::class);
        return $this;
    }

    /**
     * Publishes the config and stub files to the application.
     *
     * @return self The current instance of the class.
     */
    public function registerNamespace(): self{
        $this->publishes($this->scanMigration(), 'migrations');
        return $this;
    }
}