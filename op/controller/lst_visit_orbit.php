<?php 
ini_set("display_errors",0); 
ini_set('max_execution_time', 300);
/*
	c'est une fonction qui permet de retourner la liste des visites de suivi CRM
*/
function suivi_orbit()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
			

$sql1 = "SELECT 
	f.name 'rsm'
	,rm.first_name+' '+rm.last_name 'name'
	,rm.rim_no 'rim'
	,(select count(*) from ln_acct la where rm.rim_no=rim_no and la.acct_no=(select (lh.acct_no)  from ln_history lh
	where lh.acct_no = la.acct_no and lh.tran_code = 350 
	and lh.reversal = 0
	)) 'cycle'
	,(select lh.create_dt  from ln_history lh
	where lh.acct_no = ln.acct_no and lh.tran_code = 350 
	and lh.reversal = 0
	) 'datedecaissement'
	,datediff (day,(select lh.create_dt  from ln_history lh
	  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
	  and lh.reversal = 0
	  ),getdate()) 'depuis'
	,ln.amt 'montant'
	,rm.branch_no 'age'
	,(select branch_no from ad_gb_rsm where employee_id=rm.rsm_id)'branch'
	,(select convert(varchar(8),(min(bill_id_no))) from ln_bill where acct_no=ln.acct_no and status in ('Unsatisfied'))+'/'+convert(varchar(8),ln.trm)'ech'
	,isnull(datediff(day,(select min(pmt_due_dt) from ln_bill where status in  ('Unsatisfied') and datediff(day,pmt_due_dt,getdate())>0 and acct_no=ln.acct_no),getdate()),0) 'retardd'
	,(select count(acct_no) from ln_bill where acct_no=ln.acct_no and sub_no=3) 'nbretard'
	,case when rm.risk_code=6 then 'Oui' else '-' end 'risk'
	,str_replace((select description from ad_ln_cls where class_code=ln.class_code),'ADVANS','') 'produit'
from rm_acct rm , ln_acct ln,ad_gb_rsm f
where rm.rim_no = ln.rim_no
and f.employee_id=rm.rsm_id
and ln.status not in   ('closed','incomplete')  
and ln.class_code not in  (531)
order by f.branch_no,'rsm'";
$res = $pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row)
{
$row['name']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['name']);
     $return[]=array(
					'rim'=>$row['rim'],
					'rsm'=>$row['rsm'],
					'age'=>$row['age'],
					'name'=>$row['name'],
					'cycle'=>$row['cycle'],
					'depuis'=>$row['depuis'],
					'datedecaissement'=>$row['datedecaissement'],
					'montant'=>$row['montant'],
					'ech'=>$row['ech'],
					'retardd'=>$row['retardd'],
					'nbretard'=>$row['nbretard'],
					'risk'=>$row['risk'],
					'produit'=>$row['produit'],
					);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>