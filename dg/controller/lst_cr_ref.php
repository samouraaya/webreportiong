<?php 

ini_set("display_errors",0); 

function fn_cr_ref()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select 
rm.rim_no 'RIM'
,cur_bal 'Encours'
,a.acct_no 'LIREFINANCED'
,c.acct_no 'LICLOSED'
,(select lh.create_dt from ln_history lh where lh.acct_no = a.acct_no and lh.tran_code = 350 and lh.reversal = 0) 'DateDecaissement'
,datediff(day,(select min(pmt_due_dt) from ln_bill where acct_no=c.acct_no and accr_thru=(select max(accr_thru) from ln_bill where acct_no=c.acct_no)) 
,(select lh.create_dt from ln_history lh where lh.acct_no = a.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 'JRetardEnRestructure'
,isnull(datediff(day,b.delq_dt,dateadd(day,1,(select last_to_dt from ov_control))),0) 'PAR'
from ln_acct a,ln_display b,rm_acct rm,ln_acct c
where a.refinanced='Y' and a.status not in ('closed','incomplete','Active charge-off')
and b.acct_no=a.acct_no
and c.rim_no = rm.rim_no
and a.rim_no = rm.rim_no
and a.acct_no<>c.acct_no
and c.ptid=(select max(ptid) from ln_acct where rim_no=a.rim_no and a.acct_no <> acct_no)
";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				{
				if (($row1['PAR']>0) and ($row1['PAR']<=30)) $row1['PAR']='PAR 0';
				elseif (($row1['PAR']>30) and ($row1['PAR']<=90)) $row1['PAR']='PAR 30';
				elseif (($row1['PAR']>90) and ($row1['PAR']<=180)) $row1['PAR']='PAR 90';
				elseif ($row1['PAR']>180) $row1['PAR']='PAR 180';
				else $row1['PAR']='Sain';
				
				
				if (($row1['JRetardEnRestructure']>0) and ($row1['JRetardEnRestructure']<=30)) $JRetardEnRestructure='PAR 0';
				elseif (($row1['JRetardEnRestructure']>30) and ($row1['JRetardEnRestructure']<=90)) $JRetardEnRestructure='PAR 30';
				elseif (($row1['JRetardEnRestructure']>91) and ($row1['JRetardEnRestructure']<=180)) $JRetardEnRestructure='PAR 90';
				elseif ($row1['JRetardEnRestructure']>180) $JRetardEnRestructure='PAR 180';
				else $row1['PAR']='Sain';
				
				$return[]=array('RIM'=>$row1['RIM'],
								'Encours'=>$row1['Encours'],
								'LIREFINANCED'=>$row1['LIREFINANCED'],
								'LICLOSED'=>$row1['LICLOSED'],
								'DateDecaissement'=>$row1['DateDecaissement'],
								'JRetardEnRestructure'=>$row1['JRetardEnRestructure'],
								'PARHISTO'=>$JRetardEnRestructure,
								'PARACT'=>$row1['PAR'],);
				}
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}