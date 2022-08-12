@extends('/layouts/base')

@section('MainContent')
    <h2>Создание категории</h2>
    <div class="row">
        <div class="col-4">
            <form method="post" action="{{ $category ? '/category/edit/'.$category->id : '/category/add' }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <input type="text" class="form-control" name="form-category[form-category]"
                           value="{{ $one_category->category ?? '' }}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Приоритет</label>
                    <select type="select" name="form-category[form-priority]" class="form-control"
                            value="{{ $one_category->priority ?? '' }}">
                        <option value="1" style="color: darkred" selected>1</option>
                        <option value="2" style="color: blue">2</option>
                        <option value="3" style="color: green">3</option>
                    </select>
                </div>

                <a class="btn btn-secondary" href="/category">&laquo; Вернуться</a>
                <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
