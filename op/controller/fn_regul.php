<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des réguls à faire
*/
function liste_regul()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select distinct 
cp.branch_no 'Agence'
,cp.name 'rsm'
,cl.rim_no 'rim'
,cl.last_name+' '+cl.first_name 'NomCLT'
,(dp1.acct_no) 'Num_prêt'
,bl1.pmt_due_dt 'date_échéance'
,(select sum(bl2.amt) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no = bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt = bl1.pmt_due_dt)'MtEch'
,isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0) 'amenenet'
,lo.cur_bal+lo.memo_cr+lo.memo_dr 'Solderéel' ,
isnull((select distinct sum(gb.amt)  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+lo.cur_bal+lo.memo_cr+lo.memo_dr 'totaldispo'
,case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3))-cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no <= bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt <= bl1.pmt_due_dt) >0 then 0
else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no <= bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
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
and cr.status not in ('closed','incomplete')
and bl1.type in ('Principal ', 'Interest', 'late fees')
and bl1.status ='Unsatisfied '
and sh.status ='Active'
and cl.class_code <>190


and datediff (day, bl1.pmt_due_dt,getdate())>=0
and bl1.status in ('Unsatisfied')
and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3))-cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no <= bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt <= bl1.pmt_due_dt) >0 then 0
else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
        where bl2.acct_no = bl1.acct_no
        and bl2.bill_id_no <= bl1.bill_id_no
        and bl2.amt <>0
        and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
end between 0.001 and 1.000




ORDER BY 'Agence','reste1'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('rsm'=>$row['rsm'],
					'Agence'=>$row['Agence'],
					'numdemande'=>$row['numdemande'],
					'rim'=>$row['rim'],
                    'client'=>$row['NomCLT'],
					'Num_prêt'=>$row['Num_prêt'],
					'date_échéance'=>$row['date_échéance'],
					'MtEch'=>$row['MtEch'],
					'amenenet'=>$row['amenenet'],
					'Solderéel'=>$row['Solderéel'],
					'totaldispo'=>$row['totaldispo'],
					'reste'=>$row['reste'],
					);
}
return $return;
Database::disconnect();
}
?>