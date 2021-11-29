<?php 
  require_once("connection.php");
  
  if(isset($_REQUEST["action"])){
    if($_REQUEST["action"]=="logout"){
        unset($_SESSION['userLogin']);
        unset($_SESSION['carts']);
        header("location:index.php");
        }
    } 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<p>Welcome back, <?php 
                    $user = $_SESSION['userLogin'];
                    echo $user;
?> <p>

<a id= "login" href="user.php?action=logout">Log-Out</a>
</body>
</html>