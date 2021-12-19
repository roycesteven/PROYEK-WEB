<?php

require_once("connection.php");

if(isset($_SESSION["message"])){
    echo "<script>alert('$_SESSION[message]')</script>";
    unset($_SESSION["message"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="confirmation.css">
</head>
<body>
    
   <div class="container">
   <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo" style="color: white;">Indo<span style="color: green;">Suroboyo</span></a>
                    <a href="produk-list.php" style="padding-top: 20px; box-sizing: border-box;">Products</a>
                    <a href="index.php#container2" style="padding-top:20px; box-sizing: border-box;">About Us</a>
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
        <div class="container1">

            <div class="confirmation">
                <h1>PEMESANAN BERHASIL DILAKUKAN</h1>
                <br>
                <h2>No. Nota : IS <?= $_SESSION['order_id']?></h2>
                <br>
                <p>MOHON SEGERA MELAKUKAN PEMBAYARAN KE REKENING BANK ABC NO. 12345678 A/N PT. INDOSUROBOYO</p>
                <br>
                <p>Senilai Rp.
                <?php 
                    
                    echo  $_SESSION['total'] ;
                ?>
                
                </p>
                <br>
                <p>BATAS WAKTU PEMBAYARAN <?= $_SESSION['batas_waktu']?>
                </p>
            </div>
        </div>
   </div>
        
</body>
</html>