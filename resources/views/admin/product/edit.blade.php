@extends('admin.layouts.app')
@section('content')
    <form action="{{route('product.update',['id' => $product->id])}}" method="post">
        {{csrf_field()}}
        <label>
            <input type="text" value="{{$product->name}}" name="name">
        </label>
        <label>
            <input type="text" value="{{$product->category_id}}" name="category_id">
        </label>
        <label>
            <input type="text" value="{{$product->price}}" name="price">
        </label>
        <label>
            <input type="text" value="{{$product->description}}" name="description">
        </label>
        <label>
            <input type="text" value="{{$product->status}}" name="status">
        </label>
        <label for="">
            <button type="submit">Сохранить</button>
        </label>
    </form>
@endsection
