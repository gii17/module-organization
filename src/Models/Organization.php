<?php

namespace Gii\ModuleOrganization\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Concerns\Support\HasSoftDeletes;
use Zahzah\LaravelSupport\Models\BaseModel;

class Organization extends BaseModel {
    use HasProps,HasSoftDeletes;

    protected $list                 = ["id","name","flag"];
    protected $show                 = ["id","name","flag"];
    public static $__flags_service  = [];

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('flagIn',function($query){
            $query->flagIn(self::$__flags_service);
        });
    }

    public function scopesetIdentityFlags($builder,array $flags){
        self::$__flags_service = $flags;
    }

    //EIGER SECTION

    //END EIGER SECTION
}

