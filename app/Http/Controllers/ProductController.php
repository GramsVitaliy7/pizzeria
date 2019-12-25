<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\Sessionable;
use App\Helpers\ShoppingCart;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
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
        $products = Product::latest()->paginate(10);
        return view('products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the product.
     *
     * @param Product $product
     * @return Renderable
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function edit(Product $product)
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }


}
