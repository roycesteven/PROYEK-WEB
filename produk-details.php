<?php
    require_once("connection.php");
    $stmt = $pdo->query("SELECT * FROM mobil");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
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
            <div class="details">
                <?php
                    foreach($products as $key => $value){
                        if($value['id']==$_REQUEST['id'])
                        {
                           
                ?>
                <div class="atas">
                    <img src="Asset/images.png" alt="">
                    <table>
                        <tr>
                            <td>Nama Mobil</td>
                            <td>: <?=$value['nama_mobil']?></td>
                        </tr>
                        <tr>
                            <td>Bahan Bakar</td>
                            <td>: <?=$value['bahan_bakar']?></td>
                        </tr>
                        <tr>
                            <td>Jenis Mobil</td>
                            <td>: <?=$value['jenis']?></td>
                        </tr>
                        <tr>
                            <td>Tarif Sewa</td>
                            <td>: Rp. <?=$value['tarif_hari']?>,- per hari</td>
                        </tr>
                    </table>
                </div>

                <!-- ditutup sementara -->
                
                <!-- <div class="bawah">
                    <form action="./controller/control-details.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="id" value="<?=  $value['id']?>">
                        <button type="submit" name="submit_proceed" value="Add to Cart">Add to Cart</button>
                    </form>
                    <a href="produk-list.php"><button>Back</button></a>                    
                </div> -->

                <!-- ditutup sementara -->

                <?php
                        }
                    }
                ?>
            </div>
        </div>
</html>