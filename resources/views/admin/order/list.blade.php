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
                           <div><a href="{{route('home')}}" class="btn btn-primary">Панель управления</a></div>
                        <div>Список заказов</div>

                        <table class="table table-bordered">
                            <tr>
                                <th>Имя заказчика</th>
                                <th>Идентификатор пользователя</th>
                                <th>Товары в заказе</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->user_name}}</td>
                                    <td>{{$order->user_id}}</td>
                                    <td>{{$order->products}}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
