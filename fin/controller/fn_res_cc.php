<?php ini_set("display_errors",0); 
function res_cc()
{

				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				

$sql = "select 
name 'rsm'
,branch_no 'agence'
,(select count(ln.acct_no) from la_acct ln , rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('pending')) as nombre
,isnull((select count(cast(amt as decimal(31,0))) from ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('Active') and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate() )=0),0) as nb
,isnull((select sum((amt )) from ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and ln.status in ('Active') and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate() )=0),0) as decaisse

,(select  isnull (sum(dis.cur_bal),0) from rm_acct rm, ln_display dis,ov_control ov
where rm.rim_no =  dis.rim_no
and rsm.employee_id=rm.rsm_id 
and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0) as per0


,(select  isnull (sum(dis.cur_bal),0) from rm_acct rm, ln_display dis,ov_control ov
where rm.rim_no =  dis.rim_no
and rsm.employee_id=rm.rsm_id 
and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30) as per30

,(select count(acct_no) from ln_acct ln,rm_acct rm where rm.rim_no = ln.rim_no and ln.status in ('Active') and rm.rsm_id=rsm.employee_id) as nbclt
,(select isnull (sum(cur_bal),0) from ln_display dis,rm_acct rm where  rm.rim_no = dis.rim_no and dis.status in ('Active') and rm.rsm_id=rsm.employee_id) as volclt
,isnull((select AVG(datediff(day,la.application_dt,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ))) from la_acct la,ln_acct ln,rm_acct rm where rm.rim_no=ln.rim_no and rm.rsm_id=rsm.employee_id and la.ln_acct_no=ln.acct_no 
  and datediff(month,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ),getdate())<=3),0) 'Dureetrait'
  ,(select  count(dis.cur_bal) from rm_acct rm, ln_display dis,ov_control ov
where rm.rim_no =  dis.rim_no
and rsm.employee_id=rm.rsm_id 
and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7) as PAR7
,(select count(acct_no) from la_acct la,rm_acct rm where rm.rim_no = la.RIM_NO and rm.rsm_id=rsm.employee_id and la.status='pending' and datediff(day,la.APPLICATION_DT,getdate())>15) 'Pending15'
from ad_gb_rsm rsm 
where 
rsm.status in ('Active')  
and empl_class_code in (310) 
 order by branch_no,rsm.name,decaisse desc
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	if ($row['volclt']==0) $row['per30']='-'; else $row['per30']=number_format(($row['per30']/$row['volclt'])*100,2,'.','').'%';
	if ($row['volclt']==0) $row['per0']='-'; else $row['per0']=number_format(($row['per0']/$row['volclt'])*100,2,'.','').'%';
    $return[]=array('rsm'=>$row['rsm'],
					'agence'=>$row['agence'],
					'nombre'=>$row['nombre'],
					'nb'=>$row['nb'],
					'decaisse'=>$row['decaisse'],
					'per0'=>$row['per0'],
					'nbclt'=>$row['nbclt'],
					'volclt'=>$row['volclt'],
					'Dureetrait'=>$row['Dureetrait'],
					'PAR7'=>$row['PAR7'],
					'Pending15'=>$row['Pending15'],
					'per30'=>$row['per30']);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>