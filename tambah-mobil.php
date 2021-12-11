<?php
    require_once("connection.php");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah-mobil2.css">
    <title>Add Car | Indosuroboyo.com</title>
</head>
<body>
<div class="container">
        <div class="addcar">
            <div class="card">
                <div class="kiri">
                    
                </div>
                <div class="kanan" style="text-align: center;">
                    <h1>Add New Car</h1>
                    <form action="kumpulan.php" name="form1" id="form1" method="POST">
                    <input type="hidden" name="action" value="addMobil">
                        <table>
                            <tr>
                                <td style="padding-top: 20px; "> 
                                    <input style="margin-left: 15px;" type="text" name="nama_mobil" id="nama_mobil" placeholder="Masukan Nama Mobil" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="number" id="tahun" name="tahun" placeholder="Masukan Tahun" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <select name="bahan_bakar" id="bahan_bakar">
                                    <option value="Bensin">Bensin</option>
                                    <option value="Solar">Solar</option>
                                    <option value="Listrik">Listrik</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <select name="jenis" id="jenis">
                                    <option value="SUV">SUV</option>
                                    <option value="MPV">MPV</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Station Wagon">Station Wagon</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Convertible">Convertible</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="number" id="tarif" name="tarif_hari" placeholder="Masukan Tarif per Hari" required><br>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Add Mobil" id = "button">
                    </form>
                    
                    <p style="text-align: center; padding-top: 5px;">Back to Admin <a href="admin.php" >Here!</a> </p>
                </div>
            </div>

        </div>       
    </div>


</body>
</html>