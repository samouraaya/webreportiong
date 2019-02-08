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
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"40%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"10%",
									),array('text'=>'Type ID',
													'datafield'=>'typeid',
													'width'=>"10%",
									),array('text'=>'Rsm Createur',
													'datafield'=>'rsm',
													'width'=>"30%",
									));				
					$sql = "select 
								rm.rim_no 'NumeroRIM',
								first_name+' '+last_name 'NometPrénom',
								(select name from ad_gb_rsm where employee_id = rm.empl_id) 'RSMdecréationRIM',
								ident.identification 'TypeID',
								id_expiry_dt 'Datedexpiration',
								rm.branch_no 'Agence'

								from rm_acct rm ,la_acct la,ad_rm_ident ident
								where cast(id_expiry_dt as date) <cast(getdate() as date)
								and rm.rim_no = la.RIM_NO
								and la.status in ('Pending','Reviewed','disbursed')
								and ident.ident_id = rm.ident_id

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['NometPrénom']
											,'Agence'=>$row2['Agence']
											,'typeid'=>$row2['TypeID']
											,'rsm'=>$row2['RSMdecréationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>