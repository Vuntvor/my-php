@extends('myFirstTest.layout')

@section('title')
    О нас
@endsection

@section('main_content')
    <div class="jumbotron bg-warning">
        <h1>Мудрый мастер Капар и юнный падаван Вунт начали свое путешествие в новый мир познаний и развлечений!</h1>
        <p class="lead text-bg-info">История про нас.</p>
        <a class="btn btn-lg btn-danger" href="/review" role="button">Отзывы </a>
    </div>
@endsection
