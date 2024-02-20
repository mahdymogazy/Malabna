<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box-form">
    <div class="img1">
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                // if (password_verify($password, $user["password"])) {
                
                    $_SESSION["user"] = $user;
                    if($_SESSION["user"]["email"]=="admin@gmail.com"){
                       
                        header("Location:../project/admin_dashboard/admin_index.php");
                    die();}
                    else{

                    header("Location:../finalproject/index.php");
                    die();
                    }
                    
            }else {
                $sql = "SELECT * FROM owners WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $owner = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($owner) {
                // if (password_verify($password, $user["password"])) {
                   
                    $_SESSION["owner"] = $owner;
                    // tayeb
                    header("Location:../dashboard-tables/users/index.php");
                    die();}
                    else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            }
        }
        ?>
         <video class="video-slide" src="../images/2.mp4"  muted loop></video>
    
        <div>
        <img src="yse img/logo.png" alt="" class="imm">
       
        </div>
        <div class="right">
            
       
            
		<h1>مرحبا بكم </h1>
		<h2>اهلا و سهلا بكم في ملعبنا قم بإنشاء مستخدم لدى موقعنا و تمتع بجميع المميزات</h2>
        
        <form action="login.php" method="post" dir="rtl">
        <div class="form-group" >
            <input type="email" placeholder="Enter Email:" name="email" class="form-control" dir="rtl">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control" dir="rtl">
        </div>
        <div class="form-btn">
            <input type="submit" value="تسجيل دخول" name="login" class="btn btn-success">
 
                 <a href="registration.php" class="btn btn-light">قم بالتسجيل الان </a>
        </div>
        </form>
        </div>
    

    </div>
    </div>
</body>
</html>
