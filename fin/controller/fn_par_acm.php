<?php ini_set("display_errors",0); 

function fn_par_acm()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select 

(select sum(cur_bal) from ln_display dis,ln_acct ln  where ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and delq_dt is null) 'vlSain',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 0 and 30  ) 'vlPAR0',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 31 and 60  ) 'vlPAR30',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 61 and 90  ) 'vlPAR60',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 91 and 120  ) 'vlPAR90',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) > 120  ) 'vlPAR120',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')) 'vlTotalsous',

(select count(cur_bal) from ln_display dis,ln_acct ln  where ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and delq_dt is null) 'nbSain',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 0 and 30  ) 'nbPAR0',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 31 and 60  ) 'nbPAR30',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 61 and 90  ) 'nbPAR60',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 91 and 120  ) 'nbPAR90',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) > 120  ) 'nbPAR120',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') ) 'nbTotalsous',

(select count(cur_bal) from ln_display dis,ln_acct ln ,ln_acct c
where  ln.refinanced='Y' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')
and ln.acct_no<>c.acct_no
and c.rim_no = ln.rim_no
and c.ptid=(select max(ptid) from ln_acct where rim_no=ln.rim_no and ln.acct_no <> acct_no) ) 'nbrefinanced',
(select sum(cur_bal) from ln_display dis,ln_acct ln ,ln_acct c
where  ln.refinanced='Y' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')
and ln.acct_no<>c.acct_no
and c.rim_no = ln.rim_no
and c.ptid=(select max(ptid) from ln_acct where rim_no=ln.rim_no and ln.acct_no <> acct_no)) 'vlrefinanced',

(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')   ) 'nbTotal',
(select sum(cur_bal) from ln_display dis,ln_acct ln where   ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')   ) 'vlTotal',
(select sum(his.amt)
from ln_history his, ln_acct ln  where tran_code=333  
and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off'
and his.effective_dt=(select min(effective_dt) from ln_history where acct_no=ln.acct_no and tran_code=333 and reversal=0)) 'vlTotalperte',
(select count(distinct his.acct_no ) 
from ln_history his, ln_acct ln  where tran_code=333  
and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off'
and his.effective_dt=(select min(effective_dt) from ln_history where acct_no=ln.acct_no and tran_code=333 and reversal=0)) 'nbTotalperte'

from ov_control ov";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('vlSain'=>number_format($row1['vlSain'],3,'.',' '),
								'vlPAR0'=>number_format($row1['vlPAR0'],3,'.',' '),
								'vlPAR30'=>number_format($row1['vlPAR30'],3,'.',' '),
								'vlPAR60'=>number_format($row1['vlPAR60'],3,'.',' '),
								'vlPAR90'=>number_format($row1['vlPAR90'],3,'.',' '),
								'vlPAR120'=>number_format($row1['vlPAR120'],3,'.',' '),
								'nbSain'=>number_format($row1['nbSain'],0,'.',' '),
								'nbPAR0'=>number_format($row1['nbPAR0'],0,'.',' '),
								'nbPAR30'=>number_format($row1['nbPAR30'],0,'.',' '),
								'nbPAR60'=>number_format($row1['nbPAR60'],0,'.',' '),
								'nbPAR90'=>number_format($row1['nbPAR90'],0,'.',' '),
								'nbPAR120'=>number_format($row1['nbPAR120'],0,'.',' '),
								'nbrefinanced'=>number_format($row1['nbrefinanced'],0,'.',' '),
								'vlrefinanced'=>number_format($row1['vlrefinanced'],3,'.',' '),
								'nbTotal'=>number_format($row1['nbTotal'],0,'.',' '),
								'vlTotal'=>number_format($row1['vlTotal'],3,'.',' '),
								'vlTotalsous'=>number_format($row1['vlTotalsous'],3,'.',' '),
								'nbTotalsous'=>number_format($row1['nbTotalsous'],0,'.',' '),
								'vlTotalperte'=>number_format($row1['vlTotalperte'],3,'.',' '),
								'nbTotalperte'=>number_format($row1['nbTotalperte'],0,'.',' '),);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}
function fn_par_acm_perte()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select 


(select sum(his.amt) from ln_history his, ln_acct ln  where tran_code=333 and datediff(month,his.effective_dt,(select last_to_dt from ov_control))=0 and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off') 'vlTotalpertemonth',
(select count(his.amt) from ln_history his, ln_acct ln  where tran_code=333 and datediff(month,his.effective_dt,(select last_to_dt from ov_control))=0 and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off')'nbTotalpertemonth'";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array(
								'vlTotalpertemonth'=>number_format($row1['vlTotalpertemonth'],3,'.',' '),
								'nbTotalpertemonth'=>number_format($row1['nbTotalpertemonth'],0,'.',' '),);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}

?>