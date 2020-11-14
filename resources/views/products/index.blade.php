@extends('layouts.app')

@section('content')
<section class="text-gray-700 body-font">
    @if(session('error'))
        <div class="mb-5 rounded p-3 bg-red-400 text-white text-bold w-full">
            <p class="mb-2"><b>{{ session('error') }}</b></p>
        </div>
    @endif
    <div class="md:flex">
        @include('partials.sidebar')
        <div class="container px-5 py-24 mx-auto md:w-3/4">
            <div class="flex flex-wrap -m-4">
                @foreach($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full hover:shadow-2xl">
                        <a href="{{ $product->path() }}" class="block relative h-60 rounded overflow-hidden">
                            <span
                                class="absolute mt-5 ml-5 p-2 bg-red-500 rounded text-white bold">{{ $product->badge }}</span>
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src={{ asset('storage/images/'.$product->image) }}>
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                @foreach ($product->categories as $category)
                                    <a class="hover:underline" href="/products?category={{$category->name}}">{{$category->name}}</a>
                                @endforeach
                            </h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium"> {{ $product->name }}</h2>
                            <p class="mt-1">{{ $product->presentPrice() }}</p>
                            <p class="mb-8 leading-relaxed text-base">
                                {{ $product->short_description }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <a class="tracking-widest p-5 w-10 rounded bg-orange-300"
                                href="{{ $product->path() }}">View Details</a>
                            @auth
                                @if(auth()->user()->admin)
                                    <a class="p-5 w-10 rounded bg-green-300"
                                        href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
