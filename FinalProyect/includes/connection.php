<?php

$hostname = "localhost:3309";
$username = "root";
$password = "root";
$dbname = "final_project";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn -> connect_error){
    die("Error in connection " .$conn -> connect_error);
}


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>