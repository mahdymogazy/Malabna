<?php
include_once("functions.php");
if (!empty($_POST)) {
    store($_POST);
    header("Location: index.php");
} 

if (isset($_GET['id'])) {
  $playGrounds = getPlaygrounds();
    $image = getPlaygroundImages($_GET['id']);
    $playground=getPlayground($_GET['id']);
    $results = getServices($_GET['id']);
    $id = $_GET["id"];
    $cle = 8 * 3;
    // Calculate the maximum and minimum pages
    $SQLCount = "SELECT COUNT(*) FROM available_dates WHERE playground_id = ?";
    $totalCount = myQuery($SQLCount, $id)->fetchColumn();
    $maxPage = ceil($totalCount / $cle);
    $page = isset($_GET["page"]) ? intval($_GET["page"]) : 0;
    $page = max(0, min($page, $maxPage));
    $prepage = max(0, $page - 1);
    $nextpage = min($maxPage, $page + 1);
    $SQL = "SELECT * FROM available_dates WHERE playground_id = ? LIMIT " . $page * $cle . ", $cle";
    $data = myQuery($SQL, $id)->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
</head>
<body>
<!-- Start Header -->
          <header>
            <img src="../images/logo.png" alt="logo" class="logo">
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

<div class="container">
    <div class="Section">
      <div class="section">
            <div class="slider">
              <div class="slides">
                <?php
                foreach ($image as $info) {
                echo "
                <div class='slide'>
                  <img src='../project/imgs/$info[image]'>
                  <div class='caption'>
                    <h2>$playground[name]</h2>
                    <p>$playground[text]</p>
                  </div>
                </div>";
                }
                ?>
              </div>
              <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
              <a class="next" onclick="changeSlide(1)">&#10095;</a>
            </div>
      </div>  
      <div class="Details">
        <div class="details">
          <div class="info">
            <h2>السعر/الساعة</h2>
            <?php
            echo"
            <h2>$playground[price_per_hour] جنيه</h2>
            <h4>$playground[location_address]</h4>
            <p>$playground[text]<br> 
            </p> ";
            ?>
            
            <div class="stars">
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
              <i class='bx bxs-star'></i>
            </div>
          </div>

     </div>

</div>
    </div>

    <div class="Services">
        <div class="services">
            <div class="container">
                  <?php
                    foreach ($results as $info) {
                        echo "
                        <div class='service'>
                            <h2 style='color:#1a4127;'>$info[name]</h2>
                            <img src='../Facilities/icons/$info[icon]'>
                        </div>";
                    }
                    
                    ?>
            </div> 

            
        </div> 
    </div>

    
  
          <!-- booking table -->
    <div class="Container mt-5" >
      <table class="available" >
        <tr>
        <?php
        
        foreach ($data as $key => $playground) {
        $date = new DateTime($playground["date"]);
        if ($key != 0) {
          $prev = new DateTime($data[$key - 1]["date"]);
          if ($prev->format("Y-m-d") != $date->format("Y-m-d")) {
            echo "</tr><tr><td style='color:black;'>" . $date->format('m-d') . "</td>";
          }
          } else {
            echo "<tr><td>" . $date->format('m-d') . "</td>";
          }
          if ($playground["is_avilable"]) {
            echo "<td style='background-color:#f1f1f1'>
                      <form method='post' action=''>
                      <input type='text' name='playground_id' value='" . $id . "' hidden>
                        <input type='text' name='selectedDate' value='" . $playground["date"] . "' hidden>
                        <button>" . $date->format("H") . "</button>
                      </form>
                  </td>";
          } else {
            echo "<td style='background-color:#88C000'>" . $date->format("H") . "</td>";
          }
        }
        ?>
        </tr>
      </table>
 <form id="yourForm" method="post" action="">
      
      <a href="<?php echo "?id=$id&page=$nextpage" ?>" class="btn m-next">التالي</a>
      <a href="<?php echo "?id=$id&page=$prepage" ?>"  class="btn m-pre">السابق</a>
      </form> 

          <!-- <div class="map"> -->
    <div class="maps" >
              <label for="">latitude</label>
              <input type="text"  value="<?php echo $playground['latitude']; ?>" id="latitude">
    </div>
    <div class="maps">
              <label for="">longitude</label>
              <input type="text" value="<?php echo $playground['longitude']; ?>" id="longitude">
    </div>
    <!-- <div id="Map" style="width:900px;height:500px;border:2px red solid">
          <iframe id="map" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3222.056660438209!2d<?php echo $playground["latitude"]?>!3d<?php echo $playground["longitude"]?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fbc8439fc5e5b%3A0x3fcb2a740a20df99!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1591715656193!5m2!1sen!2sus" class="map"></iframe> -->
    </div> 
  </div>

      
    </div>



</div>

</div>
    <!-- </div> -->
</div>
</main> 
</div>
<script src="js/index.js"></script>
<script>

  function initMap() {
    var longitude = document.getElementById("longitude").value;
    var latitude = document.getElementById("latitude").value;
    let mapholder = document.getElementById("Map");
    console.log(mapholder);
    console.log(longitude);
    console.log(latitude);
    var mapProp= {
        center:new google.maps.LatLng(latitude,longitude),
        zoom:12,
      };
      var map = new google.maps.Map(mapholder,mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJLQdul-88M-n-KXaDx4_8F6TJdqQwrvA&v=weekly&callback=initMap"async></script>
</body>
</html>
