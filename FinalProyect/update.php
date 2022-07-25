<?php
session_start();
$pageTitle="Update Product";
include "includes/connection.php";
include "includes/header.php";
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']==0){
            header('location: index.php');
    }
}

if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM products WHERE id = $id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
            $name  = $row['name'];
            $price = $row['price'];
            $image = $row['img'];
            $stock = $row['stock'];

        }
    }
}

if(isset($_POST['update'])){
    

    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    if($_FILES['image']['name']==null)
    {
        $image_name=$image;

    }else{

    $image_name = $_FILES['image']['name'];
    $image = $_FILES['image']['tmp_name'];
    $location = "images/" . $image_name;}


    $sql = "Update products SET name=?, price=?,img=?,stock=? WHERE id = $id";
    // var_dump($sql);
     $stmt = $conn->prepare($sql);
     if ($stmt === false) {
         echo $conn->mysqli_error();
     } else {
        // $result = mysqli_query($conn, $sql);
         $stmt->bind_param("sdsi", $name, $price, $image_name, $stock);
         move_uploaded_file($image, $location);
         $stmt->execute();
         //$result = $stmt->get_result();
         //$user = $result->fetch_assoc();
         header("Location:index.php");
     }
    
}

?>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
        <label for="name">Price:</label>
        <input type="text" name="price" class="form-control" placeholder="Enter price" value="<?php echo $price ?>">
    </div>
    <div class="form-group">
        <label for="name">Stock:</label>
        <input type="text" name="stock" class="form-control" placeholder="Enter stock" value="<?php echo $stock ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="btn btn-primary" placeholder="Enter image" value="<?php echo $image ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
        <a href="javascript: history.go(-1)"  class="btn btn-success">Back</a>
    </div>
</form>
</div>
    </div>

</div>