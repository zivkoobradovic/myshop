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
                {{-- <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
                 <div class="h-1 w-20 bg-teal-500 rounded"></div>
                 </div>
                 <p class="lg:w-1/2 w-full leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
                 </div> --}}

                @foreach($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full hover:shadow-2xl">
                    <a href="{{ $product->path() }}" class="block relative h-60 rounded overflow-hidden">
                            <span
                                class="absolute mt-5 ml-5 p-2 bg-red-500 rounded text-white bold">{{ $product->badge }}</span>
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src={{ asset('storage/images/'.$product->image) }}>
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
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
