<?php
include_once("functions.php");
if(isset($_GET['item'])){
        $result=search($_GET['item']);
    }
else if(isset($_GET['name'])){
    $result=SortByName($_GET['name']);
    }else{
    $result=getAll();
    }
?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="./css/user_style.css">
    <title>Document</title>
</head>
<body>
<!-- Start Sidebar -->
<div class="h_headContainer">
        <div class="h_navi">
            <ul>
                <div class="brand-name">
                <img src="imgs/logo.png" alt="ملعبنا" style=" width:150px; height:150px; align-items:center; margin:auto; " class="image">
                </div>
                <li>
                    <a href="../Dashboard/index.html">
                        <span class="h_icon"><i class="fa-solid fa-user fa-lg" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">  المسئولين </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <span class="h_icon"><i class="fa-solid fa-users" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> اضافة </span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="../esraa-owners/owners.php">
                        <span class="h_icon"><i class="fa-solid fa-futbol" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">أصحاب الملاعب</span>
                    </a>
                </li> -->
                <li>
                <a href="../heba-booking/index.php">
                    <span class="h_icon"><i class="fa-solid fa-calendar-days" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title"> الحجوزات  </span>
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
<!-- End Sidebar -->

<a  class="btn btn-add-reservation" href="add.php" style="position:absolute; margin-left:1470px;margin-top :100px; margin-bottom :60px;">اضافة</a><br>

<div class="containerowner">
        <div>
        
            <table class="table table-striped table-green"  style="width: 1200px; margin-left:550px; margin-top:150px;">
                <thead>
                <tr>
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
                        echo "<td>$item[owner]</td>";
                        echo "<td>$item[capacity]</td>";
                        echo "<td><img src='../../project/imgs/$item[cover_image]' style='width:150px;'></td>";
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