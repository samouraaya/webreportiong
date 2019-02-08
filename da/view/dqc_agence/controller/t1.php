<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/
				$agence=$_GET['agence'];
				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Nom Client',
													'datafield'=>'Nom',
													'width'=>"15%",
									),array('text'=>'Prenom Client',
													'datafield'=>'prenom',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'Date creation',
													'datafield'=>'date',
													'width'=>"15%",
									),array('text'=>'Rsm Createur',
													'datafield'=>'rsm',
													'width'=>"30%",
									));				
					$sql = "select 
					rm.rim_no 'NuméroRIM',
					rm.last_name 'NomRIM',
					rm.first_name 'PrénomRIM',
					(select name from ad_gb_rsm where employee_id = rm.empl_id) 'RSMdecreationRIM',
					rm.create_dt 'Datedecreaction',
					rm.branch_no 'Agence'

					from rm_acct rm
					where (select count(rim_no) from rm_address  where rim_no=rm.rim_no and addr_id = 2)=0
					and rm.class_code in (110) and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NuméroRIM']
											,'Nom'=>$row2['NomRIM']
											,'prenom'=>$row2['PrénomRIM']
											,'Agence'=>$row2['Agence']
											,'date'=>$row2['Datedecreaction']
											,'rsm'=>$row2['RSMdecreationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>