<?php

namespace Gii\ModuleService\Services;

use Gii\ModuleService\Models\Service as ModelsService;
use Gii\ModuleService\Schemas\Service as SchemasService;
use Zahzah\LaravelSupport\Supports\PackageManagement;

class Service extends PackageManagement {
    public function getDataService() : ?ModelsService {
        return $this->ServiceModel()->get();
    }

    public function getDataServiceById(mixed $id) : ?ModelsService {
        return $this->ServiceModel()->refind($id);
    }

    public function getDataByFlag(array $flags) : ?ModelsService {
        return $this->ServiceModel();
    }


    public function storeService(array $data) : ?ModelsService {
        return $this->ServiceModel()::updateOrCreate(
            ["id" => $data['id'] ?? request()->id],
            [
                "name" => $data['name'] ?? request()->name,
                "flag" => $data['flag'] ?? request()->flag,
            ]
        );
    }
} 