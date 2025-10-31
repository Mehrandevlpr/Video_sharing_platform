<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'id' =>$this->id,
            'name' =>$this->name,
            'owner_name' =>$this->owner_name,
            'slug' =>$this->slug,
            'description' =>$this->description,
            'category_id' =>$this->category_id,
            'user_id' =>$this->user_id,
            'user' => (new UserResource($this->user))
        ];
    }
}
