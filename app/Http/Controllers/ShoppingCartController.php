<?php

namespace App\Http\Controllers;

use App\Helpers\ShoppingCart;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ShoppingCartController extends Controller
{
    /**
     * Add the product to the shopping card.
     *
     * @param $id
     * @return JsonResponse
     */
    public function store($id)
    {
        $product = Product::findOrFail($id);
        try {
            ShoppingCart::store($product);
            return response()->json(['message' => 'Product was added to cart successfully!']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Product was not added to cart!']);
        }
    }

    /**
     * Show the listing of the products in the shopping cart.
     *
     * @return void
     */
    public function index()
    {
        $cart = session()->get('cart');
        return view('shopping_cart.index', compact('cart'));
    }

    /**
     * Remove product from the shopping cart.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete(Request $request)
    {
        try {
            $cart = ShoppingCart::delete($request->id);
            $view = view('partials._shopping_cart_table', compact('cart'))->render();
            return response()->json(['success' => 'Product was removed from the cart successfully!',
                'html' => $view]);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'Product remove failed']);
        }
    }

    /**
     * Update the shopping cart.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Request $request)
    {
        try {
            $cart = ShoppingCart::update($request->id);
            $view = view('partials._shopping_cart_table', compact('cart'))->render();
            return response()->json(['success' => 'Product was updated in the cart successfully!',
                'html' => $view]);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'Product update failed']);
        }
    }
}
