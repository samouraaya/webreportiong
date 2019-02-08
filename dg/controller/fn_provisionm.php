<?php 
		function Provision_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and delq_dt is null and ln.status not in ('Active Charge-Off'))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and ln.status not in ('Active Charge-Off'))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		
		function Provision_total_501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off'))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off'))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and delq_dt is null)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and delq_dt is null)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and delq_dt is null)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and delq_dt is null)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal)*(0.5/100),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and delq_dt is null)+
				(select isnull((sum(cur_bal)*20)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and delq_dt is null)+
				(select isnull((sum(cur_bal)*10)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull((sum(cur_bal)*50)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull((sum(cur_bal)*40)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull((sum(cur_bal)*70)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_prov_501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal)*(0.5/100),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=501 and delq_dt is null)+
				(select isnull((sum(cur_bal)*20)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=501 and delq_dt is null)+
				(select isnull((sum(cur_bal)*10)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull((sum(cur_bal)*50)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull((sum(cur_bal)*40)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull((sum(cur_bal)*70)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_prov_511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal)*(0.5/100),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and delq_dt is null)+
				(select isnull((sum(cur_bal)*20)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=511 and delq_dt is null)+
				(select isnull((sum(cur_bal)*10)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull((sum(cur_bal)*50)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull((sum(cur_bal)*40)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull((sum(cur_bal)*70)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function Provision_total_prov_521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal)*(0.5/100),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and delq_dt is null)+
				(select isnull((sum(cur_bal)*20)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=521 and delq_dt is null)+
				(select isnull((sum(cur_bal)*10)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				(select isnull((sum(cur_bal)*50)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30)+
				((select isnull((sum(cur_bal)*40)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60))+
				((select isnull((sum(cur_bal)*70)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90))+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180))+
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='N' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180)+
				((select isnull((sum(cur_bal)*100)/100,0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and ln.status not in ('Active Charge-Off') and refinanced='Y' and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >31)) 'nb'";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_totalm_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_provm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_provm_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalm_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprovm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprovm_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*50)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_totalm_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >=31 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_totalprovm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_totalprovm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_totalprovm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_totalm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_totalprovm()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		
		///////////////////////////////////////////////////////////////////////////////////////////////
		function sain_total_501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and dis.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180  and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total501m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total501mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180  and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprovm_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*50)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalm_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_totalm_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_provm_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_totalm_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >=31 and dis.class_code=501 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
	////////////////////////////////////////////////////////
		function sain_total_511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and dis.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180  and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total511m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total511mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180  and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprovm_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*50)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalm_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_totalm_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_provm_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_totalm_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >=31 and dis.class_code=511 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
	//////////////////////////////////////////////////////////////////
		function sain_total_521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and dis.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 31 and 60 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 61 and 90 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 91 and 180  and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total521m()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total521mprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >180  and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprovm_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*50)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalm_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) between 0 and 30 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_totalm_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_provm_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_totalm_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,dateadd(dd,1,(select last_to_dt from ov_control)) ) >=31 and dis.class_code=521 and ln.status not in ('Active Charge-Off') ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,',',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
?> 