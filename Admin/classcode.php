<?php 
							
header('Content-Language: fr');
header('Content-Type: text/html;charset=UTF-8');
				include('database.php');
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				
				
echo "<select>";
$sql = "select empl_class_code,str_replace(str_replace(description,'è','e'),'é','e') 'description' from ad_gb_rsm_cls where status='Active'";
$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
  echo "<option value='$row[empl_class_code]'>$row[description]</option>";
}
echo "</select>";
Database::disconnect();
?>