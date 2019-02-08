<?php	
/*

Ce fichier contient les requetes qui sortent les chiffres pour l'onglet graphiques

*/
	function som_decaiss_120()
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=120
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
															and ln.branch_no=130
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
	
	function som_decaiss_total()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select 
1 as m,'Janvier' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=1  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
2 as m,'fevrier' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=2 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
3 as m,'mars' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=3  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
4 as m,'Avril' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=4  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
5 as m,'Mai' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=5  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
6 as m,'Juin' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=6 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
7 as m,'Juillet' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=7  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
8 as m,'Aout' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=8  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
9 as m,'Septembre' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=9  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
11 as m,'Novombre' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=11  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
10 as m,'Octobre' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=10  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
    union
select 
12 as m,'Decembre' as month ,isnull(sum(cast(ln.amt as decimal(10,0))),0)  'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=12  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  
  order by m									  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function som_encours_per()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select

'Agence 110' as agence,sum(cast(disp.Cur_bal as decimal)) as EncCap

from
ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
where
a.rim_no=rm.rim_no 
and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
and a.acct_no=disp.acct_no 
and a.acct_type=disp.acct_type
and rsm.branch_no=110
and rm.rsm_id=rsm.employee_id
and br.branch_no=rm.branch_no

Union

select

'Agence 120' as agence,sum(cast(disp.Cur_bal as decimal)) as EncCap
from
ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
where
a.rim_no=rm.rim_no 
and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
and a.acct_no=disp.acct_no 
and a.acct_type=disp.acct_type
and rsm.branch_no=120
and rm.rsm_id=rsm.employee_id
and br.branch_no=rm.branch_no

Union

select

'Agence 130' as agence,sum(cast(disp.Cur_bal as decimal)) as EncCap

from
ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
where
a.rim_no=rm.rim_no 
and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
and a.acct_no=disp.acct_no 
and a.acct_type=disp.acct_type
and rsm.branch_no=130
and rm.rsm_id=rsm.employee_id
and br.branch_no=rm.branch_no	 

order by agence 
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['agence']
							,"y"=>$row1['EncCap']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
		function nb_dec_br_110()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select 
1 as m,'Janvier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=1 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
2 as m,'fevrier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=2 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
3 as m,'mars' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=3 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
4 as m,'Avril' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=4 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
5 as m,'Mai' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=5 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
6 as m,'Juin' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=6 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
7 as m,'Juillet' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=7 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
8 as m,'Aout' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=8 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
9 as m,'Septembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=9 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
11 as m,'Novombre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=11 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
10 as m,'Octobre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=10 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
    union
select 
12 as m,'Decembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=12 and ln.branch_no=110 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  
  order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function nb_dec_br_120()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select 
1 as m,'Janvier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=1 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
2 as m,'fevrier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=2 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
3 as m,'mars' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=3 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
4 as m,'Avril' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=4 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union 
select 
5 as m,'Mai' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=5 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
6 as m,'Juin' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=6 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
7 as m,'Juillet' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=7 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
8 as m,'Aout' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=8 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
9 as m,'Septembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=9 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
11 as m,'Novombre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=11 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
10 as m,'Octobre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=10 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
    union
select 
12 as m,'Decembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=12 and ln.branch_no=120 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  
  order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function nb_dec_br_130()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select 
1 as m,'Janvier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=1 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
2 as m,'fevrier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=2 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
3 as m,'mars' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=3 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
4 as m,'Avril' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=4 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
5 as m,'Mai' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=5 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
6 as m,'Juin' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=6 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
7 as m,'Juillet' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=7 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
8 as m,'Aout' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=8 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
9 as m,'Septembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=9 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
11 as m,'Novombre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=11 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
10 as m,'Octobre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=10 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
    union
select 
12 as m,'Decembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=12 and ln.branch_no=130 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  
  order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function nb_dec_tot()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select 
1 as m,'Janvier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=1  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
2 as m,'fevrier' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=2 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
union
select 
3 as m,'mars' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=3  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
4 as m,'Avril' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=4  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
5 as m,'Mai' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=5  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
6 as m,'Juin' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=6 and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
7 as m,'Juillet' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=7  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
8 as m,'Aout' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=8  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
 union
select 
9 as m,'Septembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=9  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
11 as m,'Novombre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=11  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  union
select 
10 as m,'Octobre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=10  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
    union
select 
12 as m,'Decembre' as month ,count(acct_no) 'somme' 
from ln_acct ln,rm_acct rm where month((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=12  and rm.rim_no=ln.rim_no and  year((select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))=year(getdate())
  
  order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
?>