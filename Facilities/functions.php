<?php
include_once("database.php");
function store($data,$files){
     //$ext=pathinfo($files['image']['name'],PATHINFO_EXTENSION);
     //$img=md5(microtime()).".".$ext;
    $img=pathinfo($files['image']['name']);
    $sql="insert into services(name,icon) values(?,?)";
    myQuary($sql,$data['name'],$img);
    move_uploaded_file($files["image"]["tmp_name"],"icons/$img");
    }
function getAll():Array{
    
     $sql="select * from services";   
    $result=myQuary($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function deleteById(int $id){
    $id=$_GET['id'];
    $sql="delete from services where id=?";
    $result=myQuary($sql,$id)->fetchAll(PDO::FETCH_ASSOC);
    header("location:facility.php");
}