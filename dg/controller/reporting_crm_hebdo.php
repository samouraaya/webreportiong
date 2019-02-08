<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les Transferts de portefeuille des 2 derniers mois
*/


function fn_creation_prospect_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,department 'agence'
,(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND WEEK(v1.`createdtime`)=WEEK(NOW())
AND YEAR(v1.`createdtime`)=YEAR(NOW())) 'CREATWEEK'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND WEEK(v1.`createdtime`)=WEEK(NOW())-1
AND YEAR(v1.`createdtime`)=YEAR(NOW())) 'CREATWEEK_1'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(v1.`createdtime` AS DATE),'-',''),1,6))=0 ) 'CREATMONTH'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(v1.`createdtime` AS DATE),'-',''),1,6))<=3 ) 'CREATMONTH3'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND smownerid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0)/(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0)*100 'PERTOTAL'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND smownerid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(v1.`createdtime` AS DATE),'-',''),1,6))<=3 
AND v2.converted=0)/(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus IN ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0)*100 'PER3MONTH'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus IN ('4_Doublon')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(v1.`createdtime` AS DATE),'-',''),1,6))=0 ) 'DoublonMonth'

FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
AND CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'agence'=>$row['agence'],
					'CREATWEEK'=>$row['CREATWEEK'],
					'CREATWEEK_1'=>$row['CREATWEEK_1'],
					'CREATMONTH'=>$row['CREATMONTH'],
					'CREATMONTH3'=>$row['CREATMONTH3'],
					'DoublonMonth'=>$row['DoublonMonth'],
					'PERTOTAL'=>number_format($row['PERTOTAL'],2,'.','').'%',
					'PER3MONTH'=>number_format($row['PER3MONTH'],2,'.','').'%',
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_relance_prospect_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$time="SET lc_time_names = 'fr_FR'";	
$pdo->exec($time);	 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,department 'agence'
,(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
and scf.leadid = c.leadid
AND WEEK(cf_755)=WEEK(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEWEEK'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
and scf.leadid = c.leadid
AND WEEK(cf_755)=WEEK(NOW())-1
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEWEEK1'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND c.`rating` LIKE '1_%'
and scf.leadid = c.leadid
AND WEEK(cf_755)=WEEK(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEWEEK_1'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEMONTH'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND c.`rating` LIKE '1_%'
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEMONTH_1'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf a
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND a.leadid=c.leadid
AND cf_991=MONTHNAME(NOW())
) 'PRIMONTH',
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND cf_991=MONTHNAME(NOW())
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'PROPRIMONTH'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'agence'=>$row['agence'],
					'RELANCEWEEK'=>$row['RELANCEWEEK'],
					'RELANCEWEEK1'=>$row['RELANCEWEEK1'],
					'RELANCEWEEK_1'=>$row['RELANCEWEEK_1'],
					'RELANCEMONTH'=>$row['RELANCEMONTH'],
					'RELANCEMONTH_1'=>$row['RELANCEMONTH_1'],
					'PRIMONTH'=>$row['PRIMONTH'],
					'PROPRIMONTH'=>$row['PROPRIMONTH'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

function fn_stock_prospect_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,department 'agence'
,(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND deleted=0 
AND v2.rating <> '4- Ne pas relancer'
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'TotalActif'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND v2.rating = '1- A transformer rapidement'
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'Pospect_rapidement'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND v2.rating like '2-%'
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'Pospect_tard'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND v2.rating = '3- A travailler'
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'Pospect_travailler'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smownerid=v3.id
AND v2.leadstatus='1_Prospect'
AND v2.rating = '4- Ne pas relancer'
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND v2.converted=0) 'Pospect_relancer'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
AND CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'agence'=>$row['agence'],
					'TotalActif'=>$row['TotalActif'],
					'Pospect_rapidement'=>$row['Pospect_rapidement'],
					'Pospect_tard'=>$row['Pospect_tard'],
					'Pospect_travailler'=>$row['Pospect_travailler'],
					'Pospect_relancer'=>$row['Pospect_relancer'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
function fn_transformation_prospect_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,department 'agence'
,(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c
WHERE  c.leadid = b.crmid 
AND smcreatorid=v3.id
AND smownerid<>v3.id
AND c.leadstatus='1_Prospect'
AND deleted=0 
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(b.`createdtime` AS DATE),'-',''),1,6))<=3 
) 'CREATOWNER',
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf f
WHERE  c.leadid = b.crmid 
AND smcreatorid=v3.id
AND c.leadstatus='2_Client_Advans'
AND deleted=0 
AND c.leadid=f.leadid
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(f.`cf_1087` AS DATE),'-',''),1,6))=0
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(b.`createdtime` AS DATE),'-',''),1,6))=0) 'TRANSMONTH'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf f
WHERE  c.leadid = b.crmid 
AND smcreatorid=v3.id
AND c.leadstatus='2_Client_Advans'
AND deleted=0 
AND c.leadid=f.leadid
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(f.`cf_1087` AS DATE),'-',''),1,6))<=3
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(b.`createdtime` AS DATE),'-',''),1,6))<=3) 'TRANS3MONTH'

FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'agence'=>$row['agence'],
					'CREATOWNER'=>$row['CREATOWNER'],
					'TRANSMONTH'=>$row['TRANSMONTH'],
					'TRANS3MONTH'=>$row['TRANS3MONTH'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}

function fn_creation_relance_crm()
{
				include('../../../cnx/database.php');
				$pdo = Database3::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$time="SET lc_time_names = 'fr_FR'";	
$pdo->exec($time);				 
				
$sql = "SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
,department 'agence'
,(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND WEEK(v1.`createdtime`)=WEEK(NOW())
AND year(v1.`createdtime`)=year(NOW())) 'CREATWEEK'
,
(SELECT COUNT(crmid)
FROM vtiger_crmentity v1,vtiger_leaddetails v2
WHERE smcreatorid=v3.id
AND v2.leadstatus in ('1_Prospect','2_Client_Advans')
AND deleted=0 
AND v1.`crmid`=v2.`leadid`
AND PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(v1.`createdtime` AS DATE),'-',''),1,6))=0 ) 'CREATMONTH'
,(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus='1_Prospect'
AND deleted=0 
and scf.leadid = c.leadid
AND WEEK(cf_755)=WEEK(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEWEEK'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus='1_Prospect'
AND deleted=0 
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'RELANCEMONTH'
,
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf a
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus='1_Prospect'
AND deleted=0 
AND a.leadid=c.leadid
AND cf_991=MONTHNAME(NOW())
) 'PRIMONTH',
(SELECT  COUNT(DISTINCT b.crmid)
FROM vtiger_crmentity b,vtiger_leaddetails c,vtiger_leadscf scf
WHERE  c.leadid = b.crmid 
AND smownerid=v3.id
AND c.leadstatus='1_Prospect'
AND deleted=0 
AND cf_991=MONTHNAME(NOW())
and scf.leadid = c.leadid
AND month(cf_755)=month(NOW())
AND year(cf_755)=year(NOW())
AND cf_755>b.`createdtime`) 'PROPRIMONTH'
FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
and CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'name'=>$row['name'],
					'agence'=>$row['agence'],
					'CREATWEEK'=>$row['CREATWEEK'],
					'CREATMONTH'=>$row['CREATMONTH'],
					'RELANCEWEEK'=>$row['RELANCEWEEK'],
					'RELANCEMONTH'=>$row['RELANCEMONTH'],
					'PRIMONTH'=>$row['PRIMONTH'],
					'PROPRIMONTH'=>$row['PROPRIMONTH'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}


function fn_suivi_cc()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
				
$sql = "select name,employee_id 'id_cc' from ad_gb_rsm where status='active' and empl_class_code=310 order by name";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();

foreach ($result as $row){
	
	$nb_poste_dec_retard=0;
	$nb_visite_semaine=0;
	$nb_visite_mois=0;
	$nb_rim=0;
	$sql1 = "select 
					rsm.employee_id 'id_orbit',
					rm.rim_no 'rim',
					datediff(day,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate()) 'dt_dec',
					(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0) 'dec_dt'

					from ad_gb_rsm rsm,ln_acct ln ,rm_acct rm
					where ln.rim_no = rm.rim_no
					and rm.rsm_id=rsm.employee_id
					and ln.status not in ('incomplete','closed','active charge-off')
					and rsm.employee_id=".$row['id_cc']." 
					order by rsm.employee_id";
	$result1 = $pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result1 as $row1)
	{
		$number_row=0;
		
		$sql2 = "SELECT  f.rim_no 'RIM', DATEDIFF(NOW(),(SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche))'datediff' 
		,(SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche) 'visite_dt'
		FROM fiche_suivi f where f.statut='Active' and f.rim_no=".$row1['rim']."";
		$result2 = $pdo1->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
		
		$nb_row_visite = "SELECT  count(f.rim_no) 'nb' FROM fiche_suivi f where f.statut='Active' and f.rim_no=".$row1['rim']."";
		$result_nb_row_visite = $pdo1->query($nb_row_visite)->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result_nb_row_visite as $row_nb)
		{
			$number_row=$row_nb['nb'];
		}
		if ($number_row>0)
		{
		foreach ($result2 as $row2)
		{
			$date1=date_create($row1['dec_dt']);
			$date2=date_create($row2['visite_dt']);
			$diff=date_diff($date1,$date2);
			$jours=$diff->format("%R%a");
			if ($jours>0)
			{
			if ($row2['datediff']>60)
			{
				$nb_rim=$nb_rim+1;
			}	
			}
			elseif (($jours<0) and $row1['dt_dec']>15)
			{
				$nb_poste_dec_retard=$nb_poste_dec_retard+1;
			}
		}
		}
		elseif(($number_row==0) and ($row1['dt_dec']>15))
		{
			$nb_poste_dec_retard=$nb_poste_dec_retard+1;
		}
		$sql3 = "SELECT  f.rim_no 'RIM' FROM fiche_suivi f  WHERE WEEK((SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche))=WEEK(CAST(NOW() AS DATE)) and f.rim_no=".$row1['rim']." and f.statut='Active'";
		$result3 = $pdo1->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result3 as $row3)
		{
	
				$nb_visite_semaine=$nb_visite_semaine+1;
		}
		$sql5 = "SELECT  f.rim_no 'RIM' FROM fiche_suivi f  WHERE MONTH((SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche))=MONTH(CAST(NOW() AS DATE)) 
		AND YEAR((SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche))=YEAR(CAST(NOW() AS DATE)) and f.rim_no=".$row1['rim']." and f.statut='Active'";
		$result5 = $pdo1->query($sql5)->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result5 as $row5)
		{
	
				$nb_visite_mois=$nb_visite_mois+1;
		}
	
	}
	
	$return[]=array(
					'Nb_Retard'=>($nb_rim+$nb_poste_dec_retard),
					'nb_visite_semaine'=>$nb_visite_semaine,
					'nb_visite_mois'=>$nb_visite_mois,
					'nb_poste_dec_retard'=>$nb_poste_dec_retard,
					'id_orbit'=>$row['id_cc'],
					'name'=>$row['name'],
					);	
    
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>