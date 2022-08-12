@extends('layouts/base')

@section('MainContent')

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Category name</th>
            <th>Category priority</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
        @foreach($all_category as $one_category)
            <tr>
                <td>{{$one_category->id}}</td>
                <td>{{$one_category->category}}</td>
                <td>{{$one_category->priority}}</td>
                <td>{{$one_category->created_at}}</td>
                <td>{{$one_category->updated_at}}</td>
                <td>
                    <a class="btn btn-primary" href="/category/edit/{{ $one_category->id }}">Редактировать</a>
                    <a class="btn btn-danger" href="/category/delete/{{ $one_category->id }}">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="/category/add">Создать категорию</a>
    <a class="btn btn-success" href="/node">&laquo;Вернутся</a>
@endsection


