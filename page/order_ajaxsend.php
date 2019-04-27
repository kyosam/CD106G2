<?php
$errMsg = "";
$memNo = 1;
$tktNo=$_REQUEST["planlist"];
$tktPrice=$_REQUEST["total"];
$buyQuan=$_REQUEST["quan"];

try{
    require_once("connect_order.php");
    $sql5= "insert into orderdetaill value (null,:tktNo,:tktPrice,:buyQuan)";
    $plan = $pdo->query($sql5);
    $member->bindValue(":tktNo", $tktNo);
    $member->bindValue(":tktPrice", $tktPrice);
    $member->bindValue(":buyQuan", $buyQuan);
    $member->execute();
}catch(PDOException $e){
    $errMsg .= "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號" . $e->getLine() . "<br>";
    echo $errMsg;
}
?>