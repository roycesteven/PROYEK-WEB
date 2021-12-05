<?php 
        require_once("connection.php");
        // echo '<pre>';
        // var_dump($_SESSION);
        // echo '</pre>';
        $stmt = $pdo-> prepare("SELECT * FROM HEADER_PESANAN");
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

                        header("location:user-detail-pesanan.php");
    
                    }
                }
            }      
        }

        $stmt = $pdo-> prepare("SELECT * FROM PENYEWA");
        $stmt -> execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user-header-pesanan.css">
</head>
<body>
    <div id="why">
            <center>
            <h1 style="font-size: 50px;">Riwayat Transaksi</h1>
            </center>
    </div>
    <hr> <br><br>
    
    <table class = "styleTable" method = "POST">

                <thead>
                    <th>Order Id</th>           
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
                            <form action="user-header-pesanan.php" method="POST">
                                <td>
                                    <?= $value['order_id']?>
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
        <a href="admin.php" style="text-decoration : none; color : white;">
            Go Back
        </a>
    </button>        
</body>
</html>