<?php
include_once('database.php');
// 1/11 to 30/11 days from 16 to 22
for ($i=1; $i<31 ; $i++) {
    for ($j=16; $j<24 ; $j++) { 
    $sql="insert into available_dates(date, playground_id) values (?, ?)";
    myQuery($sql,"2023-11-$i $j:00:00",10);
    }
}

?>