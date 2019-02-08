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
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"30%",
									),array('text'=>'Num Agence niveau dde',
													'datafield'=>'NumeroAgenceniveaudemande',
													'width'=>"15%",
									),array('text'=>'Num Agence niveau Rim',
													'datafield'=>'NumeroAgenceauniveauRIM',
													'width'=>"15%",
									),array('text'=>'Numero de la demande',
													'datafield'=>'Numerodedemande',
													'width'=>"10%",
									),array('text'=>'Rsm Createur de la DDe',
													'datafield'=>'rsm',
													'width'=>"10%",
									),array('text'=>'Statut de la DDe',
													'datafield'=>'Statutdedemande',
													'width'=>"10%",
									));				
					$sql = "select 

									rm.rim_no 'NumeroRIM',

									rm.first_name+' '+rm.last_name 'NometPrénom',
									rm.branch_no 'NuméroAgenceauniveauRIM',
									(Select rsm2.name from ad_gb_rsm rsm2 where la.EMPL_ID= rsm2.employee_id)'CréateurdelaDde',
									la.ACCT_NO 'Numerodedemande',
									la.STATUS 'Statutdedemande',
									la.BRANCH_NO 'NuméroAgenceniveaudemande'


									from LA_ACCT la ,rm_acct rm
									where la.status in ('Pending','Reviewed')
									and rm.rim_no=la.RIM_NO
									and rm.branch_no<>la.BRANCH_NO

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['NometPrénom']
											,'NumeroAgenceniveaudemande'=>$row2['NuméroAgenceniveaudemande']
											,'NumeroAgenceauniveauRIM'=>$row2['NuméroAgenceauniveauRIM']
											,'Numerodedemande'=>$row2['Numerodedemande']
											,'Statutdedemande'=>$row2['Statutdedemande']
											,'rsm'=>$row2['CréateurdelaDde']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>