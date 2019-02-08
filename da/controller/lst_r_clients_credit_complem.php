<?php ini_set("display_errors",0);
/*
	c'est une fonction qui permet de retourner la liste des réguls à faire
*/
function liste_r_clients_credit_complem()
{
    include('../../../cnx/database.php');
    $pdo = Database1::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$agence=$_GET['agence'];


    $sql = "SELECT sybase.* , dda.ENF  
FROM `sybase_info_client_eligible` sybase ,`dda_info_client_eligible` dda
WHERE sybase.rim=dda.RIM
and sybase.Agence=".$agence."";

    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $return = array();
    foreach ($result as $row){
        $row['clt_name']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['clt_name']);
        $row['ENF']=iconv("UTF-8","ISO-8859-2//IGNORE",$row['ENF']);
        $return[]=array(
            'Agence'=>$row['Agence'],
            'rim'=>$row['rim'],
            'li'=>$row['li'],
            'rsm'=>$row['rsm'],
            'clt_name'=>$row['clt_name'],
            'phone'=>$row['phone'],
            'Montant_LI'=>$row['Montant_LI'],
            'encours'=>$row['encours'],
            'NB_ECH_Retard'=>$row['NB_ECH_Retard'],
            'residence'=>$row['residence'],
            'Max_Retard'=>$row['Max_Retard'],
            'ENF'=>$row['ENF'],
        );
    }
    return $return;
    Database::disconnect();
}
?>