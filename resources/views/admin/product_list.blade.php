@extends('admin.layouts.shopLayout')


@section('title')
    Управление товарами
@endsection


@section('main_content')

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Изображение</th>
            <th>Статус</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Создана</th>
            <th>Изменена</th>
        </tr>
        @foreach($productList as $oneProduct)
            @dd($oneProduct->parentCategory)
            <tr>
                <td>{{$oneProduct->id}}</td>
                <td>{{$oneProduct->product_name}}</td>
                <td>
{{--                    <img src="{{$oneProduct->getImageUrl()}}" height="50">--}}
                </td>
                <td>{{$oneProduct->product_status == 1 ? 'ON' : 'OFF'}}</td>
                <td>
                    {{$oneProduct->product_category}}
                </td>
                <td>{{$oneProduct->product_price}}</td>
                <td>{{$oneProduct->created_at}}</td>
                <td>{{$oneProduct->updated_at}}</td>
                <td>
                    <a href="{{route('product.edit', ['product_id'=>$oneProduct->id])}}" class="btn btn-primary">Редактировать</a>
                    <a href="{{route('product.delete', ['product_id'=>$oneProduct->id])}}" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>



    <a href="{{route('product.create')}}" class="btn btn-primary">Добавить товар</a>
@endsection
