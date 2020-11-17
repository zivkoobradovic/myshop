<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if (request()->has('category')) {
            if (!$categories->contains('name', request('category'))) {
                return back()->with('error', 'There\'s no \'' . request('category') . '\' Please try with deferent category name.');
            }
            $products = $this->productsByCategoryName();
        } else {
            $products = Product::all();
        }
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateRequest = $this->requestValidate();
        $imageName = request()->file('image')->getClientOriginalName();
        $this->uploadImage($request, $imageName);
        $validateRequest['image'] = $imageName;
        $product = Product::create($validateRequest);
        $this->addCategories($product, $request->categories);
        return redirect($product->path())->with('success', 'Product ' . $product->name . ' successfuly created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->mightAlsoLike();
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $attributes = $this->requestValidate();
        if ($request->has('image')) {
            $imageName = $attributes['image']->getClientOriginalName();
            if ($product->image != $imageName) {
                $this->uploadImage($request, $imageName);
                Storage::delete('/public/images/' . $product->image);
                $attributes['image'] = $imageName;
            }
        }
        $product->update($attributes);
        $product->categories()->detach();
        $product->categories()->attach(request('categories'));
        return redirect($product->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete('/public/images/' . $product->image);
        $product->delete();

        return redirect('/products');
    }

    public function requestValidate()
    {
        return request()->validate([
            'name' => 'required',
            'sku' => 'required',
            'badge' => 'required',
            'price' => 'required',
            'in_stock' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|sometimes',
        ]);
    }
    public function uploadImage($request, $imageName)
    {
        $request->file('image')->storeAs('images', $imageName, 'public');
    }

    public function addCategories($product, $categories)
    {
        $product->categories()->attach($categories);
    }

    public function productsByCategoryName()
    {
        $category = Category::where('name', request('category'))->first();
        return $category->products;
    }
}
