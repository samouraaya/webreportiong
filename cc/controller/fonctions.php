<?php 
ini_set("display_errors",0);
	/*
	Fonction pour retourner le nombre des demandes en statut pending 
	*/	
	
	function nb_la_pending()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select  count(la_acct.acct_no) 'nb'
							from rm_acct,la_acct,ad_gb_rsm,ad_gb_branch
							where rm_acct.rim_no =la_acct.rim_no
							and ad_gb_rsm.employee_id = rm_acct.rsm_id
							and ad_gb_rsm.branch_no=ad_gb_branch.branch_no
							and datediff(day,la_acct.application_dt,getdate())<90
							and la_acct.status in ('pending')
							and la_acct.status not in ('Disbursed','Closed') 
							and ad_gb_rsm.user_name like '%" . $user . "%'  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des demandes qui sont en statut pending >10 J
	*/
	
	function nb_la_pending_10()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select  count(la_acct.acct_no) 'nb'
									from rm_acct,la_acct,ad_gb_rsm,ad_gb_branch
									where rm_acct.rim_no =la_acct.rim_no
									and ad_gb_rsm.employee_id = rm_acct.rsm_id
									and ad_gb_rsm.branch_no=ad_gb_branch.branch_no
									and datediff(day,la_acct.application_dt,getdate())<90
									and datediff(day,la_acct.application_dt,getdate())>10
									and la_acct.status in ('pending') 
									and ad_gb_rsm.user_name like '%" . $user . "%'";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner l'heure du dernier batch executé
	*/
	
	function heure_batch()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql="select cast(max(gb.create_dt) as DATETIME)'date'  from gb_audit gb,gb_batch b where gb.table_name like '%gb_batch%'
							and    gb.column_name like '%status%' 
							and    gb.new_value like '%Active%'
							and b.ptid = gb.table_ptid
							and b.description like '%batch%'
							and datediff(day,gb.create_dt,getdate()) between 0 and 1";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['date']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des décaissement de ce mois
	*/
	
		function nb_decaissement_m()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select  count(ln.acct_no) 'nb'

							from rm_acct,ln_acct ln ,ad_gb_rsm,ad_gb_branch
							where rm_acct.rim_no =ln.rim_no
							and ad_gb_rsm.employee_id = rm_acct.rsm_id
							and ad_gb_rsm.branch_no=ad_gb_branch.branch_no
							and ln.class_code <> 531
							and datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active') and ad_gb_rsm.user_name like '%" . $user . "%'  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume des décaissement de ce mois
	*/
	
		function vl_decaissement_m()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select  isnull(sum(cast(ln.amt as decimal(32,0))),0) 'nb'
							from rm_acct,ln_acct ln ,ad_gb_rsm,ad_gb_branch
							where rm_acct.rim_no =ln.rim_no
							and ad_gb_rsm.employee_id = rm_acct.rsm_id
							and ad_gb_rsm.branch_no=ad_gb_branch.branch_no
							and datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active') and ad_gb_rsm.user_name like '%" . $user . "%'  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des clients actives
	*/
	
	function nb_clt()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
								$sql = "select count(acct_no) 'nb' from ln_acct ln, rm_acct rm, ad_gb_rsm rsm
								where ln.rim_no = rm.rim_no
								and rsm.employee_id=rm.rsm_id
								and ln.status in ('Active')
								and rsm.user_name like '%" . $user . "%'   
								";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume d'encours
	*/
	
	function vl_clt()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select sum(dis.cur_bal) 'nb' from ln_display dis,ln_acct ln, rm_acct rm, ad_gb_rsm rsm
							where ln.rim_no = rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and ln.status in ('Active')
							and dis.acct_no = ln.acct_no
							and rsm.user_name like '%" . $user . "%'  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre du PAR0
	*/
	
	function par0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql="select  
								count(dis.cur_bal) 'nb'
								from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
								where rm.rim_no = ln.rim_no
								and rsm.branch_no = br.branch_no
								and ln.acct_no = dis.acct_no
								and rsm.employee_id=rm.rsm_id
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
								and rsm.user_name like '%" . $user . "%'";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume du PAR0
	*/
	
	function volpar0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql="select  

							sum(dis.cur_bal) 'nb'

							from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
							where rm.rim_no = ln.rim_no
							and rsm.branch_no = br.branch_no
							and ln.acct_no = dis.acct_no
							and rsm.employee_id=rm.rsm_id

							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
							and rsm.user_name like '%" . $user . "%'
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des impayés de pénalités
	*/
	
	function impaye_penal()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql="select 
							count(a.acct_no) 'nb'
							from ln_acct a ,rm_acct rm,ad_gb_rsm rsm ,ln_bill b,ln_bill c ,ln_bill d
							where  
								rm.rim_no = a.rim_no
								and rsm.employee_id=rm.rsm_id
								and c.acct_no = a.acct_no
								and b.acct_no = a.acct_no
								and d.acct_no = a.acct_no
								and c.type ='Principal'
								and d.type='Interest'
								and b.type='Late Fees'
								and a.status not in ('closed','incomplete')
								and c.status='Satisfied'
								and d.status='Satisfied'
								and b.status='Unsatisfied'
								and b.bill_id_no = c.bill_id_no
								and c.bill_id_no = d.bill_id_no
								and rsm.user_name like '%" . $user . "%'
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume du PAR0
	*/
	
	function vlpar30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql="select  

							sum(dis.cur_bal) 'nb'

							from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
							where rm.rim_no = ln.rim_no
							and rsm.branch_no = br.branch_no
							and ln.acct_no = dis.acct_no
							and rsm.employee_id=rm.rsm_id 

							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
							and rsm.user_name like '%" . $user . "%'
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre du PAR30
	*/
	
	function par30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql="select  
								count(dis.cur_bal) 'nb'
								from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
								where rm.rim_no = ln.rim_no
								and rsm.branch_no = br.branch_no
								and ln.acct_no = dis.acct_no
								and rsm.employee_id=rm.rsm_id 
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
								and rsm.user_name like '%" . $user . "%'";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner % du PAR0
	*/
	
	function per_par0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select sum(dis.cur_bal) 'encours' from ln_display dis,ln_acct ln, rm_acct rm, ad_gb_rsm rsm
							where ln.rim_no = rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and ln.status in ('Active')
							and dis.acct_no = ln.acct_no
							and rsm.user_name like '%" . $user . "%'  ";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
							$return = array();
							foreach ($result as $row1)
							$vl_encours=$row1['encours'];
							$sql="select  

							sum(dis.cur_bal) 'par0'

							from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
							where rm.rim_no = ln.rim_no
							and rsm.branch_no = br.branch_no
							and ln.acct_no = dis.acct_no
							and rsm.employee_id=rm.rsm_id 

							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
							and rsm.user_name like '%" . $user . "%'
							";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				
							foreach ($result as $row1)
							$vl_par0=$row1['par0'];
				
							$per_par0=number_format(($vl_par0/$vl_encours)*100,2,'.','').' %';
							$return[]=array('nb'=>$per_par0);
							header('Content-type: application/json');
							echo json_encode($return);
							Database::disconnect();
	}
	
	/*
	Fonction pour retourner % du PAR30
	*/
	
	function per_par30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$user=$_GET['user'];
							$sql = "select sum(dis.cur_bal) 'encours' from ln_display dis,ln_acct ln, rm_acct rm, ad_gb_rsm rsm
							where ln.rim_no = rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and ln.status in ('Active')
							and dis.acct_no = ln.acct_no
							and rsm.user_name like '%" . $user . "%'  ";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
							$return = array();
							foreach ($result as $row1)
							$vl_encours=$row1['encours'];
							$sql="select  

							sum(dis.cur_bal) 'par0'

							from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_gb_rsm rsm,ov_control ov
							where rm.rim_no = ln.rim_no
							and rsm.branch_no = br.branch_no
							and ln.acct_no = dis.acct_no
							and rsm.employee_id=rm.rsm_id

							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
							and rsm.user_name like '%" . $user . "%'
							";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				
							foreach ($result as $row1)
							$vl_par0=$row1['par0'];
				
							$per_par0=number_format(($vl_par0/$vl_encours)*100,2,'.','').' %';
							$return[]=array('nb'=>$per_par0);
							header('Content-type: application/json');
							echo json_encode($return);
							Database::disconnect();
	}
	
	
	
	function data_cc_dashbord()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$iduser=$_GET['iduser'];
							$sql="select 

(select  count(la_acct.acct_no)
							from rm_acct,la_acct
							where rm_acct.rim_no =la_acct.rim_no
							and rsm.employee_id = rm_acct.rsm_id
							and datediff(day,la_acct.application_dt,getdate())<90
							and la_acct.status in ('pending')
							and la_acct.status not in ('Disbursed','Closed')) 'nbpending',
(select  count(la_acct.acct_no)
							from rm_acct,la_acct
							where rm_acct.rim_no =la_acct.rim_no
							and rsm.employee_id = rm_acct.rsm_id
							and datediff(day,la_acct.application_dt,getdate())<90
              and datediff(day,la_acct.application_dt,getdate())>10
							and la_acct.status in ('pending')
							and la_acct.status not in ('Disbursed','Closed')) 'nbpending10',
(select  count(ln.acct_no)
							from rm_acct,ln_acct ln
							where rm_acct.rim_no =ln.rim_no
							and rsm.employee_id = rm_acct.rsm_id							
							and datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active') ) 'NbDec',
(select  sum(ln.amt)
							from rm_acct,ln_acct ln
							where rm_acct.rim_no =ln.rim_no
							and rsm.employee_id = rm_acct.rsm_id							
							and datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active') ) 'VlDec',
(select count(acct_no)  
								from ln_acct ln, rm_acct rm
								where ln.rim_no = rm.rim_no
								and rsm.employee_id=rm.rsm_id
								and ln.status in ('Active')) 'NbClt',
(select sum(dis.cur_bal) 
from ln_display dis, rm_acct rm
							where dis.rim_no = rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and dis.status in ('Active','Nonaccrual')) 'Vlclt',
(select sum(dis.cur_bal) 
from ln_display dis, rm_acct rm
							where dis.rim_no = rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and dis.status in ('Active')) 'Vlclten',
(select  
								count(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
                and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 0) 'NbPar0',
(select  
								sum(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
								and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 0) 'VlPar0',
(select  
								count(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
								and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 10) 'NbPar10',
(select  
								sum(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
								and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 10) 'VlPar10',
(select  
								count(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
								and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 30) 'NbPar30',
(select  
								sum(dis.cur_bal) 
								from rm_acct rm, ln_display dis
								where rm.rim_no = dis.rim_no
								and rsm.employee_id=rm.rsm_id
								and dis.status in ('Active','NonAccrual')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt)) > 30) 'VlPar30',
(select 
								count(dis.acct_no)
								from ln_display dis , rm_acct rm
								where dis.rim_no = rm.rim_no
								and rm.rsm_id=rsm.employee_id
								and dis.delq_dt is null 
								and dis.late_fees_due>0 ) 'nbpenal'
								
              
from ad_gb_rsm rsm,ov_control ov 

where rsm.status='Active'
and rsm.employee_id=".$iduser."
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array(
								'nbpending'=>number_format($row1['nbpending'],0,'.',' '),
								'nbpending10'=>number_format($row1['nbpending10'],0,'.',' '),
								'NbDec'=>number_format($row1['NbDec'],0,'.',' '),
								'VlDec'=>number_format($row1['VlDec'],3,'.',' '),
								'NbClt'=>number_format($row1['NbClt'],0,'.',' '),
								'Vlclt'=>number_format($row1['Vlclt'],3,'.',' '),
								'NbPar0'=>number_format($row1['NbPar0'],0,'.',' '),
								'VlPar0'=>number_format($row1['VlPar0'],3,'.',' '),
								'perPar0'=>number_format(($row1['VlPar0']/$row1['Vlclten'])*100,2,'.',' '),
								'NbPar10'=>number_format($row1['NbPar10'],0,'.',' '),
								'VlPar10'=>number_format($row1['VlPar10'],3,'.',' '),
								'perPar10'=>number_format(($row1['VlPar10']/$row1['Vlclten'])*100,2,'.',' '),
								'NbPar30'=>number_format($row1['NbPar30'],0,'.',' '),
								'VlPar30'=>number_format($row1['VlPar30'],3,'.',' '),
								'perPar30'=>number_format(($row1['VlPar30']/$row1['Vlclten'])*100,2,'.',' '),
								'nbpenal'=>number_format($row1['nbpenal'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
?>