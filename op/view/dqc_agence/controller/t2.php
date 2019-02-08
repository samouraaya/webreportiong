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
													'width'=>"10%",
									),array('text'=>'Prenom Client',
													'datafield'=>'Nom',
													'width'=>"20%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'Intitule',
													'datafield'=>'Intitule',
													'width'=>"15%",
									),array('text'=>'Sexe',
													'datafield'=>'Sexe',
													'width'=>"10%",
									),array('text'=>'Rsm Createur',
													'datafield'=>'rsm',
													'width'=>"30%",
									));				
					$sql = "select 
								rm.rim_no 'NumeroRIM',
								rm.first_name 'PrenomRIM',
								(select name from ad_gb_rsm where employee_id = rm.empl_id) 'RSMdecreationRIM',
								ad.title 'Intitule',
								rm.sex 'Sexe',
								rm.branch_no 'Agence'

								from rm_acct rm,ad_rm_title ad
								where ad.title_id=rm.title_id
								and ((ad.title='M.' and Sex='F') or (ad.title='Mme' and Sex='M') or (ad.title='Mlle' and Sex='M'))
								";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['PrenomRIM']
											,'Intitule'=>$row2['Intitule']
											,'Agence'=>$row2['Agence']
											,'Sexe'=>$row2['Sexe']
											,'rsm'=>$row2['RSMdecreationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>