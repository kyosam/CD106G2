<?php
session_start();
//等登入功能好要刪掉下面
// $memId=$_SESSION[memId];
$memNo=1;
$planNo = $_REQUEST["planNo"];
$noteName = $_REQUEST["noteName"];
$noteContent = $_REQUEST["noteContent"];
// $planNo =1;
// $noteName =123; 
// $noteContent =123;
try {
    require_once("connectDb.php");
    $sql="UPDATE `plan`SET noteName =:noteName,noteContent =:noteContent,noteStatus=1,noteDate=Now() where planNo=:planNo and memNo =:memNo";
    $noteSub = $pdo -> prepare($sql);
    $noteSub -> bindValue(":memNo",$memNo);
    $noteSub -> bindValue(":planNo",$planNo);
    $noteSub -> bindValue(":noteName",$noteName);
    $noteSub -> bindValue(":noteContent",$noteContent);
    $noteSub -> execute();
    header("Location:blog.php"); 
} catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>
