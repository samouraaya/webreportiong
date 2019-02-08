<?php
    include('../cnx/database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	
	$trancate="TRUNCATE TABLE objectif_all";
	$pdo1->exec($trancate);
	
	
	
?>
