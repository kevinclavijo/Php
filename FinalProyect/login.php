<?php
include "includes/connection.php";

session_start();

if(isset($_GET['sesion_close'])){
    session_unset(); 

    // destroy the session 
    session_destroy(); 
}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: index.php');
        break;

        case 0:
        header('location: index.php');
        break;

        default:
    }
}


if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "select * from users where email=? and password=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo $conn->mysqli_error();
    } else {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

    }
    // $count = $user['cntUser'];

    if (empty($user)) { 
        // $_SESSION['username'] =$user['name'];
        // header('Location: home.php');
        echo "Invalid username and password";
    } else {
        $_SESSION['name']=$user['name'];
        $rol=$user['admin'];
        $_SESSION['rol'] = $rol;
        switch($rol){
            case 1:
                header('location: index.php');
            break;

            case 0:
            header('location: index.php');
            break;

            default:
        }
    }
} ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="">
    <title>Login</title>
</head>

<body>

    <div class="login">
        <div class="login-header">
            <h1>Login</h1>
        </div>
        <form action="" method="post">
            <label> Email: </label><input type="text" name="email" required id="email">
            <p></p>
            <label> Password : </label><input type="password" name="password" required id="password">
            <P></P>
            <input type="submit" value="Login" name="login">
            <input type="reset" value="Reset">

        </form>
        <p>
    </div>
</body>

</html>
<?php include "includes/footer.php"; ?>