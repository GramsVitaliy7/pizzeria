<?php


namespace App\Helpers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ShoppingCart
{

    /**
     * Add the product to the shopping cart
     *
     * @param Product $product
     */
    public static function store(Product $product)
    {
        $cart = session()->get('cart');
        // if this product is first
        if (!$cart) {
            $cart['products'][$product->id] = [
                'title' => $product['title'],
                'price' => $product['price'],
                'SKU' => $product['SKU'],
                'image_name' => $product['image_name'],
                'amount' => 1,
            ];
            session()->put('cart', $cart);
            return;
        }
        // if this product exist (simple amount inc)
        if (isset($cart[$product->id])) {
            $cart['products'][$product->id]['amount']++;
            session()->put('cart', $cart);
            return;
        }
        // if this item not exist in cart
        $cart[$product->id] = [
            'title' => $product->title,
            'price' => $product->price,
            'SKU' => $product->SKU,
            'image_name' => $product->image_name,
            'amount' => 1,
        ];
        session()->put('cart', $cart);
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
            foreach ($cart as $id => $details) {
                $total += $details['price'] * $details['amount'];
            }
        }
        return $total;
    }


}
