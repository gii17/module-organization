<?php

namespace Gii\ModuleOrganization\Services;

use Gii\ModuleOrganization\Models\Organization as ModelsOrganization;
use Zahzah\LaravelSupport\Supports\PackageManagement;

class Organization extends PackageManagement {
    public function getDataService() : ?ModelsOrganization {
        return $this->OrganizationModel()->get();
    }

    public function getDataServiceById(array $flags, mixed $id) : ?ModelsOrganization {
        return $this->OrganizationModel()->setIdentityFlags($flags)->refind($id);
    }

    public function getDataByFlag(array $flags) : ?ModelsOrganization {
        return $this->OrganizationModel()->setIdentityFlags($flags);
    }


    public function storeService(array $data) : ?ModelsOrganization {
        return $this->OrganizationModel()::updateOrCreate(
            ["id" => $data['id'] ?? request()->id],
            [
                "name" => $data['name'] ?? request()->name,
                "flag" => $data['flag'] ?? request()->flag,
            ]
        );
    }
} 