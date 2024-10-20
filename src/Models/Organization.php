<?php

namespace Gii\ModuleOrganization\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class Organization extends BaseModel {
    use HasUlids,HasProps;

    protected $list            = ["id", "name","flag"];
    protected $show            = ["id", "name","flag"];
    protected $__flags_Service = ['AGENT','PAYER'];

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('flagIn',function($query){
            $query->flagIn(self::$__flags_Service);
        });
    }

    public static function setIdentityFlags(array $flags){
        self::$__flags_Service = $flags;
    }

    //EIGER SECTION

    //END EIGER SECTION
}