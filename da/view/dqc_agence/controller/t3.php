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
									),array('text'=>'Nom Client',
													'datafield'=>'Nom',
													'width'=>"15%",
									),array('text'=>'Prenom Client',
													'datafield'=>'prenom',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'N Piece Client',
													'datafield'=>'NPieceClient',
													'width'=>"15%",
									),array('text'=>'Rsm Createur',
													'datafield'=>'rsm',
													'width'=>"30%",
									));				
					$sql = "select distinct 
									a.rim_no 'NumeroRIM', 
									a.last_name 'nomRIM',
									a.first_name 'PrenomRIM',
									(select name from ad_gb_rsm where employee_id = a.empl_id) 'RSMdecreationRIM',
									a.id_value 'NPieceClient',
									a.branch_no 'Agence'

									from rm_acct a,ad_gb_rsm c, ad_gb_branch br
									where 
										a.branch_no=br.branch_no
									and a.empl_id=c.employee_id
									and (select count(rim_no) from rm_acct where id_value=a.id_value and status='Active')>1
									and a.status ='active'
									and a.branch_no=".$agence."
									order by a.id_value
								";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['nomRIM']
											,'prenom'=>$row2['PrenomRIM']
											,'Agence'=>$row2['Agence']
											,'NPieceClient'=>$row2['NPieceClient']
											,'rsm'=>$row2['RSMdecreationRIM']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>