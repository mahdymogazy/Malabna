<?php
include_once("admin_dashboard.php");
session_start();
if(!empty($_GET)){
     $id=$_GET['id'];
     admin_deleteById($id);
}
$result=getall_admin();



?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css file/normalise.css">
    <link rel="stylesheet" href="../css file/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cssfile/playgrounddashboard.css.css">
    <title>playgrounddashboard</title>
</head>
<body>
<div class="h_headContainer">
        <div class="h_navi">
            <ul>
                <div class="brand-name">
                <img src="../imgs/logo.png" alt="ملعبنا" style=" width:150px; height:150px; align-items:center; margin:auto; " class="image">
                </div>
                <li>
                    <a href="./admin_index.php">
                        <span class="h_icon"><i class="fa-solid fa-house" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">  الرئيسية </span>
                    </a>
                </li>
                
                <!-- <li>
                <a href="../../dashboard-tables/users/admin_users.php">
                        <span class="h_icon"><i class="fa-solid fa-users" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> المستخدمين </span>
                    </a>
                </li> -->

                <li>
                    <a href="admin_add_form.php">
                        <span class="h_icon"><i class="fa-solid fa-plus" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> اضافة ملعب </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="edit_playground.php">
                        <span class="h_icon"><i class="fa-regular fa-pen-to-square" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> تعديل</span>
                    </a>
                </li> -->
                <li>
                <a href="../../Facilities/facility.php">
                    <span class="h_icon"><i class="fa-solid fa-handshake-angle" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title"> الخدمـات  </span>
                </a>
                <li>
                <a href="admin_booking.php">
                    <span class="h_icon"><i class="fa-solid fa-handshake-angle" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title">  المواعـيد المتاحـة  </span>
                </a>
            </li>
            <li>
                    <a href="../../index.php">
                        <span class="h_icon"><i class="fa-solid fa-backward" style="color: #b9bbb6;"></i></i></span>
                        <span class="h_Title"> عودة    </span>
                    </a>
                </li>
            </ul>
        </div>
</div>
<div class="containerowner">
        <div>
        
            <table class="table table-striped table-green"  style="width: 1300px;">
                <thead>
                <tr>
                <th>خيارات</th>
                <th> صاحب الملعب </th>
                <th> مساحة الملعب </th>  
                <th> صورة</th>
                <th> السعـر</th> 
                <th> العنوان</th>
                <th> المدينة</th>
                <th> اسـم الملعب</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($result as $item){
                        echo "<tr>";
                        echo "<td><a href='?id=$item[id]' class='btn btn-danger'>حذف</a>
                        <a href='edit_playground.php?id=$item[id]' class='btn btn-success'>تعديل</a></td>";
                        echo "<td>$item[owner]</td>";
                        echo "<td>$item[capacity]</td>";
                        echo "<td><img src='../imgs/$item[cover_image]' style='width:150px;'></td>";
                        echo "<td>$item[price_per_hour]</td>";
                        echo "<td>$item[location_address]</td>";
                        echo "<td>$item[location_city]</td>";
                        echo "<td>$item[name]</td>";
                        echo "</tr>";
                    }
                
                    ?>
                </tbody>
            </table>
        </div>

</div> 
</body>
</html>


