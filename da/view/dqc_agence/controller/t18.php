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
									array('text'=>'RIM NO Garant',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Nom et Penom Garant',
													'datafield'=>'NometPenomGarant',
													'width'=>"20%",
									),array('text'=>'RSM createur RIM CT ',
													'datafield'=>'RSMcreateurRIMCT',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"10%",
									),array('text'=>'Class Rim',
													'datafield'=>'ClassRim',
													'width'=>"15%",
									),array('text'=>'RIM NO Client',
													'datafield'=>'RIMNOClient',
													'width'=>"10%",
									),array('text'=>'Type Garantie',
													'datafield'=>'TypeGarantie',
													'width'=>"20%",
									));				
					$sql = " select  
									rm.rim_no 'RIMNOGarant'
									,rm.last_name+' '+rm.first_name 'NometPenomGarant'
									,(select name from ad_gb_rsm where employee_id=rel.empl_id)'RSMcreateurRIMCT'
									,rm.branch_no 'Agence'
									,cls.description 'ClassRim'
									,dp.rim_no 'RIMNOClient'
									,cat.category 'TypeGarantie'
									from gb_map_acct_rel rel,dp_acct dp,rm_acct rm,rm_fin_stmt stmt,ad_rm_cls cls,ad_rm_stmt_cat cat
									where  rel.acct_no = dp.acct_no
									and rel.rim_no = rm.rim_no
									and stmt.category_id =49
									and stmt.rim_no = dp.rim_no
									and rm.class_code = 120
									and rm.status='Active'
									and cls.class_code=rm.class_code
									and cat.category_id=stmt.category_id
									and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['RIMNOGarant']
											,'NometPenomGarant'=>$row2['NometPenomGarant']
											,'RSMcreateurRIMCT'=>$row2['RSMcreateurRIMCT']
											,'Agence'=>$row2['Agence']
											,'ClassRim'=>$row2['ClassRim']
											,'RIMNOClient'=>$row2['RIMNOClient']
											,'TypeGarantie'=>$row2['TypeGarantie']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>