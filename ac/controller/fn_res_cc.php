<?php 
ini_set("display_errors",0);
function res_cc()
{

				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];
				

$sql = "select 
name 'rsm'
,(select count(ln.acct_no) from la_acct ln , rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('pending')) as nombre
,isnull((select count(cast(amt as decimal(31,0))) from ln_acct ln where ln.rsm_id=rsm.employee_id and ln.status in ('Active') and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate() )=0),0) as nb
,isnull((select sum((amt )) from ln_acct ln where ln.rsm_id=rsm.employee_id and ln.status in ('Active') and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate() )=0),0) as decaisse

,case when (select sum(cur_bal) from ln_display dis,ln_acct ln where rsm.employee_id=ln.rsm_id and dis.acct_no = ln.acct_no)>0 then (((select  

isnull (sum(dis.cur_bal),0) 

from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ov_control ov
where rm.rim_no = ln.rim_no
and rsm.branch_no = br.branch_no
and ln.acct_no = dis.acct_no
and rsm.employee_id=rm.rsm_id 

and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0)*100)/(select sum(cur_bal) 
from ln_display dis,ln_acct ln,rm_acct rm where rsm.employee_id=rm.rsm_id and rm.rim_no=ln.rim_no and dis.acct_no = ln.acct_no) )
else 0
end as per0


,case when (select sum(cur_bal) from ln_display dis,ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rsm.employee_id=rm.rsm_id and dis.acct_no = ln.acct_no)>0 then cast(((select  

isnull (sum(dis.cur_bal),0) 


from rm_acct rm, ln_acct ln, ad_gb_branch br, ln_display dis,ov_control ov
where rm.rim_no = ln.rim_no
and rsm.branch_no = br.branch_no
and ln.acct_no = dis.acct_no
and rsm.employee_id=rm.rsm_id 

and datediff(dd,(select min(pmt_due_dt) from ln_bill where status in ('Unsatisfied') 
and datediff (day,pmt_due_dt,getdate())>0 
and acct_no=ln.acct_no and (amt-amt_satisfied>0)),dateadd(dd,1,ov.last_to_dt))>30)*100)/
(select sum(cur_bal) from ln_display dis,ln_acct ln,rm_acct rm where rsm.employee_id=rm.rsm_id and rm.rim_no=ln.rim_no and dis.acct_no = ln.acct_no) as decimal(32,2))
else 0
end as per30

,(select count(acct_no) from ln_acct ln,rm_acct rm where rm.rim_no = ln.rim_no and ln.status in ('Active') and rm.rsm_id=rsm.employee_id) as nbclt
,(select isnull (sum(cur_bal),0) from ln_display dis,ln_acct ln,rm_acct rm where dis.acct_no=ln.acct_no and rm.rim_no = ln.rim_no and ln.status in ('Active') and rm.rsm_id=rsm.employee_id) as volclt
from ad_gb_rsm rsm where 0=0 and branch_no=".$agence." and rsm.status in ('Active')  having empl_class_code in (310)  order by rsm.name,decaisse desc 
   
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	if ($row['per30']==0) $row['per30']='-'; else $row['per30']=number_format($row['per30'],2,'.','').'%';
	if ($row['per0']==0) $row['per0']='-'; else $row['per0']=number_format($row['per0'],2,'.','').'%';
    $return[]=array('rsm'=>$row['rsm'],
					'nombre'=>$row['nombre'],
					'nb'=>$row['nb'],
					'decaisse'=>$row['decaisse'],
					'per0'=>$row['per0'],
					'nbclt'=>$row['nbclt'],
					'volclt'=>$row['volclt'],
					'per30'=>$row['per30']);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>