<?php
   require_once("../connection.php");

   $stmt = $pdo->query("SELECT * FROM mobil");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['id'])){
    $_SESSION['active_id']= $_POST['id'];
}


if(isset($_REQUEST['action'])){
    $ada=false;
        if($_REQUEST['action']=='add' && isset($_SESSION['userLogin'])){
            if($products!=null){
                foreach($products as $key => $value){
                    foreach($_SESSION['carts'] as $key => $val){
                        if($val['id']==$_REQUEST['id']){
                                $ada=true;
                                $_SESSION['message']='Produk sudah ada dalam cart!';
                        }
                    }
                    if($value['id']==$_REQUEST['id'] && !$ada){
                        $_SESSION['carts'][]=$value;
                        break;
                    }
                 }
            }
            header('location:../produk-list.php');
               
        }
        else if($_REQUEST['action']=='add' && !isset($_SESSION['userLogin'])){
            $id = $_SESSION['active_id'];
            $_SESSION['active']='location:produk-details.php?id='. $id ;
            unset($_SESSION['active_id']);
            header('location:../login.php');
        }
    }

  

?>

