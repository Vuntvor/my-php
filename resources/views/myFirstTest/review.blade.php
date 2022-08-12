@extends('myFirstTest.layout')

@section('title')
    Отзывы
@endsection

@section('main_content')
    <br method="post" action="/review/check">
    <input type="email" name="email" id="email" placeholder="Введите вашу электронную почту" class="form-control"></br>
    <input type="text" name="subject" id="subject" placeholder="Введите ваш отзыв" class="form-control"></br>
    <textarea name="message" id="message" class="form-control" placeholder="Введите ваш отзыв."></textarea></br>
    <button rype="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection
