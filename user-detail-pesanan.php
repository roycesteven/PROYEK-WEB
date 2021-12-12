<?php 
    require_once("connection.php");
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';
    $id = $_SESSION['idfinal'];

    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "balik"){
            unset($_SESSION['idfinal']);

            header("location:user-header-pesanan.php");
        }      
    }

    $stmt = $pdo-> prepare("SELECT * FROM mobil");
    $stmt -> execute();
    $mobils = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. Nota : <?= $id;?> | Indosuroboyo.com</title>
    <link rel="stylesheet" href="user-detail-pesanan.css">
</head>
<body>
    <div class="container">
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
           <br>

        <table class="styleTable" method = "POST">
        <h1> No. Nota : <?=$id; ?></h1>
        <br>
                    <thead>
                        <th>No. </th>           
                        <th>Nama Mobil</th>
                        <th>Tarif / Hari</th>

                    </thead>

                    <tbody>
                            <?php

                            $nomor=1;
                            $stmt = $pdo-> prepare("SELECT * FROM detail_pesanan where order_id = ?");
                            // $stmt->BindParam(":id",$id);
                            $stmt->execute([$id]);
                            if($stmt->rowCount()<1){
                                echo "<i> Tidak ada hasil untuk pencarian data </i>";
                            }else{

                                while($t=$stmt->fetch()){
                            ?>  
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <?php
                                        foreach($mobils as $key => $nilai){
                                            if($nilai['id'] == $t['mobil_id']){
                                                ?><td><?= $nilai['nama_mobil']?></td><?php
                                            }
                                        }

                                    ?>
                                    <td><?= $t['tarif_hari']?></td>
                                </tr>
                            <?php
                             $nomor++;
                                }
                            }
                            ?>              
                </tbody>
        </table> <br><br>
        <button class ="button" >
            <a href="user-detail-pesanan.php?action=balik" style="text-decoration : none; color : white;">
                Go Back
            </a>
        </button>
    </div>

</body>
</html>