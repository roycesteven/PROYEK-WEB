<?php 
  require_once("connection.php");
  
  if(isset($_REQUEST["action"])){
    if($_REQUEST["action"]=="logout"){
        unset($_SESSION['userLogin']);
        unset($_SESSION['id']);
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
    <title>User Page | Indosuroboyo.com</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="container">
    <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo">IndoSuroboyo</a>
                    <a href="produk-list.php" style="padding-top: 20px">Products</a>
                    <a href="#container2" style="padding-top:20px">About Us</a>
                </div>
                <div class="kanan">
                <?php
                        if(!isset( $_SESSION['userLogin'])){
                            ?>                           
                            <a href="login.php">Login</a>
                            <a href="register.php">Register</a>
                            <?php
                        }
                        else {
                            ?>
                            <a href="carts.php">My Cart</a>
                            <a href="user.php">
                                <!-- <img src="Asset/istockphoto-1300845620-170667a.jpg" alt="" style="width: 50px;"> -->
                            <?= $_SESSION['userLogin'] ?></a>
                            <a href="user.php?action=logout">Logout</a>
                            <?php
                        }
                            ?>
                </div>
            </div>
        <div class="content">
            <div class="kiri-cont">
                <img src="Asset/userprofile2.jpg" alt="" style="width:100%; height:100vh">
                <button class="btn">
                    <a href="user-profile.php" style="text-decoration:none; color:white;">
                        Your Profile
                    </a>    
                </button>        
            </div>
            <div class="kanan-cont">
                <img src="Asset/usertrans.jpg" alt="" style="width:100%; height:100vh">
                <button class="btn">
                    <a href="user-header-pesanan.php" style="text-decoration:none; color:white;">
                        Your Transaction Record
                    </a>   
                </button>   
            </div>
        </div>
    </div>
</body>
</html>