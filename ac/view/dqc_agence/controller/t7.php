<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');$agence=$_GET['agence'];
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Nom Client',
													'datafield'=>'Nom',
													'width'=>"40%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'RSM de la DDe',
													'datafield'=>'rsmddm',
													'width'=>"20%",
									),array('text'=>'Rsm Createur',
													'datafield'=>'rsm',
													'width'=>"15%",
									));				
					$sql = "select distinct

							la.RIM_NO 'NRIM'
							,rm.first_name+' '+rm.last_name 'NomRIM'
							,(Select rsm.name from ad_gb_rsm rsm where rm.rsm_id= rsm.employee_id)'RSMduRIM'
							,(Select rsm2.name from ad_gb_rsm rsm2 where la.application_rsm_id= rsm2.employee_id)'RSMdeladde'
							,rm.branch_no 'Agence'
							,(Select rsm2.name from ad_gb_rsm rsm2 where la.empl_id= rsm2.employee_id)'RSMayantcréélademande'

							from la_acct la, rm_acct rm, ad_gb_rsm rsm
							where la.RIM_NO=rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and rsm.empl_class_code <>(310)  
							and la.STATUS NOT IN ('Closed')
							and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'Nom'=>$row2['NomRIM']
											,'Agence'=>$row2['Agence']
											,'rsmddm'=>$row2['RSMayantcréélademande']
											,'rsm'=>$row2['RSMduRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>