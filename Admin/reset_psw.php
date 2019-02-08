<?php 
	include('database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$id = $_GET['id'];
	$pwd=md5('advans');
	$sql2="update  user set `mdp`='".$pwd."' where iduser=".$id."";
	$pdo1->exec($sql2);

?>