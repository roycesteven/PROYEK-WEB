<?php 
        require_once("connection.php");
        // echo '<pre>';
        // var_dump($_SESSION);
        // echo '</pre>';
        $stmt = $pdo-> prepare("SELECT * FROM header_pesanan");
        $stmt -> execute();
        $headers = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if(isset($_REQUEST["action"])){
            if($_REQUEST["action"] == "detail"){
                $id = $_REQUEST["id"];
                
                if($headers !== null){
                    $listHeader = $headers;
                }
                $cart= [];
                for($i = 0; $i < sizeof($listHeader); $i++){
                    if($id == $listHeader[$i]["order_id"]){
                        
                        $idTemp = $listHeader[$i]["order_id"];
                        
    
                        // $cart["id"] = $idTemp;
                        
                        $_SESSION['idfinal']= $idTemp;

                        header("location:admin-detail-pesanan.php");
    
                    }
                }
            }      
        }

        $stmt = $pdo-> prepare("SELECT * FROM penyewa");
        $stmt -> execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Riwayat Transaksi Admin | Indosuroboyo.com</title>
    <link rel="stylesheet" href="admin-header-pesanan.css">
</head>
<body>
<div class="container">
<div class="navigation">
            <div class="kiri">
               
               

                <a href="#" class="logo">IndoSuroboyo</a>
                <a href="admin.php" style="padding-top:20px">Admin User</a>
                <a href="admin-mobil.php" style="padding-top:20px">Admin Mobil</a>
                <a href="admin-header-pesanan.php" style="padding-top:20px">Riwayat Transaksi</a>
                <a href="admin-ongoing.php" style="padding-top:20px">Transaksi On-going</a>

            </div>
            <div class="kanan">
                <a id= "login" href="user.php?action=logout">Log out</a>
            </div>
        </div>
        <div id="why">
            <center>
            <h1 style="font-size: 50px;">WELCOME ADMIN</h1>
            </center>
        </div>
        
    <hr> <br><br>
    
    <table class = "styleTable" method = "POST">
        <h1>Riwayat Transaksi</h1>
        <br>
                <thead>
                    <th>No. Nota</th>           
                    <th>Nama Penyewa</th>
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
                            <form action="admin-header-pesanan.php" method="POST">
                                <td>
                                    IS <?= $value['order_id']?>
                                    <input type='hidden' name='id' value='<?= $value['order_id']?>'/>
                                </td>
                            </form>                             
                            
                            <?php
                                foreach($users as $keys => $nilai){
                                    if($nilai['id'] == $value['penyewa_id']){
                                        ?><td><?= $nilai['nama']?></td><?php
                                    }
                                }
                            ?>
                            <td><?= $value['total_tagihan']?></td>
                            <td><?= $value['status']?></td>
                            <td><?= $value['tanggal_mulai']?></td>
                            <td><?= $value['tanggal_akhir']?></td>
                            <td><?= $value['jam_ambil']?></td>
                            <td>
                                    
                                <a href="admin-header-pesanan.php?action=detail&id=<?= $value['order_id'] ?>">
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
        <a href="admin.php" style="text-decoration : none; color : white;">
            Go Back
        </a>
    </button>        
</body>
</html>