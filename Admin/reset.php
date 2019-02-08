<?php
				session_start();
				include('database.php');
				//ini_set('display_errors','off');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$login=$_POST['cc'];
				echo $login;
				if (isset($_POST['modif']))
					 {
				$sql2="update `user` set  `mdp`=md5('advans') where `user` like '%".$login."%'";
				$pdo->exec($sql2);
					 }
				elseif  (isset($_POST['del'])) 
				{
				$sql2="DELETE FROM `user`  where `user` like '%".$login."%'";
				$pdo->exec($sql2);
				}
				Database::disconnect();
				Database1::disconnect();
				
				header('Location:accueuil.php');
				
?>