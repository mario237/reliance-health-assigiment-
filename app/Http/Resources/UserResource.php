<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = array(
            'id' => $this['id'],
            'name' => $this['name'],
            'email' => $this['email'],
            'balance' => $this['balance'],
            'currency' => $this['currency'],
            'token' => $this['token'],
            'created_at' => $this['created_at']->format('m/d/Y')
        );


        return array_filter($data);
    }
}
