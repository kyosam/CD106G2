<?php
ob_start();
session_start();
$errMsg = "";

try{
    require_once("order.php");
    $sql = "select * from ticket";
    $ticket = $pdo->query($sql);
}catch(PDOException $e){
    $errMsg .= "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號" . $e->getLine() . "<br>";
}
echo $errMsg;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
    while( $t = $ticket->fetch()){
?>  

    <div><?php echo $t["tktName"]?></div>


<?php
}
?>   

</body>
</html>



