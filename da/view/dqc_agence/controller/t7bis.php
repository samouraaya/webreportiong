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
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"40%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"10%",
									),array('text'=>'Num Compte LI',
													'datafield'=>'numcompteli',
													'width'=>"20%",
									),array('text'=>'Rsm Du Rim',
													'datafield'=>'rsm',
													'width'=>"20%",
									));				
					$sql = "select distinct

									ln.RIM_NO 'NRIM'
								,rm.first_name+' '+rm.last_name 'NomRIM'
								,(Select rsm.name from ad_gb_rsm rsm where rm.rsm_id= rsm.employee_id)'RSMduRIM'
								,rm.branch_no 'Agence'
								,ln.acct_no 'numcompteli'
								from ln_acct ln, rm_acct rm, ad_gb_rsm rsm
								where ln.RIM_NO=rm.rim_no
								and rsm.employee_id=rm.rsm_id
								and rsm.empl_class_code <>(310)  
								and ln.STATUS  IN ('Active')
								and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'Nom'=>$row2['NomRIM']
											,'Agence'=>$row2['Agence']
											,'numcompteli'=>$row2['numcompteli']
											,'rsm'=>$row2['RSMduRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>