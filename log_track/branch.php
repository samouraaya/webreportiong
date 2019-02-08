<?php ini_set("display_errors",0); 
							include('../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
echo "<select>";
	echo "<option value=''>---Choisissez une Agence---</option>";
		$query="SELECT DISTINCT agence FROM USER order by agence ";
		$del = $pdo->prepare("SELECT DISTINCT agence FROM USER order by agence  " );
		$del->execute();
		$count = $del->rowCount();
		$result = $pdo->query($query);
		$numresult=$count;
			foreach ($pdo->query($query) as $row)
			{
			$i++; if ($i<=$count)
			{
			echo "<option value='$row[agence]'>$row[agence]</option>";
			}
			}
echo "</select>";


?>