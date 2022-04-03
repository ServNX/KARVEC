<?php

namespace App\Http\Resources;

use App\Traits\HasProductOptions;
use GetCandy\Facades\Pricing;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    use HasProductOptions;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $variants = $this->variants()
            ->with(['media', 'prices', 'values'])
            ->get();

        $prices = $this->getPrices($variants);

        return [
            'id'            => $this->id,
            'name'          => $this->translateAttribute('name'),
            'description'   => $this->translateAttribute('description'),
            'media'         => $this->media->toArray(),
            'variants'      => VariantResource::collection($variants),
            'status'        => $this->status,
            'primary_image' => $this->media->first(
                fn ($media) => $media->getCustomProperty('primary')
            )->getUrl('medium'),
            'price_lowest'  => $prices['lowest']['formatted'],
            'price_highest' => $prices['highest']['formatted'],
            'url_slug' => $this->urls->first() ? $this->urls->first()->slug : null,
            'options' => $this->getProductOptions($this)
        ];
    }

    private function getPrices($variants)
    {
        $prices = [];

        foreach ($variants as $variant) {
            $price = Pricing::for($variant)->base->price;

            $prices[] = [
                'value'     => $price->value,
                'formatted' => $price->formatted,
                'price'     => $price
            ];
        }

        $prices = collect($prices);

        return [
            'all' => $prices->sortBy('value'),
            'lowest'  => $prices->sortBy('value')->first(),
            'highest' => $prices->sortByDesc('value')->first()
        ];
    }
}
