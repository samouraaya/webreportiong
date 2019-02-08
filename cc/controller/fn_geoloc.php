<?php
ini_set("display_errors", "On");

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);


    include('database.php');
	//$sql=null;
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT last_name,first_name from rm_acct";

    $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $return = array();
    foreach ($result as $row) {
            $return[] = array(
                //'source' => $row['source'],
                'last_name' => $row['last_name'],
                'first_name' => $row['first_name']
				);
				//'disposition' => $row['disposition']);
    }
    header('Content-type: application/json');
    echo json_encode($return);
    Database::disconnect();

?>