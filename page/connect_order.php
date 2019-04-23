<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g2;charset=utf8";
	$user = "Hsiang";
	$password = "sqlmy15";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>