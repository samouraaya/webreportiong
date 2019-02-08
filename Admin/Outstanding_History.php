<?php			

				include('database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
	$sql="
select 
rsm.branch_no 'BRANCH'
,rsm.employee_id
,rsm.name 'CC'
,(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'ENCOURS',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>0) 'PAR0VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>30) 'PAR30VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>90) 'PAR90VL'
,
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>0) 'PAR0NB'
,
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>30) 'PAR30NB'
,
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>90) 'PAR90NB'
,(select last_from_dt from ov_control) 'MONTH'
,rsm.status 'Statut'
,(select max(overnight_id) from ov_overnight) 'LASTNIGHTY'
,(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status in ('Active charge-off')
) 'VLPERTE'
,(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status in ('Active charge-off')
) 'NBPERTE'
,
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'NBENCOURS'
from ad_gb_rsm rsm 


order by rsm.branch_no
";
	foreach ($pdo->query($sql) as $row)
			{ 	
			$sql2="INSERT INTO `Outstanding_history`
			(`BRANCH`, `IDEMPL`, `NAMEEMPL`, `OUTSTANDING`, `PAR0VL`, `PAR30VL`, `PAR90VL`, `PAR0NB`,`PAR30NB`,`PAR90NB`,`MONTH`,`STATUSEMPL`,`LASTNIGHTY`,`VLPERTE`,`NBPERTE`, `OUTSTANDINGNB`) 
			VALUES
			('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]','$row[15]')";
			$pdo1->exec($sql2);
			}

$sql="
select class_code 'CLASS',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and dis.class_code=cls.class_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'ENCOURS',
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and dis.class_code=cls.class_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'NBENCOURS',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and dis.class_code=cls.class_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>0) 'PAR0VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and dis.class_code=cls.class_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>30) 'PAR30VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and dis.class_code=cls.class_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>90) 'PAR90VL'
,(select last_from_dt from ov_control) 'MONTH'

from ad_ln_cls cls 




";
	foreach ($pdo->query($sql) as $row)
			{ 	
			$sql2="INSERT INTO `outstanding_history_ln_type`
			(`CLASS`, `ENCOURS`, `NBENCOURS`, `PAR0VL`, `PAR30VL`, `PAR90VL`, `MONTH`) 
			VALUES
			('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]')";
			$pdo1->exec($sql2);
			}			

$sql="
select distinct rms.sex 'SEX',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rms.sex=rm.sex
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'ENCOURS',
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rms.sex=rm.sex
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'NBENCOURS',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rms.sex=rm.sex
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>0) 'PAR0VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rms.sex=rm.sex
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>30) 'PAR30VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and rms.sex=rm.sex
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>90) 'PAR90VL'
,(select last_from_dt from ov_control) 'MONTH'

from rm_acct rms 
";
	foreach ($pdo->query($sql) as $row)
			{ 	
			$sql2="INSERT INTO `outstanding_genre`
			(`SEX`, `ENCOURS`, `NBENCOURS`, `PAR0VL`, `PAR30VL`, `PAR90VL`, `MONTH`) 
			VALUES
			('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]')";
			$pdo1->exec($sql2);
			}	

$sql="
select distinct sic.sic_code 'sic',sic.description 'desc',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and sic.sic_code=rm.sic_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'ENCOURS',
(select count(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and sic.sic_code=rm.sic_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
) 'NBENCOURS',
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and sic.sic_code=rm.sic_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>0) 'PAR0VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and sic.sic_code=rm.sic_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>30) 'PAR30VL'
,
(select sum(cur_bal) from ln_display dis,rm_acct rm 
where dis.rim_no = rm.rim_no
and sic.sic_code=rm.sic_code
and dis.status not in ('Closed','Incomplete','Active charge-off')
and datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control)))>90) 'PAR90VL'
,(select last_from_dt from ov_control) 'MONTH'

from ad_gb_sic sic 
";
	foreach ($pdo->query($sql) as $row)
			{ 	
			$sql2="INSERT INTO `outstanding_sic`
			(`SICODE`,`SIC`, `ENCOURS`, `NBENCOURS`, `PAR0VL`, `PAR30VL`, `PAR90VL`, `MONTH`) 
			VALUES
			('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]')";
			$pdo1->exec($sql2);
			}			
?>
