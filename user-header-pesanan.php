<?php
    require_once("connection.php");
    $userid_trans = $_SESSION['id'];
    
    $stmt = $pdo -> prepare("SELECT * FROM header_pesanan where penyewa_id like :id");
    $stmt->BindParam(":id",$userid_trans);
    $stmt->execute();
    // $headers = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "detail"){
            $id = $_REQUEST["id"];
            $_SESSION['idfinal']= $id;

            header("location:user-detail-pesanan.php");
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi User | Indosuroboyo.com</title>
    <link rel="stylesheet" href="user-header-pesanan.css">
</head>
<body>
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
    <div id="why">
                <center>
                <h1 style="font-size: 50px;">Riwayat Transaksi</h1>
                </center>
            </div>
        <hr> <br><br>
    <table class="styleTable">
        
        <thead>
            <th>Order Id</th>           
            <th>Total Tagihan</th>
            <th>Status</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Jam Ambil</th>
            <th>Action</th>
        </thead>

        <tbody>
            <?php 
                
                if($stmt->rowCount()<1){
                    echo "<script> alert('Tidak pernah melakukan Transaksi') </script>";
                    // header("location: user.php");
                }else{
                    while($t=$stmt->fetch()){
                        ?>
                        <tr>
                            <form action="user-header-pesanan.php" method="POST">
                                <td>
                                    <?= $t['order_id']?>
                                    <input type='hidden' name='id' value='<?= $t['order_id']?>'/>
                                </td>
                            </form>
                            <td><?= $t['total_tagihan']?></td>
                            <td><?= $t['status']?></td>
                            <td><?= $t['tanggal_mulai']?></td>
                            <td><?= $t['tanggal_akhir']?></td>
                            <td><?= $t['jam_ambil']?></td>
                            <td>
                                    
                                <a href="user-header-pesanan.php?action=detail&id=<?= $t['order_id'] ?>">
                                         <button class="detail-button"><span> Detail </span></button>
                                </a>
                                    
                            </td>
                        </tr>
                    <?php    
                    }
                }
            ?>
        </tbody>
    </table> <br><br>
    <button class ="button" >
        <a href="user.php" style="text-decoration : none; color : white;">
            Go Back
        </a>
    </button>
</body>
</html>