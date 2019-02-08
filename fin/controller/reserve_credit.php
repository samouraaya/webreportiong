<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des échéances payés à temps du mois dernier
*/
function reserve_credit()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				

$sql = "select 
rsm.branch_no 'Agenecdaffectation'
,rm.first_name+' '+rm.last_name 'NomClient'
,rm.rim_no
,acct_no
,dis.class_code 
,cur_bal 'encours'
,datediff(day,delq_dt,dateadd(day,1,(select last_to_dt from ov_control))) 'NBJRetard'
,(select cast(sum(amt-amt_satisfied) as decimal(10,3)) from ln_bill where acct_no=dis.acct_no and sub_no=1 ) 'NonPayTotal'
,(select cast(sum(amt-amt_satisfied) as decimal(10,3)) from ln_bill where acct_no=dis.acct_no and sub_no=1 and pmt_due_dt<=(select last_to_dt from ov_control)) 'NonPayEchu'
,accr_dr 'InterCumu'
,(select max(his.create_dt) from ln_bill_map map,ln_history his where map.history_ptid=his.ptid and his.tran_code=300 
and his.acct_no = dis.acct_no and (select count(acct_no) from ln_bill bill where  map.bill_id_no = bill.bill_id_no and bill.acct_no=his.acct_no and bill.status='Unsatisfied')=0) 'DateDerRemb'
,dis.status 'StatutCrd'


from  ln_display dis,rm_acct rm,ad_gb_rsm rsm where delq_dt is not null 
and rm.rim_no = dis.rim_no
and dis.status not in ('Closed','Incomplete')
and rsm.employee_id=rm.rsm_id

order by rsm.branch_no

   
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){

    $return[]=array('Agenecdaffectation'=>$row['Agenecdaffectation'],
					'NomClient'=>$row['NomClient'],
					'rim_no'=>$row['rim_no'],
					'acct_no'=>$row['acct_no'],
					'class_code'=>$row['class_code'],
                    'encours'=>$row['encours'],
                    'NBJRetard'=>$row['NBJRetard'],
                    'NonPayTotal'=>$row['NonPayTotal'],
					'NonPayEchu'=>$row['NonPayEchu'],
					'InterCumu'=>$row['InterCumu'],
					'DateDerRemb'=>$row['DateDerRemb'],
					'StatutCrd'=>$row['StatutCrd'],);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
}
?>