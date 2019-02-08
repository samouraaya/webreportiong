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
									),array('text'=>'Cpte de pret',
													'datafield'=>'Cptedepret',
													'width'=>"15%",
									),array('text'=>'Statut de pret',
													'datafield'=>'Statutdepret',
													'width'=>"15%",
									),array('text'=>'Date creation de pret',
													'datafield'=>'Datedecreation',
													'width'=>"15%",
									),array('text'=>'Createur du Cpte de pret',
													'datafield'=>'CreateurduCptedepret',
													'width'=>"30%",
									),array('text'=>'Agence',
													'datafield'=>'Agence',
													'width'=>"15%",
									));				
					$sql = " select distinct

									 cl.rim_no 'NRIM'
									,cr.acct_no 'Cptedepret'
									,(Select name from ad_gb_rsm  where cr.EMPL_ID= employee_id)'CreateurduCptedepret'
									,cast(cr.effective_dt  as date) 'Datedecreation'
									,cl.branch_no 'Agence'


									from ad_gb_branch br, ad_gb_rsm cp, ln_acct cr, rm_address ad, rm_acct cl, ln_pmt_schedule sh, ln_display dp
									where br.branch_no = cl.branch_no
									and cp.employee_id = cr.rsm_id
									and cl.rim_no = cr.rim_no
									and cr.rim_no = ad.rim_no
									and cr.acct_no = sh.acct_no
									and cr.acct_no = dp.acct_no
									and ad.addr_id = 1
									and cr.status ='active'
									and ((convert(char(12),dp.mat_dt,3) in (select convert(char(12),holiday_dt,3) from ov_holiday  where holiday_dt > (select dateadd(day,1,last_to_dt) from ov_control))) or (datepart(caldayofweek,dp.mat_dt) in (7)))
									and datediff (day,cr.effective_dt,getdate())<=30

";
					$return['rows'] = array();
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row2) 
					{
						
						array_push( $return['rows']
									,array('Rim'=>$row2['NRIM']
											,'Cptedepret'=>$row2['Cptedepret']
											,'Statutdepret'=>$row2['Statutdepret']
											,'Datedecreation'=>$row2['Datedecreation']
											,'CreateurduCptedepret'=>$row2['CreateurduCptedepret']
											,'Agence'=>$row2['Agence']));
						
						 
					}

$resultat = array($return1,$return);
header('Content-type: application/json');
print  json_encode($resultat,JSON_PRETTY_PRINT);
Database::disconnect();

?>