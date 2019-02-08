<?php //ini_set("display_errors",0); 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/

				include('../../cnx/database.php');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$year=$_GET['id'];

$sql = "
SELECT 

distinct month(date) 'month'
FROM historique where year(date)=".$year." order by month(date)

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('id'=>$row['month']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

?>