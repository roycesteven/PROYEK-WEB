<?php

require_once("../connection.php");

$stmt = $pdo->query("SELECT * FROM penyewa");
$penyewa = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_REQUEST['action'])){
    if ($_REQUEST['action']=='checkout'){
        $carts = $_SESSION["carts"];
             
    $username = $_SESSION['userLogin'];
    $penyewa_id;
      foreach($penyewa as $key => $value){
          if($value['username'] = $username){
                $penyewa_id=$value['id'];
          }
      }

      $total_tagihan = $_SESSION['total'];
      $status='Belum diambil';
      $status_mobil = 'Rented';
      $tanggal_mulai = date("Y-m-d", strtotime($_SESSION['tanggal_mulai']));
      $tangal_akhir = date("Y-m-d", strtotime($_SESSION['tanggal_akhir']));
      
      $jam_ambil = $_SESSION['jam_ambil'];
      
      $ada=false;
      $result1=false;
      $result2=false;
   
    if($total_tagihan!=0){
      $ada=true;
    }
      if($ada){
        try{
          $pdo->beginTransaction();
          $stmt = $pdo->prepare("INSERT INTO header_pesanan(penyewa_id,total_tagihan, status,tanggal_mulai,tanggal_akhir,jam_ambil) values(?,?,?,?,?,?)");
          $result1 = $stmt->execute([$penyewa_id,$total_tagihan,$status,$tanggal_mulai,$tangal_akhir,$jam_ambil]);
          $order_id = $pdo->lastInsertId();
          $_SESSION['order_id']=$order_id;
          foreach ($carts as $key => $value) {
            $stmt = $pdo->prepare("INSERT INTO detail_pesanan(order_id, mobil_id, tarif_hari) values(?,?,?)");
            $result2 = $stmt->execute([$order_id, $value['id'], $value['tarif_hari']]);

            $stmt = $pdo->prepare("UPDATE mobil SET status=:status WHERE id = :id");

            $stmt->bindParam(":status", $status_mobil);
            $stmt->bindParam(":id", $value['id']);

            $result = $stmt->execute();
          }
    
          $pdo->commit();
        }catch(PDOException $e){
          $pdo->rollBack();
          throw $e;
        }
      }
     
      if($result1 && $result2){
        $_SESSION["message"] = "Transaksi Berhasil!";
        date_default_timezone_set('Asia/Singapore');
        $_SESSION['batas_waktu']=date("d-m-Y H:i:s");
      }
      else{
        $_SESSION["message"] = "Transaksi Gagal!";
        if(!$ada){
          $_SESSION["message"] = "Transaksi Gagal! Tidak ada product dalam cart!!!";
        }
      }
      unset($_SESSION["carts"]);
      unset($_SESSION['date_mulai']);
      unset($_SESSION['date_akhir']);
      header("Location: ../confirmation.php");
      }
}

?>