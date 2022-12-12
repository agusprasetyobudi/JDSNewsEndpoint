<?php

namespace App\Http\Resources\API\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'permission_name' =>$this->display_name
        ];
    }
}
