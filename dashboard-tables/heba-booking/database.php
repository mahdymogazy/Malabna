<?php
$dsn = "mysql:host=localhost;dbname=project";
$user_name = "root";
$password = "";
try {
    $db = new PDO($dsn, $user_name, $password);
} catch (PDOException $e) {
    echo "connection error: " . $e->getMessage();
}

function myQuery(string $sql, ...$values)
{
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->execute($values);
    return $stmt;
}

function close_conn($stmt)
{
    global $db;
    $db = null;
    $stmt = null;
}
session_start();

$_SESSION["user"] =["id"=>1,"name"=>"Ali","email"=>"hgamal93@gmail.com"];