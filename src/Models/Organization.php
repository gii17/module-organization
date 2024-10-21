<?php

namespace Gii\ModuleOrganization\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class Organization extends BaseModel {
    use HasUlids,HasProps;

    protected $list                = ["name","flag"];
    protected $show                = ["name","flag"];
    protected $__flag_organization = ['AGENT','PAYER'];

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('flagIn',function($query){
            $query->flagIn(self::$__flag_organization);
        });
    }

    public function scopesetIdentityFlags($builder,array $flags){
        self::$__flag_organization = $flags;
    }

    //EIGER SECTION

    //END EIGER SECTION
}