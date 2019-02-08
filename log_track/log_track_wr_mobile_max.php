<?php

ini_set("display_errors", 0);

    include('../cnx/database.php');
	$sql=null;
    $pdo = Database1::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT us.`name`,us.`agence`,cnx.`connexion_time`,(SELECT COUNT(*) FROM log_wr_mobile_cnx WHERE cnx.`id_user`=id_user) 'nb'
,(SELECT MIN(connexion_time) FROM log_wr_mobile_cnx WHERE cnx.`id_user`=id_user) 'min'
FROM log_wr_mobile_cnx cnx,USER us
WHERE cnx.`id_user`=us.`user`
AND cnx.`connexion_time`=(SELECT MAX(connexion_time) FROM log_wr_mobile_cnx WHERE cnx.`id_user`=id_user)
ORDER BY us.`agence`,us.`name`";

    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $return = array();
    foreach ($result as $row) {
            $return[] = array(
                'name' => $row['name'],
                'agence' => $row['agence'],
				'nb' => number_format($row['nb'],0,'',''),
				'min' => $row['min'],
                'connexion_time' => $row['connexion_time']);
    }
    header('Content-type: application/json');
    echo json_encode($return);
    Database1::disconnect();

?>