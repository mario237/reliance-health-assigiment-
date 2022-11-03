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
            'token' => $this['token']
        );


        return array_filter($data);
    }
}
