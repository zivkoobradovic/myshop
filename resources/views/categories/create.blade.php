@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="mb-5 rounded p-3 bg-green-400 text-black text-bold w-full">
        <p class="mb-2">{{ session('success') }}</p>
    </div>
@endif

<form class="text-gray-700 body-font py-24 px-24 bg-teal-200 rounded md:mt-20"
    action="{{ route('category.store') }}" method="POST">
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
                    placeholder="Category Name" type="text" name="name" required>
            </div>
            <div class="md:mr-5">
                <button
                    class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg w-full">Create
                    category</button>
            </div>

        </div>
    </div>

    <p class="text-xs text-gray-500 mt-3">etdnsdgearydfxbc.</p>


</form>
@endsection
