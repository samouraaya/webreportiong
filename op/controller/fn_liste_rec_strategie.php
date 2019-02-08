<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
	c'est une fonction qui permet de retourner la liste des actions des recouvreurs
*/
function liste_rec_strategie()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			
				
$sql1 = "select 
distinct 
rsm.employee_id,
rsm.name 'RSM',
rm.rim_no 'RIM',
rm.first_name+' '+rm.last_name 'Nom_Prenom',
lh.create_dt,
(select sum(lhh.amt) from ln_history lhh,ln_acct lnn where lhh.acct_no = lnn.acct_no and lnn.rim_no = ln.rim_no and lhh.create_dt = (select max(create_dt) from ln_history where acct_no = lh.acct_no and tran_code = 300 and reversal = 0) 
)'Montant'
from ln_display ln,ad_gb_rsm rsm,rm_acct rm,ov_control ov,ln_history lh
where  rsm.employee_id=rm.rsm_id
and lh.acct_no = ln.acct_no
and lh.tran_code = 300
and lh.reversal = 0 
and lh.create_dt = (select max(create_dt) from ln_history where acct_no = lh.acct_no and tran_code = 300 and reversal = 0)
and rm.rim_no = ln.rim_no
and ln.status not in ('closed','Incomplete')
and rsm.empl_class_code = 530
order by rsm.name,rm.rim_no";		

$result1 = $pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
$return = array();

foreach ($result1 as $row){				
$sql = " SELECT 
DISTINCT
clt.nom ,
clt.prenom,
fimp.`rim_no`,
 nom_prenom , 'RSM_RIM',
cpt.id_agence,
cpt.`mnt_echeance`,
nt.`desc_note`,
cpt.`statut`,
nt.`date_insertion`
FROM utilisateur ut,note nt,fiche_impaye fimp,CLIENT clt,cpt_pret cpt
WHERE ut.id_utilisateur = clt.id_utilisateur
AND fimp.`id_fiche` = nt.`id_fiche`
AND clt.`rim_no` = fimp.`rim_no`
AND fimp.`acct_no` = cpt.`acct_no`
AND nt.type_note=1
AND cpt.`statut` NOT IN ('Closed' , 'incomplete')
AND nt.`date_insertion` = (SELECT MAX(date_insertion) FROM note WHERE id_fiche = nt.`id_fiche` AND type_note = 1)
AND fimp.`id_fiche` = (SELECT MAX(id_fiche) FROM fiche_impaye WHERE fimp.`rim_no` = rim_no)
AND ut.id_role = 530
and fimp.rim_no in (".$row['RIM'].")
ORDER BY fimp.`rim_no`
";

$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row1) 
{
	if($row['RIM'] == $row1['rim_no'])
	{
     $return[]=array(
	 
					'nom'=>$row1['nom'],
					'prenom'=>$row1['prenom'],
					'rim_no'=>$row1['rim_no'],
					'nom_prenom'=>$row1['nom_prenom'],
					'id_agence'=>$row1['id_agence'],
					'mnt_echeance'=>$row1['mnt_echeance'],
					'statut'=>$row1['statut'],
					'desc_note'=>iconv("UTF-8","ISO-8859-2//IGNORE",$row1['desc_note']),
					'date_insertion'=>$row1['date_insertion'],
					'create_dt' =>$row['create_dt'],
					'Montant'=>$row['Montant']
					
					
						);
}
}
}

header('Content-type: application/json');
echo json_encode($return);
visite_suivi::disconnect();
}
?>