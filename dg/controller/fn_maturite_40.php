<?php ini_set("display_errors",0); 
/*
	Fonction pour lister les Transferts de portefeuille des 2 derniers mois
*/
function fn_maturite_40()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database3::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "
select 
distinct 
(select name from ad_gb_rsm where employee_id=rmc.rsm_id)'RSM'
,rmc.branch_no 'branch'
,rmc.rim_no 'rim_no'
,rmc.last_name+ ' '+rmc.first_name 'Nom_Pren'
,(select phone_3 from rm_address where rmc.rim_no=rim_no and addr_type_id=1)'Num_Tel'
,ln.amt 'montant'
,(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ) 'Date_déc'
  ,case when ln.trm-(select count(acct_no) from ln_bill where ln.acct_no = acct_no and status in ('Unsatisfied') and sub_no=1)=ln.trm then
 convert(varchar(8),ln.trm-(select count(acct_no) from ln_bill where ln.acct_no = acct_no and status in ('Unsatisfied') and sub_no=1)) +'/'+ convert(varchar(8),ln.trm)
 else convert(varchar(8),ln.trm-(select count(acct_no) from ln_bill where ln.acct_no = acct_no and status in ('Unsatisfied') and sub_no=1)+1) +'/'+ convert(varchar(8),ln.trm)
 end 'N_ECH'
 ,dis.cur_bal 'reste'
,cast(ln.mat_dt as date) 'Mat_dt'
,isnull((select max(datediff(day,pmt_due_dt,dateadd(day,1,accr_thru)))from ln_bill where sub_no=3 and acct_no=ln.acct_no),0) 'MaxJourRetard'
,(select count(*) from ln_display where rim_no = rmc.rim_no and amt_financed !=0 and first_adv_dt <= dis.first_adv_dt ) 'cycle'
from ln_acct ln,rm_acct rmc ,ln_display dis,ln_bill lb1
where ln.rim_no = rmc.rim_no
and lb1.acct_no=dis.acct_no 
and dis.acct_no = ln.acct_no
and lb1.sub_no=2
and ln.status in ('Active')
and dis.trm/4 >=(select count(distinct bill_id_no) from ln_bill where  status in ('Unsatisfied') and acct_no=dis.acct_no)
and (select count(distinct bill_id_no) from ln_bill where  status in ('Unsatisfied') and acct_no=dis.acct_no) <=6
and isnull((select max(datediff(day,pmt_due_dt,dateadd(day,1,accr_thru)))from ln_bill where sub_no=3 and acct_no=ln.acct_no),0) <30
 

 order by 'RSM','Mat_dt'";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array(
					'RSM'=>$row['RSM'],
					'cycle'=>$row['cycle'],
					'branch'=>$row['branch'],
					'rim'=>$row['rim_no'],
					'NomCLT'=>$row['Nom_Pren'],
                    'produit'=>$row['Num_Tel'],
					'amt_financed'=>$row['montant'],
					'duree'=>$row['Date_déc'],
					'decaissement'=>$row['N_ECH'],
					'Mat'=>$row['reste'],
					'EncCap'=>$row['Mat_dt'],
					'retard'=>$row['MaxJourRetard'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>