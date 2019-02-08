<?php			

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
				include('database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
	$sql="
	select 

employee_id 'IDEMPL'
,name 'NAMEEMPL'
,(select count(acct_no) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and rsm.employee_id=rm.rsm_id
    and datediff(month,(select last_from_dt from ov_control),(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0) 'NBDECEMPLTOTAL'
,(select count(acct_no) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and rsm.employee_id=rm.rsm_id
    and ln.class_code=501
    and datediff(month,(select last_from_dt from ov_control),(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0) 'NBDECEMPL501'
,(select count(acct_no) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and rsm.employee_id=rm.rsm_id
    and ln.class_code=511
    and datediff(month,(select last_from_dt from ov_control),(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0) 'NBDECEMPL511'
,(select count(acct_no) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and rsm.employee_id=rm.rsm_id
    and ln.class_code=521
    and datediff(month,(select last_from_dt from ov_control),(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0) 'NBDECEMPL521'    
,isnull(cast((select sum(amt) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and rsm.employee_id=rm.rsm_id
    and datediff(month,(select last_from_dt from ov_control)
    ,(select lh.create_dt from ln_history lh 
    where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0)as decimal(10,3)),0) 'VLDECEMPL'
,cast((select last_from_dt from ov_control)as date) 'MONTH'    
,branch_no 'AGENCE'
,rsm.status 'STATUS'

from ad_gb_rsm rsm  

order by 'VLDECEMPL'


";
	foreach ($pdo->query($sql) as $row)
			{ 	
			echo $row[0];
			$sql2="INSERT INTO `Disbursment_History`(`IDEMPL`, `NAMEEMPL`, `NBDECEMPLTOTAL`, `NBDECEMPL501`, `NBDECEMPL511`, `NBDECEMPL521`, `VLDECEMPL`, `MONTH`,`BRANCH`,`STATUTEMPL`) 
			VALUES(".$row[0].",'".$row[1]."',".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",'".$row[7]."',".$row[8].",'".$row[9]."')";
			$pdo1->exec($sql2);
			}

	$sql="
	select 

class_code 
,(select count(acct_no) 
    from ln_acct ln,rm_acct rm 
    where ln.rim_no=rm.rim_no 
    and cls.class_code=ln.class_code
    and datediff(month,(select last_from_dt from ov_control)
    ,(select lh.create_dt from ln_history lh 
    where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))=0) 'NBDECCLS'
,cast((select last_from_dt from ov_control)as date) 'MONTH'  

from ad_ln_cls cls
where cls.status='Active'
    


";
	foreach ($pdo->query($sql) as $row)
			{ 	
			$sql2="INSERT INTO disbursement_history_ln_type (NUMDECCLS,CLASS_CODE,MONTH)
			VALUES(".$row[1].",".$row[0].",'".$row[2]."')";
			$pdo1->exec($sql2);
			}
?>
