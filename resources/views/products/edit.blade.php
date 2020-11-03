@extends('layouts.admin')

@section('content')
<div class="text-gray-700 body-font py-24 px-24 bg-teal-200 rounded md:mt-20">
    <form class="mb-3"
        action="{{ route('product.update', ['product' => $product]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex">
            <div class="md:w-1/4">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Create Product</h2>
                <p class="leading-relaxed mb-5 text-gray-600">Please fill all required fields</p>
            </div>
            <div class="md:w-3/4">
                @if($errors->any())
                    <ul class="mb-5 rounded p-3 bg-red-300 text-black text-bold">
                        @foreach($errors->all() as $error)
                            <li class="mb-2">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <div class="md:mr-5">
                    <input
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        placeholder="Product Name" type="text" name="name" value="{{ $product->name }}">
                </div>
                <div class="md:mr-5">
                    <div class="mb-3">
                        <label class="text-2xl" for="categories">Edit Product Categories</label>
                    </div>

                    <select
                        class="h-56 w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        placeholder="Product Name" type="text" name="categories[]" multiple id="categories">
                        
                        @foreach($product->categories as $productCategory)@endforeach
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->categories->contains('name', $category->name) ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="md:mr-5">
                    <input
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        placeholder="Product SKU" type="number" name="sku" value="{{ $product->sku }}">
                </div>
                <div class="md:mr-5">
                    <input
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        placeholder="Product Price" type="number" name="price" value="{{ $product->price }}">
                </div>
                <div class="md:mr-5">
                    <select
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        name="in_stock">
                        <option value="">In Stock?</option>
                        <option value="1"
                            {{ $product->in_stock ? 'selected' : '' }}>
                            Yes</option>
                        <option value="0"
                            {{ ! $product->in_stock ? 'selected' : '' }}>
                            No</option>

                    </select>
                </div>
                <div class="md:mr-5">
                    <select
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        name="badge">
                        <option value="" selected>Select a Badge</option>
                        <option value="New"
                            {{ $product->badge == 'New' ? 'selected' : '' }}>
                            New</option>
                        <option value="Hot"
                            {{ $product->badge == 'Hot' ? 'selected' : '' }}>
                            Hot</option>
                        <option value="Sale"
                            {{ $product->badge == 'Sale' ? 'selected' : '' }}>
                            Sale</option>

                    </select>
                </div>
            </div>
            <div class="w-1/2">
                <div class="md:ml-5">
                    <textarea
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none h-24 focus:border-teal-500 text-base px-4 py-2 mb-4 resize-none"
                        name="short_description">{{ $product->short_description }}</textarea>
                </div>
                <div class="md:ml-5 md:mt-2">
                    <textarea
                        class="w-full bg-white rounded border border-gray-400 focus:outline-none h-32 focus:border-teal-500 text-base px-4 py-2 mb-4 resize-none"
                        name="long_description">{{ $product->long_description }}</textarea>
                </div>
                <div class="md:ml-5 md:mt-3">
                    <div class="">
                        <img class="object-contain h-48 w-full"
                            src="{{ asset('storage/images/'.$product->image) }}" alt="">
                    </div>

                    <input
                        class="w-full rounded bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                        type="file" name="image">
                </div>
            </div>
        </div>
        <button
            class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg w-full">Update
            Product</button>
    </form>
    <form
        action="{{ route('product.delete', ['product' => $product]) }}"
        method="POST">
        @csrf
        @method('DELETE')
        <button
            class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg w-full"
            type="submit">Delete
            Product</button>
    </form>
</div>




@endsection
