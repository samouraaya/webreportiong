<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet d'avoir le nb de CR du mois

*/
function fn_nb_cr_120()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "select count(ln.acct_no) 'nb' from ln_acct ln,rm_acct rm 
						  where rm.rim_no=ln.rim_no 
						  and ln.branch_no=120 
						  and datediff(month,(select lh.create_dt from ln_history lh
						  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
						  and lh.reversal = 0
						  ),getdate())=0";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
/*
	c'est une fonction qui permet d'avoir le volume de CR du mois

*/
function fn_vl_cr_120()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "select sum(amt) 'nb' from ln_acct ln,rm_acct rm 
						  where rm.rim_no=ln.rim_no 
						  and ln.branch_no=120 
						  and datediff(month,(select lh.create_dt from ln_history lh
						  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
						  and lh.reversal = 0
						  ),getdate())=0";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
/*
	c'est une fonction qui permet d'avoir le nombre d'encours du mois

*/
function fn_nb_encours_120()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "select count(amt) 'nb' from ln_acct ln,rm_acct rm 
						  where rm.rim_no=ln.rim_no 
						  and ln.branch_no=120 
						  and ln.status in ('Active')";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
function fn_vl_encours_120()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "select sum(dis.cur_bal) 'nb'  from ln_acct ln,rm_acct rm,ln_display dis
						  where dis.acct_no=ln.acct_no 
						  and rm.rim_no=ln.rim_no 
						  and rm.branch_no=120 
						  and ln.status in ('Active')";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
function fn_avg_trait_120()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "select AVG (datediff(day,la.application_dt,(select lh.create_dt from ln_history lh
						  where lh.acct_no = ln.acct_no 
						  and lh.tran_code = 350 
						  and lh.reversal = 0
						  ))) 'nb' from la_acct la,ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.branch_no=120 and la.ln_acct_no=ln.acct_no";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
?>