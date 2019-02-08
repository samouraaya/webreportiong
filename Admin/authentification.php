<?php

include('database.php');
				//ini_set('display_errors','off');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();

$user = $_POST['login'];
$pass = $_POST['password'];



$sql = "SELECT count(user) FROM user WHERE user='".$user."' and mdp=md5('".$pass."')";
$sql1 = "SELECT classcode,agence FROM user WHERE user='".$user."' and mdp=md5('".$pass."')";
$result = $pdo->query($sql1);
foreach ($result as $row1)
{
$res=$row1[0];
$branch=$row1[1];
}
echo $res;

$res1 = $pdo->query($sql);
		$do=$res1->fetchColumn();







if (($do==1) and $res==730 )
{	
	$sql1="UPDATE user SET last_login=NOW(),log_out=null  where user ='".$user."'";
    $pdo->query($sql1);
	$sql2="insert into audit (`user`,`login`) VALUES('".$user."',now())";
	$pdo->exec($sql2);
    $_SESSION['login'] = $user;
	$_SESSION['password'] = $pass;
	$_SESSION['agence'] = $branch;
	
	echo $_SESSION['agence'];
    header("Location:accueuil.php");

}

elseif (($do==1) and $res==800 )
{	
	$sql1="UPDATE user SET last_login=NOW(),log_out=null  where user ='".$user."'";
    $pdo->query($sql1);
	$sql2="insert into audit (`user`,`login`) VALUES('".$user."',now())";
	$pdo->exec($sql2);
    $_SESSION['login'] = $user;
	$_SESSION['password'] = $pass;
	$_SESSION['agence'] = $branch;
	
	echo $_SESSION['agence'];
    header("Location:accueuil.php");

}


else {header('Location:index.php');}
Database::disconnect();
?>