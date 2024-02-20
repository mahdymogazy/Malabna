<?php
include_once("../../dashboard-tables/heba-booking/bookings.php");
if (!empty($_POST)) {
    store($_POST);
    header("Location: index.php");
} else {
    $playgrounds = getAllPlayground();
    $data = [];
    if (isset($_GET["id"])) {
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
}
?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../cssfile/booking.css">
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
                        <span class="h_Title">  عودة     </span>
                    </a>
                </li>
            </ul>
        </div>
</div>
<div class="booking">
    <div class="container mt-5" >
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="playground_id" class="name-head"><h1> المواعـيد المتاحـة</h1></label><br><br>
                <select class="form-control" id="playground_id" onchange="dates(event)" name="playground_id" required  >
                    <option disabled selected>اختر من القائمه  </option>
                    <?php
                    foreach ($playgrounds as $playground) {
                        echo "<option value='" . $playground['id'] . "'>" . $playground['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
<table class="available">
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
<script>
  function updateForm(selectedDate) {
    // Get the form element
    var form = document.getElementById('yourForm');
    // Get the input element within the form
    var input = form.querySelector('input[name="selectedDate"]');
    // Update the value of the input field with the selected date
    input.value = selectedDate;
  }
</script>
<form id="yourForm" method="post" action="">
</form>
                <a href="<?php echo "?id=$id&page=$nextpage" ?>" class="btn next"   ><i class="fa-solid fa-arrow-right" style="color: #f0f2f4;"></i>التالي</a>
                <a href="<?php echo "?id=$id&page=$prepage" ?>"  class="btn pre"  ><i class="fa-solid fa-arrow-left" style="color: #f0f2f4;"></i>السابق</a>
            <!-- <a class="btn btn-submit" href="../admin_dashboard/admin_index.php" type="submit" >عـودة</a> -->
        </form>
    </div>
</div>
</body>
<script>

function dates(e) {
    var v=e.target.value
    console.log(e.target.value);
    window.location.replace("?id="+v) 
}
</script>
</html>