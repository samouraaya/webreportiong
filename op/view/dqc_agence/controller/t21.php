<?php 
ini_set("display_errors",1); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(
									array('text'=>'RIM NO',
													'datafield'=>'Rim',
													'width'=>"20%",
									),array('text'=>'Nom Client',
													'datafield'=>'NomClient',
													'width'=>"20%",
									),array('text'=>'RSM createur RIM ',
													'datafield'=>'RSMcreateurRIM',
													'width'=>"20%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"20%",
									),array('text'=>'Nationalite',
													'datafield'=>'Nationalite',
													'width'=>"20%",
									));				
					$sql = " 	select 
									rm.rim_no 'RIMNO'
									,rm.last_name+' '+rm.first_name 'NomClient'
									,(select name from ad_gb_rsm where employee_id=rm.empl_id)'RSMcreateurRIM'
									,rm.branch_no 'Agence'
									,rm.citizenship 'Nationalite'
									,(select identification from ad_rm_ident where rm.ident_id=ident_id) 'Identifiant'
									from rm_acct rm
									where rm.citizenship <>'TN'
									and rm.ident_id<>20


";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{

						array_push( $return['rows']
									,array('Rim'=>$row2['RIMNO']
											,'NomClient'=>$row2['NomClient']
											,'RSMcreateurRIM'=>$row2['RSMcreateurRIM']
											,'Agence'=>$row2['Agence']
											,'Nationalite'=>$row2['Nationalite']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>