<?php 
ini_set("display_errors",0);
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function clt_closed()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];
				
$sql = "select 

(select name from ad_gb_rsm  where employee_id=rm.empl_id)'rsm'
,rm.branch_no 'agence'
,rm.rim_no 'rim'
,rm.first_name+' '+rm.last_name 'nomclt'
,(select description from ad_rm_cls where rm.class_code=class_code)'Class'
,cast(rm.create_dt as date) 'dtcreat'


from rm_acct rm ,ad_gb_rsm rsm

where  datediff (month,rm.create_dt,getdate())=0 
 and rm.branch_no =".$agence." 
 and rsm.employee_id=rm.rsm_id
 order by rm.create_dt desc
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
	$row1['nomclt']=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['nomclt']);
    $return[]=array('RIMNO'=>$row1['rim'],
					'Client_name'=>$row1['nomclt'],
					'branch'=>$row1['agence'],
					'rsm'=>$row1['rsm'],
					'Tel1'=>$row1['Class'],
					'Tel2'=>$row1['dtcreat'],
					
					
					);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>