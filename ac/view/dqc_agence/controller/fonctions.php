<?php ini_set("display_errors",0); 
			
			
			
				function t1()
				{				
								
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								

				$sql = "select 
									count(rm.rim_no)  'nb'
									

									from rm_acct rm
									where (select count(rim_no) from rm_address  where rim_no=rm.rim_no and addr_id = 2)=0
									and rm.class_code in (110)
									and rm.branch_no=".$agence."
								";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t2()
				{				
								
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select 
								count(rm.rim_no) 'nb' 
								from rm_acct rm,ad_rm_title ad
								where ad.title_id=rm.title_id
								and ((ad.title='M.' and Sex='F') or (ad.title='Mme' and Sex='M') or (ad.title='Mlle' and Sex='M'))and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t3()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select distinct 
									count(a.rim_no)'nb' 
									
									from rm_acct a,ad_gb_rsm c, ad_gb_branch br
									where 
										a.branch_no=br.branch_no
									and a.empl_id=c.employee_id
									and (select count(rim_no) from rm_acct where id_value=a.id_value and status='Active')>1
									and a.status ='active'
									and a.branch_no=".$agence."
									order by a.id_value  ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t4()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select 
									count(rim_no) 'nb'
									from rm_acct 
									where id_expiry_dt is null 
									and ident_id=24  and branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t5()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select 
								count(rm.rim_no) 'nb'

								from rm_acct rm ,la_acct la,ad_rm_ident ident
								where cast(id_expiry_dt as date) <cast(getdate() as date)
								and rm.rim_no = la.RIM_NO
								and la.status in ('Pending','Reviewed','disbursed')
								and ident.ident_id = rm.ident_id and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t6()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "Select 
									count(rm.rim_no) 'nb'
									
									from rm_acct rm, ad_gb_rsm rsm, ad_gb_branch br,la_acct la,ln_acct ln
									where rm.rsm_id =rsm.employee_id
									and rm.branch_no=br.branch_no
									and rm.class_code not in (190)
									and rm.branch_no not in(Select br.branch_no from ad_gb_branch br where br.branch_no= rsm.branch_no)
									and la.RIM_NO = rm.rim_no
									and ln.rim_no = rm.rim_no
									and (ln.status in ('Active') or la.STATUS in('pending','reviewed')) and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t7()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select distinct

							count(la.RIM_NO) 'nb'

							from la_acct la, rm_acct rm, ad_gb_rsm rsm
							where la.RIM_NO=rm.rim_no
							and rsm.employee_id=rm.rsm_id
							and rsm.empl_class_code <>(310)  
							and la.STATUS NOT IN ('Closed') and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t7bis()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select distinct

									count(ln.RIM_NO) 'nb'
								
								
								from ln_acct ln, rm_acct rm, ad_gb_rsm rsm
								where ln.RIM_NO=rm.rim_no
								and rsm.employee_id=rm.rsm_id
								and rsm.empl_class_code <>(310)  
								and ln.STATUS  IN ('Active') and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t8()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select 

									count(rm.rim_no) 'nb'


									from LA_ACCT la ,rm_acct rm
									where la.status in ('Pending','Reviewed')
									and rm.rim_no=la.RIM_NO
									and rm.branch_no<>la.BRANCH_NO and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t9()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select distinct 
									count(la.rim_no) 'nb'
									


									FROM ln_history lw, ln_acct la, ad_gb_branch br, rm_acct rm
									where lw.acct_no=la.acct_no
									and rm.rim_no=la.rim_no
									and rm.branch_no=br.branch_no
									and (lw.tfr_acct_no not in (select d.acct_no from dp_acct d where d.rim_no=la.rim_no))
									and tfr_acct_type like 'CT'and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t10()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = "select 
								count(ln.rim_no) 'nb'


								from ln_acct ln,Gb_auto_tfr tf,ad_gb_rsm rsm,rm_acct rm,ln_pmt_schedule sch
								where ln.rim_no=rm.rim_no 
								and tf.allow_partial is null 
								and ln.acct_no=tf.tfr_acct_no
								and rsm.employee_id=ln.empl_id
								and ln.status in ('Active')
								and ln.acct_no = sch.acct_no
								and tf.status in ('Active')and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t11()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " Select distinct
										   count(rim.rim_no) 'nb'
										
										 from rm_acct rim,ln_acct p, ad_gb_branch br
										 where p.rsm_id<>rim.rsm_id
										 and rim.branch_no=br.branch_no
										 and  rim.rim_no=p.rim_no
										 and p.status IN ('Active')
										 and p.class_code NOT IN (591)
											and rim.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t12()
				{
								$agence=$_GET['agence'];
								include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " sELECT 
									 count(rm.rim_no) 'nb'
									

									FROM ln_acct l, rm_acct rm, ad_gb_branch br
									where l.rim_no=rm.rim_no
									and rm.branch_no=br.branch_no
									and l.status='incomplete'
									and (datediff(day,(l.effective_dt),dateadd(day,1,(select last_to_dt from ov_control)))) < 30
									and (datediff(day,(l.effective_dt),dateadd(day,1,(select last_to_dt from ov_control)))) > 7
									and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t13()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select distinct

										 count(cl.rim_no) 'nb'
										
										from ad_gb_branch br, ad_gb_rsm cp, ln_acct cr, rm_address ad, rm_acct cl, ln_pmt_schedule sh, ln_display dp
										where br.branch_no = cl.branch_no
										and cp.employee_id = cr.rsm_id
										and cl.rim_no = cr.rim_no
										and cr.rim_no = ad.rim_no
										and cr.acct_no = sh.acct_no
										and cr.acct_no = dp.acct_no
										and ad.addr_id = 1
										and cr.status ='active'
										and ((convert(char(12),dp.mat_dt,3) in (select convert(char(12),holiday_dt,3) from ov_holiday  where holiday_dt > (select dateadd(day,1,last_to_dt) from ov_control))) or (datepart(caldayofweek,dp.mat_dt) in (7)))
										and datediff (day,cr.effective_dt,getdate())<=30
										and cl.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t14()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select 
													 count(rm.rim_no) 'nb'


													from rm_acct rm,ad_gb_rsm rsm , dp_acct dp
													where rm.empl_id = rsm.employee_id
													and dp.rim_no = rm.rim_no
													and (select count(*) from dp_acct where rim_no = rm.rim_no and status in ('active'))>1
													and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t15()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " SELECT 
											count(dp.rim_no) 'nb'


											from dp_acct dp ,ln_acct ln
											where dp.rim_no = ln.rim_no
											and dp.status in ('Active') 
											and ln.status in ('Closed')
											and ln.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t17()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select 
											count(rm.rim_no) 'nb'


											from rm_acct rm,dp_acct dp,gb_map_acct_rel rel
											where 
												rm.rim_no not in (select rel_rim_no from rm_rel  )
											and rm.rim_no not in (select rim_no from rm_rel )
											and (select count(*) from gb_map_acct_rel where rm.rim_no=rim_no and rel_id<>1 and acct_type='CT' )>0
											and dp.rim_no=rm.rim_no
											and dp.status in ('Active')
											and rm.rim_no=rel.rim_no
											and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t18()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select  
												count(rm.rim_no) 'nb'

												from gb_map_acct_rel rel,dp_acct dp,rm_acct rm,rm_fin_stmt stmt,ad_rm_cls cls,ad_rm_stmt_cat cat
												where  rel.acct_no = dp.acct_no
												and rel.rim_no = rm.rim_no
												and stmt.category_id =49
												and stmt.rim_no = dp.rim_no
												and rm.class_code = 120
												and rm.status='Active'
												and cls.class_code=rm.class_code
												and cat.category_id=stmt.category_id
												and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t19()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select (select 
														count(rm.rim_no) 

														from rm_acct rm,ln_acct ln
														where 
														rm.tax_office not in ('0111','1111','1121','1141','2121','2429','2331','2221','3113','4115','6142','9313','7242','2144','8291','5231','3431','7442','2442','6111','7344','2455','5159'
														,'3415','5149','3465','9911','9912','9913') 
														and ln.rim_no = rm.rim_no
														and ln.status = 'Active' and rm.branch_no=".$agence.")
														+


														(select 
														count(rm.rim_no) 
														from rm_acct rm,la_acct la  
														where 
														rm.tax_office not in ('0111','1111','1121','1141','2121','2429','2331','2221','3113','4115','6142','9313','7242','2144','8291','5231','3431','7442','2442','6111','7344','2455','5159'
														,'3415','5149','3465','9911','9912','9913') 
														and la.rim_no = rm.rim_no
														and la.status in  ('Pending','Reviewed','Approved') and rm.branch_no=".$agence.") 'nb'
														 ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t20()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select 
									count(rm.rim_no) 'nb'
									
									from rm_acct rm
									where rm.citizenship ='TN'
									and rm.ident_id<>20
									and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
				/*______________________________________*/
				function t21()
				{
								$agence=$_GET['agence'];include('database.php');
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql = " select 
									count(rm.rim_no) 'nb'
									
									from rm_acct rm
									where rm.citizenship <>'TN'
									and rm.ident_id<>20
									and rm.branch_no=".$agence." ";

				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row){
					$return[]=array('nb'=>$row['nb'],
									);
				}
				return $return;
				Database::disconnect();
				}
?>