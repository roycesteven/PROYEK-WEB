<?php

require_once("connection.php");

if(isset($_SESSION['userLogin'])){
    if($_SESSION['userLogin']=='admin'){
        header("location:admin.php");    
    }
}
echo 'Current PHP version: ' . phpversion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Asset/animate.min.css">
    
    <link rel="stylesheet" href="./Asset/aos.css">
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
            <div  class="banner animate__animated animate__slideInUp">
                <h2 >IndoSuroboyo Untuk penuhi kebutuhan mobilitas anda</h2><br>
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
                    <div class="column" id="col-gambar" data-aos="fade-right" data-aos-delay = "100" data-aos-duration="1000">
                        
                    </div>
                    <div class="column" style="background-color:white;" data-aos="fade-left" data-aos-delay = "100" data-aos-duration="1000">
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 70px;">Kenapa Harus IndoSuroboyo?</h1>
                        <p style="font-size: 25px; padding: 25px;">IndoSuroboyo adalah rental mobil paling canggih yang saat ini berada di Surabaya. Kita telah menggunakan sistem yang dapat diakses oleh semua orang. IndoSuroboyo juga menyediakan banyak sekali opsi mobil. Baik mobil untuk perusahaan, Pernikahan, atau harian. Kita juga memiliki pelayanan yang ekstra, seperti Customer Service 24/7.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column" style="background-color:white;" data-aos="fade-right" data-aos-delay = "100" data-aos-duration="1000">
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 70px;">Bisa diakses dimana saja</h1>
                        <p style="font-size: 25px; padding: 25px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At odit consectetur ea quisquam quidem ad fuga quasi aspernatur voluptates eligendi atque, pariatur quod, soluta deleniti, quis sunt explicabo officiis modi!</p>
                    </div>
                    <div class="column" id="col2-gambar" data-aos="fade-left" data-aos-delay = "100" data-aos-duration="1000" >
                        
                    </div>
                </div>
            </div> <br><br><br><br><br><br> 
            <!-- review Section -->
            <section class="review" data-aos="zoom-in" data-aos-delay = "100" data-aos-duration="1000">
                    <center>
                        <h1 class="heading">
                            <span>R</span>
                            <span>e</span>
                            <span>v</span>
                            <span>i</span>
                            <span>e</span>
                            <span>w</span>
                        </h1>
                    </center>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="Asset/stts.png" alt="">
                        <h3>IndoSuroboyo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </section>
            
            
            <!-- end review section -->

            <div class="copyright">
                <p><h6>Copyright&copy - IndoSuroboyo team</h6></p>
            </div>
        
        </div>    
</body>
<script src="./Asset/aos.js"></script>
<script>
    AOS.init();
</script>   
</html>