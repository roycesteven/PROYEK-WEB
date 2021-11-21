<?php 
    require_once("connection.php");
    $stmt = $pdo-> prepare("SELECT * FROM PENYEWA");
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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
    <style>
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <div class="container2">
        <a id= "login" href="user.php?action=logout">Log-Out</a>
            <div id="why">
                <h1 style="font-size: 50px;">SELAMAT DATANG ADMIN!!!</h1>
                <p style="font-size: 25px; padding: 8px;">Kerja yang bener yaaa, harus semangat. Inget Shoppe-Pay gabisa lunas sendiri</p>
                <p style="font-size: 25px; padding: 8px;"> Ke Menu Admin Mobil <a href="admin-mobil.php"> Here! </a> </p>
            </div>
            <hr> <br><br>
            <div class="tabus">

            <form action="#" method = "POST">
                <h2>Cari</h2> <br>
                <select name="s_attr" id="s_attr">
                    <option value="">Filter Attribut</option>
                    <option value="id">Id</option>
                    <option value="username">Username</option>
                    <option value="nama">Nama</option>
                    <option value="email">Email</option>
                    <option value="nomor_telp">Nomor Telpon</option>
                    <option value="alamat">Alamat</option>
                    <option value="kota">Kota</option>
                </select>
                <select name="s_sort" id="s_sort">
                    <option value="">Sort By</option>
                    <option value="ascending">Ascending</option>
                    <option value="descending">Descending</option>
                </select>  
                <input type="text" name="s_key" id="s_key" placeholder = "Masukan Key">
                <button id="search" name="search">Cari</button>
            </form>
            
            <br><br>
            <table id="tabel" style="border-collapse: collapse;width: 100%;" method = "POST">

                <thead>
                    <th>Id</th>           
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Action</th>
                </thead>

                <tbody>
                <?php

                    if(isset($_POST['search'])){
                        $pencarian="%".$_POST['s_key']."%";
                        $attr = $_POST['s_attr'];
                        $sort = $_POST['s_sort'];
                        try{
                            if($sort == "ascending"){
                                if($attr == "username"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where username like :nama ORDER BY username ASC");
                                }else if($attr == "id"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where id like :nama ORDER BY id ASC");
                                }else if($attr == "nomor_telp"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where no_telp like :nama ORDER BY no_telp ASC");
                                }else if($attr == "alamat"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where alamat like :nama ORDER BY alamat ASC");
                                }else if($attr == "email"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where email like :nama ORDER BY email ASC");
                                }else if($attr == "kota"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where kota like :nama ORDER BY kota ASC");
                                }else if($attr == "nama"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where nama like :nama ORDER BY nama ASC");
                                }
                            }else if($sort == "descending"){
                                if($attr == "username"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where username like :nama ORDER BY username DESC");
                                }else if($attr == "id"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where id like :nama ORDER BY id DESC");
                                }else if($attr == "nomor_telp"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where no_telp like :nama ORDER BY no_telp DESC");
                                }else if($attr == "alamat"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where alamat like :nama ORDER BY alamat DESC");
                                }else if($attr == "email"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where email like :nama ORDER BY email DESC");
                                }else if($attr == "kota"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where kota like :nama ORDER BY kota DESC");
                                }else if($attr == "nama"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where nama like :nama ORDER BY nama DESC");
                                }
                            }else{
                                if($attr == "username"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where username like :nama");
                                }else if($attr == "id"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where id like :nama");
                                }else if($attr == "nomor_telp"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where no_telp like :nama");
                                }else if($attr == "alamat"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where alamat like :nama");
                                }else if($attr == "email"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where email like :nama");
                                }else if($attr == "kota"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where kota like :nama");
                                }else if($attr == "nama"){
                                    $stmt=$pdo->prepare("select * from PENYEWA where nama like :nama");
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
                                        <td><?= $t['username']?></td>
                                        <td><?= $t['nama']?></td>
                                        <td><?= $t['email']?></td>
                                        <td><?= $t['no_telp']?></td>
                                        <td><?= $t['alamat']?></td>
                                        <td><?= $t['kota']?></td>
                                        <td>
                                            <a href="editUser.php?id=<?=$value['id']?>">
                                                <button>Edit</button>
                                            </a>
                                            <form method="post" action="kumpulan.php">
                                                <input type="hidden" name="action" value="deleteUser">
                                                <button name='id' value="<?= $value['id']?>">Delete</button>
                                            </form>
                                        </td>
                                    </tr> 
                                <?php
                                }
                            }   
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
                    }else{
                        if ($users !== null) {
                            foreach ($users as $key => $value) {
                            ?>
                            <tr>
                            <td><?= $value['id']?></td>
                            <td><?= $value['username']?></td>
                            <td><?= $value['nama']?></td>
                            <td><?= $value['email']?></td>
                            <td><?= $value['no_telp']?></td>
                            <td><?= $value['alamat']?></td>
                            <td><?= $value['kota']?></td>
                            <td>
                                <a href="editUser.php?id=<?=$value['id']?>">
                                    <button>Edit</button>
                                </a>
                                <form method="post" action="kumpulan.php">
                                    <input type="hidden" name="action" value="deleteUser">
                                    <button name='id' value="<?= $value['id']?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    }
                
                
                ?>
            </tbody>
                
                </table> <br><br><br><br>
                <a href="register.php"><input type="button" class="button" value="Add User" style = "background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>
                <br><br>
    </div>



</body>
</html>