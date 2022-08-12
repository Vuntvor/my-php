<?php

# ФАЙЛ ДЛЯ ПРИМЕРА ТОГО НЕТ ОГРАНИЧЕНИЙ НА КОЛ_ВО КЛАССОВ В ОДНОМ ФАЙЛЕ. И НАЗВАНИЕ МОГУТ БЫТЬ ЛЮБЫЕ

namespace SmallApp\MyControllers\Note;

class Controller
{
    public function myCustomNoteList()
    {
        return '<html><head><title>Контроллер заметок</title></head><body>'.__METHOD__.'</body></html>';
    }
}

function SmallApp_MyControllers_Note_myCustomFunction($string) {
    return '<em>'.$string.'</em>';
}

namespace SmallApp\MyController\NoteCategory;

class Controller
{
    public function myCustomNoteList()
    {
        return '<html><head><title>Контроллер заметок</title></head><body>'.__METHOD__.'</body></html>';
    }

}

function myCustomFunction($string) {
    echo '<u>'.$string.'</u>';
}
