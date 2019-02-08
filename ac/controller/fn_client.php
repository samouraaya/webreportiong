<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner dans un tableau les coordonnées d'un client

*/
function client()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database1::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];
				
$sql = "select distinct rm1.rim_no 'numrim',
rm1.name_1 'nomclt',
rsm.name 'rsm',
rm1.phone_3'Tel1',
isnull (rm1.phone_1,' ')'Tel2',
isnull(rm1.phone_2,' ')'Tel3',
rm2.address_line_1+' '+rm2.city+' '+rm2.town+' '+rm2.zip 'adressefamiliale',
rm1.address_line_1+' '+rm1.city+' '+rm1.town+' '+rm1.zip 'adresseprofessionnel'
from rm_address rm1,rm_address rm2,rm_acct rm,ad_gb_rsm rsm,ln_acct ln,la_acct la
where rm1.rim_no = rm2.rim_no
and rm1.addr_id=1
and rm2.addr_id=2
and ln.rim_no=rm.rim_no
and la.rim_no=rm.rim_no
and rm.rim_no=rm1.rim_no
and rm.rsm_id=rsm.employee_id
and rm.status not in ('Closed')
and ln.status not in ('Closed')
and rm.branch_no=".$agence."
having ln.status in ('Active') or  la.status in ('pending','approved','reviewed') order by rsm.name";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
$adresseprofessionnel=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['adresseprofessionnel']);
$adressefamiliale=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['adressefamiliale']);
$row1['nomclt']=iconv("UTF-8","ISO-8859-2//IGNORE",$row1['nomclt']);
    $return[]=array('RIMNO'=>$row1['numrim'],
					'Client_name'=>$row1['nomclt'],
					'Tel1'=>$row1['Tel1'],
					'rsm'=>$row1['rsm'],
					'Tel2'=>$row1['Tel2'],
					'Tel3'=>$row1['Tel3'],
					'adressefamiliale'=>$adressefamiliale,
					'adresseprofessionnel'=>$adresseprofessionnel,
					
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>