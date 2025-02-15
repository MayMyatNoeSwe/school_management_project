<?php

$host = 'localhost';
$dbname = 'school_management';
$user = 'root';
$password = '742001';

$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if ($pdo) {
    //     echo "ok";
    // }
} catch (PDOException $e) {
    echo $e->getMessage();
}