<?php

namespace App\Http\Resources;

use GetCandy\Facades\Pricing;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'sku'           => $this->sku,
            'stock'         => $this->stock,
            'media'         => $this->media->toArray(),
            'unit_quantity' => $this->unit_quantity,
            'prices'        => PriceResource::collection($this->prices),
            'values'        => OptionValueResource::collection($this->values)
        ];
    }
}
