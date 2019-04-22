<?php
  try {
      require_once("connectDb.php");
      $sql="INSERT INTO `notecommentreport` (noteCommNo,noteCommRepstatus) VALUES('$_REQUEST[noteCommNo]','0')";
      $pdo->exec($sql);
      header("Location:blogContent.php?planNo=$_REQUEST[planNo]"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>