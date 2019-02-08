<?php 

				include('../../../cnx/database.php');
				$pdo = gde_formation::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
				

$sql="select RIM,Nom_Client,Status,Agence ,Date_Maturite,Date_Participation,Avantage_octorye from fclients";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
    $return[]=array('RIM'=>$row['RIM'],
					'Nom_Client'=>$row['Nom_Client'],
					'Status'=>$row['Status'],
					'Agence'=>$row['Agence'],
					'Date_Maturite'=>$row['Date_Maturite'],
					'Date_Participation'=>$row['Date_Participation'],
					'Avantage_Octorye'=>$row['Avantage_Octorye']
				
                    
                    );
}
header('Content-type: application/json');
echo json_encode($return);
gde_formation::disconnect();

?>