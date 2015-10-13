<?php
    $dsn = 'mysql:host=181.224.138.192;port=3306;dbname=johngeff_VacationSpots';
    $username = 'johngeff_cslab';
    $password = 'cslab';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }
?>