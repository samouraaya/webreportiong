<?php ini_set("display_errors",0); 

function fn_par_acm()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				$sql = "select 

(select sum(cur_bal) from ln_display dis,ln_acct ln  where ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and delq_dt is null ) 'vlSain',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 0 and 30  ) 'vlPAR0',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 31 and 60  ) 'vlPAR30',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 61 and 90  ) 'vlPAR60',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 91 and 120  ) 'vlPAR90',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 121 and 180  ) 'vlPAR120',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 181 and 365  ) 'vlPAR180',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) > 365  ) 'vlPAR365',
(select sum(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') ) 'vlTotalsous',

(select count(cur_bal) from ln_display dis,ln_acct ln  where ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and delq_dt is null and cur_bal<>0) 'nbSain',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 0 and 30 and cur_bal<>0 ) 'nbPAR0',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 31 and 60 and cur_bal<>0 ) 'nbPAR30',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 61 and 90 and cur_bal<>0 ) 'nbPAR60',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 91 and 120  and cur_bal<>0) 'nbPAR90',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 121 and 180 and cur_bal<>0 ) 'nbPAR120',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 181 and 365 and cur_bal<>0 ) 'nbPAR180',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) > 365 and cur_bal<>0 ) 'nbPAR365',
(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and cur_bal<>0) 'nbTotalsous'

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
								'vlPAR180'=>number_format($row1['vlPAR180'],3,'.',' '),
								'vlPAR365'=>number_format($row1['vlPAR365'],3,'.',' '),
								'nbSain'=>number_format($row1['nbSain'],0,'.',' '),
								'nbPAR0'=>number_format($row1['nbPAR0'],0,'.',' '),
								'nbPAR30'=>number_format($row1['nbPAR30'],0,'.',' '),
								'nbPAR60'=>number_format($row1['nbPAR60'],0,'.',' '),
								'nbPAR90'=>number_format($row1['nbPAR90'],0,'.',' '),
								'nbPAR120'=>number_format($row1['nbPAR120'],0,'.',' '),
								'nbPAR180'=>number_format($row1['nbPAR180'],0,'.',' '),
								'nbPAR365'=>number_format($row1['nbPAR365'],0,'.',' '),
								'vlTotalsous'=>number_format($row1['vlTotalsous'],3,'.',' '),
								'nbTotalsous'=>number_format($row1['nbTotalsous'],0,'.',' '));
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


(select sum(his.amt) from ln_history his, ln_acct ln  where tran_code=333 and datediff(month,his.effective_dt,(select last_to_dt from ov_control))=1 and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off') 'vlTotalpertemonth',
(select count(distinct his.acct_no ) 
from ln_history his, ln_acct ln  where tran_code=333  
and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off'
and his.effective_dt=(select min(effective_dt) from ln_history where acct_no=ln.acct_no and tran_code=333 and reversal=0)
and datediff(month,his.effective_dt,(select last_to_dt from ov_control))=1)'nbTotalpertemonth',

(select count(cur_bal) from ln_display dis,ln_acct ln ,ln_acct c
where  ln.refinanced='Y' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')
and ln.acct_no<>c.acct_no
and c.rim_no = ln.rim_no
and c.ptid=(select max(ptid) from ln_acct where rim_no=ln.rim_no and ln.acct_no <> acct_no) and cur_bal<>0) 'nbrefinanced',
(select sum(cur_bal) from ln_display dis,ln_acct ln ,ln_acct c
where  ln.refinanced='Y' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')
and ln.acct_no<>c.acct_no
and c.rim_no = ln.rim_no
and c.ptid=(select max(ptid) from ln_acct where rim_no=ln.rim_no and ln.acct_no <> acct_no)) 'vlrefinanced',

(select count(cur_bal) from ln_display dis,ln_acct ln where  ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and cur_bal<>0  ) 'nbTotal',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and cur_bal<>0  ) 'nbcltTotal',
(select sum(cur_bal) from ln_display dis,ln_acct ln where   ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off')   ) 'vlTotal',
(select sum(his.amt)
from ln_history his, ln_acct ln  where tran_code=333  
and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off'
and his.effective_dt=(select min(effective_dt) from ln_history where acct_no=ln.acct_no and tran_code=333 and reversal=0)) 'vlTotalperte',
(select count(distinct his.acct_no ) 
from ln_history his, ln_acct ln  where tran_code=333  
and reversal=0 and ln.acct_no = his.acct_no and ln.status='Active charge-off'
and his.effective_dt=(select min(effective_dt) from ln_history where acct_no=ln.acct_no and tran_code=333 and reversal=0)) 'nbTotalperte',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln  where ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and delq_dt is null and cur_bal<>0) 'nbcltSain',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 0 and 30 and cur_bal<>0 ) 'nbcltPAR0',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 31 and 60 and cur_bal<>0 ) 'nbcltPAR30',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 61 and 90 and cur_bal<>0 ) 'nbcltPAR60',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 91 and 120  and cur_bal<>0) 'nbcltPAR90',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 121 and 180 and cur_bal<>0 ) 'nbcltPAR120',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) between 181 and 365 and cur_bal<>0 ) 'nbcltPAR180',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and datediff(day,delq_dt,dateadd(day,1,ov.last_to_dt )) > 365 and cur_bal<>0 ) 'nbPAR365',
(select count(distinct ln.rim_no) from ln_display dis,ln_acct ln where  ln.refinanced='N' and ln.acct_no=dis.acct_no and ln.status not in ('closed','incomplete','Active charge-off') and cur_bal<>0) 'nbcltTotalsous',
(select 

sum(map.amt)

from ln_history lh,ln_bill_map map,ln_history lh1
where lh.acct_no = map.acct_no
and lh.ptid=map.history_ptid
and map.sub_no=2
and lh1.acct_no=lh.acct_no
and lh.tran_code=300
and lh1.tran_code=333
and lh1.reversal=0 
and lh1.ptid=(select max(ptid) from ln_history where acct_no=lh.acct_no and tran_code=333)
and lh.create_dt>lh1.create_dt) 'VLREMBPERTE'


from ov_control ov";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array(
								'vlTotalpertemonth'=>number_format($row1['vlTotalpertemonth'],3,'.',' '),
								'nbTotalpertemonth'=>number_format($row1['nbTotalpertemonth'],0,'.',' '),
								'nbrefinanced'=>number_format($row1['nbrefinanced'],0,'.',' '),
								'vlrefinanced'=>number_format($row1['vlrefinanced'],3,'.',' '),
								'nbTotal'=>number_format($row1['nbTotal'],0,'.',' '),
								'nbcltTotal'=>number_format($row1['nbcltTotal'],0,'.',' '),
								'vlTotal'=>number_format($row1['vlTotal'],3,'.',' '),
								'vlTotalperte'=>number_format($row1['vlTotalperte'],3,'.',' '),
								'nbTotalperte'=>number_format($row1['nbTotalperte'],0,'.',' '),
								
								'VLREMBPERTE'=>number_format($row1['VLREMBPERTE'],3,'.',' '),
								
								'nbcltSain'=>number_format($row1['nbcltSain'],0,'.',' '),
								'nbcltPAR0'=>number_format($row1['nbcltPAR0'],0,'.',' '),
								'nbcltPAR30'=>number_format($row1['nbcltPAR30'],0,'.',' '),
								'nbcltPAR60'=>number_format($row1['nbcltPAR60'],0,'.',' '),
								'nbcltPAR90'=>number_format($row1['nbcltPAR90'],0,'.',' '),
								'nbcltPAR120'=>number_format($row1['nbcltPAR120'],0,'.',' '),
								'nbcltPAR180'=>number_format($row1['nbcltPAR180'],0,'.',' '),
								'nbcltPAR365'=>number_format($row1['nbcltPAR365'],0,'.',' '),
								'nbcltTotalsous'=>number_format($row1['nbcltTotalsous'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
}

?>