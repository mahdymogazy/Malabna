
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    body{
    padding:50px;
    /* background-image: linear-gradient(135deg,#cdacac 10%, #cdacac 100%); */
    /* background:url('yse img/dfc73ec2bad0810e5582e846a6aec0ad.jpeg'); */
    background:url('../project/imgs/bc3.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    /* opacity: 0.2; */
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
    color: #333333;
}
.container{
    max-width: 600px;
    margin:0 auto;
    padding:50px;
    /* box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; */
}
.form-group{
    
    transform: translate(100%, -200%); /* تحريك النموذج بالنسبة لمركزه */
}
.btn-success{
    position:absolute;
    margin-left:240px;
 
}
.btn-light{
    margin-left:20px;
}

/* .img1{
   
    height: 80vh;
    background-size: cover;
    background-position: center;
} */

.box-form {
    /* background-color: white; */
    margin: 0 auto;
    width: 60%;
    border-radius: 10px;
    overflow: hidden;
    flex: 1 1 100%;
    /* align-items: stretch; */
    justify-content: space-between;
    /* box-shadow: 0 0 20px 6px #090b6f85; */
}


.box-form .form-group input {
    margin-left:150px;
    width: 70%;
    padding: 10px;
    font-size: 16px;
    border: none;
    outline: none;
    /* background-color: #1a04e500; */
    border-bottom: 2px solid #B0B3B9;
    
}

.imm{
    /* background-color: #ffffff63; */
    padding: 10px 10px;
    border-radius: 50%;
    width: 300px;
    margin-left: 20%;
    margin-top: 5%;

}
</style>
</head>
<body>
    <div class="box-form">
    <div class="img1">
    <div class="container">
        <div class="right">
		
        </div>
        <img src="yse img/logo.png" alt="" class="imm">
        <form action="registration.php" >
            
            <div class="form-btn">
            <a href="registration.php" class="btn btn-light" > صاحب الملعب</a>
                <a href="registration2.php" class="btn btn-success"> العـميـل</a>
                
            </div>
        </form>
    </div>
</div></body>
</html>