<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des engagements
*/
function liste_eng()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$user=$_GET['user'];

$sql = "
select 

branch 'agence'
,rim 'Rim'
,nom  'Nom_client'
,dateaccord 'date_décaissement'
,cast(mnteche as decimal(32,10)) 'Montant_décaissé'
,CONCAT(cast(dt_ech as char),'/',cast(MONTH(now()) as char),'/',cast(YEAR(now()) as char))'datech'

from engage";

$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$rim=$row['Rim'];
	$sql1="select name 'rsm' from ad_gb_rsm rsm ,rm_acct rm where rm.rsm_id=rsm.employee_id and rm.rim_no=$rim and user_name like '%" . $user . "%'";
	$res = $pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($res as $row1)
	{
    $return[]=array(
					'rsm'=>$row1['rsm'],
					'agence'=>$row['agence'],
					'rim'=>$row['Rim'],
					'NomCLT'=>$row['Nom_client'],			
                    'Num_prêt'=>$row['date_décaissement'],
					'Montant_décaissé'=>$row['Montant_décaissé'],
					'datech'=>$row['datech'],
					);
}
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database6::disconnect();
}
?>