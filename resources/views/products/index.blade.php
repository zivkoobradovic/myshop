@extends('layouts.app')

@foreach ($products as $product)
    {{ $product->name }}
@endforeach