<?php //ini_set("display_errors",0); 
/*
	Fonction pour lister les clients créés dans le mois en cours
*/
function fn_histo_global()
{
				include('../../../cnx/database.php');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$agence=$_GET['agence'];

$sql = "
SELECT 
cc 'rsm',
a.agence 'agence',
nbdec ,
vldec,
MONTH(DATE) 'Dureetrait',
YEAR(DATE) 'anne',
encours 'nbencours',
nbcredit 'nb',
par1 'somme',
(par1/encours)*100 'perpar1',
(par30/encours)*100 'perpar30',
(par90/encours)*100 'perpar90',
par30 'somencours',
par90 'par90'
FROM historique a ,USER b WHERE cc=NAME and b.classcode=310 and a.agence=".$agence." 
ORDER BY anne,Dureetrait,cc,agence
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('RSM'=>$row['rsm'],
					'agence'=>$row['agence'],
					'nb'=>$row['nb'],
                    'somme'=>$row['somme'],
                    'nbencours'=>$row['nbencours'],
					'Dureetrait'=>$row['Dureetrait'],
					'anne'=>$row['anne'],
					'par90'=>$row['par90'],
					'perpar1'=>number_format($row['perpar1'],2,'.',''),
					'perpar30'=>number_format($row['perpar30'],2,'.',''),
					'perpar90'=>number_format($row['perpar90'],2,'.',''),
					'nbdec'=>$row['nbdec'],
					'vldec'=>$row['vldec'],
                    'somencours'=>$row['somencours']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>