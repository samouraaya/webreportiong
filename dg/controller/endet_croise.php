<?php 

$return = array();
$handle = fopen("rapport_Endettement_Croisé.csv", "r");
while (($champs = fgetcsv($handle, 1000, ";")) !== FALSE) {
	
	$return[]=array(
					'LI'=>$champs[0],
					'agence'=>$champs[2],
					'rsm'=>$champs[3],
					'clt'=>$champs[5],
					'rim'=>$champs[4],
					'CIN'=>$champs[1],
					'nbr_cr'=>$champs[6],			
                    'Encrous'=>$champs[7]);
}
header('Content-type: application/json');
echo json_encode($return);
?>