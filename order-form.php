<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produk-details.css">
    <title>Order Form</title>
</head>
<body>  
        <div class="container">
            <div class="navigation">
                    <div class="kiri">
                        <a href="index.php" class="logo">LOGO</a>
                        <a href="produk-list.php">Products</a>
                        <a href="index.php#container2">About Us</a>
                    </div>
                    <div class="kanan">
                        <a href="login.php">Login</a>
                        <a href="register.php">Register</a>
                    </div>
            </div>
        <div class="container1">
            <div id="form">
                
                <br>
                <form action="confirmation.php" method="POST">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;"><h2>Order Form</h2></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Mulai</label></td>
                            <td>: <input type="date" name="date_mulai"></td>
                        </tr>
                        <tr>
                            <td><label for="">Tanggal Akhir</label></td>
                            <td>: <input type="date" name="date_akhir"></td>
                        </tr>
                        <tr>
                            <td><label for="">Jam Pick-up</label></td>
                            <td>: <input type="time"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><input type="submit" name="" id="submit_order" value="Order"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    
    
   
</html>