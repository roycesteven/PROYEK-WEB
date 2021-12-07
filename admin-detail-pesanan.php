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
    <title>Document</title>
    <link rel="stylesheet" href="admin-detail-pesanan.css">
</head>
<body>
    <div id="why">
            <center>
            <h1 style="font-size: 50px;">Detail Transaksi</h1>
            </center>
    </div>
    <hr> <br><br>

    <table class="styleTable" method = "POST">

                <thead>
                    <th>Order Id</th>           
                    <th>Nama Mobil</th>
                    <th>Tarif / Hari</th>

                </thead>

                <tbody>
                        <?php
                        $stmt = $pdo-> prepare("SELECT * FROM DETAIL_PESANAN where order_id = ?");
                        // $stmt->BindParam(":id",$id);
                        $stmt->execute([$id]);
                        if($stmt->rowCount()<1){
                            echo "<i> Tidak ada hasil untuk pencarian data </i>";
                        }else{

                            while($t=$stmt->fetch()){
                        ?>  
                            <tr>
                                <td><?= $t['order_id']?></td>
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