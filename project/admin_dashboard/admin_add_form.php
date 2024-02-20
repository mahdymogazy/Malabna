<?php
include_once("admin_dashboard.php");
// include_once("../../Facilities/functions.php");
if(!empty($_POST)){
    admin_store($_POST,$_FILES);
    header("location:admin_index.php");
}else{
    $owners=admin_getowners();
    $services=getAll_services();
}




    



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
    <link rel="stylesheet" href="../cssfile/Owner.css">
    
    <title>Add Playground</title>
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
        <div class="form">
            <h1>إضافة ملعب جديد</h1>
            <form action="#" method="post" enctype="multipart/form-data" >
                
                <!-- Owner Name -->
                
                    <label for="owners">اسم صاحب الملعب</label>
                    <select class="form-control" id="owners" name="owner" required>
                    <?php
                        foreach ($owners as $owner) {
                            echo "<option value='$owner[id]'>$owner[name]</option>";
                        }
                        ?> 
                        
                    </select>
                


                <label for="stadium_name">اسم الملعب</label>
                <input class="input" type="text" id="stadium_name" name="stadium_name" required>
                <label for="stadium_capacity">عدد الافراد بالملعب</label>
                <input class="input" type="number" id="stadium_capacity" name="stadium_capacity" required>

                <label for="stadium_price">السعر بالساعة</label>
                <input class="input" type="number" id="stadium_price" name="stadium_price" required>

                <label for="stadium_city">المحافظة</label>
                <input class="input" type="text" id="stadium_city" name="stadium_city" required>
                <label for="stadium_address">عنوان الملعب</label>
                <input class="input" type="text" id="stadium_address" name="stadium_address" required>

                
                <div class="mb-3">
                <label for="stadium_image_cover">  صورة الملعب الاساسية</label>
                <input class="form-control"  type="file" id="stadium_image_cover" name="stadium_image_cover" required>
                </div>
                <div class="mb-3">
                <label for="stadium_images">صور الملعب</label>
                <input class="form-control" type="file" id="stadium_images" name="stadium_images[]"  multiple required>
                </div> 

                
                <label for="stadium_Textarea">نبذة عن الملعب </label>
                <input class="input" type="text" id="stadium_Textarea" name="stadium_Textarea" required>
               

                <label for="stadium_start"> بداية العمل</label>
                <input class="input" type="time" id="stadium_start" name="stadium_start" required>

                <label for="stadium_end">نهاية العمل</label>
                <input class="input" type="time" id="stadium_end" name="stadium_end"required>

                <div class="form-check">
                    <label>الخدمات التي يقدمها الملعب</label>
                    <?php
                    foreach ($services as $service) {
                        echo '<input class="form-check-input" name="stadium_service_' . $service['id'] . '" type="checkbox" value="' . $service['id'] . '" id="stadium_service" checked>';
                        echo '<label class="form-check-label" for="stadium_service_' . $service['id'] . '">' . $service['name'] . '</label>';
                    }
                    ?>
      </div>

                <!-- <div class="form-check">
                <label>الخدمات التي يقدمها الملعب</label>
                  <?php 
                    // foreach ($services as $service) {
                    //  echo '<input class="form-check-input" type="checkbox" value="' . $service['name'] . '" id="flexCheckChecked" checked>';
                    //  echo '<label class="form-check-label" for="flexCheckChecked">' . $service['name'] . '</label>';
                    //     }
                   ?>
                </div> -->


                <button type="submit">تأكيـد</button>
            </form>
        
        </div>   
</div>
</body>
</html>