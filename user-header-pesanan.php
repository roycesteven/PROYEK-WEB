<?php
    require_once("connection.php");
    $userid_trans = $_SESSION['id'];
    
    $stmt = $pdo -> prepare("SELECT * FROM header_pesanan where penyewa_id = :id");
    $stmt->bindParam(":id",$userid_trans);
    $stmt -> execute();
    $headers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "detail"){
            $id = $_REQUEST["id"];
            $_SESSION['idfinal']= $id;

            header("location:user-detail-pesanan.php");
        }
        else if ($_REQUEST["action"] == "filter"){
            $status=$_POST['status'];
            if($status=='All'){
                $stmt = $pdo -> prepare("SELECT * FROM header_pesanan where penyewa_id = :id");
                $stmt->bindParam(":id",$userid_trans);
                $stmt -> execute();
                $headers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $stmt = $pdo-> prepare("SELECT * FROM header_pesanan WHERE status= '$status'");
                $stmt -> execute();
                $headers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Riwayat Transaksi User | Indosuroboyo.com</title>
    <link rel="stylesheet" href="user-header-pesanan.css">
</head>
<body>
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
    </div>
    <div id="why">
                <center>
                <h1 style="font-size: 50px;">Riwayat Transaksi</h1>
                </center>
            </div>
        <hr> <br><br>
        <form action="user-header-pesanan.php?action=filter" method="POST">

        <select name="status" id="status">
            <option value="All">All</option>
            <option value="Belum diambil">Belum diambil</option>
            <option value="Berlangsung">Berlangsung</option>
            <option value="Selesai">Selesai</option>
        </select>
        <input type="submit" value="Filter" class="cari-button">
    </form>
    <br><br>
    <table class="styleTable">
        
    <thead>
                    <th>No. Nota</th>           
                    <th>Total Tagihan</th>
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Jam Ambil</th>
                    <th>Action</th>

                </thead>

                <tbody>
                        <?php
                        if ($headers !== null) {
                            foreach ($headers as $key => $value) {
                            ?>
                            <tr>
                            <form action="user-header-pesanan.php" method="POST">
                                <td>
                                    IS <?= $value['order_id']?>
                                    <input type='hidden' name='id' value='<?= $value['order_id']?>'/>
                                </td>
                            </form>                             
                            
                           
                            <td><?= $value['total_tagihan']?></td>
                            <td><?= $value['status']?></td>
                            <td><?= $value['tanggal_mulai']?></td>
                            <td><?= $value['tanggal_akhir']?></td>
                            <?php
                                if($value['status']=='Belum diambil'){
                                    ?>
                                    <td>N/A</td>
                                    <?php

                                }
                                else {
                                    ?>
                                    <td><?= $value['jam_ambil']?></td>
                                    <?php
                                }
                                ?>
                            <td>
                                    
                                <a href="user-header-pesanan.php?action=detail&id=<?= $value['order_id'] ?>">
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