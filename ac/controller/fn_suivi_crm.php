<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/
function suivi_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			
				
$sql = "SELECT 
  cf_997 'numrim'
 ,cf_1051 'quartier'
,(SELECT DISTINCT MAX(date_start) FROM vtiger_activity v6,`vtiger_cntactivityrel` v5 WHERE v6.activitytype IN ('meeting') AND v6.activityid = v5.activityid AND v5.contactid = vtc.contactid AND v5.contactid = vcf.contactid) 'Dateactivit' 
,DATEDIFF(NOW(),(SELECT DISTINCT MAX(date_start) FROM vtiger_activity v6,`vtiger_cntactivityrel` v5 WHERE v6.activitytype IN ('meeting') AND v6.activityid = v5.activityid AND v5.contactid = vtc.contactid AND v5.contactid = vcf.contactid))'datediff'

FROM vtiger_contactdetails vtc,vtiger_contactscf vcf,vtiger_crmentity vcrm

WHERE vtc.contactid = vcf.contactid
AND vcf.contactid = vcrm.crmid 
AND cf_999='1_Client_Actif' order by (SELECT DISTINCT MAX(date_start) FROM vtiger_activity v6,`vtiger_cntactivityrel` v5 WHERE v6.activitytype IN ('meeting') AND v6.activityid = v5.activityid AND v5.contactid = vtc.contactid AND v5.contactid = vcf.contactid) desc";
$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) 
{
	$row1['quartier']=iconv("UTF-8", "ISO-8859-1//IGNORE", $row1['quartier']);
     $return[]=array('RIMNO'=>$row1['numrim'],
					'quartier'=>$row1['quartier'],
					'Dateactivit'=>$row1['Dateactivit'],
					'datediff'=>$row1['datediff'],);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>