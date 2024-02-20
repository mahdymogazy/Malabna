<?php
include_once("database.php");
function getAll():array{
    $mysql="select * from owners";
    $result=myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}
function getAllPlaygrounds():array{
    $mysql="select * from playgrounds ";
    $result=myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}

function getItemById($id): array {
    $mysql="select * from owners where id=?";
    $result=myQuery($mysql,$id)->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function addInDB($data){
    $mysql="insert into owners (name,email) values(?,?)";
    myQuery($mysql,$data['name'],$data['email']);
}

function getPlaygrondsByCity($data){
    $values=$_GET['city'];
    $mysql="select * from playgrounds where location_address = ?";
    $result= myQuery($mysql,$data)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlaygroundImages():array{
    $mysql="SELECT * FROM playgrounds p
          INNER JOIN playground_images pi ON p.id = pi.playground_id";
    $result= myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function detailsById(){
    $mysql="select name from playgrounds INNER JOIN playground_images
            where id=playground_id";
            $result= myQuery($mysql)->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delete($id){
    $mysql="delete from owners where id=?";
    myQuery($mysql,$id);
    header("Location:owners.php");
}

// function getServices($data):array{
//     $mysql="SELECT
//     p.id AS playground_id,
//     p.name AS playground_name,
//     s.id AS service_id,
//     s.name AS service_name
// FROM
//     playgrounds p
// JOIN
//     playground_services ps ON p.id = ps.playground_id
// JOIN
//     services s ON ps.service_id = s.id;";
    
//     $result= myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }

// function getServices($data):array{
//     $sql="SELECT s.name, s.icon
//             FROM services s
//             INNER JOIN playground_services ps ON s.id = ps.service_id
//             WHERE ps.playground_id = ?";
//     // $result= myQuery($mysql,$data)->fetchAll(PDO::FETCH_ASSOC);
//     // return $result;     
//     $stmt = myQuery($sql, [$data]); // Assuming myQuery is a custom function for executing a prepared statement
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;   
// }
?>