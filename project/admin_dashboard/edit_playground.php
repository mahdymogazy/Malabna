<?php
include_once("admin_dashboard.php");

if(!empty($_POST)){
    
    $data=$_POST;
    admin_update($data);
    
}
elseif(!empty($_GET)){
    $id=$_GET['id'];
    $item=admin_getallById($id);
}


?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playground Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cssfile/edit.css">
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

        <div  class="form">
            <h2>تعديل بيانات الملعب </h2>
            <form action="" method="POST">

            <input type="text" class="form-control" value="<?php echo $item["id"] ?>" id="id" name="id" required hidden readonly>
                <!-- make this for send id with me that name is key in input and value is value -->
                <!-- playground Name -->
                
                
                <div class="form-group" dir="rtl">
                    <label for="stadium_name">اسم الملعب</label>
                    <input type="text" class="form-control" value="<?php echo $item["name"]?>" id="stadium_name" name="stadium_name" required>
                </div>

                <!-- playground stadium_capacity -->
                
                
                <div class="form-group" dir="rtl">
                    <label for="stadium_capacity">عدد الافراد بالملعب</label>
                    <input class="form-control" value="<?php echo $item["capacity"]?>" type="number" id="stadium_capacity" name="stadium_capacity" required>
                </div>

                <!-- playground stadium_price -->
                
                
                <div class="form-group" dir="rtl">
                    <label for="stadium_price">السعر بالساعة</label>
                    <input class="form-control" value="<?php echo $item["price_per_hour"]?>" type="number" id="stadium_price" name="stadium_price" required>
                </div>

                <!-- playground stadium_city -->
                
                
                <div class="form-group" dir="rtl">
                    <label for="stadium_city">المحافظة</label>
                    <input class="form-control" value="<?php echo $item["location_city"]?>" type="text" id="stadium_city" name="stadium_city" required>
                </div>

                <!-- playground stadium_city -->
                
                
                <div class="form-group" dir="rtl">
                    <label for="stadium_address">عنوان الملعب</label>
                    <input class="form-control" value="<?php echo $item["location_address"]?>" type="text" id="stadium_address" name="stadium_address" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-light">تغيير</button>
               <a href="admin_index.php"><button type="submit"  class="btn btn-success">الرجوع</button></a> 
            </form>
        </div>
</div>
</body>
</html>
