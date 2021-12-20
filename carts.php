<?php
require_once("connection.php");

if(isset($_SESSION["message"])){
    echo "<script>alert('$_SESSION[message]')</script>";
    unset($_SESSION["message"]);
}
// echo 'Current PHP version: ' . phpversion();

if(isset($_SESSION['tanggal_mulai'])){
    unset($_SESSION['tanggal_mulai']);
}
  
if(isset($_SESSION['tanggal_akhir'])){
    unset($_SESSION['tanggal_akhir']);
}

if(isset($_SESSION['gagal'])){
    $gagal = $_SESSION['gagal'];
    echo"<script> alert('Ada Field yang masih Belum diisi') </script>";
    unset($_SESSION['gagal']);
}

if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=='delete'){
        $i=0;
        foreach($_SESSION['carts'] as $key => $value){
            if($i>=$_REQUEST['idx'] && $i<sizeof($_SESSION['carts'])-1){
               $_SESSION['carts'][$i]=$_SESSION['carts'][$i+1];
            
            }
            else if($i==sizeof($_SESSION['carts'])-1){
                unset($_SESSION['carts'][$i]);
            }
            $i++;
        }
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carts.css">
    <title>Order Form</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>  
        <div class="container">
        <div class="navigation">
                <div class="kiri">
                <a href="index.php" class="logo" style="color: white;">Indo<span style="color: green;">Suroboyo</span></a>
                    <a href="produk-list.php" style="padding-top: 20px">Products</a>
                    <a href="index.php#container2" style="padding-top:20px">About Us</a>
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
            </div> <br>
            <h1 style="text-align: center;">Your Cart</h1>
            <br><br>
        <div class="container1">
            <div class="carts">
           
                    <table class="styleTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Mobil</th>
                                <th>Bahan Bakar</th>
                                <th>Kategori</th>
                                <th>Tarif per hari</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $idx=0;
                                if(isset($_SESSION['carts'])){
                                foreach( $_SESSION['carts'] as $key => $value)
                                {
                            ?>
                            <tr>
                                <td><?= $idx+1;?></td>
                                <td><?= $value['nama_mobil']; ?></td>
                                <td><?= $value['bahan_bakar']; ?></td>
                                <td><?= $value['jenis']; ?></td> 
                                <td>Rp. <?= $value['tarif_hari']; ?></td> 
                                <td>
                                    <a href="carts.php?action=delete&idx=<?= $idx?>"><button class="delMobil-button" > <span> Delete</span></button></a>
                                    <!-- <form method="post" action="carts.php">
                                        <input type="hidden" name="action" value="delete">
                                        <button name='idx' value="<?= $idx?>">Delete</button>
                                    </form> -->
                                </td>                   
                            </tr>
                            <?php
                            $idx++;
                                }
                            }

                            if($idx==0){
                                ?>
                                <tr>
                                <td colspan='6'>Tidak ada produk dalam cart</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                        
                        
            </div>
            <?php 
                if($idx>0){
                    ?>
                    <br><br>
            <div id="form">
                <br>
                <form action="order-form.php" method="POST" class="form-isi">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;"><h2>Order Form</h2></td>
                        </tr>
                        <!-- <tr>
                            <td><label for="">Tanggal Mulai</label></td>
                            <td>: <input type="date" name="date_mulai"></td>
                        </tr> -->
                        <tr>
                            <td style="padding-top:20px"><label for="" >Tanggal Akhir</label></td>
                            <td>: <input type="date" name="date_akhir" id="date_picker" required></td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" style="text-align: center; padding-top:20px">
                                 <a href="order-form.php"><button class="order-button" > <span> Order</span></button></a>
                                <!-- <input type="submit" name="action" id="submit_order" value="Order" > -->
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
                }
                ?>
            <a href="order-form.php?action=go back to list produk">
                 <button class="back-button" > <span> Go back</span></button>
            </a>
             <!-- <input type="submit" name="action" id="go back to list produk" value="go back to list produk"></td>    -->
        </div>    
</body>
<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
</script>

</html>

