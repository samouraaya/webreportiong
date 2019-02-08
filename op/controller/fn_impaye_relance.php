<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des impayés détaillés
*/
function impaye_relance()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = " SELECT
  distinct c.branch_no 'branch'
,   a.acct_no 'RIMNO'
,f.branch_no 'age'
,     a.acct_no 'compte'
,   dis.cur_bal 'Soldecptetfr'
,   rm.Last_Name+' '+rm.First_name 'Client_name'
,   case when isnull(sum(k.amt-k.amt_satisfied),0)+isnull(sum(lb.amt-lb.amt_satisfied),0)>0 then  b.cur_bal 
when isnull(sum(k.amt-k.amt_satisfied),0)+isnull(sum(lb.amt-lb.amt_satisfied),0)=0 then 0
end 'PAR'

,   a.amt  'mtinitial'
,  (select sum(b2.amt) from ln_bill b2 where b2.type = 'Interest' and b2.status ='Unsatisfied'
   and b2.acct_type =a.acct_type and b2.acct_no=a.acct_no) 'Int restant dus'
,  sch.amt 'échéancemensuelle'
,(select cast(nxt_bill_dt as date) from ln_pmt_schedule where acct_no=a.acct_no and status in ('Active') and ptid=(select max(ptid) from ln_pmt_schedule where acct_no=a.acct_no and status in ('Active')) )   'dateécheance'
,  (select sum(d3.amt) from ln_history d3 where d3.reversal=0 and d3.acct_type=a.acct_type
   and d3.acct_no=a.acct_no and d3.tran_code=300
   and d3.effective_dt=(select max(d4.effective_dt) from ln_history d4 where d4.reversal=0
   and d4.acct_type=a.acct_type and d4.acct_no=a.acct_no and d4.tran_code=300)) 'MtdernierRemb'
, isnull((datediff(day, min((select max(d3.effective_dt) from ln_history d3 where d3.reversal=0 and d3.acct_type=a.acct_type
   and d3.acct_no=a.acct_no and d3.tran_code=300)), dateadd(day,1,(select last_to_dt from ov_control)))),0) 'Jrsdepuisdernrbt'
   
,  (select sum(d2.cur_bal +d2.memo_cr-d2.memo_dr) from dp_display d2 where d2.class_code <>811 and d2.rim_no=rm.rim_no or d2.rim_no
    in (select rel_rim_no from rm_rel where rim_no=rm.rim_no and status='active' and rel_id=32)) 'Solde cptes dépôt'
    
, (isnull(sum(lb.amt-lb.amt_satisfied),0)+isnull(sum(j.amt-j.amt_satisfied),0)+isnull(sum(k.amt-k.amt_satisfied),0)) AS qsID_COUNT
, min(a.contract_dt)
,case when isnull(sum(k.amt-k.amt_satisfied),0)+isnull(sum(lb.amt-lb.amt_satisfied),0)=0 then 'P' else  cast(isnull((datediff(day, (select distinct min(cast(pmt_due_dt as date)) from ln_bill where status in ('Unsatisfied') and acct_no=a.acct_no and sub_no <>3  having sum(amt-amt_satisfied)>0 ) , dateadd(day,1,(select last_to_dt from ov_control)))),0) as char) end 'days'
, isnull(sum(j.amt-j.amt_satisfied),0)'pénalitésenarriéré'

, isnull(sum(k.amt-k.amt_satisfied),0) 'interêtenarriéré'
, isnull(sum(lb.amt-lb.amt_satisfied),0) 'Capitalenarriéré'
,c.name_1 'branch_name'
,f.name 'rsm_name'
,isnull((select distinct sum(gb.amt)  from gb_batch_trans gb,gb_batch bt where dis.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0) 'Amen'
,isnull((select distinct sum(gb.amt)  from gb_batch_trans gb,gb_batch bt where dis.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+dis.cur_bal+dis.memo_cr+dis.memo_dr 'total dispo'
, case when isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where dis.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(dis.cur_bal as DECIMAL(31,3))+cast(dis.memo_cr as DECIMAL(31,3))+cast(dis.memo_dr as DECIMAL(31,3))> isnull(sum(lb.amt-lb.amt_satisfied),0)+isnull(sum(j.amt-j.amt_satisfied),0)+isnull(sum(k.amt-k.amt_satisfied),0)
then 0
else (isnull(sum(lb.amt-lb.amt_satisfied),0)+isnull(sum(j.amt-j.amt_satisfied),0)+isnull(sum(k.amt-k.amt_satisfied),0))-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where dis.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(dis.cur_bal as DECIMAL(31,3))+cast(dis.memo_cr as DECIMAL(31,3))+cast(dis.memo_dr as DECIMAL(31,3)))
end 'Totalenarriéré'
,case when isnull(sum(k.amt-k.amt_satisfied),0)+isnull(sum(lb.amt-lb.amt_satisfied),0)=0 then 0 else  cast(isnull((datediff(day, (select distinct min(cast(pmt_due_dt as date)) from ln_bill where status in ('Unsatisfied') and acct_no=a.acct_no and sub_no <>3  having sum(amt-amt_satisfied)>0 ) , dateadd(day,1,(select last_to_dt from ov_control)))),0) as int) end 'dayss'
from ln_acct a, ln_display b, ad_gb_branch c, ln_pmt_schedule sch
                        ,  ad_gb_rsm f, rm_acct rm, ln_bill lb, dp_display dis,ln_bill j,ln_bill k
WHERE  a.status not in  ('closed', 'incomplete' )
               and a.acct_no = b.acct_no AND    a.acct_type = b.acct_type
               and a.rim_no = rm.rim_no
               and a.acct_no = lb.acct_no AND   a.acct_type = lb.acct_type
               and dis.acct_no = sch.tfr_acct_no AND   dis.acct_type = sch.tfr_acct_type
               and f.branch_no = c.branch_no
               and a.acct_no = sch.acct_no AND a.acct_type = sch.acct_type AND sch.status  in ('Active')
               and rm.rsm_id = f.employee_id
               and lb.type = 'Principal'  
               and j.type = 'Late Fees'  
               and j.bill_id_no =*  lb.bill_id_no and j.acct_type =*  lb.acct_type and j.acct_no   =*  lb.acct_no
               and k.type = 'Interest' 
               and k.bill_id_no =*  lb.bill_id_no and k.acct_type =*  lb.acct_type and k.acct_no   =*  lb.acct_no
               and isnull((datediff(day, lb.pmt_due_dt, dateadd(day,1,(select last_to_dt from ov_control)))),0) > 0
               and f.employee_id not in(420)
               and rm.class_code<>190
			  

  group by c.name_1, f.employee_id, rm.rim_no, a.acct_type , a.acct_no, dis.acct_type
  , dis.acct_no, dis.cur_bal, rm.Last_Name,  rm.First_name, b.cur_bal,a.amt,sch.amt
  
   having (isnull(sum(lb.amt-lb.amt_satisfied),0)+isnull(sum(j.amt-j.amt_satisfied),0)+isnull(sum(k.amt-k.amt_satisfied),0)) >0
   
      order by 'dayss',f.branch_no,f.name
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$engagement="select rim 'rim',DATEDIFF(NOW(),CONCAT(YEAR(NOW()),'-',MONTH(NOW()),'-',dt_ech)) 'ech' from engage";
	$result1 = $pdo1->query($engagement)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result1 as $row1)
	
	{
	if (($row1['rim']==$row['RIMNO']) and ($row1['ech']>0)) {$eng='ENG'.'-'.$row1['ech']; break;} 
	elseif (($row1['rim']==$row['RIMNO']) and ($row1['ech']<0)) {$eng='ENG'; break;}
	else $eng=$row['days'];}
    $return[]=array('RIMNO'=>$row['RIMNO'],
					'rsm'=>$row['rsm_name'],
					'age'=>$row['age'],					
					'branch'=>$row['branch'],	
					'Client_name'=>$row['Client_name'],
					'phone'=>$row['compte'],
					'MaxLateDAYS'=>$row['mtinitial'],
					'Monech'=>$row['échéancemensuelle'],
					'Totalenarriéré'=>$row['dateécheance'],
					'PAR'=>$eng,
					'disp'=>$row['MtdernierRemb'],
					'Jrsdepuisdernrbt'=>$row['Jrsdepuisdernrbt'],
					'PAR1'=>$row['PAR'],
					'Capitalenarriéré'=>$row['Capitalenarriéré'],
					'interêtenarriéré'=>$row['interêtenarriéré'],
					'pénalitésenarriéré'=>$row['pénalitésenarriéré'],
					'qsID_COUNT'=>$row['pénalitésenarriéré']+$row['interêtenarriéré']+$row['Capitalenarriéré'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>