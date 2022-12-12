<?php

namespace App\Http\Resources\API\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResources extends JsonResource
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
            'comment_id' => $this->id,
            'comment' => $this->comment,
            'posts' => PostedResources::collection($this->posts)
        ];
    }
}
