@extends('layouts.app')

@section('content')
{{ $product->name }}
@if ($product->image)
<img src={{asset('storage/images/'.$product->image)}}>
@endif

@endsection
