<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');$agence=$_GET['agence'];
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(
									array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Nom Prenom RIM',
													'datafield'=>'NomPrenomRIM',
													'width'=>"30%",
									),array('text'=>'N Cpte de pret',
													'datafield'=>'NCpte',
													'width'=>"15%",
									),array('text'=>'RSM du pret',
													'datafield'=>'RSMdupret',
													'width'=>"15%",
									),array('text'=>'RSM du RIM',
													'datafield'=>'RSMduRIM',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									));				
					$sql = " Select distinct
									   rim.rim_no 'NRIM'
									 ,rim.first_name +' '+rim.last_name 'NomPrenomRIM'
									 ,p.acct_no 'NCpte' 
									 ,(select rsm.name from ad_gb_rsm rsm where rsm.employee_id=p.rsm_id) 'RSMdupret'
									 ,(select rsm.name from ad_gb_rsm rsm where rsm.employee_id=rim.rsm_id) 'RSMduRIM'
									 ,rim.branch_no 'Agence'
									 from rm_acct rim,ln_acct p, ad_gb_branch br
									 where p.rsm_id<>rim.rsm_id
									 and rim.branch_no=br.branch_no
									 and  rim.rim_no=p.rim_no
									 and p.status IN ('Active')
									 and p.class_code NOT IN (591)
									and rim.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'NomPrenomRIM'=>$row2['NomPrenomRIM']
											,'NCpte'=>$row2['NCpte']
											,'RSMdupret'=>$row2['RSMdupret']
											,'RSMduRIM'=>$row2['RSMduRIM']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>