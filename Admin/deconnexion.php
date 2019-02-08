


<?php
include('database.php');
$pdo = Database1::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// On appelle la session
session_start();
$user=$_SESSION['login'];

$sql1="UPDATE user SET log_out=NOW()  where user ='".$user."'";
    $pdo->query($sql1);
	
$sql3="select max(id) from audit where user ='".$user."'";

foreach ($pdo->query($sql3) as $row)
$sql2="UPDATE audit SET logout=NOW()  where user ='".$user."' and id='".$row[0]."'";
    $pdo->query($sql2);
	
// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();


header('Location:index.php');

?>


