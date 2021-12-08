<?php
    require_once("connection.php");

    $userid = $_SESSION['id'];
    
    $stmt = $pdo -> prepare("SELECT * FROM penyewa where id like :id");
    $stmt->BindParam(":id",$userid);
    $stmt->execute();
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user-profile.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="Asset/gantengdewe.jpg" 
            alt="user" width="250" >
            <h4><?= $users['nama'] ?></h4>
            <p>Id Pelanggan : <?= $users['id']?></p>
            
        </div>
        <div class="right">
            <div class="info">
                <h3>User Information</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Full name</h4>
                        <p><?= $users['nama'] ?></p>
                    </div>
                    <div class="data">
                        <h4>NIK</h4>
                        <p><?= $users['nik'] ?></p>
                    </div>
                </div> <br><br>
                <div class="info_data">
                    <div class="data">
                        <h4>Phone</h4>
                        <p><?= $users['no_telp'] ?></p>
                    </div>
                    <div class="data">
                        <h4>Addres</h4>
                        <p><?= $users['alamat'] ?></p>
                    </div>
                </div> <br><br>
                <div class="info_data">
                    <div class="data">
                        <h4>Addres</h4>
                        <p><?= $users['alamat'] ?></p>
                    </div>
                    <div class="data">
                        <h4>City</h4>
                        <p><?= $users['kota'] ?></p>
                    </div>
                </div>
            </div>
        
            <div class="detail">
                <h3>Account Detail</h3>
                <div class="detail_data">
                    <div class="data">
                        <h4>Username</h4>
                        <p><?= $users['username'] ?></p>
                    </div>
                    <div class="data">
                        <h4>Customer Id</h4>
                        <p><?= $users['id'] ?></p>
                </div>
                </div>
            </div>
        
            <div class="social_media">
                <ul>
                    <li><a href="https://id-id.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/doniitt/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <button class ="button" >
                <a href="user.php" style="text-decoration : none; color : white;">
                    Go Back
                </a>
            </button>
        </div>
    </div>
</body>
</html>