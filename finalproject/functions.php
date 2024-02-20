<?php
include_once("database.php");

// playground functions
function getMax(){
    $mysql = "SELECT COUNT(*) AS max FROM playgrounds";
    $max = myQuery($mysql)->fetch(PDO::FETCH_ASSOC)["max"] / 3;
    return $max;
}

function getAllPlaygrounds($page): array {
    $mysql = "SELECT COUNT(*) AS max FROM playgrounds";
    $max = myQuery($mysql)->fetch(PDO::FETCH_ASSOC)["max"] / 3;
    
    if ($page >= $max) {
        return getAllPlaygrounds($page - 1); // Return the result of the recursive call
    } else {
        $page = $page * 3;
        $mysql = "SELECT * FROM playgrounds LIMIT $page, 3";
        $result = myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

function getPlaygrondsByCity($data){
    $values=$_GET['city'];
    $mysql="select * from playgrounds where location_address = ?";
    $result= myQuery($mysql,$data)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// details functions
function getPlaygrounds(): array {
    $mysql = "select * from playgrounds";
    $result = myQuery($mysql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getPlayground($id): array {
    $mysql = "select * from playgrounds where id=?";
    $result = myQuery($mysql,$id)->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getServices($id):array{
    $mysql="select services.name ,services.icon from services inner join playground_services 
    on services.id = playground_services.service_id
    where playground_id=?";
    $result= myQuery($mysql,$id)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlaygroundImages($id):array{
    $mysql= "select * from playground_images 
    where playground_id =?";
    $result= myQuery($mysql,$id)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }




function getAll(): array
{
//    $row=$row*7;
    $sql = "SELECT
    booking.id as id,
    booking.date as date,
    booking.hours as hours,
    playgrounds.name as playground,
    users.name as user,
    booking.total_price as total_price
    FROM
    booking
    LEFT JOIN
    playgrounds ON booking.playground_id = playgrounds.id
    LEFT JOIN
    users ON booking.user_id = users.id ";
    $result = myQuery($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
    
function store($data)
{
    print_r($_POST);
   $sql = "INSERT INTO booking (date, playground_id, user_id) VALUES (?, ?, ?)";
   myQuery($sql, $data['selectedDate'], $data['playground_id'], 5);////////session
//    ///////////////////
   $sql = "update available_dates set is_avilable=0 where playground_id=? and date =?";
   myQuery($sql, $data['playground_id'], $data['selectedDate']);
}

function getAllPlayground()
{
    $sql = "SELECT * FROM playgrounds";
    $data = myQuery($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getAllUser()
{
    $sql = "SELECT * FROM users";
    $data = myQuery($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
?>