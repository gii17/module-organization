<?php

namespace Gii\ModuleOrganization\Resources;

use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewOrganization extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request){
      $arr = [
        'id'           => $this->id,
        'name'         => $this->name,
        "flag"         => $this->flag,
        'created_at'   => $this->created_at,
        'updated_at'   => $this->updated_at
      ];
      ksort($arr);
      return $arr;
  }
}