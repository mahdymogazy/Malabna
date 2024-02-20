<?php
// create pdo layer
// dsn-->dbms:host,database_name
$dsn="mysql:host=localhost;dbname=project";
$user_name="root";
$password="";
try{
    // open connection
    $db=new PDO($dsn,$user_name,$password);
}catch( PDOException $e){
echo "connection error:".$e->getMessage();
}
function myQuary($sql,...$values){
    global $db;
    $stmt=$db->prepare($sql);
    $stmt->execute($values);
    return $stmt;
}
//close
function close_conn($stmt){
    global $db;
    $db=null;$stmt=null;
}

?>