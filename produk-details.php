<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produk-details.css">
    <title>Document</title>
</head>
<body>
    <div class="container-utama">
        <header>
            <a href="index.php" class="logo">IndoSuroboyo</a>
                <div class="container"></div>
                <nav>
                    <ul>
                        <li><a href="produk-list.php" >Products</a></li>
                        <li><a href="#container2">About Us</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li><a href="login.php">Login</a></li> &nbsp;&nbsp;&nbsp;
                        <li><a href="register.php" class="active">Register</a></li>
                    </ul>
                </nav>
        </header>
        
        <div class="container">
            <div class="details">
                <div class="atas">
                    <img src="Asset/yaris.jpg" alt="">
                    <table>
                        <tr>
                            <td>Nama Mobil</td>
                            <td>: All New Yaris</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>: 2017</td>
                        </tr>
                        <tr>
                            <td>Bahan Bakar</td>
                            <td>: Bensin</td>
                        </tr>
                        <tr>
                            <td>Jenis Mobil</td>
                            <td>: Hatchback</td>
                        </tr>
                        <tr>
                            <td>Tarif Sewa</td>
                            <td>: Rp. 200,000 per hari</td>
                        </tr>
                    </table>
                </div>
                <div class="bawah">
                    <a href="#form"><button>Proceed</button></a>
                    <a href="produk-list.html"><button>Back</button></a>
                </div>
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
    </div>
    
   
</html>