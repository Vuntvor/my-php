@extends('layouts/base')

@section('MainContent')
    <a class="btn btn-warning" href="/category">Список категорий</a>
    <a class="btn btn-success" href="/node">Таблица записей</a>
    <form>
        <label>Искать по тексту:</label>
        <input type="text" class="form-control" name="filter-by-text" value="{{ $filterByText }}"/>

        <label>Искать по названию:</label>
        <input type="text" class="form-control" name="filter-by-title" value="{{ $filter_by_title }}"/>

        <label>Сортировать по: </label>
        <select type="select" name="form-select[form-select-title]" class="form-control">

            <option value="id" style="color: darkred" selected>ID</option>
            <option value="title" style="color: blue">Title</option>
            <option value="created_at" style="color: green">Created at</option>

        </select>
        {{--        <input type="text" class="form-control" name="filter-by-title" value="{{ $filter_by_title }}"/>--}}

        <label>Фильтр: </label>
        <input type="text" class="form-control" name="filter-by-title" value="{{ $filter_by_title }}"/>

        <button class="btn btn-secondary">Искать</button>
        <a class="btn btn-secondary" href="/node">Сбросить</a>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Content</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
        @foreach($allNodes as $oneNode)
            <tr>
                <td>{{$oneNode->id}}</td>
                <td>{{$oneNode->title}}</td>
                <td>{{$oneNode->category}}</td>
                <td>{{$oneNode->content}}</td>
                <td>{{$oneNode->created_at}}</td>
                <td>{{$oneNode->updated_at}}</td>
                <td>
                    <a href="/node/edit/{{ $oneNode->id }}" class="btn btn-primary">Редактировать</a>
                    <a href="/node/delete/{{ $oneNode->id }}" class="btn btn-danger">Удалить</a>
                </td>
            </tr>

        @endforeach
    </table>

    <a class="btn btn-success" href="/node/add">Создать заметку</a>
@endsection
