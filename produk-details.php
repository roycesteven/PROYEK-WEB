<?php
    require_once("connection.php");
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=='proceed' && isset($_SESSION['userLogin'])){
            unset($_SESSION['active']);
            header('location:order-form.php');
               
        }
        else{
            $_SESSION['active']='location:produk-details.php';
            header('location:login.php');
        }
        
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produk-details.css">
    <title>Document</title>
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
            <div class="details">
                <div class="atas">
                    <img src="Asset/yaris.jpg" alt="">
                    <table>
                        <tr>
                            <td>Nama Mobil</td>
                            <td>: All New Yaris</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>: 2017</td>
                        </tr>
                        <tr>
                            <td>Bahan Bakar</td>
                            <td>: Bensin</td>
                        </tr>
                        <tr>
                            <td>Jenis Mobil</td>
                            <td>: Hatchback</td>
                        </tr>
                        <tr>
                            <td>Tarif Sewa</td>
                            <td>: Rp. 200,000 per hari</td>
                        </tr>
                    </table>
                </div>
                <div class="bawah">
                    
                    <form action="produk-details.php" method="POST">
                        <input type="hidden" name="action" value="proceed">
                        <button type="submit" name="submit_proceed">Proceed</button>
                    </form>
                    <a href="produk-list.php"><button>Back</button></a>
                    
                </div>
            </div>
        </div>
</html>