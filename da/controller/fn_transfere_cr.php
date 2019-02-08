<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les Transferts de portefeuille des 2 derniers mois
*/
function fn_transfere_cr()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];
				

$sql = "
select  distinct 
rm.branch_no 'agence'
,rm.rim_no 'rim'
,rm.first_name+' '+rm.last_name 'NomClient'
,gb.effective_dt 'Datetransfere'
,gb.prev_value 'RSMPrecédent'
,gb.new_value  'NouveauRSM'
,(select max(pmt_due_dt) from ln_bill where acct_no=ln.acct_no and datediff(month,gb.effective_dt,pmt_due_dt)=-1)'DerniereEch'
,case when ((select count(acct_no) from ln_bill where sub_no=3 and acct_no=ln.acct_no and datediff(month,gb.effective_dt,pmt_due_dt)=-1))=0 then '-' ELSE 
'Oui' end 'EchRetard?'
from gb_audit gb,rm_acct rm,ln_acct ln,ln_bill bill,ln_pmt_schedule pmt,ln_display dis
where table_name like '%rm_acct%' 
and column_name like '%RSM_ID%'
and ln.acct_no=bill.acct_no
and ln.status not in ('closed','incomplete')
and bill.sub_no=2
and ln.acct_no=pmt.acct_no
and ln.acct_no=dis.acct_no
and pmt.status in ('Active')
and ln.rim_no=rm.rim_no
and cast(str_replace(gb.actual_prev_value ,CHAR(39),'')as int) not in (select employee_id from ad_gb_rsm where empl_class_code=300)
and datediff (month,gb.effective_dt,getdate()) in(0,1) 
and actual_prev_value<>actual_new_value
and rm.branch_no=".$agence."
and gb.table_ptid=rm.rim_no order by rm.branch_no";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'agence'=>$row['agence'],
					'rim'=>$row['rim'],
					'NomCLT'=>$row['NomClient'],			
					'Montant_décaissé'=>$row['Datetransfere'],
					'Cycle'=>str_replace("'","",$row['RSMPrecédent']),
					'datemat'=>str_replace("'","",$row['NouveauRSM']),
					'Montant_capital_remboussé'=>$row['DerniereEch'],
					'Montant'=>$row['EchRetard?'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>