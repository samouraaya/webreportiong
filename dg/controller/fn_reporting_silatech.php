<?php //ini_set("display_errors",0); 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function reporting_silatech()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
$sql = "select 
rm.birth_dt 'Birthdate'
,rm.rim_no 'RIM'
,(select acct_no from la_acct where ln_acct_no=ln.acct_no) 'NDemande'
,datediff(year,rm.birth_dt,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0)) 'Age'
,rm.sex 'Gender'
,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0) 'DisbursementDate'
,ln.class_code 'LoanType'
,ln.trm 'LoanTerm'
,ln.amt 'Loanamount'
,(select purp.purpose from ad_ln_purpose purp where purp.Purpose_id=ln.Purpose_id)'LoanUsage'
,dis.cur_bal 'LoanOutstanding'
,(select town from rm_address where rm.rim_no=rim_no and addr_id=2)'Location'
,(select description from ad_rm_employment a,rm_personal_info b where employment_id=b.empl_occupation and b.rim_no=rm.rim_no) 'Sector'
,'No' 'Startup'
,'1' 'NbofJobsCreated'
,'' 'NbofJobsSustained'
,rm.branch_no 'Branch'
,(select name from ad_gb_rsm where employee_id=rm.rsm_id) 'CRO'



from rm_acct rm,ln_acct ln ,ln_display dis
where rm.rim_no=ln.rim_no
and dis.acct_no = ln.acct_no
and datediff(month,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0),(select last_to_dt from ov_control))=1
and (select count(*) from ln_display where rim_no = rm.rim_no and amt_financed !=0 and first_adv_dt <= dis.first_adv_dt )=1 
and datediff(year,rm.birth_dt,(select lh.create_dt from ln_history lh where lh.acct_no = ln.acct_no and lh.tran_code = 350 and lh.reversal = 0))<36


";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
	$row1['Location']=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['Location']);
	$row1['LoanUsage']=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['LoanUsage']);
	$row1['Sector']=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['Sector']);
    $return[]=array('Birthdate'=>$row1['Birthdate'],
					'RIM'=>$row1['RIM'],
					'NDemande'=>$row1['NDemande'],
					'Age'=>$row1['Age'],
					'Gender'=>$row1['Gender'],
					'DisbursementDate'=>$row1['DisbursementDate'],
					'LoanType'=>$row1['LoanType'],
					'LoanTerm'=>$row1['LoanTerm'],
					'Loanamount'=>$row1['Loanamount'],
					'LoanUsage'=>$row1['LoanUsage'],
					'LoanOutstanding'=>$row1['LoanOutstanding'],
					'Location'=>$row1['Location'],
					'Sector'=>$row1['Sector'],
					'Startup'=>$row1['Startup'],
					'NbofJobsCreated'=>$row1['NbofJobsCreated'],
					'NbofJobsSustained'=>$row1['NbofJobsSustained'],
					'Branch'=>$row1['Branch'],
					'CRO'=>$row1['CRO'],
					
					
					);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>