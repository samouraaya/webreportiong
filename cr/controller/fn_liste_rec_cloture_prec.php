<?php 
ini_set("display_errors",0);
ini_set('error_reporting', E_ALL);
/*
	c'est une fonction qui permet de retourner la liste des échéances d'aujourd'hui
*/
function liste_rec_clot_prec()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				/*$pdo1 = Database6::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
				//echo ($user);
				$user=$_GET['user'];
				//echo ($user);

$sql = "select 

rsm.name 'RSM',
rm.rim_no 'RIM',
ln.title_1 'Nom_Prenom',
ln.branch_no 'AGENCELI',
ln.acct_no 'ACCTNO',
ln.status 'STATUTLI',
lh.create_dt 'DateClot'

from ln_acct ln,ln_history lh,ad_gb_rsm rsm,rm_acct rm,ov_control ov
where ln.acct_no = lh.acct_no
and rsm.employee_id=rm.rsm_id
and rm.rim_no = ln.rim_no
and lh.tran_code=345
and lh.reversal=0
and datediff(month,(select cast(lh.create_dt as date) from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 345 
  and lh.reversal = 0
  ) ,getdate())=1
and rsm.user_name like '%" . $user . "%'
order by 'AGENCELI','RSM'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$return = array();
foreach ($result as $row){
	
    $return[]=array('RSM'=>$row['RSM'],
                    'RIM'=>$row['RIM'],
                    'Nom_Prenom'=>$row['Nom_Prenom'],
                    'AGENCELI'=>$row['AGENCELI'],
					'ACCTNO'=>$row['ACCTNO'],
					'STATUTLI'=>$row['STATUTLI'],
					'DateClot'=>$row['DateClot']
					);
}

header('Content-type: application/json');
echo json_encode($return);
}
?>