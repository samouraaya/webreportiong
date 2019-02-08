<?php 
//ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/

				include('database.php');$agence=$_GET['agence'];
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					 $return1['columns']=array(array('text'=>'Numero RIM',
													'datafield'=>'Rim',
													'width'=>"10%",
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"30%",
									),array('text'=>'Statut de la DDe',
													'datafield'=>'status',
													'width'=>"15%",
									),array('text'=>'N Compte Pret',
													'datafield'=>'NPret',
													'width'=>"15%",
									),array('text'=>'RSM de creation RIM',
													'datafield'=>'rsm',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									));				
					$sql = "Select distinct
									 rm.rim_no 'NRIM'
									,rm.first_name+' '+rm.last_name 'NomRIM'
									,la.status'Statutdemande'
									,ln.acct_no 'NPret'
									,(select name from ad_gb_rsm where employee_id = rm.rsm_id) 'RSMdecreationRIM'
									,rm.branch_no 'Agence'


									from rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br,la_acct la,ln_acct ln
									where rm.rsm_id =rsm.employee_id
									and rm.branch_no=br.branch_no
									and rm.class_code not in (190)
									and rm.branch_no not in(Select br.branch_no from ad_gb_branch br where br.branch_no= rsm.branch_no)
									and la.RIM_NO = rm.rim_no
									and ln.rim_no = rm.rim_no
									and rm.branch_no=".$agence."
									having ln.status in ('Active') or la.STATUS in('pending','reviewed')
								";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'Nom'=>$row2['NomRIM']
											,'status'=>$row2['Statutdemande']
											,'NPret'=>$row2['NPret']
											,'Agence'=>$row2['Agence']
											,'rsm'=>$row2['RSMdecreationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>