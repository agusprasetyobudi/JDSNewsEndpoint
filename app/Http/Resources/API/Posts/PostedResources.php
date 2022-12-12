<?php

namespace App\Http\Resources\API\Posts;

use App\Http\Resources\API\Users\UserResources;
use Illuminate\Http\Resources\Json\JsonResource;

class PostedResources extends JsonResource
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
            'post_id' => $this->id,
            'name' => $this->name,
            'status'=>$this->is_post,
            'post' => $this->post,
            'author' => AuthorResources::collection($this->author)
        ];
    }
}
