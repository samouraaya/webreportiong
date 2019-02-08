<?php //ini_set("display_errors",0); 

				include('database.php');
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				$pdo->exec("SET CHARACTER SET utf8");
				

$sql = "SELECT iduser,USER,NAME,mdp,classcode,agence,status FROM USER";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('id'=>$row['iduser'],
					'name'=>$row['NAME'],
					'login'=>$row['USER'],
					'mdp'=>$row['mdp'],
                    'agence'=>$row['agence'],
					'status'=>$row['status'],
					'poste'=>$row['classcode']);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

?>