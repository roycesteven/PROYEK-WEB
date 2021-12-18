<?php

require_once("connection.php");

if(isset($_SESSION['userLogin'])){
    if($_SESSION['userLogin']=='admin'){
        header("location:admin.php");    
    }
}

if(isset($_SESSION["message"])){
    echo "<script>alert('$_SESSION[message]')</script>";
    unset($_SESSION["message"]);
}
// echo 'Current PHP version: ' . phpversion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indosuroboyo.com</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Asset/animate.min.css">
    
    <link rel="stylesheet" href="./Asset/aos.css">
</head>
<body>
    
        <div class="container">
            <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo" style="color: white;">Indo<span style="color: green;">Suroboyo</span></a>
                    <a href="produk-list.php" style="padding-top: 20px; box-sizing: border-box;">Products</a>
                    <a href="#container2" style="padding-top:20px; box-sizing: border-box;">About Us</a>
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
                    <p style = "font-size : 18px; padding-top : 20px; box-sizing: border-box;">Sudah daftar?  <a href ="login.php"> masuk sini!</a> </p>
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
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 30px; box-sizing: border-box;">Kenapa Harus IndoSuroboyo?</h1>
                        <p style="font-size: 20px; padding: 25px; box-sizing: border-box;">IndoSuroboyo adalah rental mobil paling canggih yang saat ini berada di Surabaya. Kita telah menggunakan sistem yang dapat diakses oleh semua orang. IndoSuroboyo juga menyediakan banyak sekali opsi mobil. Baik mobil untuk perusahaan, Pernikahan, atau harian. Kita juga memiliki pelayanan yang ekstra, seperti Customer Service 24/7.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column" style="background-color:white;" data-aos="fade-right" data-aos-delay = "100" data-aos-duration="1000">
                        <h1 style="font-size: 40px; padding : 25px; padding-bottom : 1px; padding-top : 90px; box-sizing: border-box;">Bisa diakses dimana saja</h1>
                        <p style="font-size: 20px; padding: 25px; box-sizing: border-box;">IndoSuroboyo sudah menggunkan sistem yang canggih dan terkini untuk pelayanan kepada Customer, Sehingga customer bisa menyewa atau memesan kendaraan yang diperlukan dimana saja dan kapan saja.</p>
                    </div>
                    <div class="column" id="col2-gambar" data-aos="fade-left" data-aos-delay = "100" data-aos-duration="1000" >
                        
                    </div>
                </div>
            </div> <br><br><br><br><br><br> 
            <!-- review Section -->
            

            <!-- <div class="slideshow-container">

                <div class="mySlides fade">
                    
                    <img src="Asset/fitra.jpg" > <br><br><br>
                    <h3>Fitra Eri</h3> <br>
                    <div class="text">Sangat puas sewa mobil di Indosuroboyo, praktis dan no ribet-ribet.</div>
                </div>

                <div class="mySlides fade">
                
                <img src="Asset/rossi.jpg" > <br><br><br>
                <h3>Valentino Rossi</h3><br>
                <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                
                <img src="Asset/rock.jpg" > <br><br><br>
                <h3>The Rock</h3><br>
                <div class="text">Caption Three</div>
                </div>

                </div>
                <br>

                <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
                </div>
            </div>     -->
            
            <section class="review" data-aos="zoom-in" data-aos-delay = "100" data-aos-duration="1000">
                   
                <div class="swiper-slide">
                    <div class="box fade">
                        <center>
                            <h1 style="font-size: 50px;">Review</h1>
                        </center>
                        <br><br>
                        <img src="Asset/fitra.jpg" alt="">
                        <h3>Fitra Eri</h3>
                        <h4>Reviewer dan Youtuber</h4>
                        <p>Sangat puas sewa mobil di Indosuroboyo, praktis dan no ribet-ribet.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="box fade">
                        <center>
                            <h1 style="font-size: 50px;">Review</h1>
                        </center>
                        <br><br>
                        <img src="Asset/rossi.jpg" alt="">
                        <h3>Valentino Rossi</h3>
                        <h4>Pembalap Profesional</h4>
                        <p>Kondisi Mobil disini sangat terawat, Sehingga mumpuni dibuat nikung</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="box fade">
                        <center>
                            <h1 style="font-size: 50px;">Review</h1>
                        </center>
                        <br><br>
                        <img src="Asset/rock.jpg" alt="">
                        <h3>The Rock</h3>
                        <h4>Pegulat/Aktris Papan Atas</h4>
                        <p>Mobil disini sangat nyaman dikendarai orang berbadan besar</p>
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
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("box");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>
</html>