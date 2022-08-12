<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $templateArgs['title'] ?? '' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
</head>
<body>
<h2>Создание заметки</h2>
<div class="row">
    <div class="col-4">
        <form method="post"> <!--action='/node/add'-->
            <!--            @csrf-->
            <div class="mb-3">
                <label class="form-label">Заголовок</label>
                <input type="text" class="form-control" name="form-note[form-title]" value=""/>
            </div>

            <div class="mb-3">
                <label class="form-label">Содержимое</label>
                <textarea name="form-note[form-content]" class="form-control"></textarea>
            </div>

            <a class="btn btn-secondary" href="/note">&laquo; Вернуться</a>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
</div>
</body>
</html>
