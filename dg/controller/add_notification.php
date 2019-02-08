<!DOCTYPE html>
<html lang="en">
<head>
<script src="../../js/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="../../css/sweetalert.css" type="text/css">
<script src="../../js/sweetalert.min.js"></script>
</head>
<?php 


		date_default_timezone_set('Africa/Tunis');
		include('../../cnx/database.php');
		$pdo = Database1::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("set names utf8");
		$comment=addslashes($_POST['comment']);
		$user=$_POST['user'];

		$add="INSERT INTO `notification`(`body`,`dateinsert`,`sender`,`status`) VALUES ('".$comment."',now(),'".$user."','Active')";
		$pdo->exec($add);
		echo '<script>  $(document).ready(function() {
swal({ 
  title: "Information",
  text: "Commentaire Ajoute avec succes",
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn btn-success",
  confirmButtonText: "Valider",
  closeOnConfirm: true 
  },
  function(){
    window.location.href = "../view/accueil.html";
});
    });
  </script>';

?>
<body>
</body>
</html>