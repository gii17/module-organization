<?php

namespace Gii\ModuleOrganization\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Zahzah\LaravelFeature\Supports\BaseLaravelFeature;

class Organization extends BaseLaravelFeature{
    protected array $__guard   = ['id']; 
    protected array $__add     = ['name','flag'];
    protected string $__entity = 'Organization'; 

    public function addOrChange(? array $attributes=[]): self{    
        $this->updateOrCreate($attributes);
        return $this;
    }   

    public function get(mixed $conditionals = []) : Collection{
        return $this->organization()->conditionals($conditionals)->get();
    }

    public function organization(mixed $conditionals = []) : Builder{
        return $this->getModel()->conditionals($conditionals);
    }
}