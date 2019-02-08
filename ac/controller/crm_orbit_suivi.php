<?php 
function crm_orbit()
{
$orbit = file_get_contents('http://10.80.1.51/webreporting/da/controller/api/suivi_orbit');
$crm = file_get_contents('http://10.80.1.51/webreporting/da/controller/api/suivi_crm');
$agence=$_GET['agence'];


$json_a = json_decode($crm, TRUE);
$json_b = json_decode($orbit, TRUE);
$return = array();
foreach($json_a as $crm) 
{

foreach($json_b  as $orbit) {
if (( $crm['RIMNO']==$orbit['rim']) and  ( $agence==$orbit['age']))
	{
		$retard=false;
		if ($crm['datediff']<>'') $crm['datediff']=$crm['datediff']; else $crm['datediff']='-';
	
	$test=$crm['datediff'];
	if (($crm['Dateactivit']=='') and ($orbit['depuis']>15)) {$retard='Retard';} elseif ($test>60) {$retard='Retard';} else {$retard='-';}

	$crm['quartier']=iconv("UTF-8", "ISO-8859-1//IGNORE", $crm['quartier']);
     $return[]=array('RIMNO'=>$crm['RIMNO'],
					'quartier'=>$crm['quartier'],
					'Dateactivit'=>$crm['Dateactivit'],
					'datediff'=>$crm['datediff'],
					'name'=>$orbit['name'],
					'rsm'=>$orbit['rsm'],
					'age'=>$orbit['age'],
					'cycle'=>$orbit['cycle'],
					'datedecaissement'=>$orbit['datedecaissement'],
					'montant'=>$orbit['montant'],
					'ech'=>$orbit['ech'],
					'retardd'=>$orbit['retardd'],
					'nbretard'=>$orbit['nbretard'],
					'retard'=>$retard,);
		break;
	}
}
}

header('Content-type: application/json');
echo json_encode($return);
}
?>