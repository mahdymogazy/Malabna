<?php 
include_once("./functions.php");
$result = getAll();
?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="table.css">
    <title>Facilities</title>
</head>
<body>
<div class="h_headContainer">
        <div class="h_navi">
            <ul>
                <div class="brand-name">
                <img src="../project/imgs/logo.png" alt="ملعبنا" style=" width:150px; height:150px; align-items:center; margin:auto; " class="image">
                </div>
                <li>
                    <a href="../project/admin_dashboard/admin_index.php">
                        <span class="h_icon"><i class="fa-solid fa-house" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">  الرئيسية </span>
                    </a>
                </li>
                <li>
                <a href="#">
                    <span class="h_icon"><i class="fa-solid fa-handshake-angle" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title"> الخدمـات  </span>
                </a>
                
            </li>
            <li>
            <a href="./add.php" >
            <span class="h_icon"><i class="fa-solid fa-handshake-angle" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title"> اضافه خدمات </span>
               </a>
            </li>
            <li>
                    <a href="../index.php">
                        <span class="h_icon"><i class="fa-solid fa-backward" style="color: #b9bbb6;"></i></i></span>
                        <span class="h_Title"> عـودة     </span>
                    </a>
                </li>
            </ul>
        </div>
</div>

<div class="containerowner">
    <table class="table table-striped table-green">
        <thead>
        <tr>
        <th>حذف</th>
        <th>صورة المرفق</th>
            <th>المرافق المتاحــة</th>
        </tr>
        </thead>
        <tbody>
        <?php
                    foreach($result as $item){
                        echo"<tr>";
                        echo "<td><a href='delete.php?id=$item[id]' class='btn btn-danger'>حذف</a></td>";
                        echo"<td><img src='icons/$item[icon]' style='width:250px; '></td>";
                        echo"<td>$item[name]</td>";
                        echo"</tr>";                   
                    }
            ?>
        </tbody>
    </table>
</div>    
</body>
</html>