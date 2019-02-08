<?php ini_set("display_errors",0); 
/*
	c'est une fonction qui permet de retourner la liste des décaissements du mois en cours 
*/

				

	function credit ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select br.branch_no 'agence',isnull((select sum(cur_bal) 
from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d
where a.acct_no = c.acct_no
and b.rim_no = c.rim_no
and c.status not in ('Closed','incomplete','active charge-off')
and d.branch_no = br.branch_no   
and d.employee_id=b.rsm_id ),0) 'encoursvl'
,isnull((select count(cur_bal) 
from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d
where a.acct_no = c.acct_no
and b.rim_no = c.rim_no
and c.status not in ('Closed','incomplete','active charge-off')
and d.branch_no = br.branch_no  
and d.employee_id=b.rsm_id ),0) 'encoursnb'
,(select count(ln.ACCT_NO) 
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls
									where rm.rim_no=ln.RIM_NO   
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no = br.branch_no  
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0) 'decaissementNb'
,isnull((select sum(ln.amt) 
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls
									where rm.rim_no=ln.RIM_NO   
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									and rsm.branch_no = br.branch_no  
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0),0) 'decaissementVL'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									and rsm.branch_no = br.branch_no 
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status not in ('closed','incomplete')) 'NBECH'
							,(select  

							count(distinct cl.rim_no) 


							from ad_gb_rsm cp, ln_acct cr, rm_address ad, rm_acct cl, ln_bill bl1,ln_pmt_schedule sh,ln_display dp,dp_display lo
							where cp.employee_id = cl.rsm_id
							and cl.rim_no = cr.rim_no
							and cr.rim_no = ad.rim_no
							and dp.acct_no = bl1.acct_no
              and cp.branch_no = br.branch_no
							and cr.acct_no = sh.acct_no
							and cr.acct_no = dp.acct_no
							and sh.tfr_acct_no = lo.acct_no
							and bl1.acct_no = cr.acct_no
							and ad.addr_id = 1
							and cr.status not in  ('closed', 'incomplete' )
							and bl1.type in ('Principal ', 'Interest','Late Fees','Loan Fees')
							and sh.status ='Active'
							and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
							 
							and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
									where bl2.acct_no = bl1.acct_no
									and bl2.bill_id_no = bl1.bill_id_no
									and bl2.amt <>0
									and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
							else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
									where bl2.acct_no = bl1.acct_no
									
									and bl2.amt <>0
									and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
							end>0
							and cl.class_code <>190 ) 'ECHIMP'
from ad_gb_branch br where br.status='Active'
                  
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
		$row['agence']=iconv("UTF-8", "ISO-8859-1//IGNORE", $row['agence']);
				$return[]=array(
					'agence'=>$row['agence'],
					'encours_vl'=>number_format($row['encoursvl'],'3','.',' '),
					'encours_nb'=>$row['encoursnb'],
					'decaissementNb'=>$row['decaissementNb'],
					'decaissementVL'=>number_format($row['decaissementVL'],'0','.',' '),
					'NBECH'=>$row['NBECH'],
                    'ECHIMP'=>$row['ECHIMP'],
					'perech'=>number_format(((($row['NBECH']-$row['ECHIMP'])/$row['NBECH'])*100),'2','.','').' %',
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function credit_total ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select isnull((select sum(cur_bal) 
from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d
where a.acct_no = c.acct_no
and b.rim_no = c.rim_no
and c.status not in ('Closed','incomplete','active charge-off')
and d.employee_id=b.rsm_id ),0) 'encoursvl'
,isnull((select count(cur_bal) 
from ln_display a,rm_acct b ,ln_acct c,ad_gb_rsm  d
where a.acct_no = c.acct_no
and b.rim_no = c.rim_no
and c.status not in ('Closed','incomplete','active charge-off')
and d.employee_id=b.rsm_id ),0) 'encoursnb'
,(select count(ln.ACCT_NO) 
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls
									where rm.rim_no=ln.RIM_NO   
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0) 'decaissementNb'
,isnull((select sum(ln.amt) 
									from LN_ACCT ln, rm_acct rm,ad_gb_rsm rsm, ad_ln_cls cls
									where rm.rim_no=ln.RIM_NO   
									and ln.class_code=cls.class_code
									and rsm.employee_id=ln.RSM_ID
									and ln.status in ('Active')
									
									and datediff(day,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) , getdate())=0),0) 'decaissementVL'
,(select count(lb.acct_no) 
									from ln_bill lb, ln_acct ln, rm_acct rm, ad_gb_rsm rsm
									where lb.acct_no=ln.acct_no
									and ln.rim_no=rm.rim_no
									and rm.rsm_id=rsm.employee_id
									 
									and lb.type='Principal'
									and cast(lb.pmt_due_dt as date)=cast( getdate() as date)
									and ln.status not in ('closed','incomplete')) 'NBECH'
,(select 

									count(distinct rm.rim_no) 

									from ad_gb_rsm rsm,rm_acct rm,ln_acct ln,ln_bill bl1 ,ln_pmt_schedule pmt,dp_display lo
									where    
										rm.rim_no=ln.rim_no
									and ln.acct_no=bl1.acct_no
									and rsm.employee_id=rm.rsm_id
									and ln.status in ('Active')
									and rm.rim_no = lo.rim_no
									
									and pmt.acct_no=ln.acct_no
									and pmt.status in ('Active')
									and cast(bl1.pmt_due_dt as date)=cast( getdate() as date)
									and case when(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))-(select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											and bl2.bill_id_no = bl1.bill_id_no
											and bl2.amt <>0
											and bl2.pmt_due_dt = bl1.pmt_due_dt) >0 then 0
									else (select sum(cast(bl2.amt as DECIMAL(31,3)))-sum(cast(bl2.amt_satisfied as DECIMAL(31,3))) from ln_bill bl2
											where bl2.acct_no = bl1.acct_no
											
											and bl2.amt <>0
											and bl2.pmt_due_dt <= bl1.pmt_due_dt)-(isnull((select distinct sum(cast((gb.amt)as DECIMAL(31,3)))  from gb_batch_trans gb,gb_batch bt where lo.acct_no=gb.acct_no and bt.status in ('Active  ')and bt.batch_id=gb.batch_id),0)+cast(lo.cur_bal as DECIMAL(31,3))+cast(lo.memo_cr as DECIMAL(31,3))+cast(lo.memo_dr as DECIMAL(31,3)))
									end>0) 'ECHIMP'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{

				$return[]=array(
					'agence'=>'Total(Siége Inclus)',
					'encours_vl'=>number_format($row['encoursvl'],'3','.',' '),
					'encours_nb'=>$row['encoursnb'],
					'decaissementNb'=>$row['decaissementNb'],
					'decaissementVL'=>number_format($row['decaissementVL'],'0','.',' '),
					'NBECH'=>$row['NBECH'],
                    'ECHIMP'=>$row['ECHIMP'],
					'perech'=>number_format(((($row['NBECH']-$row['ECHIMP'])/$row['NBECH'])*100),'2','.','').' %',
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function par ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select branch_no 'agence'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0 ),0) 'nbpar0'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0 ),0) 'vlpar0'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7 ),0) 'nbpar7'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7 ),0) 'vlpar7'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30 ),0) 'nbpar30'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30 ),0) 'vlpar30'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90 ),0) 'nbpar90'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90 ),0) 'vlpar90'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									),0) 'outstinding'
                  from ad_gb_branch br
                  where status='Active'
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
		$row['agence']=iconv("UTF-8", "ISO-8859-1//IGNORE", $row['agence']);
				$return[]=array(
					'agence'=>$row['agence'],
					'nbpar0'=>$row['nbpar0'],
					'vlpar0'=>number_format($row['vlpar0'],'3','.',' '),
					'perpar0'=>number_format(($row['vlpar0']/$row['outstinding'])*100,'2','.','').'%',
					'perpar7'=>number_format(($row['vlpar7']/$row['outstinding'])*100,'2','.','').'%',
					'perpar30'=>number_format(($row['vlpar30']/$row['outstinding'])*100,'2','.','').'%',
					'perpar90'=>number_format(($row['vlpar90']/$row['outstinding'])*100,'2','.','').'%',
					'nbpar7'=>$row['nbpar7'],
					'vlpar7'=>number_format($row['vlpar7'],'3','.',' '),
					'nbpar30'=>$row['nbpar30'],
                    'vlpar30'=>number_format($row['vlpar30'],'3','.',' '),
					'nbpar90'=>$row['nbpar90'],
                    'vlpar90'=>number_format($row['vlpar90'],'3','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function par_total ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0 ),0) 'nbpar0'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0 ),0) 'vlpar0'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7 ),0) 'nbpar7'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>7 ),0) 'vlpar7'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30 ),0) 'nbpar30'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30 ),0) 'vlpar30'
,isnull((select  
									count(ln.amt) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90 ),0) 'nbpar90'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>90 ),0) 'vlpar90'
,isnull((select  
									sum(cur_bal) 
									from rm_acct rm, ln_acct ln, ln_display dis, ov_control ov,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									 
									and ln.acct_no = dis.acct_no
									and rm.rsm_id=rsm.employee_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									),0) 'outstinding'

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>'Total(Siége Inclus)',
					'nbpar0'=>$row['nbpar0'],
					'vlpar0'=>number_format($row['vlpar0'],'3','.',' '),
					'perpar0'=>number_format(($row['vlpar0']/$row['outstinding'])*100,'2','.','').'%',
					'perpar7'=>number_format(($row['vlpar7']/$row['outstinding'])*100,'2','.','').'%',
					'perpar30'=>number_format(($row['vlpar30']/$row['outstinding'])*100,'2','.','').'%',
					'perpar90'=>number_format(($row['vlpar90']/$row['outstinding'])*100,'2','.','').'%',
					'nbpar7'=>$row['nbpar7'],
					'vlpar7'=>number_format($row['vlpar7'],'3','.',' '),
					'nbpar30'=>$row['nbpar30'],
                    'vlpar30'=>number_format($row['vlpar30'],'3','.',' '),
					'nbpar90'=>$row['nbpar90'],
                    'vlpar90'=>number_format($row['vlpar90'],'3','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}


	function demande_reporting ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
branch_no 'agence',
(select count(la.acct_no) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=br.branch_no
									and cast(la.CREATE_DT as date) = cast(getdate() as date)) 'nbdmdnew'
,isnull((select sum(la.application_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no=br.branch_no
									and cast(la.CREATE_DT as date) = cast(getdate() as date)),0) 'vldmdnew'
,isnull((SELECT  
									count(rm.rim_no)
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm
									where la.RIM_NO =rm.rim_no 
                  and rsm.employee_id=rm.rsm_id 
                 and rsm.branch_no=br.branch_no
									and cast(la.close_DT as date) = cast(getdate() as date)),0) 'nbdmdclo'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS not in('closed','disbursed')
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstock'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='Pending'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockpen'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='reviewed'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockrev'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='approved'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockapp'
,isnull((select sum(la.application_amt) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS not in('closed','disbursed')
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstock'
,isnull((select sum(la.application_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='Pending'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockpen'
,isnull((select sum(la.review_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='reviewed'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockrev'
,isnull((select sum(la.approval_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                  and rsm.BRANCH_NO=br.branch_no 
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='approved'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockapp'
                  
from  ad_gb_branch br
where status='Active'
and branch_no<>100 
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>$row['agence'],
					'nbdmdnew'=>$row['nbdmdnew'],
					'vldmdnew'=>number_format($row['vldmdnew'],'0','.',' '),
					'nbdmdclo'=>$row['nbdmdclo'],
					'nbstock'=>$row['nbstock'],
					'nbstockpen'=>$row['nbstockpen'],
					'nbstockrev'=>$row['nbstockrev'],
					'nbstockapp'=>$row['nbstockapp'],
					'vlstock'=>number_format($row['vlstock'],'0','.',' '),
					'vlstockpen'=>number_format($row['vlstockpen'],'0','.',' '),
					'vlstockrev'=>number_format($row['vlstockrev'],'0','.',' '),
					'vlstockapp'=>number_format($row['vlstockapp'],'0','.',' '),
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function demande_reporting_total ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
(select count(la.acct_no) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no <>100
									and cast(la.CREATE_DT as date) = cast(getdate() as date)) 'nbdmdnew'
,isnull((select sum(la.application_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and rsm.branch_no <>100
									and cast(la.CREATE_DT as date) = cast(getdate() as date)),0) 'vldmdnew'
,isnull((SELECT  
									count(rm.rim_no)
									from rm_acct rm, LA_ACCT la,ad_gb_rsm rsm
									where la.RIM_NO =rm.rim_no 
                  and rsm.employee_id=rm.rsm_id 
                 
									and cast(la.close_DT as date) = cast(getdate() as date)),0) 'nbdmdclo'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS not in('closed','disbursed')
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstock'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='Pending'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockpen'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='reviewed'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockrev'
,isnull((select count(la.ACCT_NO) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='approved'
									and datediff(day,la.application_dt,getdate())<90),0) 'nbstockapp'
,isnull((select sum(la.application_amt) 
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS not in('closed','disbursed')
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstock'
,isnull((select sum(la.review_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='Pending'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockpen'
,isnull((select sum(la.application_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='reviewed'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockrev'
,isnull((select sum(la.approval_amt)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO 
                   
									and rsm.employee_id=la.APPLICATION_RSM_ID
                  and la.STATUS='approved'
									and datediff(day,la.application_dt,getdate())<90),0) 'vlstockapp'
                  

";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>'Total',
					'nbdmdnew'=>$row['nbdmdnew'],
					'vldmdnew'=>number_format($row['vldmdnew'],'0','.',' '),
					'nbdmdclo'=>$row['nbdmdclo'],
					'nbstock'=>$row['nbstock'],
					'nbstockpen'=>$row['nbstockpen'],
					'nbstockrev'=>$row['nbstockrev'],
					'nbstockapp'=>$row['nbstockapp'],
					'vlstock'=>number_format($row['vlstock'],'0','.',' '),
					'vlstockpen'=>number_format($row['vlstockpen'],'0','.',' '),
					'vlstockrev'=>number_format($row['vlstockrev'],'0','.',' '),
					'vlstockapp'=>number_format($row['vlstockapp'],'0','.',' '),
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function cumul_week_reporting ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
branch_no 'agence'
,isnull((select 
									count(la.ACCT_NO)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
                  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdmdweek' 
,isnull((select  
									 count(ln.acct_no) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdecnbweek' 
,isnull((select  
									 sum(ln.amt) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdecvlweek' 

from  ad_gb_branch br
where status='Active'
and branch_no<>100 
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>$row['agence'],
					'cumdmdweek'=>$row['cumdmdweek'],
					'cumdecvlweek'=>number_format($row['cumdecvlweek'],'0','.',' '),
					'cumdecnbweek'=>$row['cumdecnbweek'],
					'moydec'=>number_format(($row['cumdecvlweek']/$row['cumdecnbweek']),'0','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
	function cumul_week_reporting_total ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
isnull((select 
									count(la.ACCT_NO)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
                  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and cast(la.CREATE_DT as date) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdmdweek' 
,isnull((select  
									 count(ln.acct_no) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
								
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdecnbweek' 
,isnull((select  
									 sum(ln.amt) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and (select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) >= cast(dateadd (day,2-DATEPART(dw,getdate()),getdate()) as date)),0) 'cumdecvlweek' 


";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>'Total',
					'cumdmdweek'=>$row['cumdmdweek'],
					'cumdecvlweek'=>number_format($row['cumdecvlweek'],'0','.',' '),
					'cumdecnbweek'=>$row['cumdecnbweek'],
					'moydec'=>number_format(($row['cumdecvlweek']/$row['cumdecnbweek']),'0','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}

	function cumul_month_reporting ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
branch_no 'agence'
,isnull((select 
									count(la.ACCT_NO)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
                  and rsm.BRANCH_NO=br.branch_no
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and datediff(month,la.create_dt,getdate())=0),0) 'cumdmdweek' 
,isnull((select  
									 count(ln.acct_no) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0),0) 'cumdecnbweek' 
,isnull((select  
									 sum(ln.amt) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									and rsm.branch_no = br.branch_no
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0),0) 'cumdecvlweek' 

from  ad_gb_branch br
where status='Active'
and branch_no<>100 
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>$row['agence'],
					'cumdmdweek'=>$row['cumdmdweek'],
					'cumdecvlweek'=>number_format($row['cumdecvlweek'],'0','.',' '),
					'cumdecnbweek'=>$row['cumdecnbweek'],
					'moydec'=>number_format(($row['cumdecvlweek']/$row['cumdecnbweek']),'0','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
	function cumul_month_reporting_total ()			
	{
		include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
$sql = "select 
isnull((select 
									count(la.ACCT_NO)
									from LA_ACCT la, rm_acct rm,ad_gb_rsm rsm
									where rm.rim_no=la.RIM_NO  
                  
									and rsm.employee_id=rm.rsm_id
									and rsm.empl_class_code<>400
									and datediff(month,la.create_dt,getdate())=0),0) 'cumdmdweek' 
,isnull((select  
									 count(ln.acct_no) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
								
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0),0) 'cumdecnbweek' 
,isnull((select  
									 sum(ln.amt) 
									from rm_acct rm, ln_acct ln,ad_gb_rsm rsm
									where rm.rim_no = ln.rim_no
									
                  and rsm.employee_id=rm.rsm_id
									and ln.status not in ('Closed','Incomplete','active charge-off')
									and datediff(month,(select lh.create_dt from ln_history lh
									  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
									  and lh.reversal = 0
									  ) ,getdate())=0),0) 'cumdecvlweek' 


";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row)
	{
				$return[]=array(
					'agence'=>'Total',
					'cumdmdweek'=>$row['cumdmdweek'],
					'cumdecvlweek'=>number_format($row['cumdecvlweek'],'0','.',' '),
					'cumdecnbweek'=>$row['cumdecnbweek'],
					'moydec'=>number_format(($row['cumdecvlweek']/$row['cumdecnbweek']),'0','.',' '),
					
								);
	}

		
//header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}


?>