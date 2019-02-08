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
									),array('text'=>'Nom Client',
													'datafield'=>'NomClient',
													'width'=>"25%",
									),array('text'=>'RSM createur RIM CT ',
													'datafield'=>'RSMcreateurRIM',
													'width'=>"25%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"25%",
									));				
					$sql = " select 
									rm.rim_no 'RIMNO'
									,last_name+' '+first_name 'NomClient'
									,(select name from ad_gb_rsm where employee_id=rel.empl_id)'RSMcreateurRIMCT'
									,rm.branch_no 'Agence'

									from rm_acct rm,dp_acct dp,gb_map_acct_rel rel
									where 
										rm.rim_no not in (select rel_rim_no from rm_rel  )
									and rm.rim_no not in (select rim_no from rm_rel )
									and (select count(*) from gb_map_acct_rel where rm.rim_no=rim_no and rel_id<>1 and acct_type='CT' )>0
									and dp.rim_no=rm.rim_no
									and dp.status in ('Active')
									and rm.rim_no=rel.rim_no


";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['RIMNO']
											,'NomClient'=>$row2['NomClient']
											,'RSMcreateurRIM'=>$row2['RSMcreateurRIMCT']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>