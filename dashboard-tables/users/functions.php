
<?php

include_once("database.php");
// function getAll():array{
//     $mysql="select * from users";//
//     $result=myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
    
// }
function getAll():array{
    session_start();
    $sql="select playgrounds.id as id, playgrounds.name as name, playgrounds.location_city as location_city,
        playgrounds.location_address as location_address,playgrounds.price_per_hour as price_per_hour,
        playgrounds.cover_image as cover_image,playgrounds.capacity as capacity,owners.name as owner from 
        playgrounds left join owners on playgrounds.owner_id=owners.id where playgrounds.owner_id=?";
        $result=myQuery($sql,$_SESSION["owner"]["id"])->fetchAll(PDO::FETCH_ASSOC);
     
        return $result; 
        // 
}
function addInDB($data){
     $mysql="insert into users (name,email,password,pitch_name,time,status) values(?,?,?,?,?,?)";
    myQuery($mysql,$data['name'],$data['email'],$data['password'],$data['pitch_name'],$data['time'],$data['status']);
}
function getItemById($id): array {
    $mysql="select * from users where id=?";
    $result=myQuery($mysql,$id)->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function search($type): array {
    global $db;
    $mysql = "SELECT * FROM users WHERE name LIKE ? OR pitch_name = ?";
    $statement = $db->prepare($mysql);
    $statement->execute(['%' . $type . '%', $type]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function update($data){
    $mysql="update users set name=?,email=?,password=?,pitch_name=?, time=?, status=? where id=?";
    myQuery($mysql,$data['name'],$data['email'],$data['password'],$data['pitch_name'],$data['time'],$data['status'],$data['id']);
}
function delete($id){
    $mysql="delete from users where id=?";
    myQuery($mysql,$id);
    header("Location:index.php");
}
function SortByName($sort){
    global $db;
    if($sort=="up"){
        $mysql="select * from users order by name";
    }else{
        $mysql="select * from users order by name DESC";
    }
    $statement=$db->prepare($mysql);  
    $statement->execute();
    $result =$statement->fetchALL( PDO :: FETCH_ASSOC ); 
    return $result;
}
?>

