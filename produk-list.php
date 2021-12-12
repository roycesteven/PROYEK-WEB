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
    <link rel="stylesheet" href="./Asset/animate.min.css">
</head>

</head>
<body>
    <div class="container">
            <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo">IndoSuroboyo</a>
                    <a href="produk-list.php" style="margin-top:20px">Products</a>
                    <a href="index.php#container2" style="margin-top:20px">About Us</a>
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
                                    <div class="produk  animate__animated  animate__bounceIn">
                                        <a href="#" class="product link ">
                                            <img src="Asset/mobil/<?= $value['id'] ?>.jpg" alt="" style="width:100%">
                                            <div class="text">
                                                <h1><?= $value['nama_mobil']?></h1>
                                                <p> Rp. <?= $value['tarif_hari']?>,- per hari</p>
                                                <p>Status : <?= $value['status']?>  <img src="./Asset/red.png" alt=""></p>
                                            </div>
                                            
                                        </a>
                                    </div>
                                     
            <?php
                                }
                                else{
                                    ?>
                                    <div class="produk animate__animated  animate__bounceIn">
                                        <a href="./controller/control-details.php?action=details&id=<?=$value['id']?>" class="product">
                                            <img src="Asset/mobil/<?= $value['id'] ?>.jpg" alt="">
                                            <div class="text">
                                                <p style="font-weight: bold;"><?= $value['nama_mobil']?></p>
                                                <p> Rp. <?= $value['tarif_hari']?>,- per hari</p>
                                                <p>Status : <?= $value['status']?>  <img src="./Asset/green.png" alt="" > </p>   
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
                                                    <button type="submit" name="submit_proceed" value="Add to Cart" class="Button">Add to Cart</button>
                                                </form>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <form action="./controller/control-details.php" method="POST">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?=  $value['id']?>">
                                                    <button type="submit" name="submit_proceed" value="Add to Cart" class="Button">Remove from Cart</button>
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
