<?php
include_once("functions.php");
if(!isset($_GET['city'])){
    if(!isset($_GET['page']))
    $page=0;
else
$page=$_GET['page'];
    $result=getAllPlaygrounds($page);
}
elseif(isset($_GET['city'])) {
        $result=getPlaygrondsByCity($_GET['city']);   
}
$max = getMax();
?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>playground</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque&family=Jost:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body> 
    
        <!-- Start Header -->
        <header>
        <img src="../images/logo.png" alt="logo" class="logo">
            <!-- <a href="finalproject\index.php" class="brand">احجز الآن</a> -->
            <div class="menu-btn"></div>
            <div class="navigation">
                <div class="navigation-items">
                    <a href="../index.php">الرئيسية</a>
                    <a href="../finalproject/index.php">الملاعب</a>
                    <a href="../About_Us/about.html">نبذة عنا</a>
                    <a href="../About_Us/Contact_Us.php">تواصل معنا</a>
                    <a href="../eslam-user/regs.php">التسجيل </a>
                    <a href="../eslam-user/login.php">تسجيل الدخول </a>
                </div>
            </div>
        </header>
        <!-- End Header -->
    <div class="playground">
        <div class="container">
            <aside>
                <div>
                    <div class="filter">
                        <button onclick="show()" class="e-button">أسوان</button>
                </div>
                        <div class="aswan" id="aswan">
                            <div class="city">
                        
                                <input type="checkbox" id="sadaka" name="city" value="الصداقة">
                                <label for="sadaka">الصداقة</label><br>
                                
                            </div>
                            <div class="city">
                                <input type="checkbox" id="atlas" name="city" value="أطلس">
                                <label for="atlas">أطلس</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="taamen" name="city" value="التأمين">
                                <label for="taamen">التأمين</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="sail" name="city" value="السيل">
                                <label for="sail">السيل</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="kima" name="city" value="كيما">
                                <label for="kima">كيما</label><br>
                            </div>    
                            <div class="city">
                                <input type="checkbox" id="abu-elresh" name="city" value="أبو الريش">
                                <label for="abu-elresh">أبو الريش</label><br>
                            </div>    
                            <!-- <div class="city">
                                <input type="checkbox" id="elsad" name="city" value="السد">
                                <label for="elsad">السد</label><br>
                            </div>  -->
                        </div>
                        <button onclick="showluxor()" class="e-button">الأقصر</button>
                        <div class="luxor" id="luxor">
                            <div class="city">
                                <input type="checkbox" id="armant" name="city" value="أرمنت">
                                <label for="armant">أرمنت</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="awamya" name="city" value="العوامية">
                                <label for="awamya">العوامية</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="karnak" name="city" value="الكرنك">
                                <label for="karnak">الكرنك</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="teba" name="city" value="طيبة">
                                <label for="teba">طيبة</label><br>
                            </div>
                            <div class="city">
                                <input type="checkbox" id="biadya" name="city" value="البياضية">
                                <label for="biadya">البياضية</label><br>
                            </div>    
                            <div class="city">
                                <input type="checkbox" id="tv-street" name="city" value="شارع التلفزيون">
                                <label for="tv-street">شارع التلفزيون</label><br>
                            </div>    
                            <!-- <div class="city">
                                <input type="checkbox" id="station-st" name="city" value="شارع المحطة">
                                <label for="station-st">شارع المحطة</label><br>
                            </div> -->
                        </div>   
                    </div>
            </aside>
            <main>
                <?php
                foreach($result as $info){
            echo " <div class='pitch'>
                    <div class='image'>
                        <img src='../project/imgs/$info[cover_image]' style='width:200px;' >
                    </div>
                    <div class='text-content'>
                        <h3 class='name'>$info[name]</h3>
                        <div class='rate' style='color:gold;'>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <h4>$info[location_address]</h4>
                        <p>$info[text]</p>
                        <a href='details.php?id=$info[id]' class='details'>تفاصيل</a>
                        
                    </div>
                </div>";
                }
                ?>
            </main>
        </div>    
        <button onclick="go(<?php echo $page?>)" class="next"><span>التالى</span></button>
        <button onclick="back(<?php echo $page?>)" class="pre"><span>السابق</span></button>
    </div>
<script src="js/index.js">
</script>  
</body> 
</html>