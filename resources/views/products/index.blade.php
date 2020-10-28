@extends('layouts.app')

@section('content')
<section class="text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
            {{-- <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
                 <div class="h-1 w-20 bg-teal-500 rounded"></div>
                 </div>
                 <p class="lg:w-1/2 w-full leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
                 </div> --}}

            @foreach($products as $product)
                <div class="xl:w-1/4 md:w-1/2 p-4 hover:shadow-lg">
                    <div class="bg-gray-100 rounded-lg relative">
                        <div class="relative">
                            <a href="">
                                <span
                                    class="absolute mt-5 ml-5 p-2 bg-red-500 rounded text-white bold">{{ $product->badge }}</span>
                                <img class="rounded w-full object-cover object-center mb-6"
                                    src="{{ asset('storage/images/'.$product->image) }}"
                                    alt="content" />
                            </a>
                        </div>
                        <h3 class="text-teal-500 text-xs font-medium title-font"></h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            {{ $product->name }}
                        </h2>
                        <p class="mb-8 leading-relaxed text-base">
                            {{ $product->short_description }}
                        </p>
                        <div class="mb-3">
                            <a class="tracking-widest p-5 w-10 rounded bg-orange-300" href="">View Details</a>
                            @auth
                                @if(auth()->user()->admin)
                                    <a class="p-5 w-10 rounded bg-green-300"
                                        href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
