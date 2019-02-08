<?php 

include('../cnx/database.php');
	$pdo1 = Database1::connect();
	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				

$sql = "select * from objectif_all order by year,month";

$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('obj_nb_month_dis'=>$row['obj_nb_month_dis'],
					'obj_vl_month_dis'=>number_format($row['obj_vl_month_dis'],0,',',' '),
					'obj_nb_year_dis'=>$row['obj_nb_year_dis'],
                    'obj_vl_year_dis'=>number_format($row['obj_vl_year_dis'],0,',',' '),
                    'obj_nb_out'=>$row['obj_nb_out'],
                    'obj_vl_out'=>number_format($row['obj_vl_out'],0,',',' '),
					'month'=>$row['month'],
					'year'=>$row['year'],
					'rsm'=>$row['rsm'],
					'date_import'=>$row['date_import']);
}
header('Content-type: application/json');
echo json_encode($return);

?>