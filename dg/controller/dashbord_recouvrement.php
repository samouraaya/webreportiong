<?php

function fn_pf_nonaccrual_rec()
	{				
		include('../../../cnx/database.php');
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql="select 
					sum(cur_bal) 'vl_pf_rec_nonaccrual',
					count(dis.acct_no) 'nb_pf_rec_nonaccrual'

					from ln_display dis,ad_gb_rsm rsm , rm_acct rm
					where dis.rim_no=rm.rim_no
					and dis.status='NonAccrual'
					and rsm.employee_id=rm.rsm_id
					and rsm.empl_class_code=530";
		
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'vl_pf_rec_nonaccrual'=>number_format($row['vl_pf_rec_nonaccrual'],3,',',' '),
					'nb_pf_rec_nonaccrual'=>$row['nb_pf_rec_nonaccrual']);
	}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
	}

function fn_pf_chargeoff_rec()
	{				
		include('../../../cnx/database.php');
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql="select 
					sum(cur_bal) 'vl_pf_rec_chargeoff',
					count(dis.acct_no) 'nb_pf_rec_chargeoff'

					from ln_display dis,ad_gb_rsm rsm , rm_acct rm
					where dis.rim_no=rm.rim_no
					and dis.status='Active charge-off'
					and rsm.employee_id=rm.rsm_id
					and rsm.empl_class_code=530";
		
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'vl_pf_rec_chargeoff'=>number_format($row['vl_pf_rec_chargeoff'],3,',',' '),
					'nb_pf_rec_chargeoff'=>$row['nb_pf_rec_chargeoff']);
	}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
	}
	
function fn_pf_nb_pf_clot()
	{				
		include('../../../cnx/database.php');
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql="select 
					count(his.acct_no) 'nb_pf_clot'

					from ln_display dis,ad_gb_rsm rsm , rm_acct rm,ln_history his
					where dis.rim_no=rm.rim_no
					and rsm.employee_id=rm.rsm_id
					  and dis.acct_no = his.acct_no
					  and his.tran_code=345
					and rsm.empl_class_code=530 ";
		
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'nb_pf_clot'=>$row['nb_pf_clot']);
	}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
	}
?>