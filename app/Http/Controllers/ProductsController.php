<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
        $products = Product::all();
        return view('products.index')->with('products', $products);
        /* return response()->json(['products' => $products]); */
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
        /*  $request->file('image')->storeAs('images', $imageName, 'public'); */
        $validateRequest['image'] = $imageName;
        $product = Product::create($validateRequest);
        return redirect($product->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
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
        $product->delete();
        return redirect('/products');
    }

    public function requestValidate()
    {
        return request()->validate([
            'name' => 'required',
            'sku' => 'required',
            'badge' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'in_stock' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|sometimes'
        ]);
    }
    public function uploadImage($request, $imageName)
    {
        $request->file('image')->storeAs('images', $imageName, 'public');
    }
}
