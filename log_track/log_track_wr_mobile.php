<?php

ini_set("display_errors", 0);

    include('../cnx/database.php');
	$sql=null;
    $pdo = Database1::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT us.`name`,us.`agence`,cnx.`connexion_time` 
FROM log_wr_mobile_cnx cnx,USER us
WHERE cnx.`id_user`=us.`user`";

    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $return = array();
    foreach ($result as $row) {
            $return[] = array(
                'name' => $row['name'],
                'agence' => $row['agence'],
                'connexion_time' => $row['connexion_time']);
    }
    header('Content-type: application/json');
    echo json_encode($return);
    Database1::disconnect();

?>