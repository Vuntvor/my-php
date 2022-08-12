<?php

// SOME SYSTEM SETTINGS START
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

include('./SmallApp/MyFunctions/HelperFunctions.php');

spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});


// SOME SYSTEM SETTINGS FINISH
//$_SERVER['REQUEST_METHOD'] = 'POST';
if ($_SERVER['PATH_INFO'] === '/note' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $noteController = new \SmallApp\MyControllers\NoteController();
    $result = $noteController->listAction($_REQUEST);
} elseif ($_SERVER['PATH_INFO'] === '/note/add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $noteController = new \SmallApp\MyControllers\NoteController();
    $result = $noteController->addList();
//    $result = '<html><head><title>Создание заметки</title></head><body>Здесь будет форма по созданию заметки</body></html>';
} elseif ($_SERVER['PATH_INFO'] === '/note/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteController = new \SmallApp\MyControllers\NoteController();
    $result = $noteController->addAction($_REQUEST);
}
//elseif ($_SERVER['PATH_INFO'] === '/note/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
//    $result = 'SOME FORM PROCESSING AND REDIRECT USER TO /note PAGE';
//}
else {
    echo '<pre>';

    var_export($GLOBALS);
    var_export($_COOKIE);

    echo '</pre>';

    exit;
}

if (isset($result)) {
    echo $result;
}
