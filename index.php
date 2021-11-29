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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div class="container">
            <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo">LOGO</a>
                    <a href="produk-list.php">Products</a>
                    <a href="#container2">About Us</a>
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
                            <a href="#">My Cart</a>
                            <a href="user.php">
                                <!-- <img src="Asset/istockphoto-1300845620-170667a.jpg" alt="" style="width: 50px;"> -->
                            <?= $_SESSION['userLogin'] ?></a>
                            <a href="user.php?action=logout">Logout</a>
                            <?php
                        }
                            ?>
                </div>
            </div>
            <div class="banner">
                <h2>IndoSuroboyo Untuk penuhi kebutuhan mobilitas anda</h2><br>
                <p>Butuh sewa mobil pribadi ataupun kantor? IndoSuroboyo Solusinya</p> <br>
                <div class="btn">
                    <button>
                        <a href ="register.php" style = "text-decoration: none;
                        color: white;"> Daftar Gratis untuk memulai</a>                        
                    </button>
                    <p style = "font-size : 18px; padding-top : 20px">Sudah daftar?  <a href ="login.php"> masuk sini!</a> </p>
                </div> 
                <br><br>
                <hr>
            </div>
             <br>
            <div id="container2">
                <div class="row">
                    <div class="column" id="col-gambar">
                        
                    </div>
                    <div class="column" style="background-color:white;">
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 70px;">Kenapa Harus IndoSuroboyo?</h1>
                        <p style="font-size: 25px; padding: 25px;">IndoSuroboyo adalah rental mobil paling canggih yang saat ini berada di Surabaya. Kita telah menggunakan sistem yang dapat diakses oleh semua orang. IndoSuroboyo juga menyediakan banyak sekali opsi mobil. Baik mobil untuk perusahaan, Pernikahan, atau harian. Kita juga memiliki pelayanan yang ekstra, seperti Customer Service 24/7.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column" style="background-color:white;" >
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 70px;">Bisa diakses dimana saja</h1>
                        <p style="font-size: 25px; padding: 25px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At odit consectetur ea quisquam quidem ad fuga quasi aspernatur voluptates eligendi atque, pariatur quod, soluta deleniti, quis sunt explicabo officiis modi!</p>
                    </div>
                    <div class="column" id="col2-gambar" >
                        
                    </div>
                </div>
            </div>
    
            <div class="prod">
                <!-- ini belum tak isi kawan -->
            </div>
        
        </div>
        
    
        
   
        
        
        
</body>
</html>