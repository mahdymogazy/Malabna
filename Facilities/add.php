<?php
include_once("./functions.php");
if(!empty($_POST)){
    store($_POST,$_FILES);
    header("location:facility.php");
}
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
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group input[type="file"]::file-selector-button {
            background-color: #3498db;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group input[type="file"]::file-selector-button:hover {
            background-color: #2980b9;
        }

        .form-group input[type="file"]::-webkit-file-upload-button {
            visibility: hidden;
        }

        .form-group input[type="file"]::before {
            content: 'Choose an Image';
        }

        .form-group input[type="file"]:hover::before {
            content: 'Choose or Drag an Image';
        }

        .form-group input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #2980b9;
      }
</style>
</head>
<body>
<div class="h_headContainer" >
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
                <a href="./facility.php">
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
                        <span class="h_Title"> عـودة للرئيسية    </span>
                    </a>
                </li>
            </ul>
        </div>
</div>

<div  class="form-container" >
        <form  class="row-8"action="#" method="post" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="text-input">المرافق المتاحــة</label>
                <input type="text" id="text-input" name="name" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label for="image-input">Image Input:</label>
                <input type="file" id="image-input" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">إضافة</button>
            </div>
        </form>
</div>
</div>

</body>
</html>
