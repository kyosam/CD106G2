<?php
  try {
      require_once("connectDb.php");
      $sql="INSERT INTO `photoreport` (photoNo,photoRepStatus) VALUES('$_REQUEST[photoNo]','0')";
      $pdo->exec($sql);
      header("Location:game.php"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>