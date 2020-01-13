<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductDoping;
use App\Models\ProductVariant;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     *
     * @return Renderable
     */
    public function index()
    {
        $products = Product::with([
            'productCategory',
            'productVariants',
            'productDopings'
        ])->latest()->paginate(16);

        $categories = ProductCategory::whereNotNull('parent_id')->get()     //get all subcategories
        ->sortBy('name');
        return view('products.index', compact(['products', 'categories']));
    }

    /**
     * Show the product in the pop up window.
     *
     * @param Product $product
     * @return Renderable
     */
    public function show(Product $product)
    {
        $min_price = 0;
        if ($product->productVariants) {
            $prices = [];
            foreach ($product->productVariants as $variant) {
                array_push($prices, $variant->price);
            }
            $min_price = min($prices);
        }
        return response()->json([
            'url' => route('shopping_cart.store', $product->id),
            'title' => $product->title,
            'image_name' => $product->image_name,
            'description' => $product->description,
            'price' => $min_price,
            'variants' => $product->productVariants,
            'dopings' => $product->productDopings,
        ]);
    }

    /**
     * Calculate the product price using dopings and size data.
     *
     * @param Product $product
     * @return Renderable
     */
    public function calculateProductPrice(Request $request)
    {
        $price = ProductVariant::find($request->input('variant'))->price;
        $dopings = ProductDoping::find($request->input('dopings'));
        $doping_price = 0;
        if ($dopings) {
            foreach ($dopings as $doping) {
                $doping_price += $doping->price;
            }
        }
        $total = $price + $doping_price;
        return response()->json([
            'price' => $total,
        ]);
    }


    /**
     * Filter the product list.
     *
     * @param Request $request
     * @return Renderable
     * @throws Throwable
     */
    public function filter(Request $request)
    {
        try {
            $products = Product::filter()
                ->with([
                    'productCategory',
                    'productVariants',
                    'productDopings'
                ])
                ->latest('products.created_at')
                ->paginate(16);
            $view = view('partials._products_table', compact('products'))->render();
            return response()->json(['html' => $view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public
    function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public
    function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return Response
     */
    public
    function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public
    function destroy(Product $product)
    {
        //
    }


}
