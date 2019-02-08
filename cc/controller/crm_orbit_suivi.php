<?php 
function crm_orbit()
{
$user=$_GET['user'];	
$orbit = file_get_contents('http://10.80.1.51/webreporting/cc/controller/api/suivi_orbit?user='.$user);
$crm = file_get_contents('http://10.80.1.51/webreporting/dg/controller/api/suivi_crm');

//echo $crm;

$json_a = json_decode($crm, TRUE);
$json_b = json_decode($orbit, TRUE);
$return = array();
foreach($json_b  as $orbit) {
	$existe=0;
foreach($json_a as $crm) 
{


if ( $crm['RIMNO']==$orbit['rim']) 
	{
		$retard=false;
		if ($crm['datediff']<>'') $crm['datediff']=$crm['datediff']; else $crm['datediff']='-';
	
	
	$date1=date_create($orbit['datedecaissement']);
	$date2=date_create($crm['Dateactivit']);
	$diff=date_diff($date1,$date2);
	$jours=$diff->format("%R%a");
	
	if ($jours>0)
	{
	$date1=date_create($crm['Dateactivit']);
	$date2=date_create(date("d-m-Y"));
	$diff=date_diff($date1,$date2);
	$joursretartd=$diff->format("%a");
	}
	elseif ($jours<0)
	{
	$date1=date_create($orbit['datedecaissement']);
	$date2=date_create(date("d-m-Y"));
	$diff=date_diff($date1,$date2);
	$joursretartd=$diff->format("%a");
	}
	
	if (($crm['Dateactivit']=='') and ($orbit['depuis']>15)) {$retard='Retard';} 
	elseif (($crm['Dateactivit']<>'') and ($orbit['depuis']<15)) {$retard='-';} 
	elseif (($crm['Dateactivit']<>'') and ($orbit['depuis']>15) and ($jours<0) ) {$retard='Retard';}	
	elseif ($joursretartd>60) {$retard='Retard';} 
	elseif (($joursretartd>30) and ($orbit['risk']=='Oui') ) {$retard='Retard';} 
	else {$retard='-';}
	

	
	$crm['quartier']=iconv("UTF-8", "ISO-8859-1//IGNORE", $crm['quartier']);
     $return[]=array('RIMNO'=>$crm['RIMNO'],
					'quartier'=>$crm['quartier'],
					'Dateactivit'=>$crm['Dateactivit'],
					'datediff'=>$joursretartd,
					'name'=>$orbit['name'],
					'rsm'=>$orbit['rsm'],
					'age'=>$orbit['age'],
					'cycle'=>$orbit['cycle'],
					'datedecaissement'=>$orbit['datedecaissement'],
					'montant'=>$orbit['montant'],
					'ech'=>$orbit['ech'],
					'retardd'=>$orbit['retardd'],
					'nbretard'=>$orbit['nbretard'],
					'risk'=>$orbit['risk'],
					'retard'=>$retard,);
		$existe=1;
		break;
		
	}
}
if ($existe==0)
{
	$date1=date_create($orbit['datedecaissement']);
	$date2=date_create(date("d-m-Y"));
	$diff=date_diff($date1,$date2);
	$joursretartd=$diff->format("%a");
	if ($joursretartd>15) {$retard='Retard';} else {$retard='-';}
	$return[]=array('RIMNO'=>$orbit['rim'],
					//'quartier'=>$crm['quartier'],
					//'Dateactivit'=>$crm['Dateactivit'],
					'datediff'=>$joursretartd,
					'name'=>$orbit['name'],
					'rsm'=>$orbit['rsm'],
					'age'=>$orbit['age'],
					'cycle'=>$orbit['cycle'],
					'datedecaissement'=>$orbit['datedecaissement'],
					'montant'=>$orbit['montant'],
					'ech'=>$orbit['ech'],
					'retardd'=>$orbit['retardd'],
					'nbretard'=>$orbit['nbretard'],
					'risk'=>$orbit['risk'],
					'retard'=>$retard,);
}
}
header('Content-type: application/json');
echo json_encode($return);
}
?>