@extends('layouts.app')

@section('content')
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
                    <tr>
                        <td class="border px-4 py-2"><a class="hover:underline" href="">
                                <div class="md:flex md:justify-between">
                                  <div class="h-20 w-20 hidden md:block md:mr-5">
                                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                    src="https://dummyimage.com/420x260">
                                  </div>
                                    <h2 class="text-gray-900 title-font text-2xl font-medium md:my-auto mb-3 md:mr-auto">The Catalyzer</h2>
                                </div>
                        </td>
                        <td class="border px-4 py-2">
                            <p class="mt-1">$16.00</p>
                        </td>
                        <td class="border px-4 py-2"><input type="number" class="p-3 rounded-lg border w-20"></td>
                        <td class="border px-4 py-2">Sum</td>
                        <td class="border px-4 py-2 w-5 text-center"><a class="p-3" href="#">X</a></td>
                    </tr>
                </tbody>
            </table>
            <div class="w-full bg-gray-200 h-10 text-center flex border">
              <div class="font-bold ml-auto my-auto px-3">
               <span class="mr-5">Total:</span>  <span>1000</span>
              </div>
            </div>
        </div>
    </div>
   {{--  @include('partials.might-also-like') --}}
</section>
@endsection
