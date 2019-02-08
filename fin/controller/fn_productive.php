<?php 
ini_set("display_errors",0); 

function fn_productive()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 

name 'rsm'
,branch_no 'agence'
,(select count(ln.acct_no) from ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate())=0) 'nb'
,(select sum(amt) from ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate())=0) 'somme'
 ,(select count(ln.acct_no)  from ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('Active')) 'nbencours'
  ,(select sum(dis.cur_bal)  from ln_acct ln,rm_acct rm,ln_display dis
  where dis.acct_no=ln.acct_no and rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('Active')) 'somencours'
  ,(select AVG(datediff(day,la.application_dt,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))) from la_acct la,ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and la.ln_acct_no=ln.acct_no) 'Dureetrait'
from ad_gb_rsm rsm where status in ('Active')
and empl_class_code=310 
order by branch_no,name

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('RSM'=>$row['rsm'],
					'agence'=>$row['agence'],
					'nb'=>$row['nb'],
                    'somme'=>$row['somme'],
                    'nbencours'=>$row['nbencours'],
					'Dureetrait'=>$row['Dureetrait'],
                    'somencours'=>$row['somencours']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>