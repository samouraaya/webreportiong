<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des échéances d'aujourd'hui
*/
function liste_rec_flx_rem_prec()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				/*$pdo1 = Database6::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
					
				

$sql = "select 
distinct 
rsm.name 'RSM',
rm.rim_no 'RIM',
rm.first_name+' '+rm.last_name 'Nom_Prenom',
ln.branch_no 'AGENCELI',
ln.acct_no 'ACCTNO',
ln.status 'STATUTLI',
ln.cur_bal 'PAR',
dd.cur_bal 'SOLDECT',

(select sum(amt) from ln_history where acct_no=ln.acct_no and tran_code in (300) and datediff(month,create_dt,ov.last_to_dt)=1) 'RECMOIS',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=3) 'RESTAPAYEPEN',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=1) 'RESTAPAYEINT',
(select sum(amt-amt_satisfied) from ln_bill where acct_no=ln.acct_no and sub_no=2) 'RESTAPAYECAP'
from ln_display ln,ad_gb_rsm rsm,rm_acct rm,ov_control ov,dp_display dd,ln_history lh
where 
    rsm.employee_id=rm.rsm_id
and lh.acct_no = ln.acct_no
and lh.tran_code = 300
and lh.reversal = 0 
and datediff(month,lh.create_dt,ov.last_to_dt)=1
and rm.rim_no = ln.rim_no
and dd.rim_no = ln.rim_no
and ln.status not in ('closed','Incomplete')
and rsm.empl_class_code = 530
order by rsm.name,rm.rim_no";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){
	
    $return[]=array('RSM'=>$row['RSM'],
                    'RIM'=>$row['RIM'],
                    'Nom_Prenom'=>$row['Nom_Prenom'],
                    'AGENCELI'=>$row['AGENCELI'],
					'ACCTNO'=>$row['ACCTNO'],
					'STATUTLI'=>$row['STATUTLI'],
					'PAR'=>$row['PAR'],
					'SOLDECT'=>$row['SOLDECT'],
					'RECMOIS'=>$row['RECMOIS'],
					'RESTAPAYE'=>$row['RESTAPAYE']
					);
}

header('Content-type: application/json');
echo json_encode($return);
}
?>