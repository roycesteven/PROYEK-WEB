<?php

require_once("connection.php");
$stmt = $pdo->query("SELECT * FROM mobil");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);


if(isset($_SESSION["message"])){
    echo "<script>alert('$_SESSION[message]')</script>";
    unset($_SESSION["message"]);
}


if(isset($_SESSION['active'])){
    unset($_SESSION['active']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./produk-list.css">
    <style>
        .logo{
            margin-top:8px;
            outline: 3px solid #8614f8;
            outline-offset: 2px;
            height: 3.6rem;
            font-size: 1.5rem;
            line-height: 1.7rem;
            text-decoration: none;
            text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo">IndoSuroboyo</a>
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
                                if($value['status']!='Available')
                                {
                                    ?>
                                    <div class="produk">
                                    <a href="#" class="product link">
                                        <img src="Asset/images.png" alt="">
                                        <div class="text">
                                            <p style="font-weight: bold;"><?= $value['nama_mobil']?></p>
                                            <p> Rp. <?= $value['tarif_hari']?>,- per hari</p>
                                            <p>Status : <?= $value['status']?>  <img src="./Asset/red.png" alt="" style="width: 10px;"></p>
                                        </div>
                                        
                                    </a>
                                    </div>
                                     
            <?php
                                }
                                else{
                                    ?>
                                    <div class="produk">
                                    <a href="./controller/control-details.php?action=details&id=<?=$value['id']?>" class="product">
                                        <img src="Asset/images.png" alt="">
                                        <div class="text">
                                            <p style="font-weight: bold;"><?= $value['nama_mobil']?></p>
                                            <p> Rp. <?= $value['tarif_hari']?>,- per hari</p>
                                            <p>Status : <?= $value['status']?>  <img src="./Asset/green.png" alt="" style="width: 10px;"> </p>   
                                        </div>
                                    </a>
                                    <?php
                                    $ada=false;
                                    if(isset($_SESSION['carts'])){
                                        foreach($_SESSION['carts'] as $key => $val){
                                            if($val['id']==$value['id']){
                                                $ada=true;
                                                break;
                                            }
                                        }
                                    }
                                        if(!$ada){
                                            ?>
                                            <form action="./controller/control-details.php" method="POST">
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="id" value="<?=  $value['id']?>">
                                                <button type="submit" name="submit_proceed" value="Add to Cart">Add to Cart</button>
                                            </form>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <form action="./controller/control-details.php" method="POST">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?=  $value['id']?>">
                                                <button type="submit" name="submit_proceed" value="Add to Cart">Remove from Cart</button>
                                            </form>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    
                                    
                                    <?php
                                }
                            }
                        }
			?>
        </div>
    </div>
    
    
    
        
</body>

</html>
