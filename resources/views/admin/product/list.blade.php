@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Панель управления администратора</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>Список товаров</div>
                        <a href="{{route('product.create')}}" class="btn btn-primary">Добавить новый товар</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>Наименование товара</th>
                                <th>Категория</th>
                                <th>Цена</th>
                                <th>Картинка</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Редактирование</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->image}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn-default">Изменить
                                            товар</a>
                                        <br>
                                        <a href="{{route('product.delete', ['id' => $product->id])}}"
                                           class="btn-danger">Удалить товар</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
