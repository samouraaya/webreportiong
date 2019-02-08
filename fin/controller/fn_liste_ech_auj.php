<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des échéances d'aujourd'hui
*/
function liste_ech_auj()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select distinct 

cl.rim_no 'NRIM'
,cp.name 'rsm'
,cp.branch_no 'age'
,cl.last_name+' '+cl.first_name 'NomClient'
,substring(ad.phone_3,1,2)+' '+substring(ad.phone_3,3,2)+' '+substring(ad.phone_3,5,2)+' '+substring(ad.phone_3,7,2) 'Tél_client'


,cast(bl1.pmt_due_dt as date)  'date_échéance'
,(select sum(cast(bl2.amt as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no = bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt = bl1.pmt_due_dt)'Mt_Ech'


,convert(varchar(8),bl1.bill_id_no) +'/'+ convert(varchar(8),dp.trm) 'num_échéance'
,(select sum(cast(bl2.amt as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no = bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt = bl1.pmt_due_dt) as 'eche'
,isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)) as 'disp'
,case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no = bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        
        and bl2.amt <>0
        and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
end 'reste'
,lo.acct_no 'CT'
,(select sum( case when status='Unsatisfied' then datediff(day,pmt_due_dt,getdate())
      else datediff(day,pmt_due_dt,dateadd(day,1,b.accr_thru)) end) 
       from ln_bill b where cr.acct_no = b.acct_no
and sub_no=3 and datediff(month,pmt_due_dt,getdate()) between 0 and 3) 'JretardCumul'
from ad_gb_branch br, ad_gb_rsm cp, ln_acct cr, rm_address ad, rm_acct cl, ln_bill bl1
, ln_pmt_schedule sh, ln_display dp, dp_display lo
where br.branch_no = cp.branch_no
and cp.employee_id = cl.rsm_id
and cl.rim_no = cr.rim_no
and cr.rim_no = ad.rim_no
and dp.acct_no = bl1.acct_no
and cr.acct_no = sh.acct_no
and cr.acct_no = dp.acct_no
and sh.tfr_acct_no = lo.acct_no
and bl1.acct_no = cr.acct_no
and ad.addr_id = 1
and cr.status not in  ('closed', 'incomplete' )
and bl1.type in ('Principal ', 'Interest','Late Fees','Loan Fees')
and sh.status ='Active'
and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
and cl.class_code <>190   order by cp.branch_no,cp.name,'date_échéance'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$engagement="select rim 'rim',DATEDIFF(NOW(),CONCAT(YEAR(NOW()),'-',MONTH(NOW()),'-',dt_ech)) 'ech' from engage";
	$result1 = $pdo1->query($engagement)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result1 as $row1)
	
	{
		
	if (($row1['rim']==$row['NRIM'])) {$eng='Oui'; break;} else $eng='-';}
    $return[]=array('NRIM'=>$row['NRIM'],
					'rsm'=>$row['rsm'],
					'age'=>$row['age'],
                    'NomClient'=>$row['NomClient'],
                    'Tél_client'=>$row['Tél_client'],
                    'num_échéance'=>$row['num_échéance'],
					'date_echeance'=>$row['date_échéance'],
					'Mt_Ech'=>$row['Mt_Ech'],
					'échéancecouverte'=>$row['reste'],
					'CT'=>$row['CT'],
					'JretardCumul'=>$row['JretardCumul'],
					'engagement'=>$eng);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
}
?>