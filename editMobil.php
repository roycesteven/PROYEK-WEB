<?php
    require_once("connection.php");
    
    $id_mobil = $_GET['id'];
    
    $stmt = $pdo-> prepare("SELECT * FROM mobil WHERE ID = :id");
    $stmt->BindParam(":id",$id_mobil);
    $stmt->execute();
    $mobils = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($mobils as $key => $value){
        $nama_mobil = $value['nama_mobil'];
        $tahun = $value['tahun'];
        $bahan_bakar = $value['bahan_bakar'];
        $jenis = $value['jenis'];
        $tarif = $value['tarif_hari'];
        $status = $value['status'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil | Indosuroboyo.com</title>
    <link rel="stylesheet" href="edit-mobil2.css">
</head>
<body>
<div class="container">
        <div class="addcar">
            <div class="card">
                <div class="kiri">
                    
                </div>
                <div class="kanan" style="text-align: center;">
                    <h1>Edit Mobil</h1>
                    <form action="kumpulan.php" name="form1" id="form1" method="POST">
                    <input type="hidden" name="action" value="editMobilku">
                    <input type="hidden" name="id_mobil" value="<?=$id_mobil?>">
                        <table>
                            <tr>
                                <td style="padding-top: 20px; "> 
                                    <input style="margin-left: 15px;" type="text" name="nama_mobil" id="nama_mobil" placeholder="Masukan Nama Mobil" required value="<?= $nama_mobil ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="number" id="tahun" name="tahun" placeholder="Masukan Tahun" required value="<?= $tahun ?>"><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <select name="bahan_bakar" id="bahan_bakar">
                                    <?php
                                    if($bahan_bakar=="Bensin"){
                                        ?><option value="Bensin" selected>Bensin</option>
                                    <?php
                                    }else{
                                        ?><option value="Bensin">Bensin</option>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($bahan_bakar=="Solar"){
                                        ?><option value="Solar" selected>Solar</option>
                                    <?php
                                    }else{
                                        ?><option value="Solar">Solar</option>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($bahan_bakar=="Listrik"){
                                        ?><option value="Listrik" selected>Listrik</option>
                                    <?php
                                    }else{
                                        ?><option value="Listrik">Listrik</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <select name="jenis" id="jenis">
                                    <?php
                                        if($jenis=="SUV"){
                                            ?><option value="SUV" selected>SUV</option>
                                        <?php
                                        }else{
                                            ?><option value="SUV">SUV</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="MPV"){
                                            ?><option value="MPV" selected>MPV</option>
                                        <?php
                                        }else{
                                            ?><option value="MPV">MPV</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="Hatchback"){
                                            ?><option value="Hatchback" selected>Hatchback</option>
                                        <?php
                                        }else{
                                            ?><option value="Hatchback">Hatchback</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="Station Wagon"){
                                            ?><option value="Station Wagon" selected>Station Wagon</option>
                                        <?php
                                        }else{
                                            ?><option value="Station Wagon">Station Wagon</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="Sedan"){
                                            ?><option value="Sedan" selected>Sedan</option>
                                        <?php
                                        }else{
                                            ?><option value="Sedan">Sedan</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="Coupe"){
                                            ?><option value="Coupe" selected>Coupe</option>
                                        <?php
                                        }else{
                                            ?><option value="Coupe">Coupe</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($jenis=="Convertible"){
                                            ?><option value="Convertible" selected>Convertible</option>
                                        <?php
                                        }else{
                                            ?><option value="Convertible">Convertible</option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="number" id="tarif" name="tarif_hari" placeholder="Masukan Tarif per Hari" required value="<?= $tarif ?>"><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; "> 
                                    <select name="status" id="status">
                                    <?php
                                        if($status=="Available"){
                                            ?><option value="Available" selected>Available</option>
                                        <?php
                                        }else{
                                            ?><option value="Available">Available</option>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($status=="Not Available"){
                                            ?><option value="Not Available" selected>Not Available</option>
                                        <?php
                                        }else{
                                            ?><option value="Not Available">Not Available</option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Edit Mobil" id = "button">
                    </form>
                    
                    <p style="text-align: center; padding-top: 5px;">Back to Master Mobil <a href="admin-mobil.php" >Here!</a> </p>
                </div>
            </div>

        </div>       
    </div>
</body>
</html>