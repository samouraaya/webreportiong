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
				$user=$_GET['user'];
				

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
 ,convert(varchar(8),ln.trm-(select count(acct_no) from ln_bill where ln.acct_no = acct_no and status in ('Unsatisfied') and sub_no=1)+1) +'/'+ convert(varchar(8),ln.trm)'N_ECH'
 ,dis.cur_bal 'reste'
,cast(ln.mat_dt as date) 'Mat_dt'
,case when (select max(isnull(datediff(day,lb.pmt_due_dt,(select cast(posting_dt_tm as date) from ln_history hist
where hist.acct_no = lb.acct_no
and lb.sub_no<>3
and ptid = (select max(history_ptid) from ln_bill_map 
where acct_no = hist.acct_no and bill_id_no = lb.bill_id_no  and sub_no<>3))),0)) from ln_bill lb where lb.acct_no=lb1.acct_no)>(select max(datediff(day,a.pmt_due_dt,getdate())) from ln_bill a where  a.status in ('Unsatisfied') and a.acct_no=lb1.acct_no and sub_no<>3) 
then (select max(isnull(datediff(day,lb.pmt_due_dt,(select cast(posting_dt_tm as date) from ln_history hist
where hist.acct_no = lb.acct_no
and lb.sub_no<>3
and ptid = (select max(history_ptid) from ln_bill_map 
where acct_no = hist.acct_no and bill_id_no = lb.bill_id_no  and sub_no<>3))),0)) from ln_bill lb where lb.acct_no=lb1.acct_no)
else (select max(datediff(day,a.pmt_due_dt,getdate())) from ln_bill a where  a.status in ('Unsatisfied') and a.acct_no=lb1.acct_no and sub_no<>3)   end 'MaxJourRetard'
,(select count(*) from ln_acct where rim_no=rmc.rim_no having(select lh.create_dt from ln_history lh
  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
  and lh.reversal = 0
  ) is not null) 'cycle'
from ln_acct ln,rm_acct rmc ,ln_display dis,ln_bill lb1,ad_gb_rsm rsm
where ln.rim_no = rmc.rim_no
and lb1.acct_no=dis.acct_no 
and dis.acct_no = ln.acct_no
and lb1.sub_no=2
and rsm.employee_id=rmc.rsm_id
and ln.status in ('Active')
and datediff(day,getdate(),ln.mat_dt)<=40
and datediff(month,getdate(),ln.mat_dt)>=0
and rsm.user_name like '%" . $user . "%'

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