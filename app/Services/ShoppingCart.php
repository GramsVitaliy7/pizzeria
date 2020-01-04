<?php


namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ShoppingCart
{

    /**
     * Add the product to the shopping cart
     *
     * @param Product $product
     * @param Request $request
     */
    public static function store(Product $product, Request $request)
    {
       // session()->forget('cart');
        $cart = session()->get('cart');

        $temp = [
            'title' => $product['title'],
            'image_name' => $product['image_name'],
            'size' => $request->input('size'),
            'price' => ProductVariant::where('product_id', $product->id)
                ->where('size', $request->input('size')),
        ];

        foreach ($request->input('dopings') as $element) {
            array_push($temp['dopings'], $element);
        }

        // if this product exist (simple amount inc)
        if (isset($cart['products'][$product->id])) {
            $cart['products'][$product->id]['amount']++;
            $cart['total'] = ShoppingCart::getCartTotalPrice($cart);
            session()->put('cart', $cart);
            return;
        }
        // if this product is first

        $cart['total'] = ShoppingCart::getCartTotalPrice($cart);
        session()->put('cart', $cart);
        return;

        // if this item not exist in cart
   /*     dd('nah');
        $cart['products'][$product->id] = [
            'title' => $product->title,
            'price' => $product->price,
            'SKU' => $product->SKU,
            'image_name' => $product->image_name,
            'amount' => 1,
        ];
        session()->put('cart', $cart);*/
    }

    /**
     * Remove product from the shopping cart.
     *
     * @param $id
     * @return JsonResponse
     */
    public static function delete($id)
    {
        $cart = session()->get('cart');
        unset($cart['products'][$id]);
        $total = ShoppingCart::getCartTotalPrice($cart);
        $cart['total'] = $total;
        session()->put('cart', $cart);
        return $cart;
    }

    /**
     * Update the shopping cart.
     *
     * @param Request $request
     * @return array
     * @throws Throwable
     */
    public static function update(Request $request)
    {
        $cart = session()->get('cart');
        $cart['products'][$request->id]['amount'] = $request->amount;
        $total = ShoppingCart::getCartTotalPrice($cart);
        $cart['total'] = $total;
        session()->put('cart', $cart);
        return $cart;
    }

    public static function getCartTotalPrice($cart)
    {
        $total = 0;
        if ($cart) {
            foreach ($cart['products'] as $id => $details) {
                $total += $details['price'] * $details['amount'];
            }
        }
        return $total;
    }


}
