@extends('admin.layouts.shopLayout')


@section('title')
    Управление категориями
@endsection


@section('main_content')
    @if ($resultMessage)
        @if ($resultMessage['status'] === 'ok')
            <div class="alert alert-success" role="alert">
                {{ $resultMessage['message'] }}
            </div>
        @elseif ($resultMessage['status'] === 'error')
            <div class="alert alert-danger" role="alert">
                {{ $resultMessage['message'] }}
            </div>
        @endif
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Изображение</th>
            <th>Статус</th>
            <th>Родительская категория</th>
            <th>Рейтинг</th>
            <th>Создана</th>
            <th>Изменена</th>
        </tr>
        {{--        @foreach($categoryList as $oneCategory)--}}
        {{--        @dd($oneCategory);--}}
        {{--        @endforeach--}}
        @foreach($categoryList as $oneCategory)
            <tr>
                <td>{{$oneCategory->id}}</td>
                <td>{{$oneCategory->category_name}}</td>
                <td>
                    <img src="{{$oneCategory->getImageUrl()}}" height="50">
                </td>
                <td>{{$oneCategory->category_status == 1 ? 'ON' : 'OFF'}}</td>
                <td>
                    @if ($oneCategory->parentCategory)
                        {{$oneCategory->parentCategory->category_name}}
                    @endif
                </td>
                <td>{{$oneCategory->category_rating}}</td>
                <td>{{$oneCategory->created_at}}</td>
                <td>{{$oneCategory->updated_at}}</td>
                <td>
                    <a href="/admin/category/category_management/edit/{{ $oneCategory->id }}" class="btn btn-primary">Редактировать</a>
                    <a href="/admin/category/category_management/delete/{{ $oneCategory->id }}" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>



    <a href="/admin/category/category_management" class="btn btn-primary">Добавить категорию</a>
@endsection
