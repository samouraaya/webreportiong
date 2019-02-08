<?php	
/*

Ce fichier contient les requetes qui sortent les chiffres pour l'onglet graphiques

*/
	function encours_nb_stats()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "SELECT  

1 AS MONTH,'Janvier' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=1 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

2 AS MONTH,'Février' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=2 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

3 AS MONTH,'Mars' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'
 
FROM historique WHERE MONTH(DATE)=3 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

4 AS MONTH,'Avril' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=4 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

5 AS MONTH,'Mail' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=5 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

6 AS MONTH,'Juin' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=6 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

7 AS MONTH,'Juillet' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=7 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

8 AS MONTH,'Aout' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=8 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

9 AS MONTH,'Septembre' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=9 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

10 AS MONTH,'Octobre' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=10 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

11 AS MONTH,'Novembre' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'
 
FROM historique WHERE MONTH(DATE)=11 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

12 AS MONTH,'Décembre' AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=12 and YEAR(now())=YEAR(DATE)

ORDER BY MONTH									  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['label']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}	
	function encours_vl_stats()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "SELECT  

1 AS MONTH,'Janvier' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=1 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

2 AS MONTH,'Février' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=2 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

3 AS MONTH,'Mars' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=3 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

4 AS MONTH,'Avril' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=4 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

5 AS MONTH,'Mail' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=5 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

6 AS MONTH,'Juin' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=6 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

7 AS MONTH,'Juillet' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=7 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

8 AS MONTH,'Aout' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=8 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

9 AS MONTH,'Septembre' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=9 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

10 AS MONTH,'Octobre' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=10 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

11 AS MONTH,'Novembre' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=11 and YEAR(now())=YEAR(DATE)

UNION 

SELECT  

12 AS MONTH,'Décembre' AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE MONTH(DATE)=12 and YEAR(now())=YEAR(DATE)

ORDER BY MONTH									  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['label']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	function vl_demande_stats()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select  

									1 as m , 'Janvier' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate())
															and month(ln.application_dt)=1),0) 'somme1'
									UNION

									select  

									2 as m , 'Fevrier' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate())
															and month(ln.application_dt)=2),0) 'somme1'
									UNION

									select  

									3 as m , 'mars' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=3),0) 'somme1'
									UNION

									select  

									4 as m , 'Avril' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=4),0) 'somme1'
									UNION

									select  

									5 as m , 'Mai' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=5),0) 'somme1'
									UNION
									select  

									6 as m , 'Juin' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=6),0) 'somme1'
									UNION
									select  

									7 as m , 'Juillet' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=7),0) 'somme1'
									UNION
									select  

									8 as m , 'Aout' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=8),0) 'somme1'
									UNION
									select  

									9 as m , 'Septembre' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=9),0) 'somme1'
									UNION
									select  

									10 as m , 'Octobre' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=10),0) 'somme1'
									UNION
									select  

									11 as m , 'Novembre' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=11),0) 'somme1'
									UNION
									select  

									12 as m , 'Decembre' as month1 ,isnull((select sum(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
																					 rm.rim_no=ln.rim_no 
																					and rsm.employee_id=rm.rsm_id
																					and year(ln.application_dt)=year(getdate()) 
																					and month(ln.application_dt)=12),0) 'somme1'
								    
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
	function nb_demande_stats()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$sql = "select  

									1 as m , 'Janvier' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=1),0) 'somme1'
									UNION

									select  

									2 as m , 'Fevrier' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=2),0) 'somme1'
									UNION

									select  

									3 as m , 'mars' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=3),0) 'somme1'
									UNION

									select  

									4 as m , 'Avril' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=4),0) 'somme1'
									UNION

									select  

									5 as m , 'Mai' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=5),0) 'somme1'
									UNION
									select  

									6 as m , 'Juin' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=6),0) 'somme1'
									UNION
									select  

									7 as m , 'Juillet' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=7),0) 'somme1'
									UNION
									select  

									8 as m , 'Aout' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=8),0) 'somme1'
									UNION
									select  

									9 as m , 'Septembre' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=9),0) 'somme1'
									UNION
									select  

									10 as m , 'Octobre' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=10),0) 'somme1'
									UNION
									select  

									11 as m , 'Novembre' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id
															and year(ln.application_dt)=year(getdate()) 
															and month(ln.application_dt)=11),0) 'somme1'
									UNION
									select  

									12 as m , 'Decembre' as month1 ,isnull((select count(cast(ln.application_amt as decimal(10,0))) 
															from la_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
																					 rm.rim_no=ln.rim_no 
																					and rsm.employee_id=rm.rsm_id
																					and year(ln.application_dt)=year(getdate())
																					and month(ln.application_dt)=12),0) 'somme1'
								    
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