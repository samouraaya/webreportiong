<?php 
							include('../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
echo "<select>";
		$query="SELECT DISTINCT year(DATE) 'date' FROM historique";
		$del = $pdo->prepare("SELECT DISTINCT year(DATE) 'date' FROM historique " );
		$del->execute();
		$i=0;
		$count = $del->rowCount();
		$result = $pdo->query($query);
		$numresult=$count;
			foreach ($pdo->query($query) as $row)
			{
			 if ($i<$count)
			{
			echo "<option value='$row[date]'>$row[date]</option>";
			$i++;
			}
			}
echo "</select>";


?>