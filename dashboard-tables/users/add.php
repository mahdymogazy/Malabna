<?php
if(!empty($_POST)){
    include_once("functions.php");
    addInDB($_POST);
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link  rel="stylesheet" href="./css/add_style.css">
    <title>Add new user</title>

</head>

<body>

<div class="container">
<h1 class="booking-head">اضافـة حجـز </h1>
    <form method="post" action="" >
        <div class=" form-group">
        <input name="name" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder=" ادخل الاسـم">
        <input name="email" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder="البريد الالكتروني ">
    <input name="password" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder="الرقم السري">

<input name="pitch_name" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder="اسم الملعب ">
    
            <input name="time" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder="الميعاد  ">
        
            <input name="status" type=" text" class="form-control"
                id="exampleInputEmail1" placeholder="قيد الانـتظار ">
        </div>
        <br>
        <button type="submit">تأكيد</button>
       <a class="btn back" href="index.php" type="submit" >عـودة</a>
       
    </form>
</div>



     
</body>

</html>
