<?php	
	Function fn_histo_cc_chart_vl()
				{
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$id=$_GET['cc'];
							$namecc="SELECT  DISTINCT NAMEEMPL FROM disbursment_history WHERE IDEMPL=".$id."";
							$result = $pdo->query($namecc)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row1)
							$NomCC=$row1['NAMEEMPL'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $NomCC;
							
							$sql = "SELECT 12 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND IDEMPL=".$id."
UNION
SELECT 11 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 AND IDEMPL=".$id."
UNION
SELECT 10 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 AND IDEMPL=".$id."
UNION
SELECT 9 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 AND IDEMPL=".$id."
UNION
SELECT 8 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND IDEMPL=".$id."
UNION
SELECT 7 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND IDEMPL=".$id."
UNION
SELECT 6 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND IDEMPL=".$id."
UNION
SELECT 5 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND IDEMPL=".$id."
UNION
SELECT 4 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND IDEMPL=".$id."
UNION
SELECT 3 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND IDEMPL=".$id."
UNION
SELECT 2 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND IDEMPL=".$id."
UNION
SELECT 1 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND IDEMPL=".$id."

ORDER BY m
								";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
						$data3=array_merge($data3,$interagence);
						
					}
				$data2['data']=$data3;
				$return=array_merge($data1,$data2);
				array_push($json,$return);

				header('Content-type: application/json');
				echo json_encode($json);
				Database::disconnect();
			}
	Function fn_histo_cc_chart_nbr()
				{
							include('../../../cnx/database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$id=$_GET['cc'];
							$namecc="SELECT  DISTINCT NAMEEMPL FROM disbursment_history WHERE IDEMPL=".$id."";
							$result = $pdo->query($namecc)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row1)
							$NomCC=$row1['NAMEEMPL'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $NomCC;
							
							$sql = "SELECT 12 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND IDEMPL=".$id."
UNION
SELECT 11 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 AND IDEMPL=".$id."
UNION
SELECT 10 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 AND IDEMPL=".$id."
UNION
SELECT 9 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 AND IDEMPL=".$id."
UNION
SELECT 8 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND IDEMPL=".$id."
UNION
SELECT 7 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND IDEMPL=".$id."
UNION
SELECT 6 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND IDEMPL=".$id."
UNION
SELECT 5 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND IDEMPL=".$id."
UNION
SELECT 4 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND IDEMPL=".$id."
UNION
SELECT 3 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND IDEMPL=".$id."
UNION
SELECT 2 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND IDEMPL=".$id."
UNION
SELECT 1 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND IDEMPL=".$id."

ORDER BY m
								";
				$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
						$data3=array_merge($data3,$interagence);
						
					}
				$data2['data']=$data3;
				$return=array_merge($data1,$data2);
				array_push($json,$return);

				header('Content-type: application/json');
				echo json_encode($json);
				Database::disconnect();
			}
?>