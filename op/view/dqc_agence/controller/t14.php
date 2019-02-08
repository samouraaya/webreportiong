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
													'width'=>"25%",
									),array('text'=>'RSM',
													'datafield'=>'RSM',
													'width'=>"25%",
									),array('text'=>'Date creation ',
													'datafield'=>'Datecreaction',
													'width'=>"25%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"25%",
									));				
					$sql = " select 
								 rm.rim_no 'NumeroRIM'
								,rsm.name 'RSM'
								,cast (dp.create_dt as date) 'Datecreaction'
								,rm.branch_no 'Agence'

								from rm_acct rm,ad_gb_rsm rsm , dp_acct dp
								where rm.empl_id = rsm.employee_id
								and dp.rim_no = rm.rim_no
								and (select count(*) from dp_acct where rim_no = rm.rim_no and status in ('active'))>1



";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'RSM'=>$row2['RSM']
											,'Statutdepret'=>$row2['Statutdepret']
											,'Datecreaction'=>$row2['Datecreaction']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>