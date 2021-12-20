<?php
    require_once("connection.php");   
    if(isset($_POST['action'])){
        header("location:./login.php");
    }

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
    <link rel="stylesheet" href="register.css">
    <title>Register | Indosuroboyo.com</title>
</head>
<body>
    <div class="container">
        <div class="register">
            <div class="card">
                <div class="kiri">
                    
                </div>
                <div class="kanan" style="text-align: center;">
                    <h1>Register Form</h1>
                    <form action="kumpulan.php" name="form1" id="form1" method="POST">
                    <input type="hidden" name="action" value="addUser">
                        <table>
                            <tr>
                                <td style="padding-top: 15px;">
                                    <input style="margin-left: 15px;" type="text" id="nama" name="nama" placeholder="Masukan Nama lengkap" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;" type="email" id="email" name="email" placeholder="Masukan email" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; ">
                                    <input style="margin-left: 15px;"  type="text" id="username" name="username" placeholder="Masukan Username" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px;">
                                <input style="margin-left: 15px;"   type="password" id="pwd" name="pwd" placeholder="Masukan Password" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 20px; padding-bottom: 20px;">
                                <input 
                                style="margin-left: 15px;" type="password" id="repwd" name="repwd" placeholder="Masukan Ulang Password" required>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Register" id = "button" name="action">
                    </form>
                    
                    <p style="text-align: center; padding-top: 15px;">Back to Login <a href="login.php" >Here!</a> </p>
                </div>
            </div>

        </div>       
    </div>


    
</body>
</html>