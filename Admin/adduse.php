<?php 
	include('database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (($_POST['oper']) == "add") {
	

	$nom = $_POST['name'];
	$login = $_POST['login'];
	$mdp='advans';
	$mdp = md5($mdp);
	$agence = $_POST['agence'];
	$poste = $_POST['poste'];
	$sql2="insert into user (`name`,`user`,`mdp`,`agence`,`classcode`,`nb_connexion`,`create_dt`) VALUES('".$nom."','".$login."','".$mdp."','".$agence."','".$poste."',0,now())";
	$pdo1->exec($sql2);
	header('Location:accueuil.php');
}	
elseif (($_POST['oper']) == "edit")	
{
	
	$id = $_POST['id'];
	$nom = $_POST['name'];
	$login = $_POST['login'];
	$agence = $_POST['agence'];
	$poste = $_POST['poste'];
	$status = $_POST['status'];
	$sql2="update  user set `name`='".$nom."',`user`='".$login."',`agence`='".$agence."',`classcode`='".$poste."',`status`='".$status."' where iduser=".$id."";
	$pdo1->exec($sql2);
	header('Location:accueuil.php');
}
elseif (($_POST['oper']) == "del")	
{
	
	$id = $_POST['id'];

	$sql2="delete from  user where iduser=".$id."";
	$pdo1->exec($sql2);
	header('Location:accueuil.php');
}		
?>