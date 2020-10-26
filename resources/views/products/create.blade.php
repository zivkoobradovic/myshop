@extends('layouts.app')

@section('content')
<form class="text-gray-700 body-font py-24 px-24 bg-teal-200 rounded md:mt-20"
    action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
                    placeholder="Product Name" type="text" name="name">
            </div>
            <div class="md:mr-5">
                <select
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    placeholder="Product Name" type="text" name="store_id">
                    <option value="" selected>Select Store</option>
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:mr-5">
                <input
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    placeholder="Product SKU" type="number" name="sku">
            </div>
            <div class="md:mr-5">
                <input
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    placeholder="Product Price" type="number" name="price">
            </div>
            <div class="md:mr-5">
                <select
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    name="in_stock">
                    <option value="" selected>In Stock?</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
            <div class="md:mr-5">
                <select
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    name="badge">
                    <option value="" selected>Select a Badge</option>
                    <option value="New">New</option>
                    <option value="Hot">Hot</option>
                    <option value="Sale">New</option>
                </select>
            </div>
        </div>
        <div class="w-1/2">
            <div class="md:ml-5">
                <textarea
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none h-24 focus:border-teal-500 text-base px-4 py-2 mb-4 resize-none"
                    placeholder="Short Description" name="short_description"></textarea>
            </div>
            <div class="md:ml-5 md:mt-2">
                <textarea
                    class="w-full bg-white rounded border border-gray-400 focus:outline-none h-32 focus:border-teal-500 text-base px-4 py-2 mb-4 resize-none"
                    placeholder="Long Description" name="long_description"></textarea>
            </div>
            <div class="md:ml-5 md:mt-3">
                <input
                    class="w-full rounded bg-white rounded border border-gray-400 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4"
                    placeholder="Product SKU" type="file" name="image">
            </div>
        </div>
    </div>
    <button
        class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg w-full">Create
        Product</button>
    <p class="text-xs text-gray-500 mt-3">etdnsdgearydfxbc.</p>


</form>
@endsection
