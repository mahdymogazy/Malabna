<?php
include_once('database.php');
function getId(){
    $sql="select id from playgrounds";
    return $id;
}
// 1/11 to 30/11 days from 16 to 23
for ($i=1; $i<31 ; $i++) {
    for ($j=16; $j<24 ; $j++) { 
        $sql="insert into available_dates(date, playground_id) values (?, ?)";
    myQuery($sql,"2023-11-$i $j:00:00",5);
    }
}


// include_once('database.php');

// // بدء التاريخ من 2023-11-01 والانتهاء في 2023-11-30
// $start_date = '2023-11-01';
// $end_date = '2023-11-30';

// // قم بتكرار الاستعلام لجميع المدن بين 1 و 20 وتاريخ البداية والنهاية المعطاة
// for ($id = 1; $id <= 20; $id++) {
//     // استعلام SQL الذي سيتم تنفيذه مرة واحدة بدلاً من فور لوب متداخلة
//     $sql = "INSERT INTO available_dates (date, playground_id) VALUES ";
//     $values = [];

//     // بناء القيم التي ستتم إضافتها في الاستعلام
//     for ($i = $start_date; $i <= $end_date; $i++) {
//         for ($j = 16; $j < 24; $j++) {
//             $values[] = "('$i $j:00:00', $id)";
//         }
//     }

    // // دمج القيم في الاستعلام الرئيسي
    // $sql .= implode(", ", $values);

    // // تنفيذ الاستعلام الكامل
    // myQuery($sql);
?>

