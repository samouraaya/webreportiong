<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste de protfeuille
*/
function portfeuille()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];

$sql = "
select
rsm.name 'rsm'
,a.rim_no 'rim'
,rm.Last_name+ '  ' + rm.First_Name 'NomCLT'
,substring(cls.description,8,LEN(cls.description)) 'produit' 
,cast (disp.amt_financed as decimal) 'amt_financed'
,a.trm 'duree'
,(select cast (lh.create_dt as date) from ln_history lh
  where lh.acct_no = a.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  )'decaissement'
,cast(a.mat_dt as date) 'Mat'
,disp.Cur_bal 'EncCap'
,isnull((datediff(day,disp.delq_dt, dateadd(day,1,(select last_to_dt from ov_control)))),0) 'retard'
,(select count(*) from ln_display where rim_no = rm.rim_no and amt_financed !=0 and first_adv_dt <= disp.first_adv_dt ) 'cycle'
from
ln_acct a, ad_gb_rsm rsm, ad_gb_branch br ,rm_acct rm,ln_display disp,ad_ln_cls cls
where
a.rim_no=rm.rim_no and a.status not in ('closed', 'incomplete')
and cls.class_code = a.class_code
and a.acct_no=disp.acct_no and a.acct_type=disp.acct_type
and rm.rsm_id=rsm.employee_id
and br.branch_no=rsm.branch_no
and rm.class_code<>190
and rm.branch_no=".$agence."    
Order by br.branch_no,rsm.name ,a.acct_type+'-'+a.acct_no";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$row['NomCLT']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['NomCLT']);
    $return[]=array(
					'rim'=>$row['rim'],
					'rsm'=>$row['rsm'],
					'NomCLT'=>$row['NomCLT'],
                    'produit'=>$row['produit'],
					'amt_financed'=>$row['amt_financed'],
					'duree'=>$row['duree'],
					'decaissement'=>$row['decaissement'],
					'Mat'=>$row['Mat'],
					'EncCap'=>$row['EncCap'],
					'retard'=>$row['retard'],
					'cycle'=>$row['cycle'],);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>