
<?php
include_once("functions.php");
if(!empty($_POST)){
    addInDB($_POST);
}else{
    $result=getAll();
};
?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="owners.css">
    <title>Document</title>
</head>
<body>
<div class="h_headContainer">
        <div class="h_navi">
            <ul>
                <div class="brand-name">
                <img src="../users/imgs/logo.png" alt="ملعبنا" style=" width:150px; height:150px; align-items:center; margin:auto; " class="image">
                </div>
    
                <li>
                    <a href="">
                        <span class=""><i  ></i></span>
                        <span class="">   </span>
                    </a>
                </li>
                <li>
                    <a href="../Dashboard/index.html">
                        <span class="h_icon"><i class="fa-solid fa-user fa-lg" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">  المسئولين </span>
                    </a>
                </li>
                <li>
                    <a href="../users/index.php">
                        <span class="h_icon"><i class="fa-solid fa-users" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> المستخدمين </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="h_icon"><i class="fa-solid fa-futbol" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">أصحاب الملاعب</span>
                    </a>
                </li>
                <li>
                <a href="../heba-booking/index.php">
                    <span class="h_icon"><i class="fa-solid fa-calendar-days" style="color: #b9bbb6;"></i></span>
                    <span class="h_Title"> الحجوزات  </span>
                </a>
                </li>
                <li>
                    <a href="../../index.php">
                        <span class="h_icon"><i class="fa-solid fa-backward" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> عودة    </span>
                    </a>
                </li>
            </ul>
        </div>
</div>


<!-- <div class="mb-3"> -->
<div class="container">
   

    <div class="header">
                    <div class="nav">
                        <!-- <form action="" style=" width:80%; margin:auto;" >
                        <div class="search">
                            <input type="text" placeholder="بحث.."  name="item" id="search">
                            <button type="submit"  style=" display:none;" class="btn btn-primary form-control"></button>
                        </div>
                        </form> -->
                        <div class="user">
                    <!-- <a href="#" class="btn">اضف جديد</a> -->
                    <img src="../Dashboard/img/notifications.png" alt="">
                    <div class="img-case">
                        <img src="../Dashboard/img/user.png" alt="">
                    </div>
                </div>
                    </div>
    </div>
    
    <div class="content">
    <a  class="btn btn-add-reservation" href="add.php" >اضافة</a><br>

            <table class="table table-striped table-green" style="text-align:right; width:1000px; margin-top :250px; margin-left:20px;">
                    <thead>
                        <tr>
                        <!-- <th >صورة العقد</th> -->
                        <!-- <th >الرقم السرى</th> -->
                        <!-- <th>خيارات</th> -->
                        <th > البريد الالكتروني</th>
                        <th>اسم صاحب الملعب</th>
                        <th >رقم تعريفى</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $info){ //data return in associative array
                        echo"<tr>";
                    
                        
                        // echo"<td><img src='$info[contract_image]' width='60px'></td>";
                        // echo"<td>$info[password]</td>";
                        // echo"<td >
                        // <a href='delete.php?id=$info[id]' class='btn btn-danger' onclick='confirm()'>حذف</a></td>";
                        echo"<td>$info[email]</td>";
                        echo"<td >$info[name]</td>";
                        echo"<td>$info[id]</td>";
                       
                        echo"</tr>";
                }
            ?>
                    </tbody>
            </table>
    </div>
</div>
<script scr="owner.js"></script>
</body>

</html>