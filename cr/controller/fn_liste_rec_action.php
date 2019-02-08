<?php 

ini_set('max_execution_time', 300);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function liste_rec_action()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$user=$_GET['user'];
				
	$sql1 =	"select employee_id from ad_gb_rsm
	where user_name like '%" . $user . "%'
	";	
	$result1 = $pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
	//$return1 = array(); 	
foreach ($result1 as $row) 
{
	$employee = ($row['employee_id']); 
  
					
}
 
Database::disconnect();	
			
$sql = " SELECT 

nom_prenom,
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=2 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONTERRAIN',
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=3 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONTEL',
(SELECT COUNT(*) FROM note WHERE auteur=nom_prenom AND type_note=7 AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'ACTIONCONV',
(SELECT MAX(date_insertion) FROM note WHERE auteur=nom_prenom AND type_note IN (2,3,7) AND MONTH(date_insertion)=MONTH(NOW()) AND YEAR(date_insertion)=YEAR(NOW())) 'DATELAST'

FROM utilisateur
where id_utilisateur = ".$employee."";
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