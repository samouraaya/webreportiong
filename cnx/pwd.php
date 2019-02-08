<html>

<head>

<link rel="stylesheet" type="text/css" media="screen" href="../css/sweetalert.css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/sweetalert.min.js"></script>
</head>
<body>
<?php

include('database.php');
$pdo1 = Database1::connect();
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$user=$_POST['rsm'];
	$pwd=$_POST['Password'];
    $newpwd=$_POST['newPassword'];

	
	$sql1 = "SELECT count(iduser) 'nb' FROM user where user='".$user."' and mdp=md5('".$pwd."')";
	$result = $pdo1->query($sql1);
	foreach ($result as $row1)
	{
	$conforme=$row1['nb'];
	}

if ($conforme>0) 
{
    $sql = "update user set mdp=md5('".$newpwd."'),nb_connexion=1  where user='".$user ."'";
    $q = $pdo1->prepare($sql);
    $q->execute();
echo '<script>  $(document).ready(function() {
swal({ 
  title: "Succes",
  text: "Mot de passe modifie Merci de reconnecter avec le nouveau mot de passe",
  type: "error",
  showCancelButton: false,
  confirmButtonClass: "btn btn-warning",
  confirmButtonText: "Valider",
  closeOnConfirm: true 
  },
  function(){
    window.location.href = "deconnexion.php";
});
    });
  </script>';
}

 else {
	 

		echo '<script>  $(document).ready(function() {
swal({ 
  title: "Alerte",
  text: "Mot de passe incorrect",
  type: "error",
  showCancelButton: false,
  confirmButtonClass: "btn btn-warning",
  confirmButtonText: "Valider",
  closeOnConfirm: true 
  },
  function(){
    window.location.href = "../index.html";
});
    });
  </script>';
 }
?>
</body>
</html>