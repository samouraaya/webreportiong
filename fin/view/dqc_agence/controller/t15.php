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
									),array('text'=>'Createur du Cpte CT',
													'datafield'=>'RSM',
													'width'=>"25%",
									),array('text'=>'Compte Technique ',
													'datafield'=>'CompteTechnique',
													'width'=>"20%",
									),array('text'=>'Statut compte Technique',
													'datafield'=>'StatutcompteTechnique',
													'width'=>"15%",
									),array('text'=>'Date creation compte Technique',
													'datafield'=>'DatecreationcompteTechnique',
													'width'=>"20%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"10%",
									));				
					$sql = " SELECT 
									dp.rim_no 'RIMN',
									(Select name from ad_gb_rsm  where dp.EMPL_ID= employee_id)'CreateurduCpteCT',
									dp.acct_no 'CompteTechnique',
									dp.status 'StatutcompteTechnique',
									dp.create_dt 'DatecreationcompteTechnique',
									dp.branch_no 'Agence'


									from dp_acct dp ,ln_acct ln
									where dp.rim_no = ln.rim_no
									and dp.status in ('Active') 
									and ln.status in ('Closed')

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['RIMN']
											,'RSM'=>$row2['CreateurduCpteCT']
											,'StatutcompteTechnique'=>$row2['StatutcompteTechnique']
											,'CompteTechnique'=>$row2['CompteTechnique']
											,'StatutcompteTechnique'=>$row2['StatutcompteTechnique']
											,'DatecreationcompteTechnique'=>$row2['DatecreationcompteTechnique']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>