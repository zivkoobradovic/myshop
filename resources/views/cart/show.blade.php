@extends('layouts.app')

@section('content')
@if(Cart::content()->count())
    <section class="text-gray-700 body-font">
        <div class="container md:px-5 py-24 mx-auto px-2">
            <div class="md:p-4 w-full ">

                <table class="table-fixed">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="md:w-3/4 w-1/4 px-1 py-2">Name & description</th>
                            <th class="w-1/8 px-1 py-2">Price</th>
                            <th class="w-1/8 px-1 py-2">Quantity</th>
                            <th class="w-1/8 px-1 py-2">Total</th>
                            <th class="w-1/8 px-1 py-2 w-5">Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach(Cart::content() as $cartItem)
                            <tr>
                                <td class="border px-4 py-2"><a class="hover:underline" href="">
                                        <div class="md:flex md:justify-between">
                                            <div class="h-20 w-20 hidden md:block md:mr-5">
                                                <img alt="ecommerce"
                                                    class="object-cover object-center w-full h-full block"
                                                    src="{{ asset('storage/images/' . $cartItem->model->image) }}">
                                            </div>
                                            <h2
                                                class="text-gray-900 title-font text-2xl font-medium md:my-auto mb-3 md:mr-auto">
                                                {{ $cartItem->model->name }}</h2>
                                        </div>
                                </td>
                                <td class="border px-4 py-2">
                                    <p class="mt-1">{{ $cartItem->model->presentPrice() }}</p>
                                </td>
                                <td class="border px-4 py-2"><input type="number" class="p-3 rounded-lg border w-20">
                                </td>
                                <td class="border px-4 py-2">Sum</td>
                                <td class="border px-4 py-2 w-5 text-center">
                                    <form action="{{ route('cart.removeItem', ['item' => $cartItem->rowId]) }}"  method="POST">
                                    <input type="hidden" value="{{ $cartItem->rowId }}">
                                    @csrf
                                       <button type="submit" class="font-bold">X</button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="w-full bg-gray-200 h-10 text-center flex border">
                    <div class="font-bold ml-auto my-auto px-3">
                        <div>
                            <div class="mr-5 mb-3">Total Tax: {{ Cart::tax() }}</div>
                            <div class="mr-5">Total: {{ Cart::total() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('partials.might-also-like') --}}
    </section>
@else
    <div class="p-5 bg-red-400 text-2xl color-red rounded-lg text-white content-center flex">
        <div class="m-auto">
            <h1 class="m-auto mb-10 text-center">There is no content on your cart.</h1>
            <h2 class="text-xl text-center underline hover:no-underline hover:color-black"><a
                    href="{{ route('products.index') }}">Go to shopping
                    NOW!</a></h2>
        </div>
    </div>
@endif
@endsection
