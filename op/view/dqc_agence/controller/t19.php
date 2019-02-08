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
									),array('text'=>'RSM createur RIM CT ',
													'datafield'=>'RSMcreateurRIMCT',
													'width'=>"20%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"20%",
									),array('text'=>'Tax office',
													'datafield'=>'tax',
													'width'=>"20%",
									));				
					$sql = " 	select 
									rm.rim_no 'RIMNO'
									,last_name+' '+first_name 'NomClient'
									,(select name from ad_gb_rsm where employee_id=rm.empl_id)'RSMcreateurRIMCT'
									,rm.branch_no 'Agence'
									,rm.tax_office 'tax'
									from rm_acct rm,ln_acct ln
									where 
									rm.tax_office not in ('0111','1111','1121','1141','2121','2429','2331','2221','3113','4115','6142','9313','7242','2144','8291','5231','3431','7442','2442','6111','7344','2455','5159'
									,'3415','5149','3465','9911','9912','9913') 
									and ln.rim_no = rm.rim_no
									and ln.status = 'Active'

									UNION ALL


									select 
									rm.rim_no 'RIMNO'
									,last_name+' '+first_name 'NomClient'
									,(select name from ad_gb_rsm where employee_id=rm.empl_id)'RSMcreateurRIMCT'
									,rm.branch_no 'Agence'
									,rm.tax_office 'tax'
									from rm_acct rm,la_acct la  
									where 
									rm.tax_office not in ('0111','1111','1121','1141','2121','2429','2331','2221','3113','4115','6142','9313','7242','2144','8291','5231','3431','7442','2442','6111','7344','2455','5159'
									,'3415','5149','3465','9911','9912','9913') 
									and la.rim_no = rm.rim_no
									and la.status in  ('Pending','Reviewed','Approved')

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						$row2['tax']=iconv("UTF-8", "ISO-8859-1//IGNORE", $row2['tax']);
						array_push( $return['rows']
									,array('Rim'=>$row2['RIMNO']
											,'NomClient'=>$row2['NomClient']
											,'RSMcreateurRIMCT'=>$row2['RSMcreateurRIMCT']
											,'Agence'=>$row2['Agence']
											,'tax'=>$row2['tax']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>