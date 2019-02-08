<?php ini_set("display_errors",0); 

	/*
	Fonction pour retourner le nombre des demandes en statut pending 
	*/	
	
	function nb_la_pending()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select  count(la_acct.acct_no) 'nb'
									from la_acct
									where  datediff(day,la_acct.application_dt,getdate())<90
									and la_acct.status in ('pending') ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des demandes qui sont en statut pending >10 J
	*/
	
	function nb_la_pending_10()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select  count(la_acct.acct_no) 'nb'
									from la_acct
									where datediff(day,la_acct.application_dt,getdate())<90
									and datediff(day,la_acct.application_dt,getdate())>10
									and la_acct.status in ('pending')";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner l'heure du dernier batch executé
	*/
	
	function heure_batch()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql="select cast(max(gb.create_dt) as DATETIME)'date'  from gb_audit gb,gb_batch b where gb.table_name like '%gb_batch%'
							and    gb.column_name like '%status%' 
							and    gb.new_value like '%Active%'
							and b.ptid = gb.table_ptid
							and b.description like '%batch%'
							and datediff(day,gb.create_dt,getdate()) between 0 and 1";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['date']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des décaissement de ce mois
	*/
	
		function nb_decaissement_m()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select  count(ln.acct_no) 'nb'

							from ln_acct ln 
							where  datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active')";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume des décaissement de ce mois
	*/
	
		function vl_decaissement_m()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select  isnull(sum(ln.amt),0) 'nb'
							from ln_acct ln 
							where datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active')  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],0,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner la moyenne de décaissement 
	*/
	function vl_moyenne_dec()
	{
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select  isnull(sum(cast(ln.amt as decimal(32,0))),0) 'nb'
							from ln_acct ln 
							where  datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active')   ";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
							$return = array();
							foreach ($result as $row1)
							$vl=$row1['nb'];
							$sql="select  count(ln.acct_no) 'nb'

							from ln_acct ln 
							where datediff(month,(select lh.create_dt from ln_history lh
							  where lh.acct_no = ln.acct_no and lh.tran_code = 350 
							  and lh.reversal = 0
							  ) ,getdate())=0 
							and ln.status in ('Active')   
							";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				
							foreach ($result as $row1)
							$nb=$row1['nb'];
				
							$moyenne=number_format(($vl/$nb),0,' ',' ');
							$return[]=array('nb'=>$moyenne);
							header('Content-type: application/json');
							echo json_encode($return);
							Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des clients actives
	*/
	
	function nb_clt()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
								$sql = "select count(acct_no) 'nb' 
from ln_acct ln
where ln.status not in ('closed','Incomplete','Active charge-off')
								";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume d'encours
	*/
	
	function vl_clt()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select sum(dis.cur_bal) 'nb' 
from ln_display dis
where  dis.status not in ('closed','Incomplete','Active charge-off')

							  ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre du PAR0
	*/
	
	function par0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql="select  
								count(dis.cur_bal) 'nb'
								from ln_display dis,ov_control ov
								where dis.status not in ('closed','Incomplete','Active charge-off')
								and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
								   ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume du PAR0
	*/
	
	function volpar0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql="select  

							sum(dis.cur_bal) 'nb'

							from  ln_display dis,ov_control ov
							where dis.status not in ('closed','Incomplete','Active charge-off')
							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
							   
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre des impayés de pénalités
	*/
	
	function impaye_penal()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql="select 
							count(dis.acct_no) 'nb' from ln_display dis,ln_bill bill
							where dis.delq_dt is null 
							and bill.acct_no=dis.acct_no
							and dis.status not in ('closed','Incomplete','Active charge-off') 
							and bill.sub_no=3
							and bill.status='Unsatisfied'
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le volume du PAR0
	*/
	
	function vlpar30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql="select  

							sum(dis.cur_bal) 'nb'

							from  ln_display dis,ov_control ov
							where dis.status not in ('closed','Incomplete','Active charge-off')
							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
							   
							";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>number_format($row1['nb'],3,'.',' '));
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner le nombre du PAR30
	*/
	
	function par30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql="select  

							count(dis.cur_bal) 'nb'

							from  ln_display dis,ov_control ov
							where dis.status not in ('closed','Incomplete','Active charge-off')
							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
								   ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$return[]=array('nb'=>$row1['nb']);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner % du PAR0
	*/
	
	function per_par0()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 
							$sql = "select sum(dis.cur_bal) 'encours' from ln_display dis
							where dis.status not in ('closed','Incomplete','Active charge-off')
							    ";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
							$return = array();
							foreach ($result as $row1)
							$vl_encours=$row1['encours'];
							$sql="select  

							sum(dis.cur_bal) 'par0'

							from ln_display dis,ov_control ov
							where dis.status not in ('closed','Incomplete','Active charge-off')
							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>0
							   
							";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				
							foreach ($result as $row1)
							$vl_par0=$row1['par0'];
				
							$per_par0=number_format(($vl_par0/$vl_encours)*100,2,'.','').' %';
							$return[]=array('nb'=>$per_par0);
							header('Content-type: application/json');
							echo json_encode($return);
							Database::disconnect();
	}
	
	/*
	Fonction pour retourner % du PAR30
	*/
	
	function per_par30()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select sum(dis.cur_bal) 'encours' from ln_display dis
							where dis.status not in ('closed','Incomplete','Active charge-off')  ";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
							$return = array();
							foreach ($result as $row1)
							$vl_encours=$row1['encours'];
							$sql="select  

							sum(dis.cur_bal) 'par0'

							from ln_display dis,ov_control ov
							where dis.status not in ('closed','Incomplete','Active charge-off')
							and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt))>30
							";
							$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				
							foreach ($result as $row1)
							$vl_par0=$row1['par0'];
				
							$per_par0=number_format(($vl_par0/$vl_encours)*100,2,'.','').' %';
							$return[]=array('nb'=>$per_par0);
							header('Content-type: application/json');
							echo json_encode($return);
							Database::disconnect();
	}
?>