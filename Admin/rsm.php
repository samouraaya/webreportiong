<?php //ini_set("display_errors",0); 
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
echo "<select>";
echo "<option value=''>---Choisissez un RSM---</option>";
		$query="SELECT DISTINCT name FROM user WHERE  status='Active' ORDER BY name ";
		$del = $pdo->prepare("SELECT DISTINCT name FROM user WHERE   status='Active' ORDER BY name  " );
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