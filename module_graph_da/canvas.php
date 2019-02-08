<?php	ini_set('max_execution_time', 300);
				
				Function total_dec_agence_vl ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							
							$sql = "SELECT 12 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 and branch=".$agence."
UNION
SELECT 11 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 and branch=".$agence."
UNION
SELECT 10 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 and branch=".$agence."
UNION
SELECT 9 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 and branch=".$agence."
UNION
SELECT 8 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 and branch=".$agence."
UNION
SELECT 7 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 and branch=".$agence."
UNION
SELECT 6 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 and branch=".$agence."
UNION
SELECT 5 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 and branch=".$agence."
UNION
SELECT 4 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 and branch=".$agence."
UNION
SELECT 3 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 and branch=".$agence."
UNION
SELECT 2 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 and branch=".$agence."
UNION
SELECT 1 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 and branch=".$agence."

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
				
				Function total_dec_agence_nb ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							$sql = "SELECT 12 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1  and branch=".$agence."
UNION
SELECT 11 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 and branch=".$agence."
UNION
SELECT 10 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 and branch=".$agence."
UNION
SELECT 9 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 and branch=".$agence."
UNION
SELECT 8 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 and branch=".$agence."
UNION
SELECT 7 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 and branch=".$agence."
UNION
SELECT 6 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 and branch=".$agence."
UNION
SELECT 5 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 and branch=".$agence."
UNION
SELECT 4 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 and branch=".$agence."
UNION
SELECT 3 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 and branch=".$agence."
UNION
SELECT 2 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 and branch=".$agence."
UNION
SELECT 1 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 and branch=".$agence."

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
				
				Function Moy_dec_agence_vl_br ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							$sql = "SELECT 12 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1  and branch=".$agence."
UNION
SELECT 11 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 and branch=".$agence."
UNION
SELECT 10 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 and branch=".$agence."
UNION
SELECT 9 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 and branch=".$agence."
UNION
SELECT 8 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 and branch=".$agence."
UNION
SELECT 7 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 and branch=".$agence."
UNION
SELECT 6 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 and branch=".$agence."
UNION
SELECT 5 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 and branch=".$agence."
UNION
SELECT 4 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 and branch=".$agence."
UNION
SELECT 3 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 and branch=".$agence."
UNION
SELECT 2 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 and branch=".$agence."
UNION
SELECT 1 AS m,SUM(VLDECEMPL)/SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 and branch=".$agence."

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
			
				Function total_Outstanding_vl ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							
							$sql = "SELECT 12 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1  and branch=".$agence."
UNION
SELECT 11 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 and branch=".$agence."
UNION
SELECT 10 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 and branch=".$agence."
UNION
SELECT 9 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 and branch=".$agence."
UNION
SELECT 8 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 and branch=".$agence."
UNION
SELECT 7 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 and branch=".$agence."
UNION
SELECT 6 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 and branch=".$agence."
UNION
SELECT 5 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 and branch=".$agence."
UNION
SELECT 4 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 and branch=".$agence."
UNION
SELECT 3 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 and branch=".$agence."
UNION
SELECT 2 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 and branch=".$agence."
UNION
SELECT 1 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 and branch=".$agence."

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
			
				Function total_Outstanding_nb ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							
							$sql = "SELECT 12 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1  and branch=".$agence."
UNION
SELECT 11 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2 and branch=".$agence."
UNION
SELECT 10 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3 and branch=".$agence."
UNION
SELECT 9 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4 and branch=".$agence."
UNION
SELECT 8 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 and branch=".$agence."
UNION
SELECT 7 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history 
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 and branch=".$agence."
UNION
SELECT 6 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 and branch=".$agence."
UNION
SELECT 5 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 and branch=".$agence."
UNION
SELECT 4 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 and branch=".$agence."
UNION
SELECT 3 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 and branch=".$agence."
UNION
SELECT 2 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 and branch=".$agence."
UNION
SELECT 1 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 and branch=".$agence."

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
			
				Function PAR0_Outstanding_vl_br ()
				{
							include('database.php');
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="SELECT COLUMN_NAME
											  FROM INFORMATION_SCHEMA.COLUMNS
											  WHERE table_name = 'outstanding_history'
											  AND table_schema = 'repwizweb'
											  AND COLUMN_NAME IN ('PAR0VL','PAR30VL','PAR90VL')  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo1->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$_GET['agence'];
								$data1['name'] =  str_replace('VL','',$row['COLUMN_NAME']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(".$row['COLUMN_NAME'].")/SUM(OUTSTANDING)*100 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)number_format($row1['somme'],2,'.',''));
						$data3= array_merge($data3,$interagence);
						
					}
					$data2['data']=$data3;
					$return=array_merge($data1,$data2);
					array_push($json,$return);
							}
							

				header('Content-type: application/json');
				echo json_encode($json);
				Database::disconnect();
			}
				
				Function total_demande_agence_nbr ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							
							$sql = "select  

									1 as m  ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence."  and 
															 datediff(month,application_dt,getdate())=11),0) 'somme'
									UNION

								select  

									2 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and 
															 datediff(month,application_dt,getdate())=10 and rm.branch_no=".$agence."),0) 'somme'
									UNION
    
								select 	3 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=9),0) 'somme'
                    UNION           
                  select 	4 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=8),0) 'somme'             
                    UNION           
                  select 	5 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=7),0) 'somme'  
                    UNION           
                  select 	6 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=6),0) 'somme'  
                       UNION           
                  select 	7 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=5),0) 'somme' 
                     UNION           
                  select 	8 as m,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=4),0) 'somme' 
                  UNION           
                  select 	9 as m,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=3),0) 'somme'
                  UNION           
                  select 	10 as m,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=2),0) 'somme'
                  UNION           
                  select 	11 as m,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=1),0) 'somme' 
                  UNION           
                  select 	12 as m ,isnull((select cast(count(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=0),0) 'somme'              
										order by m 
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
			
				Function total_demande_agence_moy ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$agence=$_GET['agence'];
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  $agence;
							
							$sql = "select  

									1 as m  ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence."  and 
															 datediff(month,application_dt,getdate())=11),0) 'somme'
									UNION

								select  

									2 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and
															 datediff(month,application_dt,getdate())=10 and rm.branch_no=".$agence."),0) 'somme'
									UNION
    
								select 	3 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=9),0) 'somme'
                    UNION           
                  select 	4 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=8),0) 'somme'             
                    UNION           
                  select 	5 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=7),0) 'somme'  
                    UNION           
                  select 	6 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=6),0) 'somme'  
                       UNION           
                  select 	7 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=5),0) 'somme' 
                     UNION           
                  select 	8 as m,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=4),0) 'somme' 
                  UNION           
                  select 	9 as m,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=3),0) 'somme'
                  UNION           
                  select 	10 as m,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=2),0) 'somme'
                  UNION           
                  select 	11 as m,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and 
															 datediff(month,application_dt,getdate())=1),0) 'somme' 
                  UNION           
                  select 	12 as m ,isnull((select cast(avg(cast(application_amt as decimal(10,0)))   as decimal(10,0))
															from la_acct la , rm_acct rm , ad_gb_rsm rsm
																			  where  
																			  rm.rim_no=la.rim_no 
																			  and rm.rsm_id=rsm.employee_id and rm.branch_no=".$agence." and
															 datediff(month,application_dt,getdate())=0),0) 'somme'              
										order by m
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