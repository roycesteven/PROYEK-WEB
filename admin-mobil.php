<?php
    require_once("connection.php");
    $stmt = $pdo-> prepare("SELECT * FROM mobil");
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
    <link rel="stylesheet" href="admin-mobil2.css">
    <title>Document</title>
    <style>
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
    <script language="JavaScript" type="text/javascript">
    function editStatusFunction(){
        var proceed = confirm('Are you sure?');
        if(proceed){
            form1.submit();
        }else{
            event.preventDefault();
        }
    }

    function deleteMobilFunction(){
        var proceed = confirm('Are you sure?');
        if(proceed){
            form2.submit();
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
                <a href="admin.php" style="padding-top:20px">Admin User</a>
                <a href="admin-header-pesanan.php" style="padding-top:20px" >Riwayat Transaksi</a>
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
                <h1>Master Mobil</h1>
                <br>
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
                <input type="text" name="s_key" id="s_key" class="inputKey" placeholder = "Masukan Key">
                <button id="search" name="search" class="cari-button">Cari</button>
            </form>
            <br>
            <table id="tabel" class="styleTable" method = "POST">
                <thead>
                    <th>Id</th>           
                    <th>Nama Mobil</th>
                    <th>Bahan Bakar</th>
                    <th>Tahun Pembuatan</th>
                    <th>Jenis</th>
                    <th colspan="2">Status</th>
                    <th>Images</th>
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
                                            <td><?= $t['tahun']?></td>
                                            <td><?= $t['jenis']?></td>
                                            <?php
                                                if($t['status']=="Available"){
                                                    ?>
                                                    <td colspan="2"><?= $t['status']?></td>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <td><?= $t['status']?></td>
                                                    <td>
                                                    <form name="form1" method="post" action="kumpulan.php">
                                                        <input type="hidden" name="action" value="editStatusMobil">
                                                        <button type="submit" name="id_mobil" value="<?= $value['id']?>" class="editStatus-button" onclick="editStatusFunction()"><span>Ubah Status </span></button>
                                                    </form>
                                                    </td>
                                                    <?php
                                                }
                                            ?>
                                            <td><img src="Asset/mobil/<?= $value['id']?>.jpg" alt="Doesnt have images yet"></td>
                                            <td>
                                                <a href="editMobil.php?id=<?=$value['id']?>">
                                                    <button class="editMobil-button"><span>Edit </span></button>
                                                </a>
                                            </td>
                                            <td>
                                                <form name="form2" method="post" action="kumpulan.php">
                                                    <input type="hidden" name="action" value="deleteMobil">
                                                    <button name='id' value="<?= $value['id']?>" class="delMobil-button" onclick="deleteMobilFunction()"><span>Delete </span></button>
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
                            header("Location:admin-mobil.php");
                        }else{
                            echo "<script>alert('Isi filter dengan benar')</script>";
                            header("Location:admin-mobil.php");
                        }
                    }else{
                        if ($users !== null) {
                            foreach ($users as $key => $value) {
                            ?>
                            <tr>
                            <td><?= $value['id']?></td>
                            <td><?= $value['nama_mobil']?></td>
                            <td><?= $value['bahan_bakar']?></td>
                            <td><?= $value['tahun']?></td>
                            <td><?= $value['jenis']?></td>
                            <?php
                                //  ditutup sementara

                                // if($value['status']=="Available"){
                                ?>
                                <td colspan="2"><?= $value['status']?></td>
                                <?php
                                // }
                                // else{
                                ?>
                               
                                <!-- <td><?php 
                                // echo $value['status']
                                ?></td>
                                <td>
                                <form name="form1" method="post" action="kumpulan.php">
                                    <input type="hidden" name="action" value="editStatusMobil">
                                    <button type="submit" name="id_mobil" value="
                                    <?php 
                                    // echo $value['id'];
                                    ?>
                                    " class="editStatus-button" onclick="editStatusFunction()"><span>Ubah Status </span></button>
                                </form>
                                </td> -->

                                <!-- ditutup sementara -->
                                <?php
                                // }
                                ?>
                            <td><img src="Asset/mobil/<?= $value['id']?>.jpg" style="width: 200px; height:100px" alt="Doesnt have images yet"></td>
                            <td>
                                <a href="editMobil.php?id=<?=$value['id']?>">
                                    <button class="editMobil-button"><span>Edit </span></button>
                                </a>
                            </td>
                            <td>
                                <form name="form2" method="post" action="kumpulan.php">
                                    <input type="hidden" name="action" value="deleteMobil">
                                    <button name='id' value="<?= $value['id']?>" class="delMobil-button" onclick="deleteMobilFunction()"><span>Delete </span></button>
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
                <a href="tambah-mobil.php"><input type="button" value="Add Mobil" class="addMobil-button"> </a>
                <br><br>
            </div>
    </div>
</body>
</html>