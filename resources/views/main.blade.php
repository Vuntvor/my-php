@extends('admin.layouts.shopLayout')


@section('title')
    Главная страница
@endsection


@section('main_content')

    <div
        class="dropdown-menu dropdown-menu-dark d-block position-static border-0 pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
        <form class="p-2 mb-2 bg-dark border-bottom border-dark">
            <input type="search" class="form-control form-control-dark" autocomplete="false"
                   placeholder="Type to filter...">
        </form>
        <ul class="list-unstyled mb-0">
            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-success rounded-circle p-1"></span>
                    Action
                </a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-primary rounded-circle p-1"></span>
                    Another action
                </a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-danger rounded-circle p-1"></span>
                    Something else here
                </a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                    <span class="d-inline-block bg-info rounded-circle p-1"></span>
                    Separated link
                </a></li>
        </ul>
    </div>

@endsection
