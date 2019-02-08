<?php ini_set("display_errors",0); 

function fn_rsm()
{
				include('../../../cnx/database.php');
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				

$sql = "select employee_id 'val'
      ,name 'text' from ad_gb_rsm where empl_class_code=310 and status in ('Active') order by name ";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('text'=>$row['text'],
					'val'=>$row['val'],
					);
}
header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();

}
?>