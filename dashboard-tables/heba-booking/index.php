<?php
include_once("bookings.php");
if (!empty($_GET)) {
    store($_GET);
} else {
    $row=0;
    $result = getAll($row);
};



?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
   
    <title >جدول الحجوزات</title>
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
                        <span class="h_icon"><i class="fa-solid fa-user fa-lg" style="color: #b9bbb6;"></i></i></span>
                        <span class="h_Title">  المسئولين </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="../users/index.php">
                        <span class="h_icon"><i class="fa-solid fa-users" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> المستخدمين </span>
                    </a>
                </li> -->
                <li>
                    <a href="../users/index.php">
                        <span class="h_icon"><i class="fa-solid fa-plus" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title"> اضافة </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="../esraa-owners/owners.php">
                        <span class="h_icon"><i class="fa-solid fa-futbol" style="color: #b9bbb6;"></i></span>
                        <span class="h_Title">أصحاب الملاعب</span>
                    </a>
                </li> -->
                <li>
                <a href="#">
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

<div class="container" >
<!-- <div class="header">
                    <div class="nav">
                        <form action="" style=" width:80%; left:80px;margin-top:0" >
                            <div class="search">
                                <input type="text" placeholder="بحث.." name="item" id="search">
                            </div>
                        </form>
                        
                    </div>
        </div> -->

    <div class="content"  >
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content" >
                <h1 class="booking-head">جدول الحجوزات</h1>
                <!-- <a class="btn btn-add-reservation" href="add_form.php">اضافة حجز</a> -->
                <br>
                <br>
                
                <table class="table table-striped table-green">
                    <thead>
                        <tr>
                            <th>اجمالي المبلغ</th>
                            <th>اليوم</th>
                            <th>عدد الساعات</th>
                            <th>اسم الملعب</th>
                            <th>اسم المستخدم</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($result as $booking) {
                            echo "<tr>";
                            echo "<td>" . $booking['total_price'] . "</td>";
                            echo "<td>" . $booking['date'] . "</td>";
                            echo "<td>" . $booking['hours'] . "</td>";
                            echo "<td>" . $booking['playground'] . "</td>";
                            echo "<td>" . $booking['user'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                
            </main>
        </div>
    </div>
</div>


</body>
</html>