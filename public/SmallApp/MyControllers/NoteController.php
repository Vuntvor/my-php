<?php

namespace SmallApp\MyControllers;


use SmallApp\MyModels\Note;


class NoteController
{
    public function listAction($request)
    {
        if (!$request) {
            $reqRes = '*';
        } else {
            $reqRes = $request['form-select']['form-select-title'];
        }
        $mysqlConnection = getDBConnection();
        $notesList = $mysqlConnection->query("SELECT $reqRes, content FROM node")->fetch_all(MYSQLI_ASSOC); // WHERE content LIKE '%''%'

        return renderTemplate(
            './SmallApp/MyViews/template.php',
            ['notesList' => $notesList]
        );

//        return '<html><head><title>Контроллер заметок</title></head><body><br>'.dd($result = $request['form-select']['form-select-title']).'<br>'.dd($result).'</body></html>';
    }

    public function addList()
    {
        return renderTemplate('./SmallApp/MyViews/addTemplate.php',
            ['']
        );
    }

    public function addAction($request)
    {
        $data = $_POST['form-note'];
//        if (!$data) {
//            $data = [
//                'title' => $date[],
//                'content' => 'Lorem Ipsum is simply dummy text',
//                'created_at' => date('Y-m-d'),
//                'updated_at' => date('Y-m-d'),
//            ];
//        }
//        return '<html><head><title>Контроллер заметок</title></head><body><br>' . dd($data) . '<br></body></html>';
        try {
            $mysqlConnection = getDBConnection();
//            $selectResult = $mysqlConnection->query('SELECT * FROM notes');
            $mysqlConnection->query("INSERT INTO node VALUES (null, '" . $data['form-title'] . "', '" . $data['form-content'] . "', '" . date('Y-m-d') . "', '" . date('Y-m-d') . "')");

//            $selectResult2 = $mysqlConnection->query('SELECT * FROM notes');

//            $selectResult3 = $mysqlConnection->query('SELECT LAST_INSERT_ID();');
        } catch (\mysqli_sql_exception $e) {
            throw $e;
        }

        return redirect('/note');


    }
}

