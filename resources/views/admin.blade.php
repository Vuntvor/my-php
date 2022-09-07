@extends('admin.layouts.shopLayout')


@section('title')
    Панель администрирования
@endsection


@section('main_content')

    <a href="/admin/category" class="btn btn-primary">Редактирование Категорий</a>
    <a href="{{route('product.list')}}" class="btn btn-primary">Редактирование Товаров</a>

@endsection
