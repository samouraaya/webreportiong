<?php			

				include('database.php');
				$pdo = Database4::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
	$sql="
	select 
		name,
		branch_no,
		last_to_dt,
		(select count(ln.acct_no) from ln_acct ln ,rm_acct rm where ln.rim_no = rm.rim_no and rsm.employee_id=rm.rsm_id and ln.status not in ('closed','Incomplete')) ,
		(select cast(isnull(sum(dis.cur_bal),0) as decimal(10,3)) from ln_display dis,ln_acct ln ,rm_acct rm where dis.acct_no=ln.acct_no and ln.rim_no = rm.rim_no and rsm.employee_id=rm.rsm_id and ln.status not in ('closed','Incomplete')) ,
		(select cast(isnull(sum(dis.cur_bal),0) as decimal(10,3)) from rm_acct rm, ln_acct ln, ln_display dis where rm.rim_no = ln.rim_no and rsm.employee_id=rm.rsm_id and ln.acct_no = dis.acct_no and ln.status not in ('Closed','Incomplete','Restricted') and datediff(dd,dis.delq_dt,getdate())>0) ,
		(select cast(isnull(sum(dis.cur_bal),0) as decimal(10,3)) from rm_acct rm, ln_acct ln, ln_display dis where rm.rim_no = ln.rim_no and rsm.employee_id=rm.rsm_id and ln.acct_no = dis.acct_no and ln.status not in ('Closed','Incomplete','Restricted') and datediff(dd,dis.delq_dt,getdate())>30),
		(select cast(isnull(sum(dis.cur_bal),0) as decimal(10,3)) from rm_acct rm, ln_acct ln, ln_display dis where rm.rim_no = ln.rim_no and rsm.employee_id=rm.rsm_id and ln.acct_no = dis.acct_no and ln.status not in ('Closed','Incomplete','Restricted') and datediff(dd,dis.delq_dt,getdate())>90), 
		(select cast(isnull(sum(ln.amt),0) as decimal(10,3)) from ln_acct ln,la_acct la where  la.LN_ACCT_NO=ln.acct_no and la.APPROVAL_RSM_ID=rsm.employee_id and ln.status in ('Active') and month(ln.CREATE_DT)=MONTH((select last_to_dt from ov_control))  and YEAR(ln.CREATE_DT)=YEAR((select last_to_dt from ov_control))) 'vldec',
    (select count(ln.amt) from ln_acct ln,la_acct la where  la.LN_ACCT_NO=ln.acct_no and la.APPROVAL_RSM_ID=rsm.employee_id and ln.status in ('Active') and month(ln.CREATE_DT)=MONTH((select last_to_dt from ov_control))  and YEAR(ln.CREATE_DT)=YEAR((select last_to_dt from ov_control))) 'nbdec'
    from ad_gb_rsm rsm,ov_control
    where rsm.empl_class_code=310 
    and status in ('Active')

";
	foreach ($pdo->query($sql) as $row)
			{ 	
			echo $row[0];
			$sql2="INSERT INTO `historique`(`date`, `encours`, `nbcredit`, `par1`, `par30`, `par90`, `agence`, `cc`,`nbdec`,`vldec`) 
			VALUES('$row[2]','$row[4]','$row[3]','$row[5]','$row[6]','$row[7]','$row[1]','$row[0]','$row[9]','$row[8]')";
			$pdo1->exec($sql2);
					
			}
header('Location:histo.php');			
?>
