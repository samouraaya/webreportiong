<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les Transferts de portefeuille des 2 derniers mois
*/

function fn_synthese_audit_orbit_week()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];
				
$sql = "select 
name ,
branch_no,
(select count(rim_no) 
from rm_acct rm
where rm.empl_id=rsm.employee_id
and datediff(week,rm.create_dt,getdate())=0) 'NbRIM',
(select count(acct_no) 
from la_acct la
where 
    rsm.employee_id=empl_id
and datediff(week,la.application_dt,getdate())=0) 'NbDisb',
(select 

count(distinct table_ptid) 

from gb_audit gb where 
column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%closed%'
and rsm.employee_id=gb.empl_id
and datediff(week,gb.create_dt,getdate())=0) 'NbClot',
(select 

count(distinct table_ptid) 

from gb_audit gb where 
column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%reviewed%'
and rsm.employee_id=gb.empl_id
and datediff(week,gb.create_dt,getdate())=0) 'NbRev',
(select count(acct_no) 
from ln_acct ln 
where 
 rsm.employee_id=empl_id
 and datediff(week,(select create_dt from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no),getdate())=0
 and (select count(*) from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no)>0) 'NbLi'

from ad_gb_rsm rsm 
where 
	status='Active'
and empl_class_code=300 
 and rsm.branch_no=".$agence."
order by branch_no,name";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'branch_no'=>$row['branch_no'],
					'NbRIM'=>$row['NbRIM'],
					'NbDisb'=>$row['NbDisb'],
					'NbClot'=>$row['NbClot'],
					'NbRev'=>$row['NbRev'],
					'NbLi'=>$row['NbLi'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
function fn_synthese_audit_crm_week()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence']; 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,(SELECT (SELECT COUNT(crmid) 
FROM vtiger_crmentity v1,vtiger_contactdetails v4 ,vtiger_contactscf v5
WHERE smcreatorid=v3.id
AND WEEK(v1.`createdtime`)=WEEK(NOW())
AND deleted=0
AND v5.contactid=v1.crmid
AND SUBSTR(cf_1015,1,3)=".$agence."
AND v1.`crmid`=v4.`contactid`)
+
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2,vtiger_leadscf v5
WHERE smcreatorid=v3.id
AND WEEK(v1.`createdtime`)=WEEK(NOW())
AND deleted=0 
AND v5.leadid=v1.crmid
AND SUBSTR(cf_987,1,3)=".$agence."
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0)) 'nbprospect'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H9'
AND v2.userid=v3.id
AND CONCAT(v3.`first_name`,' ', v3.`last_name`) NOT LIKE '%Meriam Naili%'
AND v3.status='Active' ORDER BY 'name'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'nbprospect'=>$row['nbprospect'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
function fn_synthese_audit_week()
{
	$agence=$_GET['agence'];
	$orbit = file_get_contents('http://10.80.1.51/webreporting/da/controller/api/fn_synthese_audit_orbit_week?agence='.$agence);
	$crm = file_get_contents('http://10.80.1.51/webreporting/da/controller/api/fn_synthese_audit_crm_week?agence='.$agence);

	$json_a = json_decode($orbit, TRUE);
	$json_b = json_decode($crm, TRUE);
	$return = array();
	
	foreach($json_a as $orbit) 
	{

	foreach($json_b  as $crm)
	{
		if (strcasecmp($orbit['name'],$crm['name'])==0)
		{
			$return[]=array(
					'name'=>$orbit['name'],
					'branch_no'=>$orbit['branch_no'],
					'nbprospect'=>$crm['nbprospect'],
					'NbRIM'=>$orbit['NbRIM'],
					'NbDisb'=>$orbit['NbDisb'],
					'NbClot'=>$orbit['NbClot'],
					'NbRev'=>$orbit['NbRev'],
					'NbLi'=>$orbit['NbLi'],);
		break;
		}
				
	}
	}
header('Content-type: application/json');
echo json_encode($return);

}
?>