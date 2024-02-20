<?php
include_once("functions.php");
if(!empty($_POST)){
    update($_POST);
    header("location:index.php");

}elseif(!empty($_GET)){
    $id=$_GET['id'];
    $item=getItemById($id); 
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/edit_style.css">
    <title>Edit info</title>
</head>

<body>
    <form method="post" action="">
    <label >اسم المستخدم</label><br>
<input value="<?php echo $item["name"]?>" name="name"
                type=" text" class="form-control" id="exampleInputEmail1" placeholder=""><br>

                <label >ميعاد الحجز</label><br>
<input value="<?php echo $item["time"]?>" name="time"
                type=" text" class="form-control" id="exampleInputEmail1" placeholder=""><br>

                <label >اسم الملعب</label><br>
<input value="<?php echo $item["pitch_name"]?>" name="pitch_name"
                type=" text" class="form-control" id="exampleInputEmail1" placeholder=" "><br>

                

<label >الحالة</label><br>
<input value="<?php echo $item["status"]?>" name="status"
                type=" text" class="form-control" id="exampleInputEmail1" placeholder="قيد الانـتظار"><br>
                <input   value="<?php echo $item["id"]?>" name="id" type=" text" class="form-control" id="exampleInputEmail1"
                placeholder="name" hidden>
        </div>
        <br>
        <button type="submit">تأكيد</button>
        <a class="btn back" href="index.php" type="submit" >عـودة</a>

    </form>
</body>

</html>

