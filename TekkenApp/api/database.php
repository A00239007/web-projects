<?php
    $dsn = 'mysql:host=localhost:3306;dbname=tekken';
    $username = 'root';
    $password = 'admin';

    try{
        $db = new PDO($dsn, $username, $password);
        echo "You have sucessfully connected to the database";
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }
?>