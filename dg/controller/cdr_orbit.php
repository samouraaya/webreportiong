<?php 

ini_set("display_errors",0); 

function fn_conforme_orbit()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select 

(select count(ln.amt) 
from ln_history his,ov_control,ln_acct ln
where tran_code=350 
      and reversal=0 
      and datediff(month,his.create_dt,last_to_dt)=0
      and ln.acct_no = his.acct_no) 'DISNB'
,
(select sum(ln.amt) 
from ln_history his,ov_control,ln_acct ln
where tran_code=350 
      and reversal=0 
      and datediff(month,his.create_dt,last_to_dt)=0
      and ln.acct_no = his.acct_no) 'DISVOL'
,
(select count(cur_bal) from ln_display 
where status not in ('closed','incomplete','Active charge-off')) 'OUTNB'
,
(select sum(cur_bal)  
from ln_display 
where status not in ('closed','incomplete','Active charge-off')) 'OUTVOL'
,
(select count(cur_bal) 
from ln_display ,ov_control
where status not in ('closed','incomplete','Active charge-off')
and datediff(month,delq_dt,dateadd(day,1,last_to_dt))>0) 'PARNB'
,
(select sum(cur_bal) 
from ln_display ,ov_control
where status not in ('closed','incomplete','Active charge-off')
and datediff(month,delq_dt,dateadd(day,1,last_to_dt))>0) 'PARVOL' 
,
(select count(ln.amt)
from ln_history his,ov_control,ln_acct ln
where tran_code=345 
      and reversal=0 
      and datediff(month,his.create_dt,last_to_dt)=0
      and ln.acct_no = his.acct_no) 'CLOTNB' 
,
(select sum(his.amt) 
from ln_history his,ov_control,ln_acct ln
where tran_code=345 
      and reversal=0 
      and datediff(month,his.create_dt,last_to_dt)=0
      and ln.acct_no = his.acct_no) 'CLOTVOL'";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('DISNB'=>number_format($row1['DISNB'],0,'.',' '),
								'DISVOL'=>number_format($row1['DISVOL'],3,'.',' '),
								'OUTNB'=>number_format($row1['OUTNB'],0,'.',' '),
								'OUTVOL'=>number_format($row1['OUTVOL'],3,'.',' '),
								'PARNB'=>number_format($row1['PARNB'],0,'.',' '),
								'PARVOL'=>number_format($row1['PARVOL'],3,'.',' '),
								'CLOTNB'=>number_format($row1['CLOTNB'],0,'.',' '),
								'CLOTVOL'=>number_format($row1['CLOTVOL'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}

function fn_conforme_cdr_dec()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select sum(minitial)/1000 'DISVOL',count( a.NCONTRAT) 'DISNB'
from ADV_CR_CONTRAT a ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('DISNB'=>number_format($row1['DISNB'],0,'.',' '),
								'DISVOL'=>number_format($row1['DISVOL'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}

function fn_conforme_cdr_outstanding()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select sum(mencours) /1000 'Encours',count(NCONTRAT) 'Nombre' from ADV_CR_ENCOURS";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('Encours'=>number_format($row1['Encours'],3,'.',' '),
								'Nombre'=>number_format($row1['Nombre'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
function fn_conforme_cdr_PAR()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select count(NBJRTD) 'NBJRTD',sum((mencours)/1000 'Encours' from adv_cr_encours where NBJRTD>0 ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('Encours'=>number_format($row1['Encours'],3,'.',' '),
								'Nombre'=>number_format($row1['NBJRTD'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}

function fn_conforme_ORBIT_PAR_P_Detail()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
$sql = "select 
dis.rim_no 'RIM',
dis.cur_bal  'Encours',
dis.acct_no 'LI',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=dis.acct_no and sub_no <> 3 and pmt_due_dt < dateadd(day,1,ov.last_to_dt)) 'K_I',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=dis.acct_no and sub_no = 3 and pmt_due_dt < dateadd(day,1,ov.last_to_dt)) 'P'

from ln_display dis,ov_control ov

where dis.status not in ('closed','incomplete','Active charge-off')
and (select sum(amt-amt_satisfied) from ln_bill where acct_no=dis.acct_no and sub_no <> 3 and pmt_due_dt < dateadd(day,1,ov.last_to_dt))=0
and (select sum(amt-amt_satisfied) from ln_bill where acct_no=dis.acct_no and sub_no = 3 and pmt_due_dt < dateadd(day,1,ov.last_to_dt))>0";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
    $return[]=array('RIM'=>$row1['RIM'],
					'Encours'=>$row1['Encours'],
					'LI'=>$row1['LI'],
					'K_I'=>$row1['K_I'],
					'P'=>$row1['P']);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>