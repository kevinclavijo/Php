<?php
session_start();
$pageTitle = "Products List";
include "includes/connection.php";
include "includes/header.php";
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
}

$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $conn->query("SELECT * FROM products LIMIT $start, $limit");
$products = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id) AS id FROM products");
$proCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $proCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;
?>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .card button:hover {
        opacity: 0.7;
    }
</style>
<html>

<head>
  
</head>

<body>
    <div class="container">
    <div class="card">

    <?php if($_SESSION['rol']!=0){  ?>
    <a href="newproduct.php" role="button" class="btn btn-primary" >Add Product</a>
        <?php } ?>

    </div class="card">
        <div class="card" >
            <div class="card">
                <nav aria-label="Page navigation"  >
                    <ul class="pagination" >
                        <li>
                            <a href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li><a href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>
 
                        <li>
                            <a href="index.php?page=<?= $Next; ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>

                </thead>
                <tbody>
                    <?php foreach ($products as $product) :  ?>
                        <div class="card">
                            <img src="<?= "images/" .$product['img']; ?>" alt="<?= $product['name']; ?>" style="width:100%">
                            <h1><?= $product['name'];?></h1>
                            <p class="price"> Price: $.<?= $product['price'];?></p>
                            <p>Stock: <?= $product['stock']; ?></p>
                            <p><button>Add to Cart</button></p>
                                <?php if($_SESSION['rol']!=0){  ?>
                        <td align="center"><a href="update.php?update=<?= $product['id']; ?>" class="btn btn-success btn-sm" role="button">Update</a>
                            <a href="index.php?delete=<?= $product['id']; ?>" class="btn btn-danger btn-sm" id="delete" role="button">Delete</a>
                        </td>
                        <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>


</body>

</html>