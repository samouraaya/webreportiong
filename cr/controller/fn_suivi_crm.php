<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/
function suivi_crm()
{
				include('../../../cnx/database.php');
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			
				
$sql = "SELECT  
f.rim_no 'RIM', 
(SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche) 'Date_visite',
DATEDIFF(NOW(),(SELECT  MAX(date_visite) FROM visite  WHERE id_fiche=f.id_fiche))'datediff'
FROM fiche_suivi f  
AND f.`id_fiche`=(SELECT MAX(`id_fiche`) FROM fiche_suivi WHERE rim_no=f.`rim_no` AND statut='Active')
";
$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) 
{
     $return[]=array('RIMNO'=>$row1['RIM'],
					'Dateactivit'=>$row1['Date_visite'],
					'datediff'=>$row1['datediff']);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>