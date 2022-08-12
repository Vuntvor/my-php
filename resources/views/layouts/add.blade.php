@extends('/layouts/base')

@section('MainContent')
    <h2>Создание заметки</h2>
    <div class="row">
        <div class="col-4">
            <form method="post" action="{{ $node ? '/node/edit/'.$node->id : '/node/add' }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input type="text" class="form-control" name="form-node[form-title]" value="{{ $oneNode->title ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <input class="form-control" name="form-node[form-category]" value="{{ $oneNode->сategory ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Содержимое</label>
                    <textarea name="form-node[form-content]" class="form-control">{{ $oneNode->content ?? '' }}</textarea>
                </div>

                <a class="btn btn-secondary" href="/node">&laquo; Вернуться</a>
                <button class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
