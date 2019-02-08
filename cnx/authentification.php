<?php

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		include('database.php');
		$pdo = Database1::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $user = $_POST['login'];
		$pass = $_POST['password'];


		$i=null;
		
		$sql1 = "SELECT classcode,agence,user,mdp,isadmin FROM user where status='Active' order by user";
		$result = $pdo->query($sql1);
		foreach ($result as $row1)
		{	
	if((strcasecmp($row1[2],$user)==0) and (strcasecmp($row1[3],md5($pass))==0))

			{
			$res=$row1[0];
			$branch=$row1[1];
			$i++;
			}
		}
		
		/*
			Redirection vers l'interface CC
		*/
		
		if (($i==1) and $res==310 )
		{
		$sql1="select name,user,classcode,nb_connexion,iduser from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("classcode","<?php echo $row[2];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[3];?>");
					sessionStorage.setItem("iduser","<?php echo $row[4];?>");
					window.location.replace("../cc/view/accueil.html");
				</script>
		<?php
		} 
		}
		/*
			Redirection vers l'interface AC
		*/
		
		elseif (($i==1) and $res==300 )
		{
		$sql1="select name,user,classcode,nb_connexion,agence,iduser from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("agence","<?php echo $row[4];?>");
					sessionStorage.setItem("classcode","<?php echo $row[2];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[3];?>");
					sessionStorage.setItem("iduser","<?php echo $row['iduser'];?>");
					window.location.replace("../ac/view/accueil.html");
				</script>
		<?php
		} 
		}
		/*
			Redirection vers l'interface FIN
		*/
		
		elseif (($i==1) and $res==500 )
		{
		$sql1="select name,user,classcode,nb_connexion from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("classcode","<?php echo $row[2];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[3];?>");
					window.location.replace("../fin/view/accueil.html");
				</script>
		<?php
		} 
		}
		
		/*
			Redirection vers l'interface OPE
		*/
		
		elseif (($i==1) and $res==520 )
		{
		$sql1="select name,user,classcode,nb_connexion from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("classcode","<?php echo $row[2];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[3];?>");
					window.location.replace("../op/view/accueil.html");
				</script>
		<?php
		} 
		}
		/**********Redirection vers CR***********/
		elseif ((($i==1) and $res==530 ))
		{
		$sql1="select name,user,agence,classcode,nb_connexion from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("agence","<?php echo $row[2];?>");
					sessionStorage.setItem("classcode","<?php echo $row[3];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[4];?>");
					window.location.replace("../cr/view/accueil.html");
				</script>
		<?php
		} 
		}
		
		
		
		/*
			Redirection vers l'interface DA
		*/
		
		
		elseif ((($i==1) and $res==400 ) or(($i==1) and $res==410 ) or (($i==1) and $res==300 ) )
		{
		$sql1="select name,user,agence,classcode,nb_connexion from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("agence","<?php echo $row[2];?>");
					sessionStorage.setItem("classcode","<?php echo $row[3];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[4];?>");
					window.location.replace("../da/view/accueil.html");
				</script>
		<?php
		} 
		}
		
		/*
			Redirection vers l'interface DG
		*/
		
		elseif ((($i==1) and $res==700 ) or(($i==1) and $res==720 ) or (($i==1) and $res==730 ) or (($i==1) and $res==800 ))
		{
		$sql1="select name,user,classcode,nb_connexion,isadmin from user ";
		foreach ($pdo->query($sql1) as $row) 
			if ((strcasecmp($row[1],$user)==0))
			{
		?>
				<script>
					sessionStorage.setItem("couleur","<?php echo $user;?>");
					sessionStorage.setItem("nom","<?php echo $row[0];?>");
					sessionStorage.setItem("pwd","<?php echo $pass;?>");
					sessionStorage.setItem("classcode","<?php echo $row[2];?>");
					sessionStorage.setItem("nb_connexion","<?php echo $row[3];?>");
					sessionStorage.setItem("isadmin","<?php echo $row[4];?>");
					window.location.replace("../dg/view/accueil.html");
				</script>
		<?php
		} 
		}
		
	else header("Location:../index_error.html");
	
Database1::disconnect();
?>
