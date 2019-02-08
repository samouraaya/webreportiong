<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des réguls à faire
*/
function liste_ech_bo()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select distinct 

cp.name 'RSM'
,cl.rim_no 'NRIM'
,cp.branch_no 'branch'
,lo.acct_no 'Num_prêt'
,cl.last_name+' '+cl.first_name 'NomClient'
,substring(ad.phone_3,1,2)+' '+substring(ad.phone_3,3,2)+' '+substring(ad.phone_3,5,2)+' '+substring(ad.phone_3,7,2) 'Tél_client'
, isnull((select distinct sum(gb.amt)  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0) 'amennet'
,bl1.pmt_due_dt 'date_échéance'
,(select sum(bl2.amt) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no = bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt = bl1.pmt_due_dt)'Mt_Ech'

,convert(varchar(8),bl1.bill_id_no) +'/'+ convert(varchar(8),dp.trm) 'num_échéance'

,lo.cur_bal+lo.memo_cr+lo.memo_dr 'Solderéel' ,
isnull((select distinct sum(gb.amt)  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+lo.cur_bal+lo.memo_cr+lo.memo_dr 'totaldispo'
,case when((isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select isnull(sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))),sh.amt) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.status in ('Unsatisfied ')
        and bl2.pmt_due_dt <=dp.nxt_pmt_dt)) >0 then 0
else (select isnull(sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))),sh.amt) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.status in ('Unsatisfied ')
        and bl2.pmt_due_dt <=dp.nxt_pmt_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
end 'reste'

from ad_gb_branch br, ad_gb_rsm cp, ln_acct cr, rm_address ad, rm_acct cl, ln_bill bl1
, ln_pmt_schedule sh, ln_display dp, dp_display lo,dp_acct dp1 
where br.branch_no = cp.branch_no
and cp.employee_id = cl.rsm_id
and lo.acct_no = dp1.acct_no
and cl.rim_no = cr.rim_no
and cr.rim_no = ad.rim_no
and dp.acct_no = bl1.acct_no
and cr.acct_no = sh.acct_no
and cr.acct_no = dp.acct_no
and sh.tfr_acct_no = lo.acct_no
and bl1.acct_no = cr.acct_no
and ad.addr_id = 1
--and datediff (day,dp.nxt_pmt_dt,getdate())<0
and cr.status not in ('closed','incomplete')
and bl1.type in ('Principal ', 'Interest', 'late fees')
and bl1.status ='Unsatisfied '
and sh.status ='Active'
and cl.class_code <>190



having (select min(bill_id_no) from ln_bill where acct_no=cr.acct_no and status='Unsatisfied ')=bl1.bill_id_no order by 'date_échéance',cp.branch_no,cp.name";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('rsm'=>$row['RSM'],
					'Agence'=>$row['branch'],
					'rim'=>$row['NRIM'],
                    'client'=>$row['NomClient'],
					'Num_prêt'=>$row['Num_prêt'],
					'date_échéance'=>$row['date_échéance'],
					'num_échéance'=>$row['num_échéance'],
					'MtEch'=>$row['Mt_Ech'],
					'amenenet'=>$row['amennet'],
					'Solderéel'=>$row['Solderéel'],
					'totaldispo'=>$row['totaldispo'],
					'reste'=>$row['reste'],
					);
}
return $return;
Database::disconnect();
}
?>