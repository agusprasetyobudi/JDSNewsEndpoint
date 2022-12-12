<?php

namespace App\Http\Resources\API\Auth;

use App\Helper\ResponseHelpers;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResources extends JsonResource
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
            'error'=> false,
            'message' => 'You authenticate',
            'token' => $this->createToken(env('APP_NAME','Laravel'))->accessToken,
            'data' => [
                'name' => $this->name,
                'email' => $this->email
            ]
        ];
    }
}
