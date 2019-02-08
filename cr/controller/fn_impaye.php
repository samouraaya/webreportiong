<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des impayés simples
*/
function liste_impaye()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$user=$_GET['user'];
				

$sql = " select 

rsm.name 'rsm',
rm.branch_no 'agence_rsm',
rm.rim_no 'RIM',
ln.title_1 'Nom_RIM',
(select phone_3 from rm_address where rim_no=rm.rim_no and addr_id=1 ) 'phone',
case when (select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and pmt_due_dt<getdate() and sub_no<>3)>0
then dis.cur_bal
when isnull((select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and pmt_due_dt<getdate() and sub_no<>3),0)=0 and (select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=3)>0 then 0
end 'PAR',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and pmt_due_dt<getdate() and sub_no<>3)+(select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=3) 'TotalEnarriere',
isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where disp.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(disp.cur_bal as DECIMAL(31,3))+cast(disp.memo_cr as DECIMAL(31,3))+cast(disp.memo_dr as DECIMAL(31,3)) 'PAIEMENTJOURS',
case when (select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and pmt_due_dt<getdate() and sub_no<>3)>0
then cast(datediff(day, (select distinct min(cast(pmt_due_dt as date)) from ln_bill where status in ('Unsatisfied') and acct_no=ln.acct_no and sub_no<>3  having sum(amt-amt_satisfied)>0 ) , dateadd(day,1,(select last_to_dt from ov_control)))as char) 
when isnull((select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and pmt_due_dt<getdate() and sub_no<>3),0)=0 and (select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=3)>0 then 'P'
end 'nbJretard',
pmt.amt 'MontantEch'

from ln_acct ln,rm_acct rm,ln_display dis,ad_gb_rsm rsm,dp_display disp,ln_pmt_schedule pmt
where dis.acct_no = ln.acct_no
and rm.rim_no = ln.rim_no
and disp.rim_no = dis.rim_no
and disp.status='Active'
and rsm.employee_id=rm.rsm_id
and pmt.acct_no = dis.acct_no
and pmt.status='Active'
and pmt.ptid=(select max(ptid) from ln_pmt_schedule where acct_no=ln.acct_no and status='Active' and first_pmt_dt<getdate() )
and datediff(day, (select distinct min(cast(pmt_due_dt as date)) from ln_bill where status in ('Unsatisfied') and acct_no=ln.acct_no  having sum(amt-amt_satisfied)>0 ) , dateadd(day,1,(select last_to_dt from ov_control)))>0
and ln.status not in  ('closed', 'incomplete' )
and user_name like '%" . $user . "%'

order by 'agence_rsm','rsm','TotalEnarriere'
";
$eng=null;
$j=null;
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$engagement="select rim 'rim',DATEDIFF(NOW(),CONCAT(YEAR(NOW()),'-',MONTH(NOW()),'-',dt_ech)) 'ech' from engage";
	$result1 = $pdo1->query($engagement)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result1 as $row1)
	
	{
	if (($row1['rim']==$row['RIM']) and ($row1['ech']>0)) {$eng='ENG'.'-'.$row1['ech']; break;} 
	elseif (($row1['rim']==$row['RIM']) and ($row1['ech']<0)) {$eng='ENG'; break;}
	else $eng=$row['nbJretard'];}
    $return[]=array('RIMNO'=>$row['RIM'],
					'rsm'=>$row['rsm'],	
					'branch'=>$row['branch'],	
					'Client_name'=>$row['Nom_RIM'],
					'phone'=>$row['phone'],
					'MaxLateDAYS'=>$eng,
					'Monech'=>$row['MontantEch'],
					'Totalenarriéré'=>$row['TotalEnarriere'],
					'PAR'=>$row['PAR'],
					'disp'=>$row['PAIEMENTJOURS']
					
					);

}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>