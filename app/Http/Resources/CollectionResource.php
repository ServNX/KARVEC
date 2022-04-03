<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->translateAttribute('name'),
            'description' => $this->translateAttribute('description'),
            'products' => ProductResource::collection($this->products()->with(['media', 'urls'])->get()),
            'url_slug' => $this->urls->first() ? $this->urls->first()->slug : null,
            'group' => $this->group
        ];
    }
}
