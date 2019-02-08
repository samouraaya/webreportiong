<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des échéances d'aujourd'hui
*/
function liste_rec_synth()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$pdo1 = visite_suivi::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				

$sql = "select 
rsm.employee_id,
rsm.name 'RSM',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='NonAccrual') 'NBNonAccrual',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='NonAccrual') 'VLNonAccrual',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='Active charge-off') 'NBACO',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='Active charge-off') 'VLACO',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status not in ('Incomplete','closed')) 'NB',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status not in ('Incomplete','closed')) 'VL',
(select sum(dh.amt) from dp_history dh,dp_acct da,rm_acct rm,ln_acct ln where da.rim_no=rm.rim_no and rm.rsm_id=rsm.employee_id and ln.rim_no = rm.rim_no and dh.acct_no=da.acct_no and tran_code in (117,101,102,104) and datediff(month,dh.create_dt,ov.last_to_dt)=0 and ln.status in ('Active charge-off','NonAccrual')) 'RECMOIS',
(select count(lh.acct_no) from ln_history lh,ln_acct la,rm_acct rm where la.rim_no=rm.rim_no and rm.rsm_id=rsm.employee_id and lh.acct_no=la.acct_no and tran_code in (345) and datediff(month,lh.create_dt,ov.last_to_dt)=0) 'CLOMOIS'

from ad_gb_rsm rsm,ov_control ov
where rsm.status= 'Active'
and rsm.empl_class_code = 530
order by rsm.[user_name]";
$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();

foreach ($result as $row1)

{
	
	$sql1 = "SELECT id_utilisateur,
(SELECT COUNT(id_note) FROM note nt WHERE nt.type_note IN (2,4,7) AND nt.`auteur`=ut.`nom_prenom`
AND TIMESTAMPDIFF (MONTH,(SELECT CAST(nt.`date_insertion` AS DATE) FROM note 
  WHERE nt.`id_note` = id_note AND type_note IN (2,4,7) 
  ),CURDATE()) = 0 ) 'NBCONT'

FROM utilisateur ut 
WHERE ut.id_utilisateur in( ".$row1['employee_id'].")";
$result1 = $pdo1->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

foreach ($result1 as $row){
	
if($row['id_utilisateur'] = $row1['employee_id'])
{
	
    $return[]=array(
					'employee_id'=>$row1['employee_id'],
					'RSM'=>$row1['RSM'],
					'NBNonAccrual'=>$row1['NBNonAccrual'],
                    'VLNonAccrual'=>$row1['VLNonAccrual'],
                    'NBACO'=>$row1['NBACO'],
                    'VLACO'=>$row1['VLACO'],
					'NB'=>$row1['NB'],
					'VL'=>$row1['VL'],
					'RECMOIS'=>$row1['RECMOIS'],
					'CLOMOIS'=>$row1['CLOMOIS'],
					'NBCONT'=>$row['NBCONT'],
					
					'pourcentage' => number_format($row['NBCONT']/$row1['NB'], 2, ',', ' ').'%',
					'id_utilisateur'=>$row['id_utilisateur']
					);
					//var_dump($row['employee_id']);

					
}
}
}
header('Content-type: application/json');
echo json_encode($return);
}
function liste_rec_synth_externe()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select 

rsm.name 'RSM',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='NonAccrual') 'NBNonAccrual',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='NonAccrual') 'VLNonAccrual',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='Active charge-off') 'NBACO',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status='Active charge-off') 'VLACO',
(select count(ln.acct_no) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status not in ('Incomplete','closed')) 'NB',
(select sum(ln.cur_bal) from ln_display ln ,rm_acct rm where ln.rim_no = rm.rim_no and rm.rsm_id=rsm.employee_id and ln.status not in ('Incomplete','closed')) 'VL',
(select sum(dh.amt) from dp_history dh,dp_acct da,rm_acct rm,ln_acct ln where da.rim_no=rm.rim_no and rm.rsm_id=rsm.employee_id and ln.rim_no = rm.rim_no and dh.acct_no=da.acct_no and tran_code in (117,101,102,104) and datediff(month,dh.create_dt,ov.last_to_dt)=0 and ln.status in ('Active charge-off','NonAccrual')) 'RECMOIS',
(select count(lh.acct_no) from ln_history lh,ln_acct la,rm_acct rm where la.rim_no=rm.rim_no and rm.rsm_id=rsm.employee_id and lh.acct_no=la.acct_no and tran_code in (345) and datediff(month,lh.create_dt,ov.last_to_dt)=0) 'CLOMOIS'

from ad_gb_rsm rsm,ov_control ov
where rsm.status= 'Active'
and rsm.user_name in ('AUT000','GRE000','RDS000','TSA000')";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$return = array();

foreach ($result as $row){
	
    $return[]=array(
					'RSM'=>$row['RSM'],
					'NBNonAccrual'=>$row['NBNonAccrual'],
                    'VLNonAccrual'=>$row['VLNonAccrual'],
                    'NBACO'=>$row['NBACO'],
                    'VLACO'=>$row['VLACO'],
					'NB'=>$row['NB'],
					'VL'=>$row['VL'],
					'RECMOIS'=>$row['RECMOIS'],
					'CLOMOIS'=>$row['CLOMOIS']);
}

header('Content-type: application/json');
echo json_encode($return);
}
function liste_rec_synth_agence()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select 

rsm.branch_no 'Agence',
(select count(ln.acct_no) from ln_display ln,rm_acct rm  where ln.rim_no = rm.rim_no and  rm.branch_no=rsm.branch_no and ln.status='NonAccrual') 'NBNonAccrual',
(select sum(ln.cur_bal) from ln_display ln,rm_acct rm  where ln.rim_no = rm.rim_no and rm.branch_no=rsm.branch_no and ln.status='NonAccrual') 'VLNonAccrual',
(select count(ln.acct_no) from ln_display ln,rm_acct rm where ln.rim_no = rm.rim_no and  rm.branch_no=rsm.branch_no and ln.status='Active charge-off') 'NBACO',
(select sum(ln.cur_bal) from ln_display ln,rm_acct rm  where  ln.rim_no = rm.rim_no and rm.branch_no=rsm.branch_no and ln.status='Active charge-off') 'VLACO',
(select count(ln.acct_no) from ln_display ln,rm_acct rm  where ln.rim_no = rm.rim_no and rm.branch_no=rsm.branch_no and ln.status not in ('Closed','Incomplete')) 'NB',
(select sum(ln.cur_bal) from ln_display ln,rm_acct rm  where ln.rim_no = rm.rim_no and rm.branch_no=rsm.branch_no and ln.status not in ('Closed','Incomplete')) 'VL',
(select sum(dh.amt) from dp_history dh,dp_acct da,rm_acct rm,ln_acct ln where da.rim_no=rm.rim_no and ln.rim_no = rm.rim_no and rm.branch_no=rsm.branch_no and dh.acct_no=da.acct_no and tran_code in (117,101,102,104) and datediff(month,dh.create_dt,ov.last_to_dt)=0 and ln.status in ('Active charge-off','NonAccrual')) 'RECMOIS',
(select count(lh.acct_no) from ln_history lh,ln_acct la,rm_acct rm where la.rim_no=rm.rim_no and rm.branch_no=rsm.branch_no and lh.acct_no=la.acct_no and tran_code in (345) and datediff(month,lh.create_dt,ov.last_to_dt)=0) 'CLOMOIS'

from ad_gb_branch rsm,ov_control ov
where rsm.status= 'Active'
and rsm.branch_no not in (100)";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$return = array();
foreach ($result as $row){
	
    $return[]=array(
					'Agence'=>$row['Agence'],
					'NBNonAccrual'=>$row['NBNonAccrual'],
                    'VLNonAccrual'=>$row['VLNonAccrual'],
                    'NBACO'=>$row['NBACO'],
                    'VLACO'=>$row['VLACO'],
					'NB'=>$row['NB'],
					'VL'=>$row['VL'],
					'RECMOIS'=>$row['RECMOIS'],
					'CLOMOIS'=>$row['CLOMOIS']);
}

header('Content-type: application/json');
echo json_encode($return);
}
?>