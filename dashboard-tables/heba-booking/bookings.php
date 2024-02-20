<?php
include_once("database.php");

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
   myQuery($sql, $data['selectedDate'], $data['playground_id'], 1);
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
