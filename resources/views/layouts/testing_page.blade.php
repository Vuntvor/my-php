@extends('/layouts/base')

@section('MainContent')

    <select type="select" name="form-select[form-select-title]" class="form-control">

        <option value="id" style="color: darkred" selected>ID</option>
        <option value="title" style="color: blue">Title</option>
        <option value="created_at" style="color: green">Created at</option>

    </select>

@endsection
