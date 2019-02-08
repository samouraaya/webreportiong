<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des actions des recouvreurs
*/
function liste_rec_action()
{
				include('../../../cnx/database.php');
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			
				
$sql = " SELECT 

nom_prenom,
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=2 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONTERRAIN',
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=3 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONTEL',
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=7 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONCONV',
(SELECT MAX(date_insertion) FROM note WHERE auteur=nom_prenom AND type_note IN (2,3,7) AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'DATELAST'

FROM utilisateur
WHERE id_role = 530
";
$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) 
{
     $return[]=array(
	 
					'nom_prenom'=>$row1['nom_prenom'],
					'ACTIONTERRAIN'=>$row1['ACTIONTERRAIN'],
					'ACTIONTEL'=>$row1['ACTIONTEL'],
					'ACTIONCONV'=>$row1['ACTIONCONV'],
					'DATELAST'=>$row1['DATELAST']
					
					
					);
}

header('Content-type: application/json');
echo json_encode($return);
visite_suivi::disconnect();
}
?>