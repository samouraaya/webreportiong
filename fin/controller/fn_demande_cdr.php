<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des demandes
*/
function demande_cdr()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select 

(select name from ad_gb_rsm where employee_id=rm.rsm_id) 'rsm'
,(select branch_no from ad_gb_rsm where employee_id=rm.rsm_id) 'Agence'
,la.acct_no 'numdemande'
,rm.rim_no 'rim'
,rm.last_name+' '+rm.first_name 'client'
,la.status 'statut'
,la.application_amt 'montant'
,(select identification from ad_rm_ident where ident_id=rm.ident_id) 'typeid'
,rm.id_value 'id'
,cast(rm.birth_dt as date) 'datenaiss' 

from la_acct la , rm_acct rm 
where la.RIM_NO=rm.rim_no
and la.status not in ('closed','disbursed')
order by 'Agence','rsm'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('rsm'=>$row['rsm'],
					'Agence'=>$row['Agence'],
					'numdemande'=>$row['numdemande'],
					'rim'=>$row['rim'],
                    'client'=>$row['client'],
					'statut'=>$row['statut'],
					'montant'=>$row['montant'],
					'typeid'=>$row['typeid'],
					'id'=>$row['id'],
					'datenaiss'=>$row['datenaiss'],
					);
}
return $return;
Database::disconnect();
}
?>