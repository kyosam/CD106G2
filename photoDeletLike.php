<?php
    ob_start();
    session_start();

try {
    $photoNo= $_REQUEST["photoNo"];
    // $photoNo=1;
    require_once("connectDb.php");
    //內容
    $sql = "UPDATE `photo` SET photoLikeCnt = photoLikeCnt-1 where photoNo = :photoNo";
    $photo = $pdo -> prepare($sql);
    $photo -> bindValue(":photoNo",$photoNo);
    $photo ->execute();

    $sql2 = "SELECT * FROM `photo` where photoNo = :photoNo";
    $photo2 = $pdo->prepare($sql2); 
    $photo2 -> bindColumn("photoLikeCnt",$photoLikeCnt);
    $photo2 -> bindValue(":photoNo",$photoNo);
    $photo2 ->execute();
    $photo2 ->fetch(PDO::FETCH_ASSOC);

    echo $photoLikeCnt;


            
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>