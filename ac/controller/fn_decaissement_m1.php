<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des décaissements du mois dérnier
*/
function decaissement_m1()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];

$sql = "select 

rmact.rsm_id, 
rsm.name 'RSM',  
rmact.rim_no 'RIMNO',
rmact.last_name + ' ' + rmact.first_name 'client', 
cast(dp.amt as DECIMAL(31,0)) 'amt',
dp.contract_dt,
(select cast(lh.create_dt as date) from ln_history lh
  where lh.acct_no = dp.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ) as Datededeblocage,
dp.mat_dt,
br.name_1 'agence',
dp.trm 'trm',
substring(ad.description,8,LEN(ad.description)) 'Classpret',
dp.acct_no 'acct',
rest.description'Segment RIM',

(select count(*) from ln_display where rim_no = rmact.rim_no and amt_financed !=0 and first_adv_dt <= dp.first_adv_dt ) 'cycle'

from ln_history lh, ln_display dp, rm_acct rmact, ad_gb_rsm rsm,ad_gb_branch br,ad_ln_cls ad,ad_rm_restrict rest
where lh.acct_no = dp.acct_no
and rsm.branch_no = br.branch_no
and rsm.employee_id = rmact.rsm_id
and dp.rim_no=rmact.rim_no
and ad.class_code = dp.class_code
and rest.restrict_id = rmact.restrict_id
and lh.tran_code = 350 and lh.reversal = 0
and datediff(month,(select cast(lh.create_dt as date) from ln_history lh
  where lh.acct_no = dp.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ) ,(select last_to_dt from ov_control))=0  and rmact.branch_no=".$agence." order by rsm.name,Datededeblocage";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
		$row['client']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['client']);
				$return[]=array(
					'RIMNO'=>$row['RIMNO'],
					'rsm'=>$row['RSM'],
					'client'=>$row['client'],
                    'Classpret'=>$row['Classpret'],
					'Datededeblocage'=>$row['Datededeblocage'],
					'acct'=>$row['acct'],
					'amt'=>$row['amt'],
					'trm'=>$row['trm'],
					'cycle'=>$row['cycle']
								);
	}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>