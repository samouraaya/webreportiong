<?php ini_set("display_errors",0); 

		function Encours_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(cur_bal) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=100 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		
		function Encours_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(cur_bal) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=110 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function Encours_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(cur_bal) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=120 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function Encours_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(cur_bal) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=130 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function Encours_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									isnull(sum(cur_bal),0) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=210 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_clt_act_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(cur_bal) 'EncCap'

									from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d

									where a.acct_no = c.acct_no
									  and b.rim_no = c.rim_no
									  and c.status not in ('Closed','incomplete')
									  and d.branch_no=100 
									  and d.employee_id=b.rsm_id ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_clt_act_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select
									count(disp.Cur_bal)  'EncCap'
									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and a.rsm_id=rsm.employee_id
									and br.branch_no=rsm.branch_no
									and rsm.branch_no=110 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_clt_act_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select
									count(disp.Cur_bal)  'EncCap'
									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and a.rsm_id=rsm.employee_id
									and br.branch_no=rsm.branch_no
									and rsm.branch_no=120 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_clt_act_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select
									count(disp.Cur_bal)  'EncCap'
									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and a.rsm_id=rsm.employee_id
									and br.branch_no=rsm.branch_no
									and rsm.branch_no=130 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_clt_act_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select
									count(disp.Cur_bal)  'EncCap'
									from
									ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp
									where
									a.rim_no=rm.rim_no 
									and a.status not in ('closed', 'incomplete', 'Active Charge-Off')
									and a.acct_no=disp.acct_no 
									and a.acct_type=disp.acct_type
									and rm.rsm_id=rsm.employee_id
									and br.branch_no=rsm.branch_no
									and rsm.branch_no=210 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dec_auj_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(ln.ACCT_NO) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=rm.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=110
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_dec_auj_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(ln.ACCT_NO) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=rm.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=120
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_dec_auj_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(ln.ACCT_NO) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=rm.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=130
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dec_auj_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(ln.ACCT_NO) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=rm.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=210
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dec_auj_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(ln.amt) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=110
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function vl_dec_auj_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(ln.amt) 'EncCap'
										from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
										where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
										and ln.class_code=cls.class_code
										and rsm.employee_id=ln.RSM_ID
										and ln.status in ('Active')
										and rsm.branch_no=120
										and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function vl_dec_auj_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(ln.amt) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=130
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dec_auj_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(ln.amt) 'EncCap'
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls, ad_gb_branch br
									where rm.rim_no=ln.RIM_NO  and rsm.branch_no=br.branch_no 
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no=210
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_ech_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(lb.acct_no) 'EncCap'
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=br.branch_no
									and rsm.branch_no=100
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status not in ('closed','incomplete')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}	
				
		function nb_ech_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(lb.acct_no) 'EncCap'
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=br.branch_no
									and rsm.branch_no=110
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status in ('Active','NonAccrual')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}	

		function nb_ech_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(lb.acct_no) 'EncCap'
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=br.branch_no
									and rsm.branch_no=120
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status in ('Active','NonAccrual')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
				
		function nb_ech_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(lb.acct_no) 'EncCap'
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=br.branch_no
									and rsm.branch_no=130
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status in ('Active','NonAccrual')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_ech_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(lb.acct_no) 'EncCap'
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=br.branch_no
									and rsm.branch_no=210
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status in ('Active','NonAccrual')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_ech_imp_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(distinct rm.rim_no) 'EncCap'

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									and rsm.branch_no=100
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}		
		function nb_ech_imp_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(distinct rm.rim_no) 'EncCap'

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									and rsm.branch_no=110
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_ech_imp_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(distinct rm.rim_no) 'EncCap'

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									and rsm.branch_no=120
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_ech_imp_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(distinct rm.rim_no) 'EncCap'

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									and rsm.branch_no=130
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_ech_imp_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									count(distinct rm.rim_no) 'EncCap'

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									and rsm.branch_no=210
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par0_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par0_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par0_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par0_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par0_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par0_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par0_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par0_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par0_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par0_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par30_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par30_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par30_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par30_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par30_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par30_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par30_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par30_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par30_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par30_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par7_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par7_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par7_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par7_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par7_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par7_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par7_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par7_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par7_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par7_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par90_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par90_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par90_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par90_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_par90_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									count(ln.amt) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par90_100()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=100
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par90_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=110
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par90_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=120
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par90_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=130
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_par90_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									sum(dis.cur_bal) 'EncCap'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no=210
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['EncCap'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.acct_no) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=110
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.acct_no) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=120
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.acct_no) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=130
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.acct_no) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=210
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=110
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt)  'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=120
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt)  'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=130
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt)  'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=210
									and cast(la.CREATE_DT as date) = cast(getdate() as date)";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function clo_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT distinct 
									count(rm.rim_no) 'dmd'
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm, ad_gb_branch br
									where la.RIM_NO =rm.rim_no and rsm.BRANCH_NO=br.branch_no and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
									and cast(la.close_DT as date) = cast(getdate() as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function clo_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT distinct 
									count(rm.rim_no) 'dmd'
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm, ad_gb_branch br
									where la.RIM_NO =rm.rim_no and rsm.BRANCH_NO=br.branch_no and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
									and cast(la.close_DT as date) = cast(getdate() as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function clo_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT distinct 
									count(rm.rim_no) 'dmd'
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm, ad_gb_branch br
									where la.RIM_NO =rm.rim_no and rsm.BRANCH_NO=br.branch_no and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
									and cast(la.close_DT as date) = cast(getdate() as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function clo_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "SELECT distinct 
									count(rm.rim_no) 'dmd'
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm, ad_gb_branch br
									where la.RIM_NO =rm.rim_no and rsm.BRANCH_NO=br.branch_no and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
									and cast(la.close_DT as date) = cast(getdate() as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function pen_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('Pending') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function pen_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('Pending') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function pen_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('Pending') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function pen_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('Pending') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function rev_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('reviewed') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function rev_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('reviewed') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function rev_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('reviewed') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function rev_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('reviewed') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function app_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function app_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function app_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function app_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_pen_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
										where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
										and la.status in ('Pending')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_pen_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
										and la.status in ('Pending')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_pen_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
										and la.status in ('Pending')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_pen_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
										and la.status in ('Pending')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_rev_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
										and la.status in ('Reviewed')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_rev_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
										and la.status in ('Reviewed')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_rev_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
										and la.status in ('Reviewed')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_rev_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
										and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
										and la.status in ('Reviewed')
										and datediff(day,la.application_dt,getdate())<90 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_app_dmd_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=130
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_app_dmd_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=120
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_app_dmd_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=110
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_app_dmd_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(la.application_amt) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=rm.rsm_id and rsm.branch_no=210
									and datediff(day,la.application_dt,getdate())<90
									and la.status  in ('approved') ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_week_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=110
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_week_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=120
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_week_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=130
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_week_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=210
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_week_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=110
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_week_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=120
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_week_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=130
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_week_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=210
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_week_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=110
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_week_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=120
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_week_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=130
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_week_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=210
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date) ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_month_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=110
									and datediff(month,la.create_dt,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_month_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=120
									and datediff(month,la.create_dt,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_month_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=130
									and datediff(month,la.create_dt,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function cum_dmd_month_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 
									count(la.ACCT_NO) 'dmd'
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm, ad_gb_branch br
									where rm.rim_no=la.RIM_NO  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=210
									and datediff(month,la.create_dt,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_month_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=110
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_month_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=120
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_month_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=130
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function nb_cr_month_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct count(ln.acct_no) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=210
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_month_110()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=110
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_month_120()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=120
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_month_130()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=130
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function vl_cr_month_210()
				{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select  
									distinct sum(ln.amt) 'dmd'
									from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ad_ln_cls cls,ad_gb_crncy dev, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.branch_no=210
									and ln.acct_no = dis.acct_no
									and dev.crncy_id = dis.crncy_id
									and cls.class_code = ln.class_code 
									and ln.status not in ('Closed','Incomplete','Restricted')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0 ";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['dmd'],0,'.',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
?>