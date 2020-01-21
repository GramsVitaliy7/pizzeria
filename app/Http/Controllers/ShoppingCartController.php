<?php

namespace App\Http\Controllers;

use App\Services\ShoppingCart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\RequiredIf;
use Throwable;

class ShoppingCartController extends Controller
{
    /**
     * Add the product to the shopping card.
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function store($id, Request $request)
    {
        $product = Product::findOrFail($id);
        try {
            ShoppingCart::store($product, $request);
            return response()->json(['message' => 'Product was added to cart successfully!']);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()]);
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
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete($id)
    {
        try {
            $cart = ShoppingCart::delete($id);
            $view = view('partials._shopping_cart_table', compact('cart'))->render();
            return response()->json(['success' => 'Product was removed from the cart successfully!',
                'html' => $view]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Update the shopping cart.
     *
     * @param $id
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Request $request)
    {

        try {
            $cart = ShoppingCart::update($request);
            $view = view('partials._shopping_cart_table', compact('cart'))->render();
            return response()->json(['success' => 'Product was updated in the cart successfully!',
                'html' => $view]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }
}
