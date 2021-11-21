<?php 

require_once("connection.php");

$action = $_REQUEST["action"];

if($action == "Register"){
    $nik = $_POST["nik"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $confirmpass = $_POST["repwd"];
    $namalengkap = $_POST["nama"];
    $phone = $_POST["phone"];
    $alamat = $_POST["alamat"];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
  
    
    if($username != "" && $password != "" && $confirmpass != "" && $phone != "" && $alamat != "" && $nik != "" &&$kota != "" && $email != ""){
      $result = false;
      if($password == $confirmpass){
              $stmt = $pdo -> prepare("INSERT INTO PENYEWA (nik	, username, password, nama, no_telp,alamat,kota,email) VALUES (?,?,?,?,?,?,?,?)");
              $result = $stmt-> execute([
              $nik,$username,$password,$namalengkap,$phone,$alamat,$kota,$email
          ]);
      }else{
          echo "<script> alert('Password dan Confirm password Tidak sama'); </script>";
      }
      
      if($result == true){
          $_SESSION["message"] = "Berhasil add nih";
        }
        else{
          $_SESSION["message"] = "Gagal add nih";
        }
    
         header("Location:register.php");
      
    }else{
        echo "<script> alert('Ada field yang belum diisi'); </script>";
    }
}else if($action=="addMobil"){
    $nama = $_POST['nama_mobil'];
    $tahun = $_POST['tahun'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $jenis = $_POST['jenis'];
    $tarif = $_POST['tarif'];
    $status = "Available";

    if($nama != "" && $tahun!="" && $bahan_bakar != "" && $jenis != ""){
        $result = false;
        $stmt = $pdo -> prepare("INSERT INTO MOBIL (nama_mobil, tahun, bahan_bakar,jenis, tarif, status) VALUES (?,?,?,?,?,?)");
        $result = $stmt -> execute([$nama,$tahun,$bahan_bakar,$jenis,$tarif,$status]);
        if($result == true){
            $_SESSION["message"] = "Berhasil add nih";
        }
        else{
            $_SESSION["message"] = "Gagal add nih";
        }
        header("Location:admin-mobil.php");
    }else{
        echo "<script> alert('Ada field yang belum diisi'); </script>";
    }
}

?>