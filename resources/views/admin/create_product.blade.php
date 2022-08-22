@extends('admin.layouts.shopLayout')


@section('title')
    Управление категориями
@endsection


@section('main_content')

{{--    @if (strpos($_SERVER['REQUEST_URI'], 'edit'))--}}
{{--        <h2>Редактирование категории</h2>--}}
{{--    @else--}}
{{--        <h2>Создание категории</h2>--}}
{{--    @endif--}}
    {!! $messageTmpl !!}
    {{--    {{Session::get('status')}}--}}
    <div class="row">
        <div class="col-4">
            <form method="post"
{{--                  action="{{ $edit ? route('category.edit', [$edit]) : route('category.add')}}"--}}
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Название категории</label>
                    <input type="text" class="form-control" name="form-category[form-name]"
                           value="{{ $edit ? $foundCategory->category_name : '' }}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Изображение категории</label>
                    <input class="form-control" name="form-category[form-image]" type="file"/>
                    @if ($edit)
                        <img src="{{$foundCategory->getImageUrl()}}" height="50">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Отключить\Включить категорию</label>
                    <select type="select" name="form-category[form-status]" class="form-control">
                        @if($edit && $foundCategory->category_status)
                            <option value="1" selected>Включить</option>
                            <option value="0">Выключить</option>
                        @elseif($edit && !$foundCategory->category_status)
                            <option value="1">Включить</option>
                            <option value="0" selected>Выключить</option>
                        @else
                            <option value="1" selected>Включить</option>
                            <option value="0">Выключить</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Родительская категория</label>
                    <select type="select" name="form-category[form-parent]" class="form-control">
                        @foreach($categoryList as $oneCategory)
                            <option value="{{$oneCategory->id}}">{{$oneCategory->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Рейтинг категории</label>
                    <input type="number" class="form-control" name="form-category[form-rating]"
                           value="{{$foundCategory->category_rating?? ""}}"/>
                </div>

                <a class="btn btn-secondary" href="{{route('category.list')}}">&laquo; Вернуться</a>
                <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>

@endsection
