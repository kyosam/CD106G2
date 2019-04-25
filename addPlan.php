<?php
session_start();
//等登入功能好要刪掉下面
// $memNo=$_SESSION[memNo];
$memNo=1;
$planName = $_REQUEST[planName];
$planList = $_REQUEST[planList];
  try {

      require_once("connectDb.php");
      $sql="INSERT INTO `plan` (memNo,planName,planStatus,planList) VALUES(:memNo,:planName,'1',:planList)";
      $plan = $pdo -> prepare($sql);
      $plan -> bindValue(":memNo",$memNo);
      $plan -> bindValue(":planName",$planName);
      $plan -> bindValue(":planList",$planList);
      $plan -> execute();

      header("Location:blogContent.php?planNo=$_REQUEST[planNo]"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>