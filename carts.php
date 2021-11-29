<?php
require_once("connection.php");


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carts.css">
    <title>Order Form</title>
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
            <div class="carts">
           
                        <table border='1'>
                        <tr>
                        <th>Nomor</th>
                        <th>Nama Mobil</th>
                        <th>Bahan Bakar</th>
                        <th>Kategori</th>
                        <th>Tarif per hari</th>
                        </tr>
                        <?php
                            $id=1;
                            if(isset($_SESSION['carts'])){
                            foreach( $_SESSION['carts'] as $key => $value)
                            {
                        ?>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $value['nama_mobil']; ?></td>
                            <td><?= $value['bahan_bakar']; ?></td>
                            <td><?= $value['jenis']; ?></td> 
                            <td>Rp. <?= $value['tarif']; ?></td> 
                                                
                        </tr>
                        <?php
                        $id++;
                             }
                        }
                        ?>
                        </table>
                        
                        
            </div>
            <div id="form">
                <br>
                <form action="order-form.php" method="POST">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;"><h2>Order Form</h2></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Mulai</label></td>
                            <td>: <input type="date" name="date_mulai" id="date_mulai"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Akhir</label></td>
                            <td>: <input type="date" name="date_akhir" id=""></td>
                        </tr>
                        <tr>
                            <td><label for="">Jam Pick-up</label></td>
                            <td>: <input type="time"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><input type="submit" name="" id="submit_order" value="Order"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    
</body>
<script>
            let date_mulai = document.querySelector("#date_mulai");
            date_mulai.addEventListener("click",function(event){	
                
                
	})
	
</script>
</html>

