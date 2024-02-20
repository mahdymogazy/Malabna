<?php
include_once("items.php");
// include_once("../categories/categories.php");

if(!empty($_POST)){
    update($_POST,$_FILES);
    header("location:pizza.php");
}
elseif(!empty($_GET)){
    $id=$_GET['id'];
    $item=getItemById($id);
    $categories=getAllCategory();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>updeate Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" value="<?php echo $item["id"] ?>" id="productName" name="id" required hidden readonly>
    <input type="text" class="form-control" value="<?php echo $item["img"] ?>" id="productName" name="image" required hidden readonly>   
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" value="<?php echo $item["name"] ?>" id="productName" name="name" required>
        </div>
        <!-- Product Price -->
        <div class="form-group">
            <label for="productPrice">Price:</label>
            <input type="number" class="form-control" id="productPrice" value="<?php echo $item["price"] ?>" name="price" required>
        </div>
        <!-- Product Image -->
        <div class="form-group">
            <img src="../imgs/<?php echo $item["img"] ?>" width="200px">
            <label for="productImage">Image (File):</label>
            <input type="file" class="form-control-file" id="productImage" name="image" accept="image/*" >
        </div>
        <!-- Product Category -->
        <div class="form-group">
            <label for="productCategory">Category:</label>
            <select class="form-control" id="productCategory" name="category" required>
                <?php
                foreach ($categories as $category) {
                    echo "<option value='$category[id]'>$category[name]</option>";
                }
                ?> 
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
