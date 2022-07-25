<?php
session_start();
$pageTitle="New Product";
include "includes/connection.php";
include "includes/header.php";
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']==0){
            header('location: index.php');
    }
}

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image_name = $_FILES['image']['name'];
    $image = $_FILES['image']['tmp_name'];

    $location = "images/" . $image_name;

    $sql = "INSERT INTO products (name, price, img,stock) VALUES (?,?,?,?)";
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
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="name">Price:</label>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="name">Stock:</label>
                    <input type="text" name="stock" class="form-control" placeholder="Enter Stock">
                </div>
                <div class="form-group">
                    <label for="name">Image:</label>
                    <input type="file" class="btn btn-primary" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Insert data" name="insert">
                    <a href="javascript: history.go(-1)"  class="btn btn-success">Back</a>
                </div>
            </form>
        </div>
    </div>

</div>