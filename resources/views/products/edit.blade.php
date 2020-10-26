@extends('layouts.admin')

@section('content')
<form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
    @method('PATCH')
    @csrf
    {{ $product->name }}
</form>

@endsection
