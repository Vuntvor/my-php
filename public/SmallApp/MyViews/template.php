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
<form>
    <div class="container pt-4">
        <select type="select" name="form-select[form-select-title]" class="form-control">

            <option value="id" selected>ID</option>
            <option value="title">Title</option>
            <option value="created_at">Created at</option>
        </select>
        <input class="btn btn-success" type="submit" value="Отправить"/>
</form>
<!--        --><?php //dd("form-select[form-select-title]") ?>
<div class="border border-primary px-4 pt-4 pb-4">
    <?php if ($templateArgs['notesList']): ?>
        <table class="table">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>content</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            <?php foreach ($templateArgs['notesList'] as $noteElement): ?>
                <tr>
                    <td><?= $noteElement['id'] ?? '' ?></td>
                    <td><?= $noteElement['title'] ?? '' ?></td>
                    <td><?= $noteElement['content'] ?? '' ?></td>
                    <td><?= $noteElement['created_at'] ?? '' ?></td>
                    <td><?= $noteElement['updated_at'] ?? '' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <a class="btn btn-primary" href="/note/add">Создать заметку</a>
</div>
</div>
</body>
</html>
