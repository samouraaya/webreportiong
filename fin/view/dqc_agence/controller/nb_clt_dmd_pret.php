<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des demandes
*/
function nb_client()
{
				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "Select  count(rim_no ) 'nb'
from rm_acct rm , ad_rm_cls ad 
where ad.class_code=rm.class_code

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('nb'=>$row['nb'],
					);
}
return $return;
Database::disconnect();
}
function nb_demande()
{
				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select count(RIM_NO) 'nb'
FROM la_acct

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('nb'=>$row['nb'],
					);
}
return $return;
Database::disconnect();
}
function nb_credit()
{
				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select count(acct_no) 'nb'
FROM ln_acct
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('nb'=>$row['nb'],
					);
}
return $return;
Database::disconnect();
}
function nb_depot()
{
				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select count(acct_no) 'nb'
FROM dp_acct
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('nb'=>$row['nb'],
					);
}
return $return;
Database::disconnect();
}
?>