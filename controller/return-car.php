<?php

    require_once("../connection.php");
    $id = $_REQUEST['id'];
    $status_mobil='Available';
   
            $stmt = $pdo->prepare("UPDATE mobil SET status=:status WHERE id = :id");
            $stmt->bindParam(":status", $status_mobil);
            $stmt->bindParam(":id", $id);

            $result = $stmt->execute();
          
    header('location:../admin-ongoing.php');
     

?>