<?php

namespace App\Http\Resources\API\News;

use App\Http\Resources\API\Users\UserResources;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsDetailResource extends JsonResource
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
            'slug' => $this->slug,
            'status' => $this->is_post,
            'author' => new UserResources($this->author),
            'post' => $this->post
        ];
    }
}
