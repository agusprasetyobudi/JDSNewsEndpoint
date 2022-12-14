<?php

namespace App\Http\Resources\API\Posts;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResources extends JsonResource
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
            'email' => $this->email??'',
            'joined_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
