@extends('admin.layouts.app')
@section('content')
    <form action="{{route('category.update',['id' => $category->id])}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$category->id}}">
        <label>
            <input type="text" value="{{$category->name}}" name="name">
        </label>
        <label>
            <input type="text" value="{{$category->description}}" name="description">
        </label>
        <label>
            <input type="text" value="{{$category->status}}" name="status">
        </label>
        <label for="">
            <button type="submit">Сохранить</button>
        </label>
    </form>
@endsection
