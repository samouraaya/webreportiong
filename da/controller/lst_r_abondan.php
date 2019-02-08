<?php ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des réguls à faire
*/
function liste_r_abondan()
{
    include('../../../cnx/database.php');
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$agence=$_GET['agence'];


    $sql = "select 

rm.branch_no 'Agence',
rm.rim_no 'rim',
ln.acct_no 'li',
rsm.name 'rsm',
ln.title_1 'clt_name',
(select phone_3 from rm_address where rim_no=rm.rim_no and addr_type_id=1) 'phone',
ln.amt 'Montant_LI',
ln.class_code 'Produit_LI',
(select create_dt from ln_history where acct_no=ln.acct_no and tran_code=345 and reversal=0)'Date_345',
(select count(*) from ln_bill where acct_no=ln.acct_no and sub_no=3) 'NB_ECH_Retard',
datediff(month,(select create_dt from ln_history where acct_no=ln.acct_no and tran_code=350 and reversal=0),(select create_dt from ln_history where acct_no=ln.acct_no and tran_code=345 and reversal=0)) 'Duree_effective',
ln.trm 'Duree_theorique',
isnull((select sum(datediff(day,pmt_due_dt,dateadd(day,1,accr_thru))) from ln_bill where sub_no=3 and acct_no=ln.acct_no),0) 'Cumul_Retard'

from ln_acct ln , rm_acct rm , ad_gb_rsm rsm
where ln.rim_no=rm.rim_no
and rsm.employee_id=rm.rsm_id
and ln.ptid=(select max(ptid) from ln_acct where rim_no=rm.rim_no and status not in ('Incomplete'))
and datediff(month,(select create_dt from ln_history where acct_no=ln.acct_no and tran_code=345 and reversal=0),dateadd(day,1,(select last_to_dt from ov_control))) <= 3
and (select count(ptid) from ln_acct where rim_no=rm.rim_no and status not in ('Incomplete','Closed'))=0
and rm.branch_no=".$agence."";

    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $return = array();
    foreach ($result as $row){
        $row['clt_name']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['clt_name']);
        $return[]=array(
            'Agence'=>$row['Agence'],
            'rim'=>$row['rim'],
            'li'=>$row['li'],
            'rsm'=>$row['rsm'],
            'clt_name'=>$row['clt_name'],
            'phone'=>$row['phone'],
            'Montant_LI'=>$row['Montant_LI'],
            'Produit_LI'=>$row['Produit_LI'],
            'Date_345'=>$row['Date_345'],
            'NB_ECH_Retard'=>$row['NB_ECH_Retard'],
            'Duree_effective'=>$row['Duree_effective'],
            'Duree_theorique'=>$row['Duree_theorique'],
            'Cumul_Retard'=>$row['Cumul_Retard'],
        );
    }
    return $return;
    Database::disconnect();
}
?>