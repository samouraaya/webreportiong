<?php 
							
				include('database.php');
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				
				echo "<select>";
				$sql = "select branch_no,substring(name_1,4,len(name_1)) 'name' from ad_gb_branch where status='active'";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row)
				{
					echo "<option value='$row[branch_no]'>$row[name]</option>";
				}
				echo "</select>";
				Database::disconnect();
?>