<?php 
	include('../../cnx/database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (($_POST['oper']) == "add") {
	
}	
elseif (($_POST['oper']) == "edit")	
{
	
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	
	$sql2="update  notification set `status`='".$status."' where id=".$id."";
	$pdo1->exec($sql2);
	//header('Location:backoffice.php');
}
elseif (($_POST['oper']) == "del")	
{
}		
?>