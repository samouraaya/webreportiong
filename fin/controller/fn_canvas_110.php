<?php	
	function som_decaiss_110()
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
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=1 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION

									select  

									2 as m , 'Fevrier' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
																			 and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=2
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION

									select  

									3 as m , 'mars' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=3 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION

									select  

									4 as m , 'Avril' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=4 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION

									select  

									5 as m , 'Mai' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=5 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									6 as m , 'Juin' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=6 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									7 as m , 'Juillet' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=7 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									8 as m , 'Aout' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=8 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									9 as m , 'Septembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=9 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									10 as m , 'Octobre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=10 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									11 as m , 'Novembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=11 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
									UNION
									select  

									12 as m , 'Decembre' as month1 ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where ln.status not in ('Closed','Incomplete','Restricted')  
															and rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and ln.branch_no=110
															and Month((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=12 
															and YEAR((select lh.create_dt from ln_history lh
																			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
																			  and lh.reversal = 0
																			  ))=YEAR(getdate())),0) 'somme1'
								    
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