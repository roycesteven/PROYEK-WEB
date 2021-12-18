<?php

    require_once("../connection.php");

    date_default_timezone_set("Asia/Bangkok");

    $stmt = $pdo-> prepare("SELECT * FROM mobil");
    $stmt -> execute();
    $mobils = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo-> prepare("SELECT * FROM detail_pesanan");
    $stmt -> execute();
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $id = $_REQUEST['id'];
    $jam_ambil= date('H:i:s', time());

    if($_REQUEST['action']=='pick-up'){
        $status='Berlangsung';
   
        $stmt = $pdo->prepare("UPDATE header_pesanan SET status=:status,jam_ambil=:jam_ambil WHERE order_id = :id");
        $stmt->bindParam(":jam_ambil", $jam_ambil);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);

        $result = $stmt->execute();
      
        header('location:../admin-ongoing.php');

    }else if($_REQUEST['action']=='return'){
        $status_mobil='Available';

        foreach($details as $key => $value){
            
            if($value['order_id']==$id){
                foreach($mobils as $key => $val){
                    if($value['mobil_id']==$val['id']){
                        $stmt = $pdo->prepare("UPDATE mobil SET status=:status WHERE id = :id");
                        $stmt->bindParam(":status", $status_mobil);
                        $stmt->bindParam(":id", $val['id']);
                        $result = $stmt->execute(); 
                    }
                }
            }
            
            
        }

        $status='Selesai';
   
        $stmt = $pdo->prepare("UPDATE header_pesanan SET status=:status WHERE order_id = :id");
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);

        $result = $stmt->execute();

         header('location:../admin-ongoing.php');
    }
    
     

?>