<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/
				//$requete=$_GET['requete'];
				include('database.php');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(array('text'=>'Requete Conserné',
													'datafield'=>'requete',
													'width'=>"10%",
									),array('text'=>'Identifiant',
													'datafield'=>'Identifiant',
													'width'=>"10%",
									),array('text'=>'Commentaire',
													'datafield'=>'commentaire',
													'width'=>"50%",
									),array('text'=>'RSM',
													'datafield'=>'rsm',
													'width'=>"10%",
									),array('text'=>'Agence',
													'datafield'=>'agence',
													'width'=>"10%",
									),array('text'=>'Date Modification',
													'datafield'=>'date',
													'width'=>"10%",
									));				
					$sql = "select 
					requete 'requete',
					com 'commentaire',
					rsm 'rsm',
					identifiant,
					date,
					agence
					from comment order by agence,date";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('requete'=>$row2['requete']
											,'commentaire'=>$row2['commentaire']
											,'rsm'=>$row2['rsm']
											,'Identifiant'=>$row2['identifiant']
											,'date'=>$row2['date']
											,'agence'=>$row2['agence']
											));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>