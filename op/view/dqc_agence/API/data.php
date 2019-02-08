<?php

include('database.php');
$pdo1 = Database1::connect();
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		

		
		$s = 'SELECT * FROM users ';
		$result = $pdo->query($s)->fetchAll(PDO::FETCH_ASSOC);
		$return = array();
        $infos_base = $pdo1->fetch(PDO::FETCH_ASSOC);
        echo $infos_base;
    
	
?>