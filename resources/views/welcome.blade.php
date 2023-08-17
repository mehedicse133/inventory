@extends('layouts.app')

@section('content')
    <div class="container">
        <hr>
        <a href="{{ route('brand.create') }}">Brand</a>
        <a href="{{ route('model.create') }}">Model</a>
        <a href="{{ route('item.create') }}">Item</a>
        <hr>
    </div>
@endsection


       