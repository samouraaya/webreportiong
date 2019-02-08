<?php //ini_set("display_errors",0); 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function reporting_test_garantis()
{
				include('../../../cnx/database.php');
				$pdo = Database6::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
$sql = "select 

rm.branch_no 'Agence'
,rm.first_name+' '+rm.last_name 'Client'
,cls.description 'Type_Credit'
,lh.create_dt 'Date_Decaissement'
,cast(ln.amt as int) 'montant_decaissement'
,cast(dis.cur_bal as char) 'Encours'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=43) 'GarantieEntrepreneur'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=43) as int) 'ValeurGarantieEntrepreneur'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=44) 'GarantieAvalSal1'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(44)) as int) 'Valeur_GarantieAvalSal1'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=48) 'GarantieAvalSal2'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(48)) as int) 'ValeurGarantieAvalSal2'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=50) 'GarantieVehicule1'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(50,51)) as int) 'ValeurGarantieVehicule1'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=51) 'GarantieVehicule2'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(51)) as int) 'ValeurGarantieVehicule2'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=52) 'GarantieStockEquip'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(52)) as int) 'ValeurGarantieStockEquip'
,(select distinct category from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id=49) 'GarantieAvalEntp'
,cast((select sum(stmt.amt) from ad_rm_stmt_cat cat,rm_fin_stmt stmt 
        where cat.category_id=stmt.category_id 
              and stmt.status='Active' 
              and stmt.rim_no = rm.rim_no 
              and stmt.category_id in(49)) as int) 'ValeurGarantieAvalEntp'

from ln_acct ln,ln_history lh,rm_acct rm,ad_ln_cls cls,ln_display dis
where ln.acct_no = lh.acct_no
and rm.rim_no = ln.rim_no
and dis.acct_no=ln.acct_no
and ln.class_code = cls.class_code
and lh.tran_code=350
and lh.reversal=0
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row1) {
    $return[]=array('Agence'=>$row1['Agence'],
					'Client'=>$row1['Client'],
					'Type_Credit'=>$row1['Type_Credit'],
					'Date_Decaissement'=>$row1['Date_Decaissement'],
					'montant_decaissement'=>$row1['montant_decaissement'],
					'Encours'=>$row1['Encours'],
					'GarantieEntrepreneur'=>$row1['GarantieEntrepreneur'],
					'ValeurGarantieEntrepreneur'=>$row1['ValeurGarantieEntrepreneur'],
					'GarantieAvalSal1'=>$row1['GarantieAvalSal1'],
					'Valeur_GarantieAvalSal1'=>$row1['Valeur_GarantieAvalSal1'],
					'GarantieAvalSal2'=>$row1['GarantieAvalSal2'],
					'ValeurGarantieAvalSal2'=>$row1['ValeurGarantieAvalSal2'],
					'GarantieVehicule1'=>$row1['GarantieVehicule1'],
					'ValeurGarantieVehicule1'=>$row1['ValeurGarantieVehicule1'],
					'GarantieVehicule2'=>$row1['GarantieVehicule2'],
					'ValeurGarantieVehicule2'=>$row1['ValeurGarantieVehicule2'],
					'GarantieStockEquip'=>$row1['GarantieStockEquip'],
					'ValeurGarantieStockEquip'=>$row1['ValeurGarantieStockEquip'],
					'GarantieAvalEntp'=>$row1['GarantieAvalEntp'],
					'ValeurGarantieAvalEntp'=>$row1['ValeurGarantieAvalEntp']);
}

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>