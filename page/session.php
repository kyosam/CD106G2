<?php
session_start();
try {

    require_once("connect_order.php");
    //檢查是否有登入
    if(isset($_SESSION['memNo'])){
        echo "login";
    }else{
        echo "logout";
    }
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>