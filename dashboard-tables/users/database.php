
<?php
// open connection with database
$dsn="mysql:host=localhost;dbname=project";
$username="root";
$password="";
 try{
    $db= new PDO($dsn,$username,$password);
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