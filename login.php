<?php 
    require_once("connection.php");

    $stmt = $pdo-> prepare("SELECT * FROM penyewa");
    $stmt -> execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if(isset($_POST['login'])){
        $usnm = $_POST['username'];
        $pass = $_POST['pwd'];


        if($usnm == 'admin' && $pass == 'admin'){
            // echo "<script> alert ('Masuk sebagai admin');</script>";
            $_SESSION['userLogin'] = $usnm;
            header("location:admin.php");    
        }

        if($usnm != "" && $pass != ""){
            
            try{
                $stmt = $pdo-> prepare("SELECT * FROM penyewa WHERE username = :username AND password = :pass");
                $stmt->bindParam(':username', $usnm);
                $stmt->bindParam(':pass', $pass);
                $stmt->execute();

                $count = $stmt->rowCount();
                if($count == 1) {
                    $_SESSION['userLogin'] = $usnm;
                    $id = $pdo-> query("SELECT id FROM `penyewa` WHERE USERNAME = '$usnm'");
                    $id2 = $id->fetch();
                    $_SESSION['id'] = $id2['id'];
                    if(isset($_SESSION['active'])){
                        header($_SESSION['active']);
                        // header('location:./produk-list.php');
                    }else{
                        /* error

                        echo "<script> alert ('Anda Berhasil masuk');</script>";

                        error*/

                        header("Location: ./index.php");
                        
                        
                    }
                    
                    return;
                }else{
                    echo "<script> alert ('Username atau Password anda salah');</script>";
                }

            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }    
    }
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="login.css">
    </head>
   
    <body>
        <div class="container">
          <h1>Login</h1>
            <form action="login.php" name="form1" method= "post">
                <label>Username</label><br>
                <input type="text" id="username" name="username"><br>
                <label>Password</label><br>
                <input type="password"  id="pwd" name="pwd"><br>
                <button>
                    <input type="hidden" name="login">
                    Log in
                </button>

                
            </form><br>
            <p style="text-align: center; padding-top: 15px;">Register <a href="register.php">Here!</a></p>
        </div>     
    </body>
</html>