<?php
    require_once("connection.php");

    


    

    $stmt = $pdo->query("SELECT * FROM penyewa");
    $penyewa = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
        $_SESSION['date_mulai']= new DateTime($_POST['date_mulai']);
        $_SESSION['tanggal_mulai'] = $_POST['date_mulai'];
        $_SESSION['tanggal_akhir'] = $_POST['date_akhir'];
        $_SESSION['date_akhir']=new DateTime($_POST['date_akhir']);
        $_SESSION['jam_ambil'] = $_POST['jam_ambil'];
        $diff= $_SESSION['date_akhir']->diff($_SESSION['date_mulai']);
    
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carts.css">
    <title>Order Form</title>
</head>
<body>  
        <div class="container">
        <div class="navigation">
                <div class="kiri">
                    <a href="index.php" class="logo">LOGO</a>
                    <a href="produk-list.php">Products</a>
                    <a href="#container2">About Us</a>
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
        <div class="container1">
            <h1>Order Summary</h1>
            <div class="carts">
            <table border='1'>
                        <tr>
                        <th>Nomor</th>
                        <th>Nama Mobil</th>
                        <th>Bahan Bakar</th>
                        <th>Kategori</th>
                        <th>Tarif per hari</th>
                        <th>Subtotal</th>
                        </tr>
                        <?php
                            $id=1;
                            $_SESSION['total']=0;
                            if(isset($_SESSION['carts'])){
                            foreach( $_SESSION['carts'] as $key => $value)
                            {
                        ?>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $value['nama_mobil']; ?></td>
                            <td><?= $value['bahan_bakar']; ?></td>
                            <td><?= $value['jenis']; ?></td> 
                            <td>Rp. <?= $value['tarif_hari']; ?>,-</td> 
                            <td>Rp. <?= (int)( $diff->d )*$value['tarif_hari'];?>,-  </td>                    
                        </tr>
                        <?php
                        $id++;
                        $_SESSION['total']+=(int)( $diff->d )*$value['tarif_hari'];
                             }
                        }
                        ?>
                        <tr>
                            <td colspan='5'>Total : </td>
                            <td>Rp. <?= $_SESSION['total']; ?>,-</td>
                        </tr>
                        </table>
            </div>
            <form action="./controller/control-order.php">
                <input type="hidden" name="action" value="checkout">
                <input type="submit" value="Checkout">
            </form>
        </div>
    
    
   
</html>