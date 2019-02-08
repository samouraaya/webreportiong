<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les Transferts de portefeuille des 2 derniers mois
*/
function fn_prospect()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "SELECT ((SELECT COUNT(crmid) 
		FROM 
		vtiger_crmentity v1
		,vtiger_contactdetails v4
		,`vtiger_users` v3
		,vtiger_user2role v2
		WHERE MONTH(v1.`createdtime`)=MONTH(NOW())
		AND YEAR(v1.`createdtime`)=YEAR(NOW())
		AND v1.deleted=0 
		AND v2.roleid='H9'
		AND v3.id=v1.`smcreatorid`
		AND CONCAT(v3.`first_name`,' ', v3.`last_name`) NOT LIKE '%Meriam Naili%'
		AND v2.userid=v3.id
		AND v1.`crmid`=v4.`contactid`)
+
(SELECT COUNT(crmid) 
		FROM 
		vtiger_crmentity v1
		,vtiger_leaddetails v4
		,`vtiger_users` v3
		,vtiger_user2role v2
		WHERE MONTH(v1.`createdtime`)=MONTH(NOW())
		AND YEAR(v1.`createdtime`)=YEAR(NOW())
		AND v1.deleted=0 
		AND v2.roleid='H9'
		AND v3.id=v1.`smcreatorid`
		AND CONCAT(v3.`first_name`,' ', v3.`last_name`) NOT LIKE '%Meriam Naili%'
		AND v2.userid=v3.id
		AND v4.converted=0
		AND v1.`crmid`=v4.`leadid`)) 'nb' ";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_rim_crees()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "select count(rim_no) 'nb'
from rm_acct rm,ad_gb_rsm rsm
where rm.empl_id=rsm.employee_id
and datediff(month,rm.create_dt,getdate())=0
and empl_class_code=300 
 ";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_la_disbursed()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "select count(acct_no) 'nb'
from la_acct la,ad_gb_rsm rsm
where 
rsm.employee_id=la.empl_id
and datediff(month,la.application_dt,getdate())=0
and empl_class_code=300 
 
and la.STATUS='pending'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_li_crees()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "select count(ln.acct_no) 'nb'
from ln_acct ln ,ad_gb_rsm rsm
where 
	datediff(month,(select create_dt from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no),getdate())=0
and empl_class_code=300 
and (select count(*) from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no)>0
and rsm.employee_id=ln.empl_id";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_la_closed()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "select 

count(distinct table_ptid) 'nb'

from gb_audit gb,ad_gb_rsm rsm where column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%Closed%'
and rsm.employee_id=gb.empl_id
and datediff(month,gb.create_dt,getdate())=0
and empl_class_code=300 
 ";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_la_reviewed()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
				

$sql = "select 

count(distinct table_ptid) 'nb'

from gb_audit gb,ad_gb_rsm rsm where column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%reviewed%'
and rsm.employee_id=gb.empl_id
and datediff(month,gb.create_dt,getdate())=0
and empl_class_code=300 
 ";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'nb'=>$row['nb']
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_synthese_audit_orbit()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "select 
name ,
branch_no,
(select count(rim_no) 
from rm_acct rm
where rm.empl_id=rsm.employee_id
and datediff(month,rm.create_dt,getdate())=0) 'NbRIM',
(select count(acct_no) 
from la_acct la
where 
    rsm.employee_id=empl_id
and datediff(month,la.application_dt,getdate())=0) 'NbDisb',
(select 

count(distinct table_ptid) 

from gb_audit gb where 
column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%closed%'
and rsm.employee_id=gb.empl_id
and datediff(month,gb.create_dt,getdate())=0) 'NbClot',
(select 

count(distinct table_ptid) 

from gb_audit gb where 
column_name like '%Status%'
and table_name like '%LA_ACCT%'
and new_value like '%reviewed%'
and rsm.employee_id=gb.empl_id
and datediff(month,gb.create_dt,getdate())=0) 'NbRev',
(select count(ln.acct_no) 
from ln_acct ln 
where 
	datediff(month,(select create_dt from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no),getdate())=0 
and (select count(*) from ln_history where tran_code=350 and reversal=0 and acct_no=ln.acct_no)>0
and rsm.employee_id=empl_id) 'NbLi'

from ad_gb_rsm rsm 
where 
	status='Active'
and empl_class_code=300 
 
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
function fn_synthese_audit_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,(SELECT (SELECT COUNT(crmid) 
FROM vtiger_crmentity v1,vtiger_contactdetails v4 
WHERE smcreatorid=v3.id
AND MONTH(v1.`createdtime`)=MONTH(NOW())
AND YEAR(v1.`createdtime`)=YEAR(NOW())
AND deleted=0 
AND v1.`crmid`=v4.`contactid`)
+
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND MONTH(v1.`createdtime`)=MONTH(NOW())
AND YEAR(v1.`createdtime`)=YEAR(NOW())
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0)) 'nbprospect'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H9'
AND v2.userid=v3.id
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
function fn_synthese_audit()
{
	 
	$orbit = file_get_contents('http://10.80.1.51/webreporting/dg/controller/api/fn_synthese_audit_orbit');
	$crm = file_get_contents('http://10.80.1.51/webreporting/dg/controller/api/fn_synthese_audit_crm');

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

function fn_stock_relance_ac()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name',
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2,vtiger_leadscf scf
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND deleted=0 
and v2.leadid=scf.leadid
and cf_993='Non'
AND v2.rating <> '4- Ne pas relancer'
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'TotalActif'
,(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'NbRelance'
,(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND scf.leadid = c.leadid
AND WEEK(cf_755)=WEEK(NOW())
AND YEAR(cf_755)=YEAR(NOW())
AND cf_755>b.`createdtime`) 'RELANCEWEEK'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND scf.leadid = c.leadid
AND CASE WHEN YEAR(cf_755)=YEAR(NOW()) THEN WEEK(cf_755)=WEEK(NOW())-1  ELSE WEEK(cf_755)=WEEK(cf_755)=52 END
AND PERIOD_DIFF(DATE_FORMAT( CAST(NOW() AS DATE) , '%Y%m' ),DATE_FORMAT(CAST(cf_755 AS DATE) , '%Y%m' ))=1
AND cf_755>b.`createdtime`) 'RELANCEWEEK1'

,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND scf.leadid = c.leadid
AND PERIOD_DIFF(DATE_FORMAT( CAST(NOW() AS DATE) , '%Y%m' ),DATE_FORMAT(CAST(cf_755 AS DATE) , '%Y%m' ))=1
AND cf_755>b.`createdtime`) 'RELANCEMONTH1'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H9'
AND v2.userid=v3.id
AND v3.status='Active' 
AND CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'TotalActif'=>$row['TotalActif'],
					'NbRelance'=>$row['NbRelance'],
					'RELANCEWEEK'=>$row['RELANCEWEEK'],
					'RELANCEWEEK1'=>$row['RELANCEWEEK1'],
					'RELANCEMONTH1'=>$row['RELANCEMONTH1'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>