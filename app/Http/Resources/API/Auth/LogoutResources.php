<?php

namespace App\Http\Resources\API\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LogoutResources extends JsonResource
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
            'error'=>false,
            'message'=>'You Logged out from system',
            'data'=>null
        ];
    }
}
