<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\CollectionResource;
use App\Http\Resources\ProductResource;
use GetCandy\Models\Collection;
use GetCandy\Models\CollectionGroup;
use GetCandy\Models\Product;
use GetCandy\Models\Url;
use Inertia\Inertia;

class PageController extends Controller
{
    public function __construct(
        private CollectionGroup $collectionGroup,
        private Collection      $collection,
        private Product         $product,
        private Url             $url,
    )
    {
    }

    public function index($group)
    {
        $collections = $this->collectionGroup
            ->whereHandle($group)
            ->first()
            ->collections()
            ->with(['urls', 'group'])
            ->get();

        return Inertia::render('Shop/CollectionsPage')
            ->with('collections', CollectionResource::collection($collections));
    }

    public function collection($group, $collection)
    {
        $collection = $this->collection
            ->find(
                $this->url
                    ->whereSlug($collection)
                    ->first()
                    ->element_id
            );

        return Inertia::render('Shop/CollectionPage')
            ->with('collection', new CollectionResource($collection));
    }

    public function product($group, $collection, $product)
    {
        $product = $this->product
            ->with([
                'media',
                'variants.media',
                'variants.prices',
            ])->whereId(
                $this->url
                    ->whereSlug($product)
                    ->first()
                    ->element_id
            )
            ->first();

        return Inertia::render('Shop/ProductDetailsPage')
            ->with('product', new ProductResource($product));
    }
}
