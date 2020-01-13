<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Throwable;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('ajax_only')->only(['destroy']);
    }

    /**
     * Display a listing of the product categories.
     *
     * @return View
     */
    public function index()
    {
        $productCategories = ProductCategory::latest()->paginate(10);
        return view('admin.product_categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new product category.
     *
     * @return View
     */
    public function create()
    {
        $categories = ProductCategory::whereNull('parent_id')->get();
        return view('admin.product_categories.create', compact('categories'));
    }

    /**
     * Store a newly created product category in storage.
     *
     * @param StoreProductCategory $request
     * @return Redirect
     */
    public function store(StoreProductCategory $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->fill($request->all())->save();
        return redirect()->route('admin.product_categories.index')
            ->with('success', 'Category was added successfully');
    }

    /**
     * Display the specified product category.
     *
     * @param ProductCategory $productCategory
     * @return View
     */
    public function show(ProductCategory $productCategory)
    {
        return view('admin.product_categories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified product category.
     *
     * @param ProductCategory $productCategory
     * @return View
     */
    public function edit(ProductCategory $productCategory)
    {
        $categories = ProductCategory::whereNull('parent_id')->get();
        return view('admin.product_categories.edit', compact(['productCategory', 'categories']));
    }

    /**
     * Update the specified product category in storage.
     *
     * @param StoreProductCategory $request
     * @param ProductCategory $productCategory
     * @return Redirect
     */
    public function update(StoreProductCategory $request, ProductCategory $productCategory)
    {
        $productCategory->fill($request->all())->save();
        return redirect()->route('admin.product_categories.index')
            ->with('success', 'Category was updated successfully');
    }

    /**
     * Remove the specified product category from storage.
     *
     * @param ProductCategory $productCategory
     * @return Response
     * @throws Throwable
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            $productCategory->delete();
            $productCategories = ProductCategory::latest()->paginate(10);
            $view = view('partials.admin._product_categories_table', compact('productCategories'))->render();
            return response()->json(['html' => $view, 'message' => 'Category was deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Category was not deleted']);
        }
    }
}
