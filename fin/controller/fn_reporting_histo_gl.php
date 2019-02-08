<?php 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function reporting_histo_gl()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//ini_set('display_startup_errors',1);
				//ini_set('display_errors',1);
				//error_reporting(-1);
				ini_set('memory_limit', '-1');
				
$sql = "select 
gl.description 'Libelle_GL'
,gl.acct_no 'N_Compte_GL'
,gl.debit_credit 'Debit_Credit_GL'
,tc.tran_code 'Code_du_transaction'
,tc.description 'Libelle_du_transaction'
,isnull(glh.description,'') 'Description_du_transaction'
,glh.amt 'Montant'
,glh.CREATE_DT  'Date'
from gl_history glh, gl_acct gl,ad_gb_tc tc
where glh.acct_no = gl.acct_no
and glh.tran_code = tc.tran_code";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {

	
    $return[]=array('Libelle_GL'=>utf8_encode($row1['Libelle_GL']),
					'N_Compte_GL'=>utf8_encode($row1['N_Compte_GL']),
					'Debit_Credit_GL'=>utf8_encode($row1['Debit_Credit_GL']),
					'Code_du_transaction'=>utf8_encode($row1['Code_du_transaction']),
					'Libelle_du_transaction'=>utf8_encode($row1['Libelle_du_transaction']),
					'Description_du_transaction'=>utf8_encode($row1['Description_du_transaction']),
					'Montant'=>$row1['Montant'],
					'Date'=>$row1['Date']);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
function reporting_cur_bal_gl()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//ini_set('display_startup_errors',1);
				//ini_set('display_errors',1);
				//error_reporting(-1);
				ini_set('memory_limit', '-1');
				
$sql = "select b.acct_no,b.description,b.debit_credit,a.cur_bal from gl_balances a , gl_acct b
where a.gl_acct_id=b.gl_acct_id";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {

	
    $return[]=array('acct_no'=>utf8_encode($row1['acct_no']),
					'description'=>utf8_encode($row1['description']),
					'debit_credit'=>utf8_encode($row1['debit_credit']),
					'cur_bal'=>utf8_encode($row1['cur_bal']));
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>