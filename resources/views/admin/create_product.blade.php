@extends('admin.layouts.shopLayout')


@section('title')
    Управление товарами
@endsection


@section('main_content')

    @if (strpos($_SERVER['REQUEST_URI'], 'edit'))
        <h2>Редактирование товара</h2>
    @else
        <h2>Создание товара</h2>
    @endif
{{--    {!! $messageTmpl !!}--}}
{{--    {{Session::get('status')}}--}}
    <div class="row">
        <div class="col-4">
            <form method="post"
                  action="{{ $edit ? route('product.edit', [$edit]) : route('product.add')}}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input type="text" class="form-control" name="form-product[form-name]"
                           value="{{ $edit ? $foundProduct->product_name : '' }}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Изображение</label>
                    <input class="form-control" name="form-product[form-image]" type="file"/>
                    @if ($edit)
                        <img src="{{$foundProduct->getImageUrl()}}" height="50">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Отключить\Включить</label>
                    <select type="select" name="form-product[form-status]" class="form-control">
                        @if($edit && $foundProduct->product_status)
                            <option value="1" selected>Включить</option>
                            <option value="0">Выключить</option>
                        @elseif($edit && !$foundProduct->product_status)
                            <option value="1">Включить</option>
                            <option value="0" selected>Выключить</option>
                        @else
                            <option value="1" selected>Включить</option>
                            <option value="0">Выключить</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <select type="select" name="form-product[form-parent]" class="form-control">
                        @foreach($categoryList as $oneCategory)
                            <option value="{{$oneCategory->id}}">{{$oneCategory->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Цена</label>
                    <input type="" class="form-control" name="form-product[form-price]" required="required"
                           value="{{$foundProduct->product_price?? ""}}"/>
                </div>

                <a class="btn btn-secondary" href="{{route('product.list')}}">&laquo; Вернуться</a>
                <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>

@endsection
