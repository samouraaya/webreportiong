<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Indicator Importation - Manager</title>
	
	<link rel="stylesheet" href="Assets/css/bootstrap.css">
	<link rel="stylesheet" href="Assets/css/ui.jqgrid-bootstrap.css">
    <link rel="stylesheet" href="Assets/css/datepicker.css">
	<link rel="stylesheet" href="Assets/css/sweet-alert.css" type="text/css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" type="text/css">
	
	<script type="text/javascript" src="Assets/js/jquery-1.11.0.min.js"></script> 
    <script type="text/javascript" src="Assets/js/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="Assets/js/i18n/grid.locale-fr.js"></script>
    <script type="text/javascript" src="Assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[-1], ["All"]],
		"paging":   false,
        "ordering": false,
        "info":     false,
		"bFilter": false
    } );
} );
	</script>
</head>





<body>
<div class="container">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
            <tr>
				<th>Row Number</th>
                <th>ID CRO</th>
                <th>Name CRO</th>
                <th>Objective</th>
				<th>Error</th>
            </tr>
        </thead>
		 <tbody>
<?php		
				include('database.php');
				$pdo1 = Database2::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				
	if (isset($_POST['submit'])) 
	{
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) 
	{
		
	}
	$sql2="TRUNCATE TABLE indicator_CRO ";
	$pdo1->exec($sql2);
	$compteur=0;
	$bug_column=0;
	$length_file=count(file($_FILES['filename']['tmp_name']));
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	while (($champs = fgetcsv($handle, 1000, ";")) !== FALSE) {
		
				if(count($champs)==3) 
		{
			if ((!empty($champs[0])) and (!empty($champs[1])) and (!empty($champs[2])))
				{
						$id_cro= $champs[0];
                        $name_cro = $champs[1];
                        $volume = $champs[2];
						
					IF($compteur>0)
					{
						
						
						/**********Check Type************/
						$id_cro_type=is_numeric($id_cro);
						$name_cro_type=is_numeric($name_cro);
						$volume_type=is_numeric($volume);
						/******************************/
						
						/****************BEGIN Duplicate Error***************/
						$check_exist="SELECT count(*) FROM indicator_cro where id_cro=".$id_cro."";
						$prep1 = $pdo1->prepare($check_exist);
						$prep1->execute();
						$dublicate_error=0;
						while ($row1 = $prep1->fetch())
						{	
							if($row1[0]==1)
							{   
								$dublicate_error=1;
								break;
							}
						}
						/****************END Duplicate Error***************/
						
						/****************BEGIN Existance CRO Error***************/
						$exist_user="SELECT COUNT(*) FROM USER WHERE iduser=".$id_cro."";
						$prep1 = $pdo1->prepare($exist_user);
						$prep1->execute();
						$exist_cro=0;
						while ($row1 = $prep1->fetch())
						{	
							if($row1[0]==1)
							{   
								$exist_cro=1;
								break;
							}
						}
						/****************END Existance CRO Error***************/

				if ($exist_cro==1)
					{		
					if ($dublicate_error==0)
					{
						if (($id_cro_type==1) and ($name_cro_type==0)and ($volume_type==1))
						{
						$sql2="insert into indicator_CRO (`id_cro`,`name_cro`,`volume`)VALUES (".$id_cro.",'".$name_cro."',".$volume.")";
						$query=$pdo1->exec($sql2);
						$compteur=$compteur+1;
						echo '<tr>
                <td  >'.$compteur.'</td>
				<td  >'.$id_cro.'</td>
                <td  >'.$name_cro.'</td>
                <td  >'.$volume.'</td>
				<td  > - </td>
            </tr>';
						}
						else 
						{
						$compteur=$compteur+1;	
						echo '<tr>
				<td bgcolor="#ff4040">'.$compteur.'</td>
                <td bgcolor="#ff4040">'.$id_cro.'</td>
                <td bgcolor="#ff4040">'.$name_cro.'</td>
                <td bgcolor="#ff4040"> '.$volume.'</td>
				<td bgcolor="#ff4040"> Type Value Error</td>
            </tr>';	
						}
					}
					else 
					{
						$compteur=$compteur+1;	
						echo '<tr>
						<td bgcolor="#ff4040">'.$compteur.'</td>
						<td bgcolor="#ff4040">'.$id_cro.'</td>
						<td bgcolor="#ff4040">'.$name_cro.'</td>
						<td bgcolor="#ff4040"> '.$volume.'</td>
						<td bgcolor="#ff4040"> Dublicate CRO ID</td>
					</tr>';
					}
					}
				else 
				{
					$compteur=$compteur+1;	
						echo '<tr>
						<td bgcolor="#ff4040">'.$compteur.'</td>
						<td bgcolor="#ff4040">'.$id_cro.'</td>
						<td bgcolor="#ff4040">'.$name_cro.'</td>
						<td bgcolor="#ff4040"> '.$volume.'</td>
						<td bgcolor="#ff4040"> CRO Not Exist in database users</td>
					</tr>';
				}
					
					}
					
					else 
					{
					$compteur=$compteur+1;	
					}
					}
					else {
					$compteur=$compteur+1;	
					echo '<tr>
						<td bgcolor="#ff4040">'.$compteur.'</td>
						<td bgcolor="#ff4040"></td>
						<td bgcolor="#ff4040"></td>
						<td bgcolor="#ff4040"></td>
						<td bgcolor="#ff4040"> One or many colomus is empty</td>
					</tr>';}
		}
		else 
		{
			$bug_column=1;
			echo '<tr>
				<td colspan=5 bgcolor="#ff4040"><b>Failed, check the Number of column in the file uploaded</b></td>
            </tr>';
			break;
		}
	}
				

	fclose($handle);
	}
	
?>
</tbody>
</table>
<div>
</body>
</html>