<?php 
ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des demandes
*/
function demande()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];

$sql = "select  
ad_gb_branch.short_name 'agence',
la_acct.rim_no 'RIMNO' ,
(select ad_gb_rsm.name  from ad_gb_rsm ,rm_acct where ad_gb_rsm.employee_id = rm_acct.rsm_id and rm_acct.rim_no = la_acct.rim_no)'nomRSM',
rm_acct.last_name+'  '+rm_acct.first_name 'nomclient',
la_acct.acct_no 'numdem',
la_acct.status 'statutdemande',
cast(la_acct.application_dt as date)'test',
case 
when la_acct.status in ('Pending') then cast(la_acct.application_amt as DECIMAL(31,0)) 
when la_acct.status in ('Reviewed') then cast(la_acct.review_amt as DECIMAL(31,0)) 
when la_acct.status in ('Approved') then cast(la_acct.approval_amt as DECIMAL(31,0)) 
END 'montantdemandé',
case 
when la_acct.status in ('Pending') then cast(la_acct.application_dt as date)
when la_acct.status in ('Reviewed') then cast(la_acct.review_dt as date)
when la_acct.status in ('Approved') then cast(la_acct.approval_dt as date)
when la_acct.status in ('Disbursed') then cast(la_acct.disburse_dt as date)
when la_acct.status in ('Closed') then cast(la_acct.close_dt as date)
END 'dtmostat',
datediff(day,la_acct.application_dt,getdate()) 'NBjours'
,(select count(*) from la_acct a where a.rim_no=rm_acct.rim_no and a.application_dt<=la_acct.application_dt and status not in ('Closed')) 'cycle'

from rm_acct,la_acct,ad_gb_rsm,ad_gb_branch,ad_ln_cls,ad_gb_sic,ad_ln_purpose
where rm_acct.rim_no =la_acct.rim_no
and ad_gb_rsm.employee_id = rm_acct.rsm_id
and ad_gb_branch.branch_no =*rm_acct.branch_no
and   ad_ln_cls.acct_type =la_acct.acct_type
and ad_ln_cls.class_code=la_acct.class_code
and ad_gb_sic.sic_code=*rm_acct.sic_code
and datediff(day,la_acct.application_dt,getdate())<90
and la_acct.Purpose_id*=ad_ln_purpose.Purpose_id and la_acct.status not in ('Disbursed','Closed') and rm_acct.branch_no=".$agence."  

Union

select  
ad_gb_branch.short_name 'agence',
la_acct.rim_no 'RIMNO' ,
(select ad_gb_rsm.name  from ad_gb_rsm ,rm_acct where ad_gb_rsm.employee_id = rm_acct.rsm_id and rm_acct.rim_no = la_acct.rim_no)'nomRSM',
rm_acct.last_name+'  '+rm_acct.first_name 'nomclient',
la_acct.acct_no 'numdem',
'Approved' 'statutdemande',
cast(la_acct.application_dt as date)'test',
case 
when la_acct.status in ('Pending') then cast(la_acct.application_amt as DECIMAL(31,0)) 
when la_acct.status in ('Reviewed') then cast(la_acct.review_amt as DECIMAL(31,0)) 
when la_acct.status in ('Approved') then cast(la_acct.approval_amt as DECIMAL(31,0))
when la_acct.status in ('Disbursed') then cast(la_acct.approval_amt as DECIMAL(31,0))
END 'montantdemandé',
case 
when la_acct.status in ('Pending') then cast(la_acct.application_dt as date)
when la_acct.status in ('Reviewed') then cast(la_acct.review_dt as date)
when la_acct.status in ('Approved') then cast(la_acct.approval_dt as date)
when la_acct.status in ('Disbursed') then cast(la_acct.disburse_dt as date)
when la_acct.status in ('Closed') then cast(la_acct.close_dt as date)
END 'dtmostat',
datediff(day,la_acct.application_dt,getdate()) 'NBjours'
,(select count(*) from la_acct a where a.rim_no=rm_acct.rim_no and a.application_dt<=la_acct.application_dt and status not in ('Closed')) 'cycle'

from rm_acct,la_acct,ad_gb_rsm,ad_gb_branch,ad_ln_cls,ad_gb_sic,ad_ln_purpose,ln_acct ln
where rm_acct.rim_no =la_acct.rim_no
and ad_gb_rsm.employee_id = rm_acct.rsm_id
and ad_gb_branch.branch_no =*rm_acct.branch_no
and   ad_ln_cls.acct_type =la_acct.acct_type
and ad_ln_cls.class_code=la_acct.class_code
and ad_gb_sic.sic_code=*rm_acct.sic_code
and datediff(day,ln.create_dt,getdate())<=30
and ln.acct_no=la_acct.ln_acct_no
and ln.status='Incomplete'
and la_acct.Purpose_id*=ad_ln_purpose.Purpose_id and la_acct.status not in ('Closed') 

and rm_acct.branch_no=".$agence."  

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
	$row['nomclient']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['nomclient']);
    $return[]=array('agence'=>$row['RIMNO'],
					'numdem'=>$row['numdem'],
					'rsm'=>$row['nomRSM'],
                    'nomclient'=>$row['nomclient'],
					'activité'=>$row['test'],
					'statutdemande'=>$row['statutdemande'],
					'dtmostat'=>$row['dtmostat'],
					'NBjours'=>$row['NBjours'],
					'montantdemandé'=>$row['montantdemandé'],
					'cycle'=>$row['cycle'],);
}
return $return;
Database::disconnect();
}
?>