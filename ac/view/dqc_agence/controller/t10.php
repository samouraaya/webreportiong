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
									),array('text'=>'Createur du Cpte de pret',
													'datafield'=>'CreateurduCptedepret',
													'width'=>"25%",
									),array('text'=>'N Cpte de pret',
													'datafield'=>'NCptedepret',
													'width'=>"15%",
									),array('text'=>'Statut Comptede Pret',
													'datafield'=>'StatutComptedePret',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"10%",
									),array('text'=>'Date Creaction Compte de Pret',
													'datafield'=>'DateCreactionComptedePret',
													'width'=>"25%",
									));				
					$sql = "select 
								ln.rim_no 'NRIM'
								,(Select name from ad_gb_rsm  where ln.EMPL_ID= employee_id)'CreateurduCptedepret'
								,ln.acct_no 'NCptedepret'
								,ln.status 'StatutComptedePret'
								,ln.create_dt 'DateCreactionComptedePret'
								,ln.branch_no 'Agence'

								from ln_acct ln,Gb_auto_tfr tf,ad_gb_rsm rsm,rm_acct rm,ln_pmt_schedule sch
								where ln.rim_no=rm.rim_no 
								and tf.allow_partial is null 
								and ln.acct_no=tf.tfr_acct_no
								and rsm.employee_id=ln.empl_id
								and ln.status in ('Active')
								and ln.acct_no = sch.acct_no
								and tf.status in ('Active')
								and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'CreateurduCptedepret'=>$row2['CreateurduCptedepret']
											,'NCptedepret'=>$row2['NCptedepret']
											,'StatutComptedePret'=>$row2['StatutComptedePret']
											,'DateCreactionComptedePret'=>$row2['DateCreactionComptedePret']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>