<?php
    require_once("connection.php");
    $stmt = $pdo-> prepare("SELECT * FROM MOBIL");
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
                <p style="font-size: 25px; padding: 8px;"> Ke Menu Admin<a href="admin.php"> Here! </a> </p>
            </div>
            <hr> <br><br>
            <div class="tabus">
            <form action="#" method = "POST">
                <h2>Cari</h2> <br>
                <select name="s_attr" id="s_attr">
                    <option value="">Filter Attribut</option>
                    <option value="id">Id</option>
                    <option value="nama_mobil">Nama Mobil</option> 
                    <option value="bahan_bakar">Bahan Bakar</option>
                    <option value="jenis">Jenis</option>
                    <option value="status">Status</option>
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
                    <th>Nama Mobil</th>
                    <th>Bahan Bakar</th>
                    <th>Jenis</th>
                    <th>Status</th>
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
                                }else if($attr == "status"){
                                    $stmt=$pdo->prepare("select * from MOBIL where status like :nama ORDER BY status DESC");
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
                                }else if($attr == "status"){
                                    $stmt=$pdo->prepare("select * from MOBIL where status like :nama");
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
                                        <td><?= $t['status']?></td>
                                        <td>
                                            <a href="editMobil.php?id=<?=$value['id']?>">
                                                <button>Edit</button>
                                            </a>
                                            <form method="post" action="kumpulan.php">
                                                <input type="hidden" name="action" value="deleteMobil">
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
                            <td><?= $value['nama_mobil']?></td>
                            <td><?= $value['bahan_bakar']?></td>
                            <td><?= $value['jenis']?></td>
                            <td><?= $value['status']?></td>
                            <td>
                                <a href="editMobil.php?id=<?=$value['id']?>">
                                    <button>Edit</button>
                                </a>
                                <form method="post" action="kumpulan.php">
                                    <input type="hidden" name="action" value="deleteMobil">
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
                <a href="tambah-mobil.php"><input type="button" class="button" value="Add Mobil" style = "background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>
                <br><br>
            </div>
    </div>
</body>
</html>