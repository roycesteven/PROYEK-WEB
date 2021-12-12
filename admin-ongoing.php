<?php
    require_once("connection.php");
    $stmt = $pdo-> prepare("SELECT * FROM header_pesanan where status!='Selesai'");
        $stmt -> execute();
        $headers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo-> prepare("SELECT * FROM detail_pesanan");
        $stmt -> execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo-> prepare("SELECT * FROM penyewa ");
        $stmt -> execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    if(isset($_SESSION["message"])){
        echo "<script>alert('$_SESSION[message]')</script>";
        unset($_SESSION["message"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-header-pesanan.css">
    <title>Transaksi On-going | Indosuroboyo.com</title>
    <style>
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
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
            <hr>
        <div class="tabus">
            
            <br>
            <table id="tabel" class="styleTable" method = "POST">
                <h1>Transaksi On-going</h1>
                <br>
                <thead>
                    <th>No. Nota</th>           
                    <th>Nama Penyewa</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Jam Ambil</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php

                    if(isset($_POST['search'])){
                        if(isset($_POST['s_key']) && $_POST['s_key']!= "" && $_POST['s_attr']!=""){
                            $pencarian="%".$_POST['s_key']."%";
                            $attr = $_POST['s_attr'];
                            $sort = $_POST['s_sort'];
                            try{
                                if($sort == "ascending"){
                                    if($attr == "nama_mobil"){
                                        $stmt=$pdo->prepare("select * from MOBIL where nama_mobil like :nama ORDER BY nama_mobil ASC");
                                    }else if($attr == "id"){
                                        $stmt=$pdo->prepare("select * from MOBIL where id like :nama ORDER BY id ASC");
                                    }else if($attr == "bahan_bakar"){
                                        $stmt=$pdo->prepare("select * from MOBIL where bahan_bakar like :nama ORDER BY bahan_bakar ASC");
                                    }else if($attr == "jenis"){
                                        $stmt=$pdo->prepare("select * from MOBIL where jenis like :nama ORDER BY jenis ASC");
                                    }else if($attr == "status"){
                                        $stmt=$pdo->prepare("select * from MOBIL where status like :nama ORDER BY status ASC");
                                    }
                                }else if($sort == "descending"){
                                    if($attr == "nama_mobil"){
                                        $stmt=$pdo->prepare("select * from MOBIL where nama_mobil like :nama ORDER BY nama_mobil DESC");
                                    }else if($attr == "id"){
                                        $stmt=$pdo->prepare("select * from MOBIL where id like :nama ORDER BY id DESC");
                                    }else if($attr == "bahan_bakar"){
                                        $stmt=$pdo->prepare("select * from MOBIL where bahan_bakar like :nama ORDER BY bahan_bakar DESC");
                                    }else if($attr == "jenis"){
                                        $stmt=$pdo->prepare("select * from MOBIL where jenis like :nama ORDER BY jenis DESC");
                                    }
                                }else{
                                    if($attr == "nama_mobil"){
                                        $stmt=$pdo->prepare("select * from MOBIL where nama_mobil like :nama");
                                    }else if($attr == "id"){
                                        $stmt=$pdo->prepare("select * from MOBIL where id like :nama");
                                    }else if($attr == "bahan_bakar"){
                                        $stmt=$pdo->prepare("select * from MOBIL where bahan_bakar like :nama");
                                    }else if($attr == "jenis"){
                                        $stmt=$pdo->prepare("select * from MOBIL where jenis like :nama");
                                    }
                                }
                                $stmt->BindParam(":nama",$pencarian);
                                $stmt->execute();
                                if($stmt->rowCount()<1){
                                    echo "<i> Tidak ada hasil untuk pencarian kata </i>";
                                }else{

                                    while($t=$stmt->fetch()){
                                    ?>
                                    <tr>
                                            <td><?= $t['id']?></td>
                                            <td><?= $t['nama_mobil']?></td>
                                            <td><?= $t['bahan_bakar']?></td>
                                            <td><?= $t['jenis']?></td>
                                           
                                            <td>
                                                <a href="return-car.php?id=<?=$value['id']?>">
                                                    <button class="editMobil-button"><span>Return </span></button>
                                                </a>
                                            </td>
                                           
                                        </tr> 
                                    <?php
                                    }
                                }   
                            }catch(PDOException $e){
                                echo $e->getMessage();
                            }
                        }else if($_POST['s_attr']=="" && $_POST['s_key']!=""){
                            echo "<script>alert('Isi filter dengan benar')</script>";
                            $_SESSION["message"] = "Isi Filter Attribut dengan Benar";
                            header("Location:admin-mobil.php");
                        }else{
                            echo "<script>alert('Isi filter dengan benar')</script>";
                            header("Location:admin-mobil.php");
                        }
                    }else{
                        if ($users !== null) {
                            foreach ($headers as $key => $value) {
                            ?>
                            <tr>
                            <td>IS <?= $value['order_id']?></td>
                            <?php
                            foreach($users as $key => $val){
                                if($value['penyewa_id']==$val['id'])
                                {
                                    ?>
                                    <td><?= $val['nama']?></td>
                                    <?php
                                }
                            }
                            ?>
                            <td><?= $value['tanggal_mulai']?></td>
                            <td><?= $value['tanggal_akhir']?></td>
                            <td><?= $value['jam_ambil']?></td>
                            <td><?= $value['status']?></td>
                            <td>
                                    
                                <a href="admin-header-pesanan.php?action=detail&id=<?= $value['order_id'] ?>">
                                         <button class="detail-button"><span> Details </span></button>
                                </a>
                                    
                            </td>
                            <td>
                                <?php
                                if($value['status']=='Belum diambil'){
                                    ?>
                                    <a href="./controller/return-car.php?action=pick-up&id=<?=$value['order_id']?>"> <button class="detail-button pick-up"><span>Pick-up </span></button> </a>
                                <?php
                                }
                                else if($value['status']=='Berlangsung'){
                                    ?>
                                    <a href="./controller/return-car.php?action=return&id=<?=$value['order_id']?>"> <button class="detail-button kembali"><span>Return </span></button> </a>
                                <?php
                                }
                                ?>
                            </td>
                            
                        </tr>
                    <?php
                            }
                        }
                    }
                ?>
            </tbody>
            </table> 
        </div>
    </div>
</body>
<script>

var pick = document.querySelectorAll(".pick-up");
for (var i = 0; i < pick.length; i++) {
    pick[i].addEventListener('click', function(event) {
        if (confirm('Apakah anda yakin SEMUA mobil diambil?')) {
  // Save it!
  alert('Berhasil merubah status transaksi menjadi "Berlangsung"!');
} else {
  event.preventDefault();
}
    });
}

var kembali = document.querySelectorAll(".kembali");
for (var i = 0; i < kembali.length; i++) {
    kembali[i].addEventListener('click', function(event) {
        if (confirm('Apakah anda yakin SEMUA mobil sudah dikembalikan?')) {
  // Save it!
  alert('Berhasil merubah status transaksi menjadi "Selesai" dan status SEMUA mobil menjadi "Available!');
} else {
  event.preventDefault();
}
    });
}
    
   
</script>
</html>
