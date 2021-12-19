<?php
   require_once("../connection.php");

   $stmt = $pdo->query("SELECT * FROM mobil");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset( $_REQUEST['id'])){
    $_SESSION['active_id']= $_REQUEST['id'];
}


if(isset($_REQUEST['action'])){
    $ada=false;
        if($_REQUEST['action']=='add' && isset($_SESSION['userLogin'])){
            if($products!=null){
                
                foreach($products as $key => $value){
                    if(isset($_SESSION['carts'])){
                        foreach($_SESSION['carts'] as $key => $val){
                            if($val['id']==$_REQUEST['id']){
                                    $ada=true;
                                    $_SESSION['message']='Produk sudah ada dalam cart!';
                            }
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
            $_SESSION['active']='location:./produk-list.php' ;
            header('location:../login.php');
        }

       

        if($_REQUEST['action']=='details' && isset($_SESSION['userLogin'])){
            header('location:../produk-details.php?id='. $_SESSION['active_id']);
        }
        else if($_REQUEST['action']=='details' && !isset($_SESSION['userLogin'])){
            $id = $_SESSION['active_id'];
            $_SESSION['active']='location:./produk-details.php?id='. $id ;
            header('location:../login.php');
        }



        if($_REQUEST['action']=='delete'){
            $i=0;
            $idx;
            foreach($_SESSION['carts'] as $key => $value){
                if($value['id']==$_REQUEST['id']){
                    $idx=$i;
                    break;
                }
                $i++;
            }
            $i=0;
            foreach($_SESSION['carts'] as $key => $value){
                if($i>=$idx && $i<sizeof($_SESSION['carts'])-1){
                   $_SESSION['carts'][$i]=$_SESSION['carts'][$i+1];
                
                }
                else if($i==sizeof($_SESSION['carts'])-1){
                    unset($_SESSION['carts'][$i]);
                }
                $i++;
            }
            header('location:../produk-list.php');
        }
    }
    unset($_SESSION['active_id']);
?>

