@extends('layouts.app')

@section('content')
{{ $product->name }}
@if ($product->image)
<img class="object-contain h-48 w-full" src={{asset('storage/images/'.$product->image)}}>
@endif

@endsection
