<?php 

		function sain_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}	
		function sain_total_prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_totalprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_totalprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_totalprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_totalprov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_prov_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprov_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_total_restru()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) >=31";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		function sain_total_501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=501 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and   dis.class_code=501 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180  and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total501()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total501prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180  and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprov_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_prov_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_total_restru501()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) >=31 and dis.class_code=501";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
	////////////////////////////////////////////////////////
		function sain_total_511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=511 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and   dis.class_code=511 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180  and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total511()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total511prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180  and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprov_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_prov_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_total_restru511()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) >=31 and dis.class_code=511";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
	//////////////////////////////////////////////////////////////////
		function sain_total_521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  dis.class_code=521 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal)*(0.5/100) as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and   dis.class_code=521 and delq_dt is null";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_60_total521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*40)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 31 and 60 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_90_total521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*70)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 61 and 90 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_180_total521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) between 91 and 180  and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total521()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_181_total521prov()
		{
			include('../../../cnx/database.php');
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and  datediff(dd,dis.delq_dt,getdate()) >180  and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_totalprov_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*10)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_1_30_total_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) between 1 and 30 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select sum(cur_bal) 'nb' from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function sain_total_prov_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*20)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and delq_dt is null and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		function par_31_total_restru521()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select (sum(cur_bal)*100)/100 as nb from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and datediff(dd,dis.delq_dt,getdate()) >=31 and dis.class_code=521";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
?> 