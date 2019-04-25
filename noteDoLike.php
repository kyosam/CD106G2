<?php
    ob_start();
    session_start();

try {
    $planNo= $_REQUEST["planNo"];
    // $planNo=1;
    require_once("connectDb.php");
    //內容
    $sql = "UPDATE `plan` SET noteLikeTime = noteLikeTime+1 where planNo = :planNo";
    $note = $pdo -> prepare($sql);
    $note -> bindValue(":planNo",$planNo);
    $note ->execute();

    $sql2 = "SELECT * FROM `plan` where planNo = :planNo";
    $note2 = $pdo->prepare($sql2); 
    $note2 -> bindColumn("noteLikeTime",$noteLikeTime);
    $note2 -> bindValue(":planNo",$planNo);
    $note2 ->execute();

    $note2 ->fetch(PDO::FETCH_ASSOC);
    

    echo $noteLikeTime;
    
            
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>