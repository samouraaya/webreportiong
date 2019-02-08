<?php ini_set("display_errors",0); 
							include('../../cnx/database.php');
							$pdo = Database3::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
echo "<select>";
echo "<option value=''>---Choisissez un RSM---</option>";
		$query="SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'

FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
AND CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`) ";
		$del = $pdo->prepare("SELECT CONCAT(v3.`last_name`,' ', v3.`first_name`) 'name'

FROM `vtiger_users` v3,vtiger_user2role v2
WHERE v2.roleid='H15'
AND v2.userid=v3.id
AND v3.status='Active' 
AND CONCAT(v3.`last_name`,' ', v3.`first_name`) <> '. Doublon'
ORDER BY CONCAT(v3.`last_name`,' ', v3.`first_name`)  " );
		$del->execute();
		$count = $del->rowCount();
		$result = $pdo->query($query);
		$numresult=$count;
			foreach ($pdo->query($query) as $row)
			{
			 if ($i<$count)
			{
			echo "<option value='$row[name]'>$row[name]</option>";
			}
			$i++;
			}
echo "</select>";


?>