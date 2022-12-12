<?php

namespace App\Http\Resources\API\Users;

use App\Http\Resources\API\Posts\CommentsResources;
use App\Http\Resources\API\Posts\PostedResources;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'joined_at' => $this->created_at,
            'has_verify' => !empty($this->email_verified_at)?true:false,
            'roles' => RoleResources::collection($this->roles),
            'comments' => new CommentsResources($this->comment),
            'posted' => new PostedResources($this->posts),

        ];
    }
}
