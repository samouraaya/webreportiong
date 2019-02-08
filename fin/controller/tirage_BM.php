<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des échéances payés à temps du mois dernier
*/
function tirage_BM()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				

$sql = "select 
	rm.rim_no 'rim'
,rm.branch_no 'Agence'
,rm.first_name+' '+rm.last_name 'NomEtprenom'
,rm.id_value  'CIN'
,rm.birth_dt 'DateNaiss'
,isnull((select distinct value from gb_user_defined where  rm.rim_no=cast(acct_no_key as int) and appl_type='rm' and field_id=40),'') 'NMatriculeFiscal'
,la.status 'Statut'
,(select status from ln_acct where acct_no=la.LN_ACCT_NO) 'StatutLI'
,la.APPROVAL_DT 'Datedaccord'
, ''  'Coutdeprojet'
,la.APPLICATION_AMT 'Montantdemand'
,0 'MontantfinancparBIRD'
,la.approval_amt 'MontantdemandBIRD'
,his.create_dt 'date_dec'

from la_acct la,rm_acct rm,ln_acct ln ,ln_history his
where datediff(month,his.create_dt,(select last_to_dt from ov_control))=0
and ln.amt<=10000
and his.acct_no = ln.acct_no
and ln.rim_no = la.RIM_NO
and ln.acct_no=la.LN_ACCT_NO
and ln.status='Active'
and his.tran_code=350
and his.reversal=0
and rm.rim_no=la.rim_no 
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){

    $return[]=array('Agence'=>$row['Agence'],
					'NomEtprenom'=>$row['NomEtprenom'],
					'CIN'=>" ".strval($row['CIN']),
					'rim'=>$row['rim'],
					'StatutLI'=>$row['StatutLI'],
                    'DateNaiss'=>$row['DateNaiss'],
                    'NMatriculeFiscal'=>$row['NMatriculeFiscal'],
                    'Statut'=>$row['Statut'],
					'Datedaccord'=>$row['Datedaccord'],
					'Coutdeprojet'=>$row['Coutdeprojet'],
					'Montantdemand'=>$row['Montantdemand'],
					'MontantfinancparBIRD'=>$row['MontantfinancparBIRD'],
					'MontantdemandBIRD'=>$row['MontantdemandBIRD'],
					'date_dec'=>$row['date_dec'],);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
}
?>