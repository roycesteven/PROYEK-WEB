<?php

require_once("connection.php");
$stmt = $pdo->query("SELECT * FROM mobil");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="produk-list.css">
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
        <div class="products">
        <?php
                        if($products!=NULL)
                        {
                            foreach( $products as $key => $value)
                            {
                        ?>
            <a href="produk-details.php?id=<?=$value['id']?>" class="product">
                <img src="Asset/images.png" alt="">
                <div class="text">
                    <p style="font-weight: bold;"><?= $value['nama_mobil']?></p>
                    <p> Rp. <?= $value['tarif_hari']?>,- per hari</p>
                </div>
            </a>
            <?php
                            }
                        }
			?>
        </div>
    </div>
    
    
    
        
</body>
</html>