<?php
    $dsn = 'mysql:host=localhost:3307;dbname=cellar';
    $username = 'root';
    $password = 'admin';

    try{
        $db = new PDO($dsn, $username, $password);
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }
?>