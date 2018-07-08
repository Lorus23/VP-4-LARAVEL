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
                        <div><a href="{{route('product.adminProductList')}}" class="btn-default">Управление товарами</a>
                        </div>
                        <div><a href="{{route('product.adminCategoryList')}}" class="btn-default">Управление
                                категориями</a></div>
                        <hr>
                        <div><a href="{{route('orderList')}}" class="btn-default">Просмотр заказов</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
