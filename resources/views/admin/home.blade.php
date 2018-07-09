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

                    <div class="card-header">
                        <form action="{{route('emailUpdate',['id' => Auth::user()->id])}}" method="post">
                            {{csrf_field()}}
                        <label for="email" class="col-sm-5 col-form-label text-md-right">{{ __('Ваш E-Mail') }}</label>
                        <input type="text" placeholder="{{ Auth::user()->email }}" name="email">
                        <label for="">
                            <button type="submit">Изменить</button>
                        </label>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
