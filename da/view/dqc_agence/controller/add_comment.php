<?php 

				include('database.php');

				
				$comment=htmlspecialchars($_POST['comment'],ENT_QUOTES);
				$identifiant=$_POST['identifiant'];
				$requete=$_POST['requete'];
				$rsm=$_POST['rsm'];
				$agence=$_POST['agence'];

				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
				$sql2="insert into comment (`com`,`identifiant`,`requete`,`date`,`rsm`,`agence`) VALUES('".$comment."',".$identifiant.",'".$requete."',now(),'".$rsm."','".$agence."')";
				$pdo1->exec($sql2);
				
				
?>