<?php

if (!function_exists('dd')) {
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }
}

function getDBConnection()
{
    $servername = "mysql";
    $port = "3306";
    $database = "my_php";
    $username = "sail";
    $password = "password";
    $charset = "utf8mb4";

    $connection = mysqli_connect($servername, $username, $password, $database, $port);
    return $connection;

//    try {
//        $dsn = "mysql:host=$servername;port=$port:dbname=$database;charset=$charset";
//        $pdo = new PDO($dsn, $username, $password);
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $pdo;
//
//
//    } catch (PDOException $e) {
//        echo "Connection failed: " . $e->getMessage();
//    }
}

function renderTemplate($templatePath, $templateArgs)//
{
    ob_start();
    include($templatePath);
    return ob_get_clean();
}
