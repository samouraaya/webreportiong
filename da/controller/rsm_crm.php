<?php 
							include('../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database3::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];

		$query="SELECT DISTINCT NAME,iduser FROM USER WHERE classcode IN (310,400,520)  AND STATUS='Active' and agence=".$agence." order by name";
		$array_rsm=array();
			foreach ($pdo->query($query) as $row)
			{

			$query1="SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'
FROM `vtiger_users` v3,vtiger_user2role v2,vtiger_crm_orbit_user_ref ref
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
AND ref.`id_orbit`
AND ref.`id_orbit`=".$row['iduser']."
AND ref.id_crm = v2.userid
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)";


			foreach ($pdo1->query($query1) as $row1)
			{
			array_push($array_rsm, $row1['name']);
			}
			}
//print_r($array_rsm);
echo "<select>";
		echo "<option value=''>---Choisissez un RSM---</option>";
foreach ($array_rsm as $value) {
    echo "<option value='$value'>$value</option>";
}
echo "</select>";
?>


