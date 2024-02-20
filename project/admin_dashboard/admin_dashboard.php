<?php
include_once("../database.php");
// function getall_admin():array{
//     session_start();
//     $sql="select playgrounds.id as id, playgrounds.name as name, playgrounds.location_city as location_city,
//         playgrounds.location_address as location_address,playgrounds.price_per_hour as price_per_hour,
//         playgrounds.cover_image as cover_image,playgrounds.capacity as capacity,owners.name as owner from 
//         playgrounds left join owners on playgrounds.owner_id=owners.id where playgrounds.owner_id=?";
//         $result=myQuary($sql,$_SESSION["owner"]["id"])->fetchAll(PDO::FETCH_ASSOC);
//         return $result; 
//         // 
// }

function getall_admin():array{
    $sql="select playgrounds.id as id, playgrounds.name as name, playgrounds.location_city as location_city,
        playgrounds.location_address as location_address,playgrounds.price_per_hour as price_per_hour,
        playgrounds.cover_image as cover_image,playgrounds.capacity as capacity,owners.name as owner from 
        playgrounds left join owners on playgrounds.owner_id=owners.id";
        $result=myQuary($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;    
}


// function admin_store($data,$files){
//     global $db;
    
//     $ext=pathinfo($files['stadium_image_cover']['name'],PATHINFO_EXTENSION);
//     $img=md5(microtime()).".".$ext;
//    $sql="insert into playgrounds (owner_id,name,location_city,location_address,price_per_hour,capacity,cover_image) values (?,?,?,?,?,?,?)";
//    $stmt=$db->prepare($sql);
//    $stmt->execute([$data['owner'],$data['stadium_name'],$data['stadium_city'],$data['stadium_address'],$data['stadium_price'],$data['stadium_capacity'],$img]);
//    move_uploaded_file($files["stadium_image_cover"]["tmp_name"],"../imgs/$img");

//    global $db;
//     $id= $db->lastInsertId();
    
//     for($i=0;$i<count($files["stadium_images"]['name']);$i++){
//         $sql="insert into playground_images(image,playground_id) values(?,?)";
//        $img_name=$files["stadium_images"]['name'][$i];
//        $ext=pathinfo($img_name,PATHINFO_EXTENSION);
//         $img=md5(microtime()).".".$ext;
//         move_uploaded_file($files["stadium_images"]["tmp_name"][$i],"../imgs/$img");
//         $stmt=$db->prepare($sql);  
//         $stmt->execute([$img,$id]);
//     }
// }
function admin_store($data,$files){
    global $db;
    
    
   $img=$files['stadium_image_cover']['name'];

   $sql="insert into playgrounds (owner_id,name,location_city,location_address,price_per_hour,capacity,cover_image,text) values (?,?,?,?,?,?,?,?)";
   $stmt=$db->prepare($sql);
   $stmt->execute([$data['owner'],$data['stadium_name'],$data['stadium_city'],$data['stadium_address'],$data['stadium_price'],$data['stadium_capacity'],$img,$data['stadium_Textarea']]);
   move_uploaded_file($files["stadium_image_cover"]["tmp_name"],"../imgs/$img");

   global $db;
    $id= $db->lastInsertId();
    
    for($i=0;$i<count($files["stadium_images"]['name']);$i++){
        $sql="insert into playground_images(image,playground_id) values(?,?)";
       $img=$files["stadium_images"]['name'][$i];
      
        move_uploaded_file($files["stadium_images"]["tmp_name"][$i],"../imgs/$img");
        $stmt=$db->prepare($sql);  
        $stmt->execute([$img,$id]);
    }

    
    for ($i=1; $i<31 ; $i++) {
        for ($j=floatval($data["stadium_start"]); $j<floatval($data["stadium_end"]) ; $j++) { 
        $sql="insert into available_dates(date, playground_id) values (?, ?)";
        myQuary($sql,"2023-11-$i $j:00:00",$id);
}
}
  $services = getAll_services();
   foreach ($services as $service) {
      $sql="insert into playground_services(service_id,playground_id) values (?, ?)";
      $stmt=$db->prepare($sql); 
      if($data["stadium_service_". $service['id']]==$service['id'] ) 
      {
        $stmt->execute([$data["stadium_service_". $service['id']],$id]);
   }
}
}
function admin_getowners():array{
    $sql="select id,name from owners";
    $result=myQuary($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function admin_deleteById($id){
   
   
    
    $sql="delete from playgrounds where id=?";
    
    $result=myQuary($sql,$id)->fetchAll(PDO::FETCH_ASSOC);
    header("location:admin_index.php");
}

function admin_getallById($id){
    $sql="select * from playgrounds where id=?";
    $result=myQuary($sql,$id)->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function admin_update($data){
    $sql="update playgrounds set name=? ,location_city=? ,location_address=?,price_per_hour=?
           ,capacity=? where id=?";
    myQuary($sql,$data['stadium_name'],$data['stadium_city'],$data['stadium_address'],$data['stadium_price'],$data['stadium_capacity'],$data['id']);
    header("location:admin_index.php");       

}

function getAll_services():Array{
    
    $sql="select * from services";   
  
   $result=myQuary($sql)->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}

?>