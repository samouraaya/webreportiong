<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des échéances payés à temps du mois dernier
*/
function repect_ech_m1()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];

$sql = "select 
distinct 
rsm.name 'rsm'
,rm.rim_no 'NRIM'
,rsm.branch_no 'agence'
,rm.first_name+''+rm.last_name 'NomClient'
,cast(lb.pmt_due_dt as date) 'Tél_client' 
,case when (select count(acct_no) from ln_bill where acct_no=lb.acct_no and lb.bill_id_no = bill_id_no and sub_no=3)=0 then '-'
else 'Oui' end 'num_échéance'
,case when(select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no ) is null then datediff(day,lb.pmt_due_dt,getdate())
when (select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no )>=0 and lb.status in ('Unsatisfied') then datediff(day,lb.pmt_due_dt,getdate())
else (select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no ) end 'nbretard'
,lb.status 'status'
,datediff(day,lb.pmt_due_dt,(select last_to_dt from ov_control)) 'diff'
,(select sum(amt-amt_satisfied) from ln_bill where acct_no=lb.acct_no and bill_id_no=lb.bill_id_no) 'Rest'
from ln_bill lb,ln_acct la,rm_acct rm,ad_gb_rsm rsm,ln_history his,ln_pmt_schedule pmt
where
    rm.rim_no = la.rim_no
and rsm.employee_id = rm.rsm_id
and lb.sub_no in (2)
and la.acct_no = lb.acct_no
and his.acct_no = la.acct_no
and la.acct_no=pmt.acct_no
and his.tran_code=350
and pmt.status='Active'
and datediff(month,lb.pmt_due_dt,(select last_to_dt from ov_control))=0 

and rm.branch_no=".$agence."

Union 

select 
distinct 
rsm.name 'rsm'
,rm.rim_no 'NRIM'
,rsm.branch_no 'agence'
,rm.first_name+''+rm.last_name 'NomClient'
,cast(lb.pmt_due_dt as date) 'Tél_client' 
,case when (select count(acct_no) from ln_bill where acct_no=lb.acct_no and lb.bill_id_no = bill_id_no and sub_no=3)=0 then '-'
else 'Oui' end 'num_échéance'
,case when(select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no ) is null then datediff(day,lb.pmt_due_dt,getdate())
when (select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no )>=0 and lb.status in ('Unsatisfied') then datediff(day,lb.pmt_due_dt,getdate())
else (select datediff(day,lb.pmt_due_dt,max(b.effective_dt)) from ln_bill_map a,ln_history b
where a.history_ptid=b.ptid and a.acct_no=la.acct_no and a.bill_id_no=lb.bill_id_no ) end 'nbretard'
,lb.status 'status'
,datediff(day,lb.pmt_due_dt,(select last_to_dt from ov_control)) 'diff'
,(select sum(amt-amt_satisfied) from ln_bill where acct_no=lb.acct_no and bill_id_no=lb.bill_id_no) 'Rest'
from ln_bill lb,ln_acct la,rm_acct rm,ad_gb_rsm rsm,ln_history his,ln_pmt_schedule pmt
where
    rm.rim_no = la.rim_no
and rsm.employee_id = rm.rsm_id
and lb.sub_no in (2)
and la.acct_no = lb.acct_no
and his.acct_no = la.acct_no
and la.acct_no=pmt.acct_no
and his.tran_code=350
and (select datediff(month,(select last_to_dt from ov_control),lh.create_dt) 
from ln_history lh where lh.acct_no = la.acct_no and tran_code=345 and lh.reversal=0)=0  
and datediff(month,lb.pmt_due_dt,(select last_to_dt from ov_control))=0 

and rm.branch_no=".$agence."

order by rsm.branch_no,rsm.name,'nbretard','Tél_client' 
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	if ($row['nbretard']==0) $retard='-'; 
	elseif (($row['nbretard']<0)and ($row['status']=='Unsatisfied '))   $retard='Oui-'.$row['diff'];  
	elseif (($row['nbretard']<0)and ($row['status']=='Satisfied   '))   $retard='-';
	else   $retard='Oui-'.$row['nbretard'];
    $return[]=array('NRIM'=>$row['NRIM'],
					'rsm'=>$row['rsm'],
                    'NomClient'=>$row['NomClient'],
                    'Tél_client'=>$row['Tél_client'],
					'Rest'=>$row['Rest'],
                    'num_échéance'=>$retard);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
}
?>