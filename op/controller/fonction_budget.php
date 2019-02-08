<?php 

ini_set("display_errors",0); 

/**************Reporting Direction version 1.2 29/08/2016*********************/	
	
	function budget_information_branch ()
	{
		include('../../../cnx/database.php');
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select 
br.branch_no 'agence'
,(select count(*) from ln_acct ln where branch_no=br.branch_no and datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'nbyear' 
,(select sum(amt) from ln_acct ln where branch_no=br.branch_no and datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'sumyear'
,(select count(*) from ln_acct ln where branch_no=br.branch_no and datediff (month,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'nbmonth' 
,(select sum(amt) from ln_acct ln where branch_no=br.branch_no and datediff (month,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'summonth' 
,(select count(*) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0) 'nbencours'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0) 'sumencours'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>0) 'par0'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>10) 'par10'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>30) 'par30'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>90) 'par90'
,(select sum(cur_bal) from ln_display dis,rm_acct rm where rm.rim_no = dis.rim_no and rm.branch_no=br.branch_no and dis.status in ('active charge-off') and cur_bal<>0 ) 'ActiveOff'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln
									where lb.acct_no=ln.acct_no
									and lb.type='Principal'
									and ln.branch_no=br.branch_no
                  and datediff(month,lb.pmt_due_dt,getdate())=0
                  and lb.pmt_due_dt<(select last_to_dt from ov_control)
                  and (select count(acct_no) from ln_bill where bill_id_no=lb.bill_id_no and lb.acct_no=acct_no and sub_no=3)=0
									and ln.status in ('Active','NonAccrual')) 'EchOk'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln
									where lb.acct_no=ln.acct_no
									and lb.type='Principal'
									and ln.branch_no=br.branch_no
                  and lb.pmt_due_dt<(select last_to_dt from ov_control)
                  and datediff(month,lb.pmt_due_dt,getdate())=0
									and ln.status in ('Active','NonAccrual')) 'EchWillBe'
,(select count(la.acct_no) from la_acct la where datediff(month,la.application_dt,getdate())=0 and la.branch_no=br.branch_no) 'nb_loan_app'
,(select count(la.acct_no) from la_acct la where datediff(month,la.close_dt,getdate())=0 and datediff(month,la.application_dt,getdate())=0 and la.branch_no=br.branch_no) 'nb_loan_closed'
,(select count(ln.acct_no) from ln_acct ln  where ln.status not in ('incomplete','closed') and ln.branch_no=br.branch_no 
and ln.refinanced='N' and (select count(acct_no) from ln_acct where rim_no=ln.rim_no and status='Closed')>0 
and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0 ) 'ln_refinanced'
,(select count(ln.acct_no) from ln_acct ln where ln.status in ('closed') and ln.branch_no=br.branch_no and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 345 and lh.reversal = 0),getdate())=0) 'ln_closed'
from ad_gb_branch br,ov_control ov
where status='Active'
and br.branch_no<>100 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('agence'=>$row1['agence'],
								'nbyear'=>number_format($row1['nbyear'],0,'',' '),
								'nbmonth'=>number_format($row1['nbmonth'],0,'',' '),
								'summonth'=>number_format($row1['summonth'],0,'',' '),
								'sumyear'=>number_format($row1['sumyear'],0,'',' '),
								'nbencours'=>number_format($row1['nbencours'],0,'',' '),
								'sumencours'=>number_format($row1['sumencours'],0,'',' '),
								'per0'=>number_format(($row1['par0']/$row1['sumencours'])*100,2,'.',' '),
								'per10'=>number_format(($row1['par10']/$row1['sumencours'])*100,2,'.',' '),
								'per30'=>number_format(($row1['par30']/$row1['sumencours'])*100,2,'.',' '),
								'per90'=>number_format(($row1['par90']/$row1['sumencours'])*100,2,'.',' '),
								'ActiveOff'=>number_format(($row1['ActiveOff']/$row1['sumencours'])*100,2,'.',' '),
								'taux_closed'=>number_format(($row1['nb_loan_closed']/$row1['nb_loan_app'])*100,2,'.',' '),
								'taux_refinanced'=>number_format(($row1['ln_refinanced']/$row1['ln_closed'])*100,2,'.',' '),
								'ech'=>number_format(($row1['EchOk']/$row1['EchWillBe'])*100,2,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function budget_information_branch_total ()
	{
		include('../../../cnx/database.php');
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select 
(select count(*) from ln_acct ln where  datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'nbyear' 
,(select sum(amt) from ln_acct ln where  datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'sumyear'
,(select count(*) from ln_acct ln where  datediff (month,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'nbmonth' 
,(select sum(amt) from ln_acct ln where  datediff (month,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0) 'summonth' 
,(select count(*) from ln_display where status not in ('Active charge-off') and cur_bal<>0) 'nbencours'
,(select sum(cur_bal) from ln_display dis where   dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0) 'sumencours'
,(select sum(cur_bal) from ln_display dis where   dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>0) 'par0'
,(select sum(cur_bal) from ln_display dis where   dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>10) 'par10'
,(select sum(cur_bal) from ln_display dis where   dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>30) 'par30'
,(select sum(cur_bal) from ln_display dis where   dis.status not in ('Closed','Incomplete','active charge-off') and cur_bal<>0 and datediff(dd,delq_dt,dateadd(dd,1,ov.last_to_dt))>90) 'par90'
,(select sum(cur_bal) from ln_display dis where   dis.status in ('active charge-off') and cur_bal<>0 ) 'ActiveOff'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln
									where lb.acct_no=ln.acct_no
									and lb.type='Principal'
                  and datediff(month,lb.pmt_due_dt,getdate())=0
                  and lb.pmt_due_dt<(select last_to_dt from ov_control)
                  and (select count(acct_no) from ln_bill where bill_id_no=lb.bill_id_no and lb.acct_no=acct_no and sub_no=3)=0
									and ln.status in ('Active','NonAccrual')) 'EchOk'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln
									where lb.acct_no=ln.acct_no
									and lb.type='Principal'
                  and lb.pmt_due_dt<(select last_to_dt from ov_control)
                  and datediff(month,lb.pmt_due_dt,getdate())=0
									and ln.status in ('Active','NonAccrual')) 'EchWillBe'
,(select count(la.acct_no) from la_acct la where datediff(month,la.application_dt,getdate())=0 ) 'nb_loan_app'
,(select count(la.acct_no) from la_acct la where datediff(month,la.close_dt,getdate())=0 and datediff(month,la.application_dt,getdate())=0 ) 'nb_loan_closed'
,(select count(ln.acct_no) from ln_acct ln where ln.status not in ('incomplete','closed') 
and ln.refinanced='N' and (select count(acct_no) from ln_acct where rim_no=ln.rim_no and status='Closed')>0 
and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),getdate())=0 ) 'ln_refinanced'
,(select count(ln.acct_no) from ln_acct ln where ln.status in ('closed') and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 345 and lh.reversal = 0),getdate())=0) 'ln_closed'
from ov_control ov
";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array(
								'nbyear'=>number_format($row1['nbyear'],0,'',' '),
								'nbmonth'=>number_format($row1['nbmonth'],0,'',' '),
								'summonth'=>number_format($row1['summonth'],0,'',' '),
								'sumyear'=>number_format($row1['sumyear'],0,'',' '),
								'nbencours'=>number_format($row1['nbencours'],0,'',' '),
								'sumencours'=>number_format($row1['sumencours'],0,'',' '),
								'per0'=>number_format(($row1['par0']/$row1['sumencours'])*100,2,'.',' '),
								'per10'=>number_format(($row1['par10']/$row1['sumencours'])*100,2,'.',' '),
								'per30'=>number_format(($row1['par30']/$row1['sumencours'])*100,2,'.',' '),
								'per90'=>number_format(($row1['par90']/$row1['sumencours'])*100,2,'.',' '),
								'ActiveOff'=>number_format(($row1['ActiveOff']/$row1['sumencours'])*100,2,'.',' '),
								'taux_closed'=>number_format(($row1['nb_loan_closed']/$row1['nb_loan_app'])*100,2,'.',' '),
								'taux_refinanced'=>number_format(($row1['ln_refinanced']/$row1['ln_closed'])*100,2,'.',' '),
								'ech'=>number_format(($row1['EchOk']/$row1['EchWillBe'])*100,2,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function top_dec_month() {
			
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "
										select sum(amt) 'Dec'
										from ln_acct ln 
										where 
										datediff(month,(select lh.create_dt 
														  from ln_history lh 
														  where lh.acct_no = ln.acct_no 
														  and lh.tran_code = 350
														  and lh.reversal = 0),getdate())=0 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('Dec'=>number_format($row1['Dec'],0,'',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function top_dec_month_nb() {
			
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "
										select cast(count(amt) as int) 'Dec'
										from ln_acct ln 
										where 
										datediff(month,(select lh.create_dt 
														  from ln_history lh 
														  where lh.acct_no = ln.acct_no 
														  and lh.tran_code = 350
														  and lh.reversal = 0),getdate())=0 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('Dec'=>number_format($row1['Dec'],0,'',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
							}
	function vl_encours() {
			
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select

									sum(disp.Cur_bal) as 'nb'

									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and rm.rsm_id=rsm.employee_id
									and br.branch_no=rm.branch_no ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function enc_total_budgetnb()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select

									count(cast(disp.Cur_bal as decimal)) as 'nb'

									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and rm.rsm_id=rsm.employee_id
									and br.branch_no=rm.branch_no ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function nb_dec_total_budget()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  

								distinct count(cast(ln.amt as decimal(10,0))) 'nb'

								from ln_acct ln,rm_acct rm,ad_gb_rsm rsm

								where   rm.rim_no=ln.rim_no and rsm.employee_id=rm.rsm_id 
								and datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0
								  having (select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ) is not null  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function vl_dec_total_budget()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  

								distinct sum(ln.amt) 'nb'

								from ln_acct ln,rm_acct rm,ad_gb_rsm rsm

								where  rm.rim_no=ln.rim_no and rsm.employee_id=rm.rsm_id 
								and datediff (year,(select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ),getdate())=0
								  having (select lh.create_dt from ln_history lh
								  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
								  and lh.reversal = 0
								  ) is not null  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
	
	function vl_dec_object_budgetyear(){				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_vl_year_dis 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function nb_dec_object_budget_year(){				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_nb_year_dis 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function vl_dec_m_object_budget()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_vl_month_dis 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function nb_dec_m_object_budget()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_nb_month_dis 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function enc_total_budget_object()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_vl_out 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	function enc_total_budget_objectnb()
	{				
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT obj_nb_out 'nb' FROM objectif_all WHERE MONTH(NOW())=MONTH AND YEAR(NOW())=YEAR";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,' ',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
?>