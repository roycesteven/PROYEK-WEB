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
  
    
    if($username != "" && $password != "" && $confirmpass != "" && $phone != "" && $alamat != "" && $nik != ""){
      $result = false;
      if($password == $confirmpass){
              $stmt = $pdo -> prepare("INSERT INTO PENYEWA (nik	, username, password, nama, no_telp,alamat) VALUES (?,?,?,?,?,?)");
              $result = $stmt-> execute([
              $nik,$username,$password,$namalengkap,$phone,$alamat
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
        echo "<script> alert('ada field yang belum diisi'); </script>";
    }
}

?>