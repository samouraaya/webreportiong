<?php 

	ini_set("display_errors",0); 


	function decaissement_genre ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 

sum(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and rm.sex='F'
)'DecFvl',
(select 

sum(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and rm.sex='M'
)'DecMvl',
(select 

count(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and rm.sex='F'
)'DecFnb',
(select 

count(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and rm.sex='M'
)'DecMnb'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DecFvl'=>number_format($row['DecFvl'],'0',',',' '),
					'DecMvl'=>number_format($row['DecMvl'],'0',',',' '),
					'DecFnb'=>number_format($row['DecFnb'],'0',',',' '),
					'DecMnb'=>number_format($row['DecMnb'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function encours_genre ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 

sum(ln.cur_bal)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and rm.sex='F'
and ln.status not in ('closed','Incomplete','Active charge-off')
)'EncoursFvl',
(select 

sum(ln.cur_bal)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='M'
)'EncoursMvl',
(select 

count(ln.cur_bal)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='F'
)'EncoursFnb',
(select 

count(ln.cur_bal)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='M'
)'EncoursMnb'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'EncoursFvl'=>number_format($row['EncoursFvl'],'3',',',' '),
					'EncoursMvl'=>number_format($row['EncoursMvl'],'3',',',' '),
					'EncoursFnb'=>number_format($row['EncoursFnb'],'0',',',' '),
					'EncoursMnb'=>number_format($row['EncoursMnb'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_AGR ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECAGRVL',
(select 
count(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECAGRNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCAGRVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCAGRNB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECAGRVL'=>number_format($row['DECAGRVL'],'0',',',' '),
					'ENCAGRVL'=>number_format($row['ENCAGRVL'],'3',',',' '),
					'DECAGRNB'=>number_format($row['DECAGRNB'],'0',',',' '),
					'ENCAGRNB'=>number_format($row['ENCAGRNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_SERV ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSERVVL',
(select 
count(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSERVNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSERVVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSERVNB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECSERVVL'=>number_format($row['DECSERVVL'],'0',',',' '),
					'ENCSERVVL'=>number_format($row['ENCSERVVL'],'3',',',' '),
					'DECSERVNB'=>number_format($row['DECSERVNB'],'0',',',' '),
					'ENCSERVNB'=>number_format($row['ENCSERVNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_PROD ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECPRODVL',
(select 
count(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECPRODNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCPRODVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCPRODNB'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECPRODVL'=>number_format($row['DECPRODVL'],'0',',',' '),
					'ENCPRODVL'=>number_format($row['ENCPRODVL'],'3',',',' '),
					'DECPRODNB'=>number_format($row['DECPRODNB'],'0',',',' '),
					'ENCPRODNB'=>number_format($row['ENCPRODNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_VENTE ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECVENTEVL',
(select 
count(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECVENTENB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCVENTEVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCVENTENB'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECVENTEVL'=>number_format($row['DECVENTEVL'],'0',',',' '),
					'ENCVENTEVL'=>number_format($row['ENCVENTEVL'],'3',',',' '),
					'DECVENTENB'=>number_format($row['DECVENTENB'],'0',',',' '),
					'ENCVENTENB'=>number_format($row['ENCVENTENB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_N_A ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code =0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECNAVL',
(select 
count(ln.amt)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code =0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECNANB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code =0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNAVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code =0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNANB'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECNAVL'=>number_format($row['DECNAVL'],'0',',',' '),
					'ENCNAVL'=>number_format($row['ENCNAVL'],'3',',',' '),
					'DECNANB'=>number_format($row['DECNANB'],'0',',',' '),
					'ENCNANB'=>number_format($row['ENCNANB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_1000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Nord-Est'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC1000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Nord-Est'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC1000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and dis.acct_no = ln.acct_no
and br.address_line_1='Nord-Est'
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC1000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and rsm.branch_no = br.branch_no
and br.address_line_1='Nord-Est'
and ln.acct_no=dis.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC1000NB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DEC1000VL'=>number_format($row['DEC1000VL'],'0',',',' '),
					'ENC1000VL'=>number_format($row['ENC1000VL'],'3',',',' '),
					'DEC1000NB'=>number_format($row['DEC1000NB'],'0',',',' '),
					'ENC1000NB'=>number_format($row['ENC1000NB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_2000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Est'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC2000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Est'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC2000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and dis.acct_no = ln.acct_no
and br.address_line_1='Centre-Est'
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC2000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Est'
and ln.acct_no=dis.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC2000NB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DEC2000VL'=>number_format($row['DEC2000VL'],'0',',',' '),
					'ENC2000VL'=>number_format($row['ENC2000VL'],'3',',',' '),
					'DEC2000NB'=>number_format($row['DEC2000NB'],'0',',',' '),
					'ENC2000NB'=>number_format($row['ENC2000NB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_3000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Ouest'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC3000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Ouest'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC3000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and dis.acct_no = ln.acct_no
and br.address_line_1='Centre-Ouest'
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC3000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and rsm.branch_no = br.branch_no
and br.address_line_1='Centre-Ouest'
and ln.acct_no=dis.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC3000NB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DEC3000VL'=>number_format($row['DEC3000VL'],'0',',',' '),
					'ENC3000VL'=>number_format($row['ENC3000VL'],'3',',',' '),
					'DEC3000NB'=>number_format($row['DEC3000NB'],'0',',',' '),
					'ENC3000NB'=>number_format($row['ENC3000NB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}

	function Total_Region ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECREGVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0 
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECREGNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and rsm.branch_no = br.branch_no
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCREGVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,ad_gb_branch br
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and rsm.branch_no = br.branch_no
and ln.acct_no=dis.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCREGNB'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECREGVL'=>number_format($row['DECREGVL'],'0',',',' '),
					'ENCREGVL'=>number_format($row['ENCREGVL'],'3',',',' '),
					'DECREGNB'=>number_format($row['DECREGNB'],'0',',',' '),
					'ENCREGNB'=>number_format($row['ENCREGNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
?>