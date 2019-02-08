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
									),array('text'=>'Num Compte',
													'datafield'=>'NCpte',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'RSM du CT',
													'datafield'=>'RSMduCT',
													'width'=>"15%",
									));				
					$sql = "Select distinct
									 rim.rim_no 'NuméroRIM'
									 ,p.acct_no 'NCpte' 
									 ,rsm.name   'RSMduCT'
									 ,rim.branch_no 'Agence'
									 from rm_acct rim,dp_acct p, ad_gb_branch br,ad_gb_rsm rsm
									 where
									 rim.branch_no=br.branch_no
									and  rim.rim_no=p.rim_no
									and p.status IN ('Active')
									and p.class_code NOT IN (591)
									and rsm.employee_id=p.rsm_id and rsm.empl_class_code not in (400,410)";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NuméroRIM']
											,'NCpte'=>$row2['NCpte']
											,'Agence'=>$row2['Agence']
											,'RSMduCT'=>$row2['RSMduCT']
											));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>