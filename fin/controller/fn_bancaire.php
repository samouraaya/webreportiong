<?php ini_set("display_errors",0); 

	/*
	Fonction pour retourner la % de la bancarisation 110 501
	*/	
	
	function bancaire_110_501()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=110
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=110
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner la % de la bancarisation 100 501
	*/	
	
	function bancaire_100_501()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=100
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=100
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
		/*
	Fonction pour retourner la % de la bancarisation 120 501
	*/	
	
	function bancaire_120_501()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=120
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=120
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
			/*
	Fonction pour retourner la % de la bancarisation 130 501
	*/	
	
	function bancaire_130_501()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=130
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												and rsm.branch_no=130
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 501
	*/	
	
	function bancaire_total_501()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=501
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
	
	/*
	Fonction pour retourner la % de la bancarisation 110 511
	*/	
	
	function bancaire_110_511()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=110
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=110
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner la % de la bancarisation 100 511
	*/	
	
	function bancaire_100_511()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=100
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=100
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
		/*
	Fonction pour retourner la % de la bancarisation 120 511
	*/	
	
	function bancaire_120_511()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=120
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=120
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
			/*
	Fonction pour retourner la % de la bancarisation 130 511
	*/	
	
	function bancaire_130_511()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=130
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												and rsm.branch_no=130
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 511
	*/	
	
	function bancaire_total_511()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=511
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
/*
	Fonction pour retourner la % de la bancarisation 110 521
	*/	
	
	function bancaire_110_521()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=110
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=110
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	/*
	Fonction pour retourner la % de la bancarisation 100 521
	*/	
	
	function bancaire_100_521()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=100
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=100
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
		/*
	Fonction pour retourner la % de la bancarisation 120 521
	*/	
	
	function bancaire_120_521()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=120
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=120
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
			/*
	Fonction pour retourner la % de la bancarisation 130 521
	*/	
	
	function bancaire_130_521()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=130
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												and rsm.branch_no=130
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 521
	*/	
	
	function bancaire_total_521()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and ln.class_code=521
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	
	
			/*
	Fonction pour retourner la % de la bancarisation total 100
	*/	
	
	function bancaire_total_100()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=100

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=100
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 110
	*/	
	
	function bancaire_total_110()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=110

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=110
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*110,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 120
	*/	
	
	function bancaire_total_120()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=120

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=120
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*120,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 130
	*/	
	
	function bancaire_total_130()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=130

												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and rsm.branch_no=130
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*130,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	
	
	
			/*
	Fonction pour retourner la % de la bancarisation total 100
	*/	
	
	function bancaire_total()
	{				
							include('../../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "select (select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												and bank_1 is not null 
												and bank_1_acct  is not null )'bancaire',(select 
												count(ln.acct_no)

												from rm_acct rmac,rm_personal_info rm ,ln_acct ln,ad_gb_rsm rsm  where
													rm.rim_no = ln.rim_no
												and rmac.rim_no = rm.rim_no
												and rmac.rsm_id=rsm.employee_id
												and ln.status not in ('closed','incomplete')
												) 'all' ";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				$return = array();
				foreach ($result as $row1)
				$per=number_format(($row1['bancaire']/$row1['all'])*100,2,'.','');
				$return[]=array('nb'=>$per);
				header('Content-type: application/json');
				echo json_encode($return);
				Database::disconnect();
	}	