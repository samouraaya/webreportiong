<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste de protfeuille
*/
function portfeuille_cdr()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "
select 

(select name from ad_gb_rsm where employee_id=rm.rsm_id) 'rsm'
,(select branch_no from ad_gb_rsm where employee_id=rm.rsm_id) 'agence'
,ln.acct_no 'Numcompte'
,rm.rim_no 'rim'
,rm.first_name+' '+rm.last_name 'client'
,ln.status 'statut'
,ln.amt 'disbursedamt'
,dis.cur_bal 'encours'
,(select identification from ad_rm_ident where ident_id=rm.ident_id) 'typeid'
,rm.id_value 'id'
,cast(rm.birth_dt as date) 'datenaiss' 
,isnull((datediff(day,dis.delq_dt, dateadd(day,1,(select last_to_dt from ov_control)))),0) 'retard'

from ln_acct ln,ln_display dis,rm_acct rm
where ln.acct_no = dis.acct_no
and ln.rim_no = rm.rim_no
and ln.status not in ('Incomplete','closed') order by 'agence' ,'rsm'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	
	$row['client']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['client']);

    $return[]=array(
					'rim'=>$row['rim'],
					'rsm'=>$row['rsm'],
					'age'=>$row['agence'],
					'NomCLT'=>$row['client'],
                    'produit'=>$row['statut'],
					'Numcompte'=>$row['Numcompte'],
					'amt_financed'=>$row['disbursedamt'],
					'encours'=>$row['encours'],
					'typeid'=>$row['typeid'],
					'id'=>$row['id'],
					'retard'=>$row['retard'],
					'datenaiss'=>$row['datenaiss']);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>