<?php

namespace App\Http\Resources\API\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResources extends JsonResource
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
            'name' => $this->display_name,
            'has_permission' => new PermissionsResources($this->permissions)??null
        ];
    }
}
