<?php //ini_set("display_errors",0); 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function reporting_frais_gage()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
$sql = "select 

rm.rim_no 'N_RIM',
rm.branch_no 'Agence',
lh.amt 'Frais_de_gage',
(select create_dt from ln_history where lh.acct_no=acct_no and tran_code=350 and reversal=0) 'Date_decaissement'

from ln_display dis,ln_history lh,rm_acct rm
where dis.acct_no = lh.acct_no
and rm.rim_no = dis.rim_no
and lh.tran_code=602
and lh.reversal=0
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
    $return[]=array('N_RIM'=>$row1['N_RIM'],
					'Agence'=>$row1['Agence'],
					'Frais_de_gage'=>$row1['Frais_de_gage'],
					'Date_decaissement'=>$row1['Date_decaissement']);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>