<?php

require_once("connection.php");

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
                        <a href="index.php" class="logo">LOGO</a>
                        <a href="produk-list.php">Products</a>
                        <a href="index.php#container2">About Us</a>
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
                <h2>ORDER NUMBER : 001</h2>
                <br>
                <p>MOHON SEGERA MELAKUKAN PEMBAYARAN KE REKENING BANK ABC NO. 12345678 A/N PT. INDOSUROBOYO</p>
                <br>
                <p>Senilai Rp.
                <?php 
                    $date1= new DateTime($_POST['date_mulai']);
                    $date2=new DateTime($_POST['date_akhir']);
                    $diff=$date2->diff($date1);
                    echo (int)( $diff->d )*200000 ;
                ?>
                
                </p>
                <br>
                <p>BATAS WAKTU PEMBAYARAN 
                    <?php  
                    echo date("d-m-Y h:i a");
                    ?>
                </p>
            </div>
        </div>
   </div>
        
</body>
</html>