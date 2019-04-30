<?php

$errMsg = "";
$memNo = 1;
$orderDate=$_REQUEST["orderDate"];
$planNo=isset($_REQUEST["planNo"])==true? $_REQUEST["planNo"]:"null";
// exit("test");
$adults=$_REQUEST["adults"];
$adultsArr = explode(",", $adults); //num, type, price 
$ticketArr = array("","全票","半票","兒童票");
$number = $adultsArr[0];
// exit("=".$adultsArr[1]."=");
$type = array_search($adultsArr[1], $ticketArr);
$type = 1;
$price = mb_ereg_replace("元","",$adultsArr[2]);



$student=$_REQUEST["student"];
$studentArr = explode(",", $student);
$number2 = $studentArr[0];
$type2 = array_search($student[1], $ticketArr);
$price2 = mb_ereg_replace("元","",$studentArr[2]);
$type2 = 2;



$child=$_REQUEST["child"];
$childArr = explode(",", $child);
$number3 = $childArr[0];
$type3 = array_search($child[1], $ticketArr);
$type3 = 3;
$price3 = mb_ereg_replace("元","",$childArr[2]);
// echo $type3;
// exit(  "===");

$ordTotal = $_REQUEST["sumPayable"];




// $info = json_decode($_REQUEST["info"]);
// $orderDate = $info->orderDate;

// $orderTotal = $info->$orderTotal;
// $planNo = $planNo->$planNo;
// echo $orderDate . $adults . $child . $student . $sumPayable;

try{
    require_once("connect_order.php");
    //write into order master
    $sql  = "insert into `order` values(null, :memNo, '0', :orderDate, 0,  :orderTotal, $planNo)";
    //$sql2  = "insert into `order` values(null, $memNo, '0', '$orderDate',0, $ordTotal, $planNo)";

    //exit($sql2);
    $order = $pdo->prepare($sql);
    $order->bindValue(":memNo", $memNo);
    $order->bindValue(":orderDate", $orderDate);
    $order->bindValue(":orderTotal", $ordTotal);
    // $order->bindValue(":planNo", $planNo);
    $order->execute();
    $ordNo = $pdo->lastInsertId();
    //write into orderDetail
    // echo "order no : $ordNo ";

    $sql = "select * from `order` where ordNo =$ordNo";

    //  exit($type.$type2.$type3);
    $tktNoArr = [$type,$type2,$type3];
    $tktPriceArr =[$price,$price2,$price3];
    $buyQuanArr =[$number,$number2,$number3];
    // exit(var_dump($buyQuanArr));
    $sql5= "insert into `orderdetail` value (:ordNo,:tktNo,:tktPrice,:buyQuan)";

    $member = $pdo->prepare($sql5);
    $member->bindValue(":ordNo", $ordNo);
    
    foreach( $tktNoArr as $i=>$data){
        // echo $tktNoArr[$i],"==",$tktPriceArr[$i],"===",$buyQuanArr[$i],"<br>";
        $member->bindValue(":tktNo", $tktNoArr[$i]);
        $member->bindValue(":tktPrice", $tktPriceArr[$i]);
        $member->bindValue(":buyQuan", $buyQuanArr[$i]);
        $member->execute();       
    }
    // exit("....");


}catch(PDOException $e){
    $errMsg .= "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號" . $e->getLine() . "<br>";
    echo $errMsg;
}
?>