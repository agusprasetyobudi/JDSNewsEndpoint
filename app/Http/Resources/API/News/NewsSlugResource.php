<?php

namespace App\Http\Resources\API\News;

use App\Http\Resources\API\Posts\AuthorResources;
use App\Http\Resources\API\Users\UserResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class NewsSlugResource extends JsonResource
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
            'images' => Storage::url($this->images),
            'author' => new AuthorResources($this->author),
            'post' => $this->post
        ];
    }
}
