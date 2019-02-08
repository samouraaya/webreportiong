<?php			
				setlocale(LC_ALL,'fr_FR.UTF-8');
				session_start();

				include('database.php');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
	$sql="SELECT user_name,employee_id,name,cls.description,rsm.empl_class_code,rsm.branch_no,rsm.create_dt,rsm.status
				from ad_gb_rsm rsm,ad_gb_rsm_cls cls where  cls.empl_class_code = rsm.empl_class_code";
	$prep = $pdo1->prepare($sql);
	$prep->execute();
		while ($row = $prep->fetch()) 
		{ 	
		
		  
			$sql1="SELECT iduser from user ";
			$prep1 = $pdo->prepare($sql1);
			$prep1->execute();
			$res=null;
			while ($row1 = $prep1->fetch())
			{	
				if($row[1]==$row1[0])
				{   
					$res=1;
					break;

				}
				
				else {
					$iduser=$row[1];
					$res=0;
					
				}
			}
			if ($res==0)
				
			{		
					$row[3]=iconv("UTF-8", "ISO-8859-1//IGNORE",$row[3]);
					$row[3]=htmlspecialchars($row[3], ENT_QUOTES );
					echo $row[3];
					$pwd='advans';
					$sql2="insert into user (`iduser`,`user`,`name`,`mdp`,`fonction`,`classcode`,`agence`,`create_dt`,`status`) 
									VALUES('$row[1]','$row[0]','$row[2]',md5('".$pwd."'),'".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$row[7]."')";
					$pdo->exec($sql2);
					$sql2="UPDATE USER SET STATUS=REPLACE(STATUS,' ','')";
					$pdo->exec($sql2);	
					$sql2="UPDATE USER SET user=REPLACE(user,' ','')";
					$pdo->exec($sql2);	
			}
			else 
			{			
					$row[3]=iconv("UTF-8", "ISO-8859-1//IGNORE",$row[3]);
					$row[3]=htmlspecialchars($row[3], ENT_QUOTES );
					$sql2="update `user` set  status='".$row[7]."',`name`='".$row[2]."' where `iduser`='$row[1]'";
					$pdo->exec($sql2);
					$sql2="UPDATE USER SET STATUS=REPLACE(STATUS,' ','')";
					$pdo->exec($sql2);
			}
					
			}
			
//header('Content-type: application/json');
//echo json_encode($return);
?>
