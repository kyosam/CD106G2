<?php
session_start();
$admId = $_POST["admId"];
$admPsw = $_POST["admPsw"];
$errMsg = "";
try {
	require_once("connectDB.php");
	$sql = "select * from admins where admId=:admId and admPsw=:admPsw";
	$admin = $pdo->prepare($sql);
	$admin->bindValue(":admId", $admId);
	$admin->bindValue(":admPsw", $admPsw);
	$admin->execute();
	if($admin->rowCount() == 0){
        //帳號不存在
		$_SESSION['reason'] = 'nonexist';
		header("location:back_login.php");
	}else{
		$admRow = $admin->fetch(PDO::FETCH_ASSOC);
		if($admRow['admStatus'] == 0){
            //停權
			$_SESSION['reason'] = 'admStatus0';
			header("location:back_login.php");
		}else{
      $_SESSION["admNo"] = $admRow["admNo"];
      $_SESSION["admId"] = $admRow["admId"];
      $_SESSION["admPsw"] = $admRow["admPsw"];
      $_SESSION["admPer"] = $admRow["admPer"];
      $_SESSION["admStatus"] = $admRow["admStatus"];
    //   echo "<script>alert('ok');</script>";

      header("location:back_admin.php");

		}
	}
} catch (PDOException $e) {
	$errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
	$errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>