<?php 
ini_set("display_errors",0);
 
/******************Créances Saines (0.5 %)***********************/
		function sain1day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain1week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain1month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain2month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain3month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain6month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain12month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain24month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain36month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain60month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sain_total_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************PAR Entre 1 et 30 jours (10 %)***********************/
		function par11day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par11week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par11month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par12month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par13month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par16month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par112month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par124month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par136month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par160month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************PAR Entre 31 et 60 jours (40 %)***********************/
		function par301day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par301week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par301month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par302month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par303month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par306month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par3012month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par3024month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par3036month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par3060month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 31 and 60
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************PAR Entre 61 et 90 jours (70 %)***********************/
		function par601day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par601week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par601month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par602month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par603month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par606month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par6012month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par6024month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par6036month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par6060month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par60_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 61 and 90
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************PAR Entre 91 et 120 jours (100 %)***********************/
		function par901day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par901week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par901month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par902month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par903month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par906month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par9012month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par9024month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par9036month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par9060month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par90_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 91 and 120
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
			/******************PAR Entre 121 et 180 jours (100 %)***********************/
		function par1201day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1201week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1201month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1202month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1203month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1206month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par12012month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par12024month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par12036month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par12060month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par120_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 121 and 180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		
		/******************PAR >180 jours***********************/
		function par1801day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1801week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1801month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1802month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1803month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1806month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par18012month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par18024month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par18036month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par18060month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par180_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >180
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='N'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************Restructuré - Sain (20%)***********************/
		function sainre1day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre1week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre1month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre2month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre3month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre6month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre12month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre24month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre36month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre60month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function sainre_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and dis.delq_dt is null 
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************estructuré - PAR Entre 1 et 30 jours (50%))***********************/
		function par1re1day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re1week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re1month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re2month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re3month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re6month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re12month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re24month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re36month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par1re60month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}	
		function par1re_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) between 0 and 30
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		/******************Restructuré/PAR >= 31 jours (100%)***********************/
		function par30re1day()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=0";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re1week()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>0
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=5";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re1month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>5
									and datediff(day,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<30";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re2month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>=1
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=2";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re3month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>2
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=3";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re6month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>3
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=6";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re12month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>6
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=12";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re24month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>12
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=24";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re36month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>24
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)<=36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re60month()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')
									and datediff(month,dateadd(day,1,(select last_to_dt from ov_control)),bill.pmt_due_dt)>36";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}
		function par30re_tot_maturite()
				{				
							include('../../../cnx/database.php');
							$pdo = Database6::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select 

									sum(bill.amt-bill.amt_satisfied) 'nb'
									from ln_bill bill,ln_display dis,ln_acct ln
									where bill.acct_no = dis.acct_no
									and datediff(day,delq_dt,(select dateadd(day,1,last_to_dt) from ov_control)) >=31
									and bill.sub_no=2
									and ln.acct_no = bill.acct_no
									and ln.refinanced='Y'
									
									and bill.status='Unsatisfied'
									
									and ln.status not in ('closed','incomplete','Active charge-off')";
					$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					$return = array();
					foreach ($result as $row1)
					$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
					header('Content-type: application/json');
					echo json_encode($return);
					Database::disconnect();
				}				
?>