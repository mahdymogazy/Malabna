<?php
// open connection with database/////
$dsn="mysql:host=localhost;dbname=project";
$username="root";
$password="";
/////try to create an object of the pdo class//if the connection fails echo another message
 try{
    $db= new PDO($dsn,$username,$password);
    // echo "ok";
 }catch(PDOException $e){
    echo"connection error:".$e->getMessage();
 }
 function myQuery($mysql,...$values){
    global $db;
    $statement=$db->prepare($mysql);
    $statement->execute($values);
    return $statement;
}
function close_connection($statement){
global $db;
$db=null;
$statement=null;
}




?>