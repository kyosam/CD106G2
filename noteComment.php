<?php
session_start();
//等登入功能好要刪掉下面
$_SESSION[memId] =1;
  try {
      require_once("connectDb.php");
      $sql="INSERT INTO `notecomment` (memNo,planNo,noteCommContent,noteCommDate,noteCommStatus)
            VALUES($_SESSION[memId],'$_REQUEST[planNo]','$_REQUEST[noteCommContent]',CURDATE(),'1')";
      $pdo->exec($sql);
      $planNo =$_REQUEST[planNo];
      header("Location:blogContent.php?planNo=$planNo"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>