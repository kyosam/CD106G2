<?php
$dsn='mysql:localhost;port=3306;dbname=cd106g2;charset=utf8';
$user='root';
$password='root';
$options=array(PDO::ATTR_CASE=>PDO::CASE_NATURAL,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$pdo=new PDO($dsn,$user,$password,$options);

// echo "<script>alert('連DB成功');</script>";
?>