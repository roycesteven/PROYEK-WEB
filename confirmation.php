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
    
    <header>
            <a href="index.php" class="logo">IndoSuroboyo</a>
                <div class="container"></div>
                <nav>
                    <ul>
                        <li><a href="produk-list.php" >Products</a></li>
                        <li><a href="#container2">About Us</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li><a href="login.php">Login</a></li> &nbsp;&nbsp;&nbsp;
                        <li><a href="register.php" class="active">Register</a></li>
                    </ul>
                </nav>
        </header>
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
</body>
</html>