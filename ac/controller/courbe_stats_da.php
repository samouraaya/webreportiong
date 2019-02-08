<?php	
/*

Ce fichier contient les requetes qui sortent les chiffres pour l'onglet graphiques

*/
	function som_decaiss_total()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							
							$sql = "select  

									1 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id 
															and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id 
															and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id 
															and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) 'somme'
									UNION

									select  

									2 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) 'somme'
									UNION

									select  

									3 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) 'somme'
									UNION

									select  

									4 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) 'somme'
									UNION

									select  

									5 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) 'somme'
									UNION
									select  

									6 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) 'somme'
									UNION
									select  

									7 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) 'somme'
									UNION
									select  

									8 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) 'somme'
									UNION
									select  

									9 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) 'somme'
									UNION
									select  

									10 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) 'somme'
									UNION
									select  

									11 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) 'somme'
									UNION
									select  

									12 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) as char) as month 
                  
                  
                  ,isnull((select sum(cast(ln.amt as decimal(10,0))) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) 'somme'
								    
										order by m						  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
					$row1['month']=str_replace(' ','',$row1['month']);
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
							$agence=$_GET['agence'];
							$sql = "select  

									1 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) 'somme'
									UNION

									select  

									2 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) 'somme'
									UNION

									select  

									3 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) 'somme'
									UNION

									select  

									4 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) 'somme'
									UNION

									select  

									5 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) 'somme'
									UNION
									select  

									6 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) 'somme'
									UNION
									select  

									7 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) 'somme'
									UNION
									select  

									8 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) 'somme'
									UNION
									select  

									9 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) 'somme'
									UNION
									select  

									10 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) 'somme'
									UNION
									select  

									11 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) 'somme'
									UNION
									select  

									12 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(ln.amt as decimal(10,0)))   as decimal(10,0))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) 'somme'
								    
										order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
					$row1['month']=str_replace(' ','',$row1['month']);
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function moy_dec_tot()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "select  

									1 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=11),0) 'somme'
									UNION

									select  

									2 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=10),0) 'somme'
									UNION

									select  

									3 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=9),0) 'somme'
									UNION

									select  

									4 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=8),0) 'somme'
									UNION

									select  

									5 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=7),0) 'somme'
									UNION
									select  

									6 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=6),0) 'somme'
									UNION
									select  

									7 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=5),0) 'somme'
									UNION
									select  

									8 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=4),0) 'somme'
									UNION
									select  

									9 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=3),0) 'somme'
									UNION
									select  

									10 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=2),0) 'somme'
									UNION
									select  

									11 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=1),0) 'somme'
									UNION
									select  

									12 as m , cast(isnull((select distinct substring(DateName(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)),1,3)
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),'0') as char)
                            +'-'+cast(isnull((select distinct year((select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(ln.amt as decimal(10,0)))   as decimal(10,3))
															from ln_acct ln,rm_acct rm,ad_gb_rsm rsm
																			  where  
															 rm.rim_no=ln.rim_no 
															and rsm.employee_id=rm.rsm_id and rsm.branch_no=".$agence."
															and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0),0) 'somme'
								    
										order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
					$row1['month']=str_replace(' ','',$row1['month']);
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function nb_demande_tot()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "select  

									1 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=11),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence."  and  
															datediff(month,application_dt,getdate())=11),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence."  and 
															 datediff(month,application_dt,getdate())=11),0) 'somme'
									UNION

								select  

									2 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=10),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=10),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and
															 datediff(month,application_dt,getdate())=10),0) 'somme'
									UNION
    
								select 	3 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=9),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=9),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=9),0) 'somme'
                    UNION           
                  select 	4 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=8),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=8),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=8),0) 'somme'             
                    UNION           
                  select 	5 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=7),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=7),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=7),0) 'somme'  
                    UNION           
                  select 	6 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=6),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															datediff(month,application_dt,getdate())=6),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=6),0) 'somme'  
                       UNION           
                  select 	7 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=5),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=5),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=5),0) 'somme' 
                     UNION           
                  select 	8 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=4),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=4),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=4),0) 'somme' 
                  UNION           
                  select 	9 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=3),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=3),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=3),0) 'somme'
                  UNION           
                  select 	10 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=2),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															datediff(month,application_dt,getdate())=2),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=2),0) 'somme'
                  UNION           
                  select 	11 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=1),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=1),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=1),0) 'somme' 
                  UNION           
                  select 	12 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=0),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=0),0) as char) as month 
                  
                  
                  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=0),0) 'somme'              
										order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
					$row1['month']=str_replace(' ','',$row1['month']);
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	function moy_demande_tot()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "select  

									1 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=11),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=11),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=11),0) 'somme'
									UNION

								select  

									2 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=10),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															datediff(month,application_dt,getdate())=10),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=10),0) 'somme'
									UNION
    
								select 	3 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=9),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=9),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=9),0) 'somme'
                    UNION           
                  select 	4 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=8),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=8),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=8),0) 'somme'             
                    UNION           
                  select 	5 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															 datediff(month,application_dt,getdate())=7),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=7),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=7),0) 'somme'  
                    UNION           
                  select 	6 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=6),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=6),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=6),0) 'somme'  
                       UNION           
                  select 	7 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=5),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=5),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=5),0) 'somme' 
                     UNION           
                  select 	8 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=4),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=4),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															 datediff(month,application_dt,getdate())=4),0) 'somme' 
                  UNION           
                  select 	9 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=3),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and 
															datediff(month,application_dt,getdate())=3),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=3),0) 'somme'
                  UNION           
                  select 	10 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=2),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=2),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=2),0) 'somme'
                  UNION           
                  select 	11 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															 datediff(month,application_dt,getdate())=1),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															datediff(month,application_dt,getdate())=1),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and   
															 datediff(month,application_dt,getdate())=1),0) 'somme' 
                  UNION           
                  select 	12 as m , cast(isnull((select distinct substring(DateName(month,application_dt),1,3)
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=0),'0') as char)
                            +'-'+cast(isnull((select distinct year(application_dt) 
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															datediff(month,application_dt,getdate())=0),0) as char) as month 
                  
                  
                  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rsm.branch_no=".$agence." and  
															 datediff(month,application_dt,getdate())=0),0) 'somme'              
										order by m
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
					$row1['month']=str_replace(' ','',$row1['month']);
				$point=array("label"=>$row1['month']
							,"y"=>$row1['somme']);
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	
	function vl_encours()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "SELECT  

1 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=12 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

2 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=11 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

3 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=10 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

4 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=9 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

5 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=8 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

6 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=7 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

7 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'
 
FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=6 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

8 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE  CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=5 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

9 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=4 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

10 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=3 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

11 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=2 AND encours<>0 and agence=".$agence." 

UNION 

SELECT  

12 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(encours AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=1 AND encours<>0 and agence=".$agence." 

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

	function nb_encours()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "SELECT  

1 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=12 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

2 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=11 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

3 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=10 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

4 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=9 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

5 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=8 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

6 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=7 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

7 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'
 
FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=6 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

8 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE  CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=5 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

9 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=4 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

10 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=3 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

11 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=2 AND nbcredit<>0 and agence=".$agence."

UNION 

SELECT  

12 AS MONTH,CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS label, IFNULL(SUM(CAST(nbcredit AS DECIMAL(10,0))),0) 'somme'

FROM historique WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=1 AND nbcredit<>0 and agence=".$agence."

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
	
	function histo_par1()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$sql = "
SELECT 1 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH , IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique    WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=12
and agence=".$agence."  UNION
SELECT 2 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=11
and agence=".$agence."  UNION
SELECT 3 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM  historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=10
and agence=".$agence."  UNION
SELECT 4 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=9
and agence=".$agence."  UNION
SELECT 5 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=8
and agence=".$agence."  UNION
SELECT 6 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=7
and agence=".$agence."  UNION
SELECT 7 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=6
and agence=".$agence."  UNION
SELECT 8 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=5
and agence=".$agence."  UNION
SELECT 9 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=4
and agence=".$agence."  UNION
SELECT 10 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=3
and agence=".$agence."  UNION
SELECT 11 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=2
and agence=".$agence."  UNION
SELECT 12 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par1) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=1
ORDER BY m							  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['MONTH']
							,"y"=>number_format($row1['somme'],2,'.',''));
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	function histo_par30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							
							$sql = "SELECT 1 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH , IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique    WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=12
and agence=".$agence."  UNION
SELECT 2 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=11
and agence=".$agence."  UNION
SELECT 3 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM  historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=10
and agence=".$agence."  UNION
SELECT 4 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=9
and agence=".$agence."  UNION
SELECT 5 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=8
and agence=".$agence."  UNION
SELECT 6 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=7
and agence=".$agence."  UNION
SELECT 7 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=6
and agence=".$agence."  UNION
SELECT 8 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=5
and agence=".$agence."  UNION
SELECT 9 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=4
and agence=".$agence."  UNION
SELECT 10 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=3
and agence=".$agence."  UNION
SELECT 11 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=2
and agence=".$agence."  UNION
SELECT 12 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par30) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=1
ORDER BY m									  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['MONTH']
							,"y"=>number_format($row1['somme'],2,'.',''));
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
	function histo_par90()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							
							$sql = "SELECT 1 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH , IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique    WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=12
and agence=".$agence."  UNION
SELECT 2 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=11
and agence=".$agence."  UNION
SELECT 3 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM  historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=10
and agence=".$agence."  UNION
SELECT 4 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=9
and agence=".$agence."  UNION
SELECT 5 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=8
and agence=".$agence."  UNION
SELECT 6 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=7
and agence=".$agence."  UNION
SELECT 7 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=6
and agence=".$agence."  UNION
SELECT 8 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=5
and agence=".$agence."  UNION
SELECT 9 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique   WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=4
and agence=".$agence."  UNION
SELECT 10 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=3
and agence=".$agence."  UNION
SELECT 11 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=2
and agence=".$agence."  UNION
SELECT 12 AS m, CONCAT(SUBSTRING(MONTHNAME (  DATE ),1,3),'-',YEAR(DATE)) AS MONTH ,  IFNULL( SUM(par90) / SUM(encours)*100,0) AS somme FROM historique  WHERE CASE WHEN MONTH(DATE)<>2 THEN  TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())<=29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),SUBSTRING(NOW(),9,2) ), NOW()) 
WHEN MONTH(DATE)=2 AND DAY(NOW())>29 THEN TIMESTAMPDIFF(MONTH, CONCAT(SUBSTRING(DATE,1,8),'29' ), NOW()) END=1
ORDER BY m								  
 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				$point=array("label"=>$row1['MONTH']
							,"y"=>number_format($row1['somme'],2,'.',''));
				array_push($return, $point); 
				}
				header('Content-type: application/json');
				echo json_encode($return, JSON_NUMERIC_CHECK);
				Database::disconnect();
	}
?>