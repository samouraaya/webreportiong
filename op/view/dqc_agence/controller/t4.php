<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"25%",
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"25%",
									),array('text'=>'RSM de creation RIM',
													'datafield'=>'rsm',
													'width'=>"25%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"25%",
									));				
					$sql = "select 
									rim_no 'NumeroRIM',
									first_name+' '+last_name 'NometPrenom',
									(select name from ad_gb_rsm where employee_id = rm_acct.empl_id) 'RSMdecreationRIM',
									branch_no 'Agence'

									from rm_acct 
									where id_expiry_dt is null 
									and ident_id=24  


								";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['NometPrenom']
											,'Agence'=>$row2['Agence']
											,'rsm'=>$row2['RSMdecreationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>