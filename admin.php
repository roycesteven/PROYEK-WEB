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
    <link rel="stylesheet" href="admin2.css">
    <title>Document</title>
    <script language="JavaScript" type="text/javascript">
    function deleteUserFunction(){
        var proceed = confirm('Are you sure?');
        if(proceed){
            form1.submit();
        }else{
            event.preventDefault();
        }
    }
    </script>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <div class="kiri">
               
               

                <a href="index.php" class="logo">IndoSuroboyo</a>
                <a href="admin-mobil.php" style="padding-top:20px">Admin Mobil</a>
                <a href="admin-header-pesanan.php" style="padding-top:20px">Riwayat Transaksi</a>
                <a href="admin-ongoing.php" style="padding-top:20px">Transaksi On-going</a>

            </div>
            <div class="kanan">
                <a id= "login" href="user.php?action=logout">Log-Out</a>
            </div>
        </div>
        <div id="why">
            <center>
            <h1 style="font-size: 50px;">WELCOME ADMIN</h1>
            </center>
        </div>
        <hr>
        <div class="tabus">
            <form action="#" method = "POST">
                <h1>Master User</h1>
                <br>
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
                <input type="text" name="s_key" id="s_key" class="inputKey" placeholder = "Masukan Key">
                <button id="search" name="search" class="cari-button">Cari</button>
            </form>
            <br>
            <table id="tabel" class="styleTable" method = "POST">
                <thead>
                    <th>Id</th>           
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                                                    <button class="editUser-button"><span>Edit </span></button>
                                                </a>
                                            </td>
                                            <td>
                                                <form name="form1" method="post" action="kumpulan.php">
                                                    <input type="hidden" name="action" value="deleteUser">
                                                    <button name='id' value="<?= $value['id']?>" class="delUser-button" onclick="deleteUserFunction()"><span>Delete </span></button>
                                                </form>
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
                            header("Location:admin.php");
                        }else{
                            echo "<script>alert('Isi filter dengan benar')</script>";
                            header("Location:admin.php");
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
                                    <button class="editUser-button"><span>Edit </span></button>
                                </a>
                            </td>
                            <td>
                                <form name="form1" method="post" action="kumpulan.php">
                                    <input type="hidden" name="action" value="deleteUser">
                                    <button name='id' value="<?= $value['id']?>" class="delUser-button" onclick="deleteUserFunction()"><span>Delete </span></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    }
                ?>
            </tbody>
                </table> <br>
                <a href="register-admin.php"><input type="button" class="addUser-button" value="Add New User"> </a>
                <br><br>
        </div>
</body>
</html>