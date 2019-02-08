<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des demandes
*/
function caisse()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select  distinct 
rm.rim_no 'RIM'
,rm.first_name+' '+rm.last_name 'Nomprénom'
,cast(gb.effective_dt as date) 'Datedetransfere'
,gb.prev_value 'RSMPrecédent'
,gb.new_value  'NouveauRSM'

from 
gb_audit gb,
rm_acct rm,
ln_acct ln,

ad_gb_rsm rsm
where table_name like '%rm_acct%' 
and column_name like '%RSM_ID%'

and ln.status not in ('closed','incomplete')

--and pmt.status in ('Active')
and ln.rim_no=rm.rim_no
--and cast(str_replace(gb.actual_prev_value ,CHAR(39),'')as int) not in (select employee_id from ad_gb_rsm where empl_class_code=300)
--and datediff (month,gb.effective_dt,getdate()) in(0,1) 
and actual_prev_value<>actual_new_value
and gb.table_ptid=rm.rim_no 
and rsm.employee_id=rm.rsm_id
and rm.branch_no=510

order by gb.effective_dt,rm.rim_no

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){

    $return[]=array('RIM'=>$row['RIM'],
					'Nomprénom'=>$row['Nomprénom'],
					'Datedetransfere'=>$row['Datedetransfere'],
					'RSMPrecédent'=>$row['RSMPrecédent'],
					'NouveauRSM'=>$row['NouveauRSM']
					
					);
}
return $return;
Database::disconnect();
}
?>