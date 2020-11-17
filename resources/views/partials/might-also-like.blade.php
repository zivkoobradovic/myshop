<div class="container px-5 mx-auto border md:flex md:justify-between">
    @foreach($product->mightAlsoLike() as $mightAlsoLike)
        <div class="lg:w-1/4 md:w-1/2 p-4 w-full hover:shadow-2xl">
            <a href="{{ $mightAlsoLike->path() }}" class="block relative h-60 rounded overflow-hidden">
                <span
                    class="absolute mt-5 ml-5 p-2 bg-red-500 rounded text-white bold">{{ $mightAlsoLike->badge }}</span>
                <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                    src={{ asset('storage/images/'.$mightAlsoLike->image) }}>
            </a>
            <div class="mt-4">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                    @foreach($mightAlsoLike->categories as $category)
                        <a class="hover:underline"
                            href="/products?category={{ $category->name }}">{{ $category->name }}</a>
                    @endforeach
                </h3>
                <h2 class="text-gray-900 title-font text-lg font-medium"> {{ $mightAlsoLike->name }}</h2>
                <p class="mt-1">{{ $mightAlsoLike->presentPrice() }}</p>
                <p class="mb-8 leading-relaxed text-base">
                    {{ $mightAlsoLike->short_description }}
                </p>
            </div>
            <div class="mb-3">
                <a class="tracking-widest p-5 w-10 rounded bg-orange-300" href="{{ $mightAlsoLike->path() }}">View
                    Details</a>
            </div>
        </div>
    @endforeach
</div>
