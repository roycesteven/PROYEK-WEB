<?php 

require_once("connection.php");

$stmt = $pdo->query("SELECT * FROM penyewa");
$penyewa = $stmt->fetchAll(PDO::FETCH_ASSOC);


$penyewa_id;

  foreach($penyewa as $key => $value){
    if($value['username'] == $_SESSION['userLogin']){
          $penyewa_id=$value['id'];
        
    }
}


if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="addKelengkapan"){
        
         
        $nik = $_POST["nik"];
        $phone = $_POST["phone"];
        $alamat = $_POST["alamat"];
        $kota = $_POST["kota"];
       
          $result = false;
          
            $stmt = $pdo->prepare("UPDATE penyewa SET nik=:nik , no_telp=:no_telp, alamat=:alamat, kota=:kota WHERE id = :id");
            $stmt->bindParam(":nik",$nik);
            $stmt->bindParam(":no_telp",$phone);
            $stmt->bindParam(":alamat",$alamat);
            $stmt->bindParam(":kota",$kota);
            $stmt->bindParam(":id", $penyewa_id);
            $result = $stmt->execute();
         
          
          if($result == true){
              $_SESSION["message"] = "Berhasil memenuhi kelengkapan!";
              
            }
          
        
             header("Location:order-form.php");
          
        
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kelengkapan.css">
    <title>Form Kelengkapan | Indosuroboyo.com</title>
</head>
<body>
    <div class="container">
        <div class="register">
            <div class="card">
                <div class="kiri">
                    
                </div>
                <div class="kanan" style="">
                    <h1>Form Kelengkapan</h1>
                    <br> <br> 
                    <form action="kelengkapan.php?action=addKelengkapan"  method="POST">
                        
                        <input type="number" name="nik" id="nik" placeholder="Masukan NIK" required>
                        <br> <br>
                        <input   type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                        <br> <br>
                        <input  type="text" id="alamat" name="alamat" placeholder="Alamat" required>
                        <br>
                        <br>
                        <select  name="kota"  required>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

        </div>       
    </div>


    
</body>
</html>