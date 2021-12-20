<?php
    require_once("connection.php");
    $userid_trans = $_SESSION['id'];
    
    $stmt = $pdo -> prepare("SELECT * FROM HEADER_PESANAN where penyewa_id like :id");
    $stmt->BindParam(":id",$userid_trans);
    $stmt->execute();
    // $headers = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <title>Riwayat Transaksi User | Indosuroboyo.com</title>
    <link rel="stylesheet" href="user-transaction.css">
</head>
<body>
    <table class="styleTable">
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
                
                if($stmt->rowCount()<1){
                    echo "<script> alert('Tidak pernah melakukan Transaksi') </script>";
                    // header("location: user.php");
                }else{
                    while($t=$stmt->fetch()){
                        ?>
                        <tr>
                            <form action="user-transaction.php" method="POST">
                                <td>
                                    <?= $t['order_id']?>
                                    <input type='hidden' name='id' value='<?= $t['order_id']?>'/>
                                </td>
                            </form>
                            <td><?=$_SESSION['userLogin']?></td> 
                            <td><?= $t['total_tagihan']?></td>
                            <td><?= $t['status']?></td>
                            <td><?= $t['tanggal_mulai']?></td>
                            <td><?= $t['tanggal_akhir']?></td>
                            <td><?= $t['jam_ambil']?></td>
                            <td>
                                    
                                <a href="user-transaction.php?action=detail&id=<?= $t['order_id'] ?>">
                                         <button class="detail-button"><span> Detail </span></button>
                                </a>
                                    
                            </td>
                        </tr>
                    <?php    
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>