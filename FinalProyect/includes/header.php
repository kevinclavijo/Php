<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
<div class="container">
<div class="jumbotron text-center">
      <a href="logout.php" role="button" class="btn btn-primary " >Logout</a>
<h4><?php echo "Welcome " .$_SESSION['name'];?></h4>
        <h2><?php echo $pageTitle?></h2>
        
    </div>
    </div>
  
    <main>