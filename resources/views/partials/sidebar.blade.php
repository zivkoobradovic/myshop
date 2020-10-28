<div class="px-5 py-24 mx-auto md:w-1/4">
    <h1 class="text-3xl mb-5">Categories</h1>
    <ul class="p-3">
        @foreach($categories as $category)
          <li class="text-lg mb-3"><a href="/products?category={{$category->name}}" class="hover:underline">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
