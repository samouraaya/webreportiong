<?php ini_set("display_errors",0); 
/*
	Fonction pour lister décaissement résultant de d'une cloture anticipé
*/
function fn_clot_anticipe_m()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "
select 
distinct 
rm.branch_no 'agence'
,(select name from ad_gb_rsm where employee_id=rm.rsm_id)'rsm'
,rm.rim_no 'Rim'
,rm.last_name+' '+rm.first_name 'Nom_client'
,(select cast(lh.create_dt as date) from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  )'date_décaissement'
,ln.amt 'Montant_décaissé'
,(select count(*) from ln_display where rim_no = rm.rim_no and amt_financed !=0 and first_adv_dt <= disp.first_adv_dt )'Cycle'
,ln1.mat_dt 'date_mat_cycle-1'
,ROUND(lh.amt,0)  'Montant_capital_remboussé'

from ln_acct ln,ln_acct ln1,rm_acct rm,ln_display disp,ln_history lh
where  ln.acct_no=disp.acct_no
and ln.rim_no=rm.rim_no
and rm.rim_no=ln1.rim_no 
and ln.status in ('Active')
and lh.tran_code=304 
and lh.acct_no=ln1.acct_no
and datediff(day,lh.create_dt,(select lh.create_dt from ln_history lh
			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
			  and lh.reversal = 0
			  ))<=30 
			and datediff (month,(select lh.create_dt from ln_history lh
			  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
			  and lh.reversal = 0
			  ),(select last_to_dt from ov_control))=1
  order by 'rsm'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'agence'=>$row['agence'],
					'rsm'=>$row['rsm'],
					'rim'=>$row['Rim'],
					'NomCLT'=>$row['Nom_client'],			
                    'Num_prêt'=>$row['date_décaissement'],
					'Montant_décaissé'=>$row['Montant_décaissé'],
					'Cycle'=>$row['Cycle'],
					'datemat'=>$row['date_mat_cycle-1'],
					'Montant_capital_remboussé'=>$row['Montant_capital_remboussé'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>