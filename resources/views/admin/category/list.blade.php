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
                        <div>Список категории</div>
                        <a href="{{route('product.create')}}" class="btn btn-primary">Добавить новую категорию</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>Наименование категории</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Редактирование</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status}}</td>
                                    <td>
                                        <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn-default">Изменить
                                            категорию</a>
                                        <br>
                                        <a href="{{route('category.delete', ['id' => $category->id])}}"
                                           class="btn-danger">Удалить категорию</a>
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
