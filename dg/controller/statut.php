<?php ini_set("display_errors",0); 
							include('../../cnx/database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
echo "<select>";
		$query="select distinct status from ln_acct where status not in ('Icomplete','closed')";
		$del = $pdo->prepare("select distinct status from ln_acct where status not in ('Incomplete','closed') " );
		$del->execute();
		$count = $del->rowCount();
		$result = $pdo->query($query);
		$numresult=$count;
			foreach ($pdo->query($query) as $row)
			{
			 if ($i<$count)
			{
			echo "<option value='$row[status]'>$row[status]</option>";
			}
			$i++;
			}
echo "</select>";


?>