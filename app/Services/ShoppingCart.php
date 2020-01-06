<?php


namespace App\Services;

use App\Models\Product;
use App\Models\ProductDoping;
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

        $variant = ProductVariant::findOrFail($request->input('variant'));

        $temp = [
            'product_id' => $product['id'],
            'title' => $product['title'],
            'image_name' => $product['image_name'],
            'size' => $variant->size,
            'price' => $variant->price,
            ];
        $temp['dopings'] = [];

        if ($request->has('dopings')) {
            $dopings = ProductDoping::findOrFail($request->input('dopings'));

            foreach ($dopings as $doping) {
                array_push($temp['dopings'], $doping->name);
            }
        }
        $cart = session()->get('cart');
        if (($index = ShoppingCart::checkProductEntry($temp, $cart['products'])) != -1) {
            $cart['products'][$index]['amount']++;
            $cart['total'] = ShoppingCart::getCartTotalPrice($cart);
            session()->put('cart', $cart);
            return;
        }

        if (!$cart['products']) {
            $cart['products'] = [];
        }
        $temp['amount'] = 1;
        array_push($cart['products'], $temp);
        $cart['total'] = ShoppingCart::getCartTotalPrice($cart);
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

    /**
     * Calculate total price of the products in the shopping cart
     *
     * @param $cart
     * @return float|int
     */

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

    /**
     * Check for product entry in shopping cart using product_id, size and doppings.
     *
     * @param $temp
     * @param $products
     * @return bool
     */

    public static function checkProductEntry($temp, $products)
    {
        if ($temp && $products) {   // a new array and $cart['products'] are not null/empty
            foreach ($products as $index => $product) {
                $dopings1 = $product['dopings'];    // prepare arrays to intersect - save doppings in buffers
                $dopings2 = $temp['dopings'];
                unset($product['dopings']);         // delete arrays for intersect operation
                unset($temp['dopings']);

                $intersect = array_intersect($product, $temp);

                if ((array_key_exists('product_id', $intersect))    // check for product_id and size difference
                    && (array_key_exists('size', $intersect))) {
                    if (!array_diff($dopings1, $dopings2)) {    // check for dopping difference
                        return $index;  // index of the match array
                    }
                }
                $product['dopings'] = $dopings1;    // restore the arrays with doppings in temps, shopping cart
                $temp['dopings'] = $dopings2;
            }
        }
        return -1;  // no matches found
    }


}
