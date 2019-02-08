<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les demandes cloturés le mois en cours
*/
function dmd_closed()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select distinct

(select name from ad_gb_rsm  where employee_id=rm.rsm_id)'rsm'
,rm.branch_no 'agence'
,la.acct_no 'NDemande'
,rsm.branch_no 'age'
,rm.rim_no 'rim'
,rm.first_name+' '+rm.last_name 'nomclt'
,(select count(*) from la_acct where rim_no=rm.rim_no)'Cycle'
,(select prev_value from gb_audit where 
        table_name like '%la_acct%' 
        and column_name like '%status%' 
        and table_ptid=la.PTID  
        and create_dt=(select max(create_dt) from gb_audit 
        where table_name like '%la_acct%' 
        and column_name like '%status%' 
        and table_ptid=la.PTID)) 'Ancien'
,la.close_dt 'Datclot'
,name 'rsmclot'
,isnull(la.application_comment,'-') 'comment'

from la_acct la,rm_acct rm,gb_audit gb,ad_gb_rsm rsm
where la.rim_no=rm.rim_no 
and table_name like '%la_acct%'
and column_name like '%status%'
and new_value like '%closed%'
and rsm.employee_id=gb.empl_id
and gb.table_ptid=la.ptid
and la.status in ('Closed')
and datediff (month,la.close_dt,getdate())=0  order by rsm.branch_no,rsm.name,la.close_dt desc";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$row['comment']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['comment']);
	$remove="'";
	$row['Ancien']=str_replace($remove,"",$row['Ancien']);
    $return[]=array('agence'=>$row['rim'],
					'numdem'=>$row['NDemande'],
					'age'=>$row['age'],
					'rsm'=>$row['rsm'],
                    'nomclient'=>$row['nomclt'],
					'statutdemande'=>$row['Cycle'],
					'Ancien'=>$row['Ancien'],
					'activité'=>$row['Datclot'],
					'NBjours'=>$row['rsmclot'],
					'montantdemandé'=>$row['comment'],);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>