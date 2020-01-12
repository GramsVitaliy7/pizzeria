<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDoping;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('ajax_only')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $products = Product::with(['productCategory', 'productVariants', 'productDopings'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create()
    {
        $categories = ProductCategory::whereNotNull('parent_id')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param StoreProduct $request
     * @return Redirect
     */
    public function store(StoreProduct $request)
    {

        $product = new Product();
        $product->fill($request->except(['image_name', 'variants', 'dopings']));
        $product->setImageName();
        //associate with category and save record in database
        $category = ProductCategory::findOrFail($request->input('category_id'));

        $product->productCategory()->associate($category);

        $product->save();

        $product->setVariantRelations();
        $product->setDopingRelations();

        //save image in storage
        $image = $request->file('image');
        Storage::putFileAs('public/products/' . $product->id . '/', $image, $product->image_name);
        return redirect()->route('admin.products.index')
            ->with('success', 'Product was added successfully');
    }

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::whereNotNull('parent_id')->get();
        return view('admin.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified product in storage.
     *
     * @param StoreProduct $request
     * @param Product $product
     * @return Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        $product->fill($request->except(['image_name', 'variants', 'dopings']));
        if (request('image')) {
            Storage::delete('public/products/' . $product->id . '/' . $product->image_name);
            $product->setImageName();
            $image = $request->file('image');
            Storage::putFileAs('public/products/' . $product->id . '/', $image, $product->image_name);
        }

        $category = ProductCategory::findOrFail($request->input('category_id'));
        $product->productCategory()->associate($category);
        $product->productVariants()->delete();
        $product->productDopings()->delete();
        $product->setVariantRelations();
        $product->setDopingRelations();


        return redirect()->route('admin.products.index')
            ->with('success', 'Product was updated successfully');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param Product $product
     * @return Response
     * @throws Throwable
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            Storage::deleteDirectory('public/product/' . $product->id);
            $products = Product::latest()->paginate(10);
            $view = view('partials.admin._products_table', compact('products'))->render();
            return response()->json(['html' => $view, 'message' => 'Product was deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product was not deleted']);
        }
    }
}
