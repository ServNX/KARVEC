<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use GetCandy\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function toggleFavorite(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer'
        ]);

        $user = Auth::user();
        $product = Product::find($data['product_id']);

        $user->toggleFavorite($product);

        $saved_or_removed = $user->hasFavorited($product) ? 'saved' : 'removed';
        $success_or_warning = $user->hasFavorited($product) ? 'success' : 'warning';

        return Redirect::back()->with(
            $success_or_warning,
            "Product has been <strong>$saved_or_removed</strong> as a favorite."
        );
    }
}
