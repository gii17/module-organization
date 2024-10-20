<?php

namespace Gii\ModuleOrganization\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gii\module-organization\Services\
 */
class ModuleOrganization extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'organization';
    }
}
