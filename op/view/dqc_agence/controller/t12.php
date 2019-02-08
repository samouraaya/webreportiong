<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(
									array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Cpte de pret',
													'datafield'=>'Cptedepret',
													'width'=>"15%",
									),array('text'=>'Statut de pret',
													'datafield'=>'Statutdepret',
													'width'=>"15%",
									),array('text'=>'Date creation de pret',
													'datafield'=>'Datecreationdepret',
													'width'=>"15%",
									),array('text'=>'RSM du compte de pret',
													'datafield'=>'RSMducomptedepret',
													'width'=>"30%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									));				
					$sql = " SELECT 
									 rm.rim_no 'rim'
									,l.acct_no 'Cptedepret'
									,l.status 'Statutdepret'
									,l.create_dt 'Datecreationdepret'
									,(select name from ad_gb_rsm rsm where rsm.employee_id=l.empl_id) 'RSMducomptedepret'
									,rm.branch_no 'Agence'

									FROM ln_acct l, rm_acct rm, ad_gb_branch br
									where l.rim_no=rm.rim_no
									and rm.branch_no=br.branch_no
									and l.status='incomplete'
									and (datediff(day,(l.effective_dt),dateadd(day,1,(select last_to_dt from ov_control)))) < 30
									and (datediff(day,(l.effective_dt),dateadd(day,1,(select last_to_dt from ov_control)))) > 7

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['rim']
											,'Cptedepret'=>$row2['Cptedepret']
											,'Statutdepret'=>$row2['Statutdepret']
											,'Datecreationdepret'=>$row2['Datecreationdepret']
											,'RSMducomptedepret'=>$row2['RSMducomptedepret']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>