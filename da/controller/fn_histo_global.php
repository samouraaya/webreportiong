<?php ini_set("display_errors",0); 
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
a.NAMEEMPL 'rsm',
a.BRANCH 'agence',
b.`NBDECEMPLTOTAL` 'nbdec',
b.`VLDECEMPL` 'vldec',
MONTH(a.month) 'Dureetrait',
YEAR(a.MONTH) 'anne',
a.`OUTSTANDING` 'nbencours',
a.`OUTSTANDINGNB` 'nb',
a.`PAR0VL` 'somme',
(a.`PAR0VL`/a.`OUTSTANDING`)*100 'perpar1',
(a.`PAR30VL`/a.`OUTSTANDING`)*100 'perpar30',
(a.`PAR90VL`/a.`OUTSTANDING`)*100 'perpar90',
a.`PAR30VL` 'somencours',
a.`PAR90VL` 'par90'
FROM outstanding_history a ,disbursment_history b
WHERE a.`IDEMPL`=b.`IDEMPL`
AND MONTH(a.month)=MONTH(b.month)
AND YEAR(a.MONTH)=YEAR(b.MONTH)
AND a.`BRANCH`<>100
and a.branch=".$agence."
ORDER BY YEAR(a.MONTH),MONTH(a.month)
";

$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('RSM'=>$row['rsm'],
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
					'vldec'=>number_format($row['vldec'],0,'.',' '),
                    'somencours'=>$row['somencours']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
Database::disconnect();
}
?>