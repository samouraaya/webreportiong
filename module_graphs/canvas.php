<?php	ini_set('max_execution_time', 300);
				
				Function total_dec_agence_vl ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  'total Advans';
							
							$sql = "SELECT 12 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 
UNION
SELECT 11 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2
UNION
SELECT 10 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3
UNION
SELECT 9 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4
UNION
SELECT 8 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5
UNION
SELECT 7 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6
UNION
SELECT 6 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7
UNION
SELECT 5 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8
UNION
SELECT 4 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9
UNION
SELECT 3 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10
UNION
SELECT 2 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11
UNION
SELECT 1 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12

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
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  'total Advans';
							$sql = "SELECT 12 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 
UNION
SELECT 11 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2
UNION
SELECT 10 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3
UNION
SELECT 9 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4
UNION
SELECT 8 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5
UNION
SELECT 7 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6
UNION
SELECT 6 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7
UNION
SELECT 5 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8
UNION
SELECT 4 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9
UNION
SELECT 3 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10
UNION
SELECT 2 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11
UNION
SELECT 1 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12

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
				
				Function total_dec_agence_vl_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active' and branch_no<>100 ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  $row['name_1'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(VLDECEMPL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_dec_agence_nb_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active' and branch_no<>100 ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  $row['name_1'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(NBDECEMPLTOTAL) 'somme' FROM disbursment_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_dec_produit ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select class_code 'produit',substring(description,7,len(description)) 'description' from ad_ln_cls";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$classcode=$row['produit'];
								$data1['name'] =  $row['description'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND CLASS_CODE=".$classcode."
UNION
SELECT 11 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND CLASS_CODE=".$classcode."
UNION
SELECT 10 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND CLASS_CODE=".$classcode."
UNION
SELECT 9 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND CLASS_CODE=".$classcode."
UNION
SELECT 8 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND CLASS_CODE=".$classcode."
UNION
SELECT 7 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND CLASS_CODE=".$classcode."
UNION
SELECT 6 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND CLASS_CODE=".$classcode."
UNION
SELECT 5 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND CLASS_CODE=".$classcode."
UNION
SELECT 4 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND CLASS_CODE=".$classcode."
UNION
SELECT 3 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND CLASS_CODE=".$classcode."
UNION
SELECT 2 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND CLASS_CODE=".$classcode."
UNION
SELECT 1 AS m,SUM(NUMDECCLS) 'somme' FROM disbursement_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND CLASS_CODE=".$classcode."

ORDER BY m
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_Outstanding_vl ()
				{
							include('database.php');
							$pdo = Database1::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  'total Advans';
							
							$sql = "SELECT 12 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 
UNION
SELECT 11 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2
UNION
SELECT 10 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3
UNION
SELECT 9 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4
UNION
SELECT 8 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5
UNION
SELECT 7 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6
UNION
SELECT 6 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7
UNION
SELECT 5 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8
UNION
SELECT 4 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9
UNION
SELECT 3 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10
UNION
SELECT 2 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11
UNION
SELECT 1 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12

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
							$data3=array();
							$data1=array();
							$json=array();
							$data1['name'] =  'total Advans';
							
							$sql = "SELECT 12 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 
UNION
SELECT 11 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2
UNION
SELECT 10 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3
UNION
SELECT 9 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4
UNION
SELECT 8 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5
UNION
SELECT 7 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6
UNION
SELECT 6 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7
UNION
SELECT 5 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8
UNION
SELECT 4 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9
UNION
SELECT 3 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10
UNION
SELECT 2 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11
UNION
SELECT 1 AS m,SUM(OUTSTANDINGNB) 'somme' FROM OUTSTANDING_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12

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
			
				Function total_Outstanding_vl_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active' and branch_no<>100 ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  $row['name_1'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(OUTSTANDING) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_Outstanding_nb_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active' and branch_no<>100 ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  $row['name_1'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(OUTSTANDINGNB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_outsanding_produit_nbr ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select class_code 'produit',substring(description,7,len(description)) 'description' from ad_ln_cls";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$classcode=$row['produit'];
								$data1['name'] =  $row['description'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND CLASS=".$classcode."
UNION
SELECT 11 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND CLASS=".$classcode."
UNION
SELECT 10 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND CLASS=".$classcode."
UNION
SELECT 9 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND CLASS=".$classcode."
UNION
SELECT 8 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND CLASS=".$classcode."
UNION
SELECT 7 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND CLASS=".$classcode."
UNION
SELECT 6 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND CLASS=".$classcode."
UNION
SELECT 5 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND CLASS=".$classcode."
UNION
SELECT 4 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND CLASS=".$classcode."
UNION
SELECT 3 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND CLASS=".$classcode."
UNION
SELECT 2 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND CLASS=".$classcode."
UNION
SELECT 1 AS m,SUM(NBENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND CLASS=".$classcode."

ORDER BY m
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function total_outsanding_produit_vl ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select class_code 'produit',substring(description,7,len(description)) 'description' from ad_ln_cls";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$classcode=$row['produit'];
								$data1['name'] =  $row['description'];
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND CLASS=".$classcode."
UNION
SELECT 11 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND CLASS=".$classcode."
UNION
SELECT 10 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND CLASS=".$classcode."
UNION
SELECT 9 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND CLASS=".$classcode."
UNION
SELECT 8 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND CLASS=".$classcode."
UNION
SELECT 7 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND CLASS=".$classcode."
UNION
SELECT 6 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND CLASS=".$classcode."
UNION
SELECT 5 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND CLASS=".$classcode."
UNION
SELECT 4 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND CLASS=".$classcode."
UNION
SELECT 3 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND CLASS=".$classcode."
UNION
SELECT 2 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND CLASS=".$classcode."
UNION
SELECT 1 AS m,SUM(ENCOURS) 'somme' FROM outstanding_history_ln_type
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND CLASS=".$classcode."

ORDER BY m
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function PAR0_Outstanding_vl_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR0VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
				Function PAR0_Outstanding_nb_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR0NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
				Function PAR30_Outstanding_vl_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR30VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
				Function PAR30_Outstanding_nb_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR30NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
				Function PAR90_Outstanding_vl_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR90VL) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
				Function PAR90_Outstanding_nb_br ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select name_1,branch_no 'agence' from ad_gb_branch where status='Active'  ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$agence=$row['agence'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['name_1']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND BRANCH=".$agence."
UNION
SELECT 11 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND BRANCH=".$agence."
UNION
SELECT 10 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND BRANCH=".$agence."
UNION
SELECT 9 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND BRANCH=".$agence."
UNION
SELECT 8 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND BRANCH=".$agence."
UNION
SELECT 7 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND BRANCH=".$agence."
UNION
SELECT 6 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND BRANCH=".$agence."
UNION
SELECT 5 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND BRANCH=".$agence."
UNION
SELECT 4 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND BRANCH=".$agence."
UNION
SELECT 3 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND BRANCH=".$agence."
UNION
SELECT 2 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND BRANCH=".$agence."
UNION
SELECT 1 AS m,SUM(PAR90NB) 'somme' FROM outstanding_history
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND BRANCH=".$agence."

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((int)$row1['somme']);
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
			
				Function PAR0_Outstanding_per_SEX ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select distinct SEX from rm_acct ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SEX=$row['SEX'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['SEX']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SEX='".$SEX."'
UNION
SELECT 11 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SEX='".$SEX."'
UNION
SELECT 10 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SEX='".$SEX."'
UNION
SELECT 9 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SEX='".$SEX."'
UNION
SELECT 8 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SEX='".$SEX."'
UNION
SELECT 7 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SEX='".$SEX."'
UNION
SELECT 6 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SEX='".$SEX."'
UNION
SELECT 5 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SEX='".$SEX."'
UNION
SELECT 4 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SEX='".$SEX."'
UNION
SELECT 3 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SEX='".$SEX."'
UNION
SELECT 2 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SEX='".$SEX."'
UNION
SELECT 1 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SEX='".$SEX."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
				Function PAR30_Outstanding_per_SEX ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select distinct SEX from rm_acct ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SEX=$row['SEX'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['SEX']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SEX='".$SEX."'
UNION
SELECT 11 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SEX='".$SEX."'
UNION
SELECT 10 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SEX='".$SEX."'
UNION
SELECT 9 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SEX='".$SEX."'
UNION
SELECT 8 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SEX='".$SEX."'
UNION
SELECT 7 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SEX='".$SEX."'
UNION
SELECT 6 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SEX='".$SEX."'
UNION
SELECT 5 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SEX='".$SEX."'
UNION
SELECT 4 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SEX='".$SEX."'
UNION
SELECT 3 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SEX='".$SEX."'
UNION
SELECT 2 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SEX='".$SEX."'
UNION
SELECT 1 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SEX='".$SEX."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
				Function PAR90_Outstanding_per_SEX ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select distinct SEX from rm_acct ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SEX=$row['SEX'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['SEX']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SEX='".$SEX."'
UNION
SELECT 11 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SEX='".$SEX."'
UNION
SELECT 10 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SEX='".$SEX."'
UNION
SELECT 9 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SEX='".$SEX."'
UNION
SELECT 8 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SEX='".$SEX."'
UNION
SELECT 7 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SEX='".$SEX."'
UNION
SELECT 6 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SEX='".$SEX."'
UNION
SELECT 5 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SEX='".$SEX."'
UNION
SELECT 4 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SEX='".$SEX."'
UNION
SELECT 3 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SEX='".$SEX."'
UNION
SELECT 2 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SEX='".$SEX."'
UNION
SELECT 1 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_genre
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SEX='".$SEX."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
				Function PAR0_Outstanding_per_SIC ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select sic_code,description from ad_gb_sic ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SICODE=$row['sic_code'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['description']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SICODE='".$SICODE."'
UNION
SELECT 11 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SICODE='".$SICODE."'
UNION
SELECT 10 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SICODE='".$SICODE."'
UNION
SELECT 9 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SICODE='".$SICODE."'
UNION
SELECT 8 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SICODE='".$SICODE."'
UNION
SELECT 7 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SICODE='".$SICODE."'
UNION
SELECT 6 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SICODE='".$SICODE."'
UNION
SELECT 5 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SICODE='".$SICODE."'
UNION
SELECT 4 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SICODE='".$SICODE."'
UNION
SELECT 3 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SICODE='".$SICODE."'
UNION
SELECT 2 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SICODE='".$SICODE."'
UNION
SELECT 1 AS m,cast(((PAR0VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SICODE='".$SICODE."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
				Function PAR30_Outstanding_per_SIC ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select sic_code,description from ad_gb_sic ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SICODE=$row['sic_code'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['description']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SICODE='".$SICODE."'
UNION
SELECT 11 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SICODE='".$SICODE."'
UNION
SELECT 10 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SICODE='".$SICODE."'
UNION
SELECT 9 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SICODE='".$SICODE."'
UNION
SELECT 8 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SICODE='".$SICODE."'
UNION
SELECT 7 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SICODE='".$SICODE."'
UNION
SELECT 6 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SICODE='".$SICODE."'
UNION
SELECT 5 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SICODE='".$SICODE."'
UNION
SELECT 4 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SICODE='".$SICODE."'
UNION
SELECT 3 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SICODE='".$SICODE."'
UNION
SELECT 2 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SICODE='".$SICODE."'
UNION
SELECT 1 AS m,cast(((PAR30VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SICODE='".$SICODE."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
				Function PAR90_Outstanding_per_SIC ()
				{
							include('database.php');
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo1 = Database1::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$branch="select sic_code,description from ad_gb_sic ";
							$json=array();
							$data1 = array();
							$data2 = array();
							$resultbranch = $pdo->query($branch)->fetchAll(PDO::FETCH_ASSOC);
							foreach ($resultbranch as $row)
							{
								$SICODE=$row['sic_code'];
								$data1['name'] =  iconv("UTF-8", "ISO-8859-1//IGNORE", $row['description']);
								$interagence = array();
								$data3 = array();
								$sql = "SELECT 12 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=1 AND SICODE='".$SICODE."'
UNION
SELECT 11 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=2  AND SICODE='".$SICODE."'
UNION
SELECT 10 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=3  AND SICODE='".$SICODE."'
UNION
SELECT 9 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=4  AND SICODE='".$SICODE."'
UNION
SELECT 8 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=5 AND SICODE='".$SICODE."'
UNION
SELECT 7 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=6 AND SICODE='".$SICODE."'
UNION
SELECT 6 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=7 AND SICODE='".$SICODE."'
UNION
SELECT 5 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=8 AND SICODE='".$SICODE."'
UNION
SELECT 4 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=9 AND SICODE='".$SICODE."'
UNION
SELECT 3 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=10 AND SICODE='".$SICODE."'
UNION
SELECT 2 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=11 AND SICODE='".$SICODE."'
UNION
SELECT 1 AS m,cast(((PAR90VL*100)/ENCOURS) as decimal(10,3)) 'somme' FROM outstanding_sic
WHERE PERIOD_DIFF(SUBSTRING(REPLACE(CAST(NOW() AS DATE),'-',''),1,6),SUBSTRING(REPLACE(CAST(MONTH AS DATE),'-',''),1,6))=12 AND SICODE='".$SICODE."'

ORDER BY m 
								";
				$result = $pdo1->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row1)
				{
						$interagence= array((float)$row1['somme']);
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
			
?>