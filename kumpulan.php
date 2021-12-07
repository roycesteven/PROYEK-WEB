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
              $stmt = $pdo -> prepare("INSERT INTO penyewa (nik	, username, password, nama, no_telp,alamat,kota,email) VALUES (?,?,?,?,?,?,?,?)");
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
    $tarif_hari = $_POST['tarif_hari'];
    $status = "Available";

    if($nama != "" && $tahun!="" && $bahan_bakar != "" && $jenis != "" && $tarif!=""){
        $result = false;
        $stmt = $pdo -> prepare("INSERT INTO mobil (nama_mobil, tahun, bahan_bakar,jenis, tarif_hari, status) VALUES (?,?,?,?,?,?)");
        $result = $stmt -> execute([$nama,$tahun,$bahan_bakar,$jenis,$tarif_hari,$status]);
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
}else if($action=="editUser"){
    $id_user = $_POST['id_user'];
    $nik = $_POST["nik"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $confirmpass = $_POST["repwd"];
    $namalengkap = $_POST["nama"];
    $phone = $_POST["phone"];
    $alamat = $_POST["alamat"];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
  
    
    if($username != "" && $password != "" && $confirmpass != "" && $phone != "" && $alamat != "" && $nik != "" &&$kota != "" && $email != "" && $namalengkap!=""){
      $result = false;
      if($password == $confirmpass){
        $stmt = $pdo->prepare("UPDATE penyewa SET nik=:nik, username=:username,password=:password, nama=:nama , no_telp=:no_telp, alamat=:alamat, kota=:kota, email=:email WHERE id = :id");
        $stmt->bindParam(":nik", $nik);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":nama", $namalengkap);
        $stmt->bindParam(":no_telp", $phone);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":kota", $kota);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id_user);
        $result = $stmt->execute();
      }else{
          echo "<script> alert('Password dan Confirm password Tidak sama'); </script>";
      }
      
      if($result == true){
          $_SESSION["message"] = "Berhasil edit nih";
        }
        else{
          $_SESSION["message"] = "Gagal edit nih";
        }
    
         header("Location:admin.php");
      
    }else{
        echo "<script> alert('Ada field yang belum diisi'); </script>";
    }
}else if($action=="editMobilku"){
    $id_mobil = $_POST['id_mobil'];
    $nama = $_POST['nama_mobil'];
    $tahun = $_POST['tahun'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $jenis = $_POST['jenis'];
    $tarif_hari = $_POST['tarif_hari'];
    $status = $_POST["status"];
    
    if($nama != "" && $tahun!="" && $bahan_bakar != "" && $jenis != "" && $tarif !=""){
        $result = false;
        $stmt = $pdo->prepare("UPDATE mobil SET nama_mobil=:nama_mobil, tahun=:tahun, bahan_bakar=:bahan_bakar, jenis=:jenis, tarif_hari=:tarif_hari, status=:status WHERE id = :id");
        $stmt->bindParam(":nama_mobil", $nama);
        $stmt->bindParam(":tahun", $tahun);
        $stmt->bindParam(":bahan_bakar", $bahan_bakar);
        $stmt->bindParam(":jenis", $jenis);
        $stmt->bindParam(":tarif_hari", $tarif_hari);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id_mobil);
        $result = $stmt->execute();

        if($result == true){
            $_SESSION["message"] = "Berhasil edit nih";
        }
        else{
            $_SESSION["message"] = "Gagal edit nih";
        }
    
        header("Location:admin-mobil.php");
      
    }else{
        echo "<script> alert('Ada field yang belum diisi'); </script>";
    }
}else if($action=="editStatusMobil"){

    $result = false;
    $id_mobil = $_POST['id_mobil'];
    $ubah = "Available";
    $stmt = $pdo->prepare("UPDATE mobil SET status=:status WHERE id = :id");
    $stmt->bindParam(":status",$ubah);
    $stmt->bindParam(":id",$id_mobil);
    $result = $stmt->execute();

    if($result == true){
        $_SESSION["message"] = "Berhasil edit nih";
    }
    else{
        $_SESSION["message"] = "Gagal edit nih";
    }

    header("Location:admin-mobil.php");
}else if($action=="deleteMobil"){
    $id = $_POST['id'];
    $result = false;
    $stmt = $pdo->prepare("DELETE FROM mobil WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $result = $stmt->execute();

    if($result == true){
        $_SESSION["message"] = "Berhasil delete nih";
    }
    else{
        $_SESSION["message"] = "Gagal delete nih";
    }

    header("Location:admin-mobil.php");
}else if($action=="deleteUser"){
    $id = $_POST['id'];
    $result = false;
    $stmt = $pdo->prepare("DELETE FROM penyewa WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $result = $stmt->execute();

    if($result == true){
        $_SESSION["message"] = "Berhasil delete nih";
    }
    else{
        $_SESSION["message"] = "Gagal delete nih";
    }

    header("Location:admin.php");
}

?>