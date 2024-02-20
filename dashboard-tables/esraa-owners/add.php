<?php
if(!empty($_POST)){
    include_once("functions.php");
    addInDB($_POST);
    header("Location:owners.php");
 }

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="owners.css">

    <title>Add new user</title>
</head>

<body>
    <form method="post" action="">
        <div class=" form-group" >
            <label for="exampleInputEmail1" > صاحب الملعب</label><input name="name" type="text" class="form-control"
                id="exampleInputEmail1" placeholder=" اسم صاحب الملعب" require>
          
          
        
            <label for="exampleInputEmail1" > البريد الالكترونى </label><input name="email" type="email" class="form-control"
                id="exampleInputEmail1" placeholder=" البريد الالكترونى  " require>
     
            <!-- <label for="exampleInputEmail1"> الرقـم السـرى</label><input name="password" type="password" class="form-control"
                id="exampleInputEmail1" placeholder=" الرقم السرى "> -->
        <br>
    
        
        <button type="submit">تأكيد</button>
        <a class=" btn back" href="owners.php" type="submit" >عـودة</a>

    </form>
</body>

</html>