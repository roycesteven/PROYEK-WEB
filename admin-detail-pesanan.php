<?php 
    require_once("connection.php");
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';
    $id = $_SESSION['idfinal'];

    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"] == "balik"){
            unset($_SESSION['idfinal']);

            header("location:admin-header-pesanan.php");
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
    <title> No. Nota : IS <?= $id ?> | Indosuroboyo.com</title>
    <link rel="stylesheet" href="admin-detail-pesanan.css">
</head>
<body>
<div class="navigation">
            <div class="kiri">
               
               

            <a href="#" class="logo" style="color: white;">Indo<span style="color: green;">Suroboyo</span></a>
                <a href="admin.php" style="padding-top:20px">Admin User</a>
                <a href="admin-mobil.php" style="padding-top:20px">Admin Mobil</a>
                <a href="admin-header-pesanan.php" style="padding-top:20px">Riwayat Transaksi</a>
                <a href="admin-ongoing.php" style="padding-top:20px">Transaksi On-going</a>

            </div>
            <div class="kanan">
                <a id= "login" href="user.php?action=logout">Log out</a>
            </div>
        </div>
        
        
    
     <br>
    <table class="styleTable" method = "POST">
    <h1>No. Nota : IS <?= $id ?></h1>
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
                                <td><?= $nomor;?></td>
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
        <a href="admin-detail-pesanan.php?action=balik" style="text-decoration : none; color : white;">
            Go Back
        </a>
    </button>
</body>
</html>