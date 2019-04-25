<?php 
ob_start();
session_start();
try {
    //先取得memNo
    // $memNo = $_SESSION['memNo'];
    // 下面登入功能寫好要刪掉
    $memNo =1;
    $photoWForester =$_FILES['photoWForester']['name'];
    require_once("connectDb.php");
    //內容
    $sql="INSERT INTO `photo` (`memNo`,`photoWForester`,`photoLikeCnt`,`photoStatus`)VALUES(:memNo,:photoWForester,'0','1')";
    $photo = $pdo -> prepare($sql);
    $photo -> bindValue(":memNo",$memNo);
    $photo -> bindValue(":photoWForester",$photoWForester);
    $photo -> execute();
    

    switch($_FILES['photoWForester']['error']){
        case 0:
                $dir = "images/game/$memNo";
                if( file_exists($dir) === false){
                    mkdir( $dir ); //make directory
                }
                $from = $_FILES['photoWForester']['tmp_name'];
                $to = "images/game/$memNo/{$_FILES['photoWForester']['name']}";
                copy($from, $to);
                echo "上傳成功<br>";
                break;	
        case 1:
                echo "上傳檔案太大, 不得超過", ini_get("upload_max_filesize") ,"<br>";
                break;
        case 2:
                echo "上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
                break;
        case 3:
                echo "上傳檔案不完整<br>";
                break;
        case 4:
                echo "没選送檔案<br>";
                break;
        default:
                echo "請聯絡網站維護人員<br>";
                echo "error code : ", $_FILES['photoWForester']['error'],"<br>";
    }
    header("Location:game.php"); 
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>
?>
