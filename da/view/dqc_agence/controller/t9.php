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
									),array('text'=>'Nom et prenom Client',
													'datafield'=>'Nom',
													'width'=>"30%",
									),array('text'=>'RSM Createur LI',
													'datafield'=>'CreateurduCptedepret',
													'width'=>"15%",
									),array('text'=>'Numero Compte CT',
													'datafield'=>'NumeroCompteCT',
													'width'=>"15%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									),array('text'=>'Num Compte Pret',
													'datafield'=>'Cptedepret',
													'width'=>"15%",
									));				
					$sql = "select distinct 
									la.rim_no 'NumeroRIM'
									,la.title_1 'NometPrénom'
									,lw.tfr_acct_no 'NumeroCompteCT'
									,la.acct_no 'Cptedepret'
									,(Select name from ad_gb_rsm  where la.EMPL_ID= employee_id)'CreateurduCptedepret'
									,rm.branch_no 'Agence'


									FROM ln_history lw, ln_acct la, ad_gb_branch br, rm_acct rm
									where lw.acct_no=la.acct_no
									and rm.rim_no=la.rim_no
									and rm.branch_no=br.branch_no
									and (lw.tfr_acct_no not in (select d.acct_no from dp_acct d where d.rim_no=la.rim_no))
									and tfr_acct_type like 'CT'
									and rm.branch_no=".$agence."";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NumeroRIM']
											,'Nom'=>$row2['NometPrénom']
											,'CreateurduCptedepret'=>$row2['CreateurduCptedepret']
											,'NumeroCompteCT'=>$row2['NumeroCompteCT']
											,'Cptedepret'=>$row2['Cptedepret']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>