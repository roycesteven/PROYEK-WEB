<?php
    require_once("connection.php");

    $id_user = $_GET['id'];
    
    $stmt = $pdo-> prepare("SELECT * FROM PENYEWA WHERE ID = :id");
    $stmt->BindParam(":id",$id_user);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($users as $key => $value){
        $nik = $value['nik'];
        $username = $value['username'];
        $password = $value['password'];
        $confpassword = $value['password'];
        $email = $value['email'];
        $nama_lengkap = $value['nama'];
        $telepon = $value['no_telp'];
        $alamat = $value['alamat'];
        $kota = $value['kota'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="edit-user.css">
</head>
<body>
<div class="container">
        <div class="register">
            <div class="card">
                <div class="kiri">
                    
                </div>
                <div class="kanan" style="text-align: center;">
                    <h1>Edit User Form</h1>
                    <form action="kumpulan.php" name="form1" id="form1" method="POST">
                    <input type="hidden" name="action" value="editUser">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <table>
                            <tr>
                                <td style="padding-top: 20px; "> 
                                    <input style="margin-left: 15px;" type="number" name="nik" id="nik" placeholder="Masukan NIK" required value="<?= $nik ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;"  type="text" id="username" name="username" placeholder="Masukan Username" required value="<?= $username ?>"><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <input style="margin-left: 15px;"   type="password" id="pwd" name="pwd" placeholder="Masukan Password" required value="<?= $password ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <input 
                                style="margin-left: 15px;" type="password" id="repwd" name="repwd" placeholder="Masukan Ulang Password" required value="<?= $confpassword ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="email" id="email" name="email" placeholder="Masukan email" required value="<?= $email ?>"><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 15px; padding-bottom: 20px;">
                                    <input style="margin-left: 15px;" type="text" id="nama" name="nama" placeholder="Masukan Nama lengkap" required value="<?= $nama_lengkap ?>">
                                </td>
                            </tr>

                            <tr>
                                <td> 
                                    <input style="margin-left: 15px;"  type="tel" id="phone" name="phone" placeholder="Phone Number" required value="<?= $telepon ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                    <input style="margin-left: 15px;" type="text" id="alamat" name="alamat" placeholder="Alamat" required value="<?= $alamat ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                    <input style="margin-left: 15px;" type="text" id="kota" name="kota" placeholder="Kota" required value="<?= $kota ?>">
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Edit" id = "button">
                    </form>
                    
                    <p style="text-align: center; padding-top: 15px;">Back to Master User <a href="admin.php" >Here!</a> </p>
                </div>
            </div>

        </div>       
    </div>


</body>
</html>