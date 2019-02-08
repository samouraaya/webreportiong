<?php
    include('../cnx/database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
	$obj_nb_month_dis=str_replace(" ", "",$_GET['obj_nb_month_dis']);
	$obj_vl_month_dis=str_replace(" ", "",$_GET['obj_vl_month_dis']);
	$obj_nb_year_dis=str_replace(" ", "",$_GET['obj_nb_year_dis']);
	$obj_vl_year_dis=str_replace(" ", "",$_GET['obj_vl_year_dis']);
	$obj_nb_out=str_replace(" ", "",$_GET['obj_nb_out']);
	$obj_vl_out=str_replace(" ", "",$_GET['obj_vl_out']);
	$month=$_GET['month'];
	$year=$_GET['year'];
	$rsm=$_GET['rsm'];
	
	$query1 = "SELECT count(*) 'nb' FROM `objectif_all` where  `month`=".$month." and `year`='".$year."'";
    $result = $pdo1->query($query1)->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row)
	{
		$count=$row['nb'];
	}
	
	if ($count==0)
	{
	$sql2="insert into objectif_all (`obj_nb_month_dis`,`obj_vl_month_dis`,`obj_nb_year_dis`,`obj_vl_year_dis`,`obj_nb_out`,`obj_vl_out`,`month`,`year`,`rsm`,`date_import`)
	VALUES ('".$obj_nb_month_dis."','".$obj_vl_month_dis."','".$obj_nb_year_dis."','".$obj_vl_year_dis."','".$obj_nb_out."','".$obj_vl_out."','".$month."','".$year."','".$rsm."',now())";
	$pdo1->exec($sql2);
	}
	else
	{
	$sql2="update objectif_all set 
			`obj_nb_month_dis`='".$obj_nb_month_dis."'
			,`obj_vl_month_dis`='".$obj_vl_month_dis."'
			,`obj_nb_year_dis`='".$obj_nb_year_dis."'
			,`obj_vl_year_dis`='".$obj_vl_year_dis."'
			,`obj_nb_out`='".$obj_nb_out."'
			,`obj_vl_out`='".$obj_vl_out."'
			,`rsm`='".$rsm."'
			,`date_import`=now()
			where `month`='".$month."' and `year`='".$year."'";
	$pdo1->exec($sql2);	
	}
	
	$sql3="delete from objectif_all where obj_nb_month_dis='undefined'";
	$pdo1->exec($sql3);
	
?>
