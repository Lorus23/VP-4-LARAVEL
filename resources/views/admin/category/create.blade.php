@extends('admin.layouts.app')
@section('content')
    <form action="{{route('product.store')}}" method="post">
        {{csrf_field()}}
        <label>
            <input type="text" placeholder="Название" name="name">
        </label>
        <label>
            <input type="text" placeholder="Категория" name="category_id">
        </label>
        <label>
            <input type="text" placeholder="Цена" name="price">
        </label>
        <label>
            <input type="text" placeholder="Описание" name="description">
        </label>
        <label>
            <input type="text" placeholder="статус" name="status">
        </label>
        <label for="">
            <input type="submit">
        </label>
    </form>
@endsection

