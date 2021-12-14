<?php
    require_once("connection.php");

    


    

    $stmt = $pdo->query("SELECT * FROM penyewa");
    $penyewa = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tanggal_mulai = date('Y-m-d', time());
    $tanggal_akhir = $_POST['date_akhir'];
    $jamambil = $_POST['jam_ambil'];
    // $_SESSION['gagal'];
    if($tanggal_mulai != "" && $tanggal_akhir != "" && $jamambil != ""){
        $_SESSION['date_mulai']= new DateTime($tanggal_mulai);
        $_SESSION['tanggal_mulai'] = $tanggal_mulai;
        $_SESSION['tanggal_akhir'] = $tanggal_akhir;
        $_SESSION['date_akhir']=new DateTime($_POST['date_akhir']);
        $_SESSION['jam_ambil'] = $jamambil;
        //$diff= $_SESSION['date_akhir']->diff($_SESSION['date_mulai']);
        $now = time();
        $end_date = strtotime($tanggal_akhir);
        $datediff = $end_date - $now;
        $diff = round($datediff/(60*60*24));
        unset($_SESSION['gagal']);
    }else{    
        header("location: carts.php");
        $_SESSION['gagal'] = "Ada field yang belum diisi";
    }

    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=='Go back'){
            unset($_SESSION['gagal']);
            header("location: carts.php");
        }else if($_REQUEST['action']=='go back to list produk'){
            unset($_SESSION['gagal']);
            header("location: produk-list.php");
        }
    }
        
    
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carts.css">
    <title>Order Summary | Indosuroboyo.com</title>
</head>
<body>  
        <div class="container">
        <div class="navigation">
                <div class="kiri">
                <a href="index.php" class="logo" style="color: white;">Indo<span style="color: green;">Suroboyo</span></a>
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
            <br>
            <h1 style="text-align: center;">Order Summary</h1>
            <br><br>
            <div class="carts">
                <table class="styleTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Mobil</th>
                                <th>Bahan Bakar</th>
                                <th>Kategori</th>
                                <th>Tarif per hari</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td>Rp. <?= $value['tarif_hari']; ?></td> 
                                <td>Rp. <?= $diff*$value['tarif_hari'];?>  </td>                    
                            </tr>
                            <?php
                            $id++;
                            $_SESSION['total']+= $diff*$value['tarif_hari'];
                                }
                            }
                            ?>
                            <tr>
                                <td colspan='5'>Total : </td>
                                <td>Rp. <?= $_SESSION['total']; ?></td>
                            </tr>
                        </tbody>   
                            
                </table>
            </div> <br><br>
            <div class="summary">
                <h2>Details</h2>
                <p>Tanggal Mulai : <?= $_SESSION['tanggal_mulai'] ?></p>
                <p>Tanggal Akhir : <?= $_SESSION['tanggal_akhir'] ?></p>
                <p>Jam Ambil : <?= $_SESSION['jam_ambil'] ?></p> <br>
                <a href="./controller/control-order.php?action=checkout"><button class="checkout-button" style="margin-left:180px; margin-bottom:30px" > <span> CheckOut</span></button></a>
                <!-- <form action="./controller/control-order.php" style="text-align:center; padding-top:10px">
                    <input type="hidden" name="action" value="checkout">
                    <input type="submit" value="Checkout">
                </form> -->
            </div>
            
            <a href="order-form.php?action=Go back"><button class="back-button"> <span> Go Back</span></button></a>
        </div>
    
    
   
</html>