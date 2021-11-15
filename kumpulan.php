<?php 

require_once("connection.php");

$action = $_REQUEST["action"];

if($action == "Register"){
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $confirmpass = $_POST["repwd"];
    $phone = $_POST["phone"];
    $alamat = $_POST["alamat"];
    $gender = $_POST["gender"];
  
    
    if($username != "" && $password != "" && $confirmpass != "" && $phone != "" && $alamat != "" && $gender != ""){
      $result = false;
      if($password == $confirmpass){
              $stmt = $pdo -> prepare("INSERT INTO USER (username	, password, nomor_telp, alamat, gender) VALUES (?,?,?,?,?)");
              $result = $stmt-> execute([
              $username,$password,$phone,$alamat,$gender
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