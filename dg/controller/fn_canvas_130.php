<?php	
	function som_decaiss_130()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select  

									1 as m , 'Janvier' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150101')=0),0) 'somme1'
									UNION

									select  

									2 as m , 'Fevrier' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150201')=0),0) 'somme1'
									UNION

									select  

									3 as m , 'mars' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150301')=0),0) 'somme1'
									UNION

									select  

									4 as m , 'Avril' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150401')=0),0) 'somme1'
									UNION

									select  

									5 as m , 'Mai' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150501')=0),0) 'somme1'
									UNION
									select  

									6 as m , 'Juin' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150601')=0),0) 'somme1'
									UNION
									select  

									7 as m , 'Juillet' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150701')=0),0) 'somme1'
									UNION
									select  

									8 as m , 'Aout' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150801')=0),0) 'somme1'
									UNION
									select  

									9 as m , 'Septembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20150901')=0),0) 'somme1'
									UNION
									select  

									10 as m , 'Octobre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20151001')=0),0) 'somme1'
									UNION
									select  

									11 as m , 'Novembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=130
																			  and datediff (month,(select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ),'20151101')=0),0) 'somme1'
									UNION
									select  

									12 as m , 'Decembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
																					and rm.rim_no=ln.rim_no 
																					and rsm.employee_id=rm.rsm_id
																					and ln.branch_no=130
																					  and datediff (month,(select lh.create_dt from ln_history lh
																					  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																					  and lh.reversal = 0
																					  ),'20151301')=0),0) 'somme1'
								    
										order by m									  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month1']
							,"y"=>$row1['somme1']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
?>