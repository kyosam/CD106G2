<?php
$errMsg = "";
$memNo = 1;
$tktNo=$_REQUEST["planlist"];
$tktPrice=$_REQUEST["total"];
$buyQuan=$_REQUEST["quan"];

$info = json_decode($_REQUEST["info"]);
$orderDate = $info->orderDate;

$orderTotal = $info->$orderTotal;
$planNo = $planNo->$planNo;


try{
    require_once("connect_order.php");
    //write into order master
    $sql  = "insert into `order` values(null, :memNo, '0', :orderDate, :ordTotal, :planNo)";


    $order = $pdo->prepare($sql);
    $order->bindValue(":memNo", $memNo);
    $order->bindValue(":orderDate", $orderDate);
    $order->bindValue(":orderTotal", $orderTotal);
    $order->bindValue(":planNo", $planNo);
    $order->execute();
    $ordNo = $pdo->lastInsertId();
    //write into orderDetail
    $sql5= "insert into orderdetaill value ($ordNo,:tktNo,:tktPrice,:buyQuan)";

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