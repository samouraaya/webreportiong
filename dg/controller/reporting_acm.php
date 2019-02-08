<?php 

	ini_set("display_errors",0); 

/* 28/09/2018*/
	function totale_genre ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select
(select 

count(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0

)'Decnb',

(select 

count(distinct ln.rim_no)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
)'Decnbclt',
(select 

sum(ln.amt)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0

)'Decvl',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off'))'Encoursgnb',
(select 
count(distinct ln.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off'))'Encoursgnbclt',

(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and ln.status not in ('Closed','Incomplete','Active Charge-Off'))'Encoursgvl'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'Decnb'=>number_format($row['Decnb'],'0',',',' '),
					'Decnbclt'=>number_format($row['Decnbclt'],'0',',',' '),
					'Decvl'=>number_format($row['Decvl'],'0',',',' '),
					'Encoursgnb'=>number_format($row['Encoursgnb'],'0',',',' '),
					'Encoursgnbclt'=>number_format($row['Encoursgnbclt'],'0',',',' '),
					'Encoursgvl'=>number_format($row['Encoursgvl'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
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
)'DecMnb'
,
(select 

count(distinct ln.rim_no)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and rm.sex='F'
)'DecFnbclt',
(select 

count(distinct ln.rim_no)
from ln_acct ln, rm_acct rm
where ln.rim_no=rm.rim_no
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and rm.sex='M'
)'DecMnbclt'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DecFvl'=>number_format($row['DecFvl'],'0',',',' '),
					'DecMvl'=>number_format($row['DecMvl'],'0',',',' '),
					'DecFnb'=>number_format($row['DecFnb'],'0',',',' '),
					'DecMnb'=>number_format($row['DecMnb'],'0',',',' '),
					'DecMnbclt'=>number_format($row['DecMnbclt'],'0',',',' '),
					'DecFnbclt'=>number_format($row['DecFnbclt'],'0',',',' '),
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
and cur_bal<>0
)'EncoursFnb',
(select 

count(ln.cur_bal)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='M'
and cur_bal<>0
)'EncoursMnb',
(select 

count(distinct ln.rim_no)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='F'
and cur_bal<>0
)'EncoursFnbclt',
(select 

count(distinct ln.rim_no)
from ln_display ln, rm_acct rm
where ln.rim_no=rm.rim_no
and ln.status not in ('closed','Incomplete','Active charge-off')
and rm.sex='M'
and cur_bal<>0
)'EncoursMnbclt'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'EncoursFvl'=>number_format($row['EncoursFvl'],'',',',' '),
					'EncoursMvl'=>number_format($row['EncoursMvl'],'3',',',' '),
					'EncoursFnb'=>number_format($row['EncoursFnb'],'0',',',' '),
					'EncoursMnb'=>number_format($row['EncoursMnb'],'0',',',' '),
					'EncoursMnbclt'=>number_format($row['EncoursMnbclt'],'0',',',' '),
					'EncoursFnbclt'=>number_format($row['EncoursFnbclt'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
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
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description not like 'AGR. Elevage%')
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
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description not like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECAGRNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description not like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCAGRVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and (ad.description not like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCAGRNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and (ad.description not like 'AGR. Elevage%')
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCAGRNBCLT'

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
					'ENCAGRNBCLT'=>number_format($row['ENCAGRNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		/* 28/01/2019*/
	function INFO_ELV ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "
select(select 
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
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description  like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECELVVL',
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
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECELVNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.class_code <> 531
and ln.class_code <> 551
and (ad.description  like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCELVVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and (ad.description like 'AGR. Elevage%')
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCELVNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=100
and (ad.description  like 'AGR. Elevage%')
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCELVNBCLT'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECELVVL'=>number_format($row['DECELVVL'],'0',',',' '),
					'ENCELVVL'=>number_format($row['ENCELVVL'],'3',',',' '),
					'DECELVNB'=>number_format($row['DECELVNB'],'0',',',' '),
					'ENCELVNB'=>number_format($row['ENCELVNB'],'0',',',' '),
					'ENCELVNBCLT'=>number_format($row['ENCELVNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
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
and ln.class_code <> 531
and ln.class_code <> 551
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
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSERVNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSERVVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSERVNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=700
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSERVNBCLT'
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
					'ENCSERVNBCLT'=>number_format($row['ENCSERVNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
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
and ln.class_code <> 531
and ln.class_code <> 551
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
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECPRODNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCPRODVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCPRODNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code=300
and ln.class_code <> 531
and ln.class_code <> 551

and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCPRODNBCLT'

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
					'ENCPRODNBCLT'=>number_format($row['ENCPRODNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
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
and ln.class_code <> 531
and ln.class_code <> 551
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
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECVENTENB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.class_code <> 531
and ln.class_code <> 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCVENTEVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCVENTENB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code in (500,600,400)
and ln.class_code <> 531
and ln.class_code <> 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCVENTENBCLT'

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
					'ENCVENTENBCLT'=>number_format($row['ENCVENTENBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_SCO ()			
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
and ln.class_code = 531
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSOCVL',
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
and ln.class_code = 531
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSOCNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and ln.class_code = 531
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOCVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and ln.class_code = 531
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOCNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and ln.class_code = 531
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOCNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECSOCNB'=>number_format($row['DECSOCNB'],'0',',',' '),
					'DECSOCVL'=>number_format($row['DECSOCVL'],'3',',',' '),
					'ENCSOCNB'=>number_format($row['ENCSOCNB'],'0',',',' '),
					'ENCSOCVL'=>number_format($row['ENCSOCVL'],'0',',',' '),
					'ENCSOCNBCLT'=>number_format($row['ENCSOCNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	
	/* 28/09/2018*/
	
	function INFO_log ()			
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

and ln.class_code = 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECVLOGEVL',
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

and ln.class_code = 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECVLOGENB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no

and ln.class_code = 551
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCLOGEVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no

and ln.class_code = 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCLOGENB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no

and ln.class_code = 551
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCLOGENBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECVLOGENB'=>number_format($row['DECVLOGENB'],'0',',',' '),
					'DECVLOGEVL'=>number_format($row['DECVLOGEVL'],'3',',',' '),
					'ENCLOGENB'=>number_format($row['ENCLOGENB'],'0',',',' '),
					'ENCLOGENBCLT'=>number_format($row['ENCLOGENBCLT'],'0',',',' '),
					'ENCLOGEVL'=>number_format($row['ENCLOGEVL'],'0',',',' '),
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
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNANB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no
and rm.sic_code =0
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNANBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECNANB'=>number_format($row['DECNAVL'],'0',',',' '),
					'ENCNAVL'=>number_format($row['ENCNAVL'],'3',',',' '),
					'DECNANB'=>number_format($row['DECNANB'],'0',',',' '),
					'ENCNANB'=>number_format($row['ENCNANB'],'0',',',' '),
					'ENCNANBCLT'=>number_format($row['ENCNANBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function totale_act()			
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


and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECACTVL',
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


and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECACTNB',
(select 
sum(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCATVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCATNB',
(select 
count(distinct ln.rim_no)
from ln_acct ln,rm_personal_info info, rm_acct rm,ad_rm_employment ad,ln_display dis
where ln.rim_no=rm.rim_no
and info.rim_no = rm.rim_no
and ad.employment_id=info.empl_occupation
and ln.acct_no=dis.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCATNBCLT'


";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECACTNB'=>number_format($row['DECACTNB'],'0',',',' '),
					'DECACTVL'=>number_format($row['DECACTVL'],'0',',',' '),
					'ENCATNB'=>number_format($row['ENCATNB'],'0',',',' '),
					'ENCATNBCLT'=>number_format($row['ENCATNBCLT'],'0',',',' '),
					'ENCATVL'=>number_format($row['ENCATVL'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function INFO_1000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'ELFAHS%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC1000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where  rsm.employee_id=rm.rsm_id
and adr.rim_no = rm.rim_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'ELFAHS%')
and ln.rim_no = rm.rim_no
and adr.addr_type_id=1

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC1000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id

and dis.acct_no = ln.acct_no and adr.rim_no = rm.rim_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'ELFAHS%')

and adr.addr_type_id=1

and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC1000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and adr.rim_no = rm.rim_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'ELFAHS%')

and adr.addr_type_id=1


and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC1000NB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'ELFAHS%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC1000NBCLT'
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
					'ENC1000NBCLT'=>number_format($row['ENC1000NBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function INFO_2000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'SOU%'or adr.town like'MON%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC2000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where  rsm.employee_id=rm.rsm_id
and adr.rim_no = rm.rim_no
and (adr.town like'SOU%'or adr.town like'MON%')
and ln.rim_no = rm.rim_no
and adr.addr_type_id=1

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC2000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id

and dis.acct_no = ln.acct_no and adr.rim_no = rm.rim_no
and (adr.town like'SOU%'or adr.town like'MON%')

and adr.addr_type_id=1

and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC2000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and adr.rim_no = rm.rim_no
and (adr.town like'SOU%'or adr.town like'MON%')

and adr.addr_type_id=1


and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC2000NB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'SOU%'or adr.town like'MON%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC2000NBCLT'
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
					'ENC2000NBCLT'=>number_format($row['ENC2000NBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function INFO_3000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and adr.town like'KAI%'
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1


and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC3000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and adr.town like'KAI%'
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1



and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC3000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and adr.town like'KAI%'
and adr.rim_no = rm.rim_no

and dis.acct_no = ln.acct_no
and adr.addr_type_id=1

and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC3000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and adr.town like'KAI%'
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC3000NB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr 
where ln.rim_no=rm.rim_no

and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and adr.town like'KAI%'
and adr.rim_no = rm.rim_no

and adr.addr_type_id=1


and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC3000NBCLT'
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
					'ENC3000NBCLT'=>number_format($row['ENC3000NBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function INFO_4000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'BEJ%'or adr.town like'JEN%')

and adr.addr_type_id=1

and rsm.employee_id=rm.rsm_id


and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC4000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'BEJ%'or adr.town like'JEN%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC4000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no 
and adr.rim_no = rm.rim_no
and (adr.town like'BEJ%'or adr.town like'JEN%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and dis.acct_no = ln.acct_no

and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC4000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and (adr.town like'BEJ%'or adr.town like'JEN%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC4000NB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where  ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and dis.rim_no = adr.rim_no
and( adr.town like'BEJ%'or adr.town like'JEN%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no

and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC4000NBCLT'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DEC4000VL'=>number_format($row['DEC4000VL'],'0',',',' '),
					'ENC4000VL'=>number_format($row['ENC4000VL'],'3',',',' '),
					'DEC4000NB'=>number_format($row['DEC4000NB'],'0',',',' '),
					'ENC4000NB'=>number_format($row['ENC4000NB'],'0',',',' '),
					'ENC4000NBCLT'=>number_format($row['ENC4000NBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
		/* 01/10/2018*/
	function INFO_5000 ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and( adr.town like'MED%'or adr.town like'GAB%')

and adr.addr_type_id=1

and rsm.employee_id=rm.rsm_id


and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC5000VL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and( adr.town like'MED%'or adr.town like'GAB%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DEC5000NB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no 
and adr.rim_no = rm.rim_no
and( adr.town like'MED%'or adr.town like'GAB%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id

and dis.acct_no = ln.acct_no

and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC5000VL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and( adr.town like'MED%'or adr.town like'GAB%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no


and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC5000NB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where  ln.rim_no = rm.rim_no
and adr.rim_no = rm.rim_no
and dis.rim_no = adr.rim_no
and( adr.town like'MED%'or adr.town like'GAB%')

and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no

and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENC5000NBCLT'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DEC5000VL'=>number_format($row['DEC5000VL'],'0',',',' '),
					'ENC5000VL'=>number_format($row['ENC5000VL'],'3',',',' '),
					'DEC5000NB'=>number_format($row['DEC5000NB'],'0',',',' '),
					'ENC5000NB'=>number_format($row['ENC5000NB'],'0',',',' '),
					'ENC5000NBCLT'=>number_format($row['ENC5000NBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
/* 28/09/2018*/
	function Total_Region ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and rsm.employee_id=rm.rsm_id
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%' or adr.town like'SOU%'or adr.town like'BEJ%'or adr.town like'JEN%'or adr.town like'KAI%' or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'MON%'or adr.town like'ELFAHS%'or adr.town like'MED%'or adr.town like'GAB%')

and ln.rim_no=rm.rim_no

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECREGVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECREGNB',
(select 
count(distinct ln.rim_no)
from ln_acct ln, rm_acct rm,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%' or adr.town like'SOU%'or adr.town like'BEJ%'or adr.town like'JEN%'or adr.town like'KAI%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'MON%'or adr.town like'ELFAHS%'or adr.town like'MED%'or adr.town like'GAB%')

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECREGNBCLT',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%' or adr.town like'SOU%'or adr.town like'BEJ%'or adr.town like'JEN%'or adr.town like'KAI%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'MON%'or adr.town like'ELFAHS%'or adr.town like'MED%'or adr.town like'GAB%')

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCREGVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%' or adr.town like'SOU%'or adr.town like'BEJ%'or adr.town like'JEN%'or adr.town like'KAI%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'MON%'or adr.town like'ELFAHS%'or adr.town like'MED%'or adr.town like'GAB%')

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCREGNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and (adr.town like'TUN%'or adr.town like'ARI%' or adr.town like'BEN%'or adr.town like'NAB%'or adr.town like'ZAG%' or adr.town like'SOU%'or adr.town like'BEJ%'or adr.town like'JEN%'or adr.town like'KAI%'or adr.town like'MAN%'or adr.town like'BIZ%'or adr.town like'MON%'or adr.town like'ELFAHS%'or adr.town like'MED%'or adr.town like'GAB%')

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCREGNBCLT'
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
					'ENCREGNBCLT'=>number_format($row['ENCREGNBCLT'],'0',',',' '),
					'DECREGNBCLT'=>number_format($row['DECREGNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	
	function INFO_BIZ ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%BIZ%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBIZVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BIZ%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBIZNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BIZ%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBIZVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BIZ%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBIZNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BIZ%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBIZNBCLT'



";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECBIZVL'=>number_format($row['DECBIZVL'],'0',',',' '),
					'ENCBIZVL'=>number_format($row['ENCBIZVL'],'3',',',' '),
					'DECBIZNB'=>number_format($row['DECBIZNB'],'0',',',' '),
					'ENCBIZNB'=>number_format($row['ENCBIZNB'],'0',',',' '),
					'ENCBIZNBCLT'=>number_format($row['ENCBIZNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	/* 28/09/2018*/
	function INFO_MAN ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MAN%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMANVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MAN%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMANNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MAN%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMANVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,rm_address adr
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and dis.acct_no = ln.acct_no
and (adr.town like'MAN%')

and adr.rim_no = rm.rim_no
and adr.addr_type_id=1

and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMANNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MAN%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMANNBCLT'



";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECMANVL'=>number_format($row['DECMANVL'],'0',',',' '),
					'ENCMANVL'=>number_format($row['ENCMANVL'],'3',',',' '),
					'DECMANNB'=>number_format($row['DECMANNB'],'0',',',' '),
					'ENCMANNBCLT'=>number_format($row['ENCMANNBCLT'],'0',',',' '),
					'ENCMANNB'=>number_format($row['ENCMANNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
		function INFO_MED ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MED%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMEDVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MED%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMEDNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MED%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMEDVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MED%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMEDNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MED%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMEDNBCLT'





";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECMEDVL'=>number_format($row['DECMEDVL'],'0',',',' '),
					'ENCMEDVL'=>number_format($row['ENCMEDVL'],'3',',',' '),
					'DECMEDNB'=>number_format($row['DECMEDNB'],'0',',',' '),
					'ENCMEDNBCLT'=>number_format($row['ENCMEDNBCLT'],'0',',',' '),
					'ENCMEDNB'=>number_format($row['ENCMEDNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
		function INFO_GAB ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'GAB%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECGABVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'GAB%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECGABNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'GAB%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCGABVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'GAB%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCGABNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'GAB%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCGABNBCLT'






";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECGABVL'=>number_format($row['DECGABVL'],'0',',',' '),
					'ENCGABVL'=>number_format($row['ENCGABVL'],'3',',',' '),
					'DECGABNB'=>number_format($row['DECGABNB'],'0',',',' '),
					'ENCGABNBCLT'=>number_format($row['ENCGABNBCLT'],'0',',',' '),
					'ENCGABNB'=>number_format($row['ENCGABNB'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	/* 28/09/2018*/
	
	function INFO_TUN ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%TUN%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECTUNVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%TUN%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECTUNNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%TUN%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCTUNVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%TUN%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCTUNNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'%TUN%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCTUNNBCLT'



";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECTUNVL'=>number_format($row['DECTUNVL'],'0',',',' '),
					'ENCTUNVL'=>number_format($row['ENCTUNVL'],'3',',',' '),
					'DECTUNNB'=>number_format($row['DECTUNNB'],'0',',',' '),
					'ENCTUNNB'=>number_format($row['ENCTUNNB'],'0',',',' '),
					'ENCTUNNBCLT'=>number_format($row['ENCTUNNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_ARI ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr 
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'ARI%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECARIVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'ARI%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECARINB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'ARI%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCARIVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'ARI%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCARINB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'ARI%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCARINBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECARIVL'=>number_format($row['DECARIVL'],'0',',',' '),
					'ENCARIVL'=>number_format($row['ENCARIVL'],'3',',',' '),
					'DECARINB'=>number_format($row['DECARINB'],'0',',',' '),
					'ENCARINB'=>number_format($row['ENCARINB'],'0',',',' '),
					'ENCARINBCLT'=>number_format($row['ENCARINBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_BEN ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr 
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEN%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBENVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEN%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBENNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEN%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBENVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEN%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBENNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEN%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBENNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECBENVL'=>number_format($row['DECBENVL'],'0',',',' '),
					'ENCBENVL'=>number_format($row['ENCBENVL'],'3',',',' '),
					'DECBENNB'=>number_format($row['DECBENNB'],'0',',',' '),
					'ENCBENNB'=>number_format($row['ENCBENNB'],'0',',',' '),
					'ENCBENNBCLT'=>number_format($row['ENCBENNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_NAB ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'NAB%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECNABVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'NAB%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECNABNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'NAB%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNABVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'NAB%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNABNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'NAB%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCNABNBCLT'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECNABVL'=>number_format($row['DECNABVL'],'0',',',' '),
					'DECNABNB'=>number_format($row['DECNABNB'],'0',',',' '),
					'ENCNABVL'=>number_format($row['ENCNABVL'],'0',',',' '),
					'ENCNABNB'=>number_format($row['ENCNABNB'],'0',',',' '),
					'ENCNABNBCLT'=>number_format($row['ENCNABNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_ZAGH ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and (adr.town like'ZAG%' or adr.town like'ELFAHS%')

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECZAGHVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and (adr.town like'ZAG%' or adr.town like'ELFAHS%')

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECZAGHNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and (adr.town like'ZAG%' or adr.town like'ELFAHS%')

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCZAGHVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and (adr.town like'ZAG%' or adr.town like'ELFAHS%')

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCZAGHNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and (adr.town like'ZAG%' or adr.town like'ELFAHS%')

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCZAGHNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECZAGHVL'=>number_format($row['DECZAGHVL'],'0',',',' '),
					'ENCZAGHVL'=>number_format($row['ENCZAGHVL'],'3',',',' '),
					'DECZAGHNB'=>number_format($row['DECZAGHNB'],'0',',',' '),
					'ENCZAGHNB'=>number_format($row['ENCZAGHNB'],'0',',',' '),
					'ENCZAGHNBCLT'=>number_format($row['ENCZAGHNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_BEJ ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEJ%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBEJVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEJ%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECBEJNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEJ%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBEJVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEJ%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBEJNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'BEJ%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCBEJNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECBEJVL'=>number_format($row['DECBEJVL'],'0',',',' '),
					'ENCBEJVL'=>number_format($row['ENCBEJVL'],'3',',',' '),
					'DECBEJNB'=>number_format($row['DECBEJNB'],'0',',',' '),
					'ENCBEJNB'=>number_format($row['ENCBEJNB'],'0',',',' '),
					'ENCBEJNBCLT'=>number_format($row['ENCBEJNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}

	function INFO_JEN ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'JEN%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECJENVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'JEN%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECJENNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'JEN%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCJENVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'JEN%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCJENNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'JEN%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCJENNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECJENVL'=>number_format($row['DECJENVL'],'0',',',' '),
					'ENCJENVL'=>number_format($row['ENCJENVL'],'3',',',' '),
					'DECJENNB'=>number_format($row['DECJENNB'],'0',',',' '),
					'ENCJENNB'=>number_format($row['ENCJENNB'],'0',',',' '),
					'ENCJENNBCLT'=>number_format($row['ENCJENNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_KAIR ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'KAI%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECKAIRVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'KAI%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECKAIRNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'KAI%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCKAIRVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'KAI%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCKAIRNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'KAI%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCKAIRNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECKAIRVL'=>number_format($row['DECKAIRVL'],'0',',',' '),
					'ENCKAIRVL'=>number_format($row['ENCKAIRVL'],'3',',',' '),
					'DECKAIRNB'=>number_format($row['DECKAIRNB'],'0',',',' '),
					'ENCKAIRNB'=>number_format($row['ENCKAIRNB'],'0',',',' '),
					'ENCKAIRNBCLT'=>number_format($row['ENCKAIRNBCLT'],'0',',',' '),
								);
	}

		

echo json_encode($return);
Database::disconnect();
		
	}
	
	function INFO_SOU ()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'SOU%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSOUVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'SOU%'

and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECSOUNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'SOU%'

and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOUVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'SOU%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOUNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'SOU%'

and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCSOUNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECSOUVL'=>number_format($row['DECSOUVL'],'0',',',' '),
					'ENCSOUVL'=>number_format($row['ENCSOUVL'],'3',',',' '),
					'DECSOUNB'=>number_format($row['DECSOUNB'],'0',',',' '),
					'ENCSOUNB'=>number_format($row['ENCSOUNB'],'0',',',' '),
					'ENCSOUNBCLT'=>number_format($row['ENCSOUNBCLT'],'0',',',' '),
								);
	}
echo json_encode($return);
Database::disconnect();
	}
	
	
	function INFO_MON()			
	{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select(select 
sum(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MON%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMONVL',
(select 
count(ln.amt)
from ln_acct ln, rm_acct rm ,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MON%'
and  datediff(month,
(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)
,(select last_to_dt from ov_control))=0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'DECMONNB',
(select 
sum(dis.cur_bal)
from ln_acct ln, rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MON%'
and dis.acct_no = ln.acct_no
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMONVL',
(select 
count(dis.cur_bal)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MON%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMONNB',
(select 
count(distinct dis.rim_no)
from ln_acct ln,rm_acct rm,ln_display dis,rm_address adr
where ln.rim_no=rm.rim_no
and adr.rim_no = rm.rim_no
and adr.addr_type_id=1
and adr.town like'MON%'
and dis.acct_no = ln.acct_no
and ln.acct_no=dis.acct_no
and cur_bal<>0
and ln.status not in ('Closed','Incomplete','Active Charge-Off')) 'ENCMONNBCLT'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					
					'DECMONVL'=>number_format($row['DECMONVL'],'0',',',' '),
					'ENCMONVL'=>number_format($row['ENCMONVL'],'3',',',' '),
					'DECMONNB'=>number_format($row['DECMONNB'],'0',',',' '),
					'ENCMONNBCLT'=>number_format($row['ENCMONNBCLT'],'0',',',' '),
					'ENCMONNB'=>number_format($row['ENCMONNB'],'0',',',' '),
								);
	

	
	
	}
echo json_encode($return);
Database::disconnect();
	}
	
	
	?>