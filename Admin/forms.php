<!DOCTYPE html>
<?php
session_start();
include('database.php');
				//ini_set('display_errors','off');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				ini_set('display_errors','off');
				if (empty ($_SESSION['login'])) header('Location:deconnexion.php');
				$user=$_SESSION['login'];
				$sql1="select name from user where user like '%" . $user . "%'";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link rel="icon" type="image/gif" href="imageedit.gif" />
    <title>Administration Webreporting</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

    <section class="menu-section">
	  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          
			
                  <center>  <img src="advtn.gif" width="100" height="30"/> </center>
                

            </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a href="accueuil.php"><i  class="fa fa-graduation-cap" ></i> Tableau de Bord</a></li>
                            <li><a class="menu-top-active"  href="forms.php"><i  class="fa fa-plus-square-o" ></i> Ajouter Utilisateur</a></li>
							<li><a href="histo.php"><i  class="fa fa-history" ></i> Historique</a></li>
                        </ul>
						<ul id="menu-top" class="nav navbar-nav navbar-right">
							<li><a><?php foreach ($pdo->query($sql1) as $row) echo $row[0];?>  <i  class="fa fa-user-secret" ></i></a></li>
                            <li><a href="deconnexion.php">Exit <i  class="fa fa-sign-out" ></i></a></li>
                            
                            

                        </ul>
                    </div>
					
                </div>

            </div>
        </div>
    </section>
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"><i  class="fa fa-plus-square-o" ></i> Ajouter Utilisateur </h1>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Information utilisateur
                        </div>
                        <div class="panel-body">
                            <form  action="adduse.php" method="post">
										<div class="form-group">
                                            <label class="control-label" for="success">ID</label>
                                            <input type="text" name="id" class="form-control" readonly id="success" value="<?php $sql="select max(iduser)+1 from user"; foreach ($pdo->query($sql) as $row) echo $row[0];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="success">Login</label>
                                            <input type="text" name="login" class="form-control" id="success" />
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label" for="success">Nom & Prénom</label>
                                            <input type="text" name="np" class="form-control" id="success" />
                                        </div>
										   <div class="form-group">
                                            <label class="control-label" for="success">Fonction</label>
                                            <input type="text" name="fonction" class="form-control" id="success" />
                                        </div>
										   <div class="form-group">
                                            <label class="control-label" for="success">Classe Code</label>
                                            <input type="text" name="code" class="form-control" id="success" />
                                        </div>
										   <div class="form-group">
                                            <label class="control-label"  for="success">Agence</label>
                                            <input type="text" name="BRANCH" class="form-control" id="success" />
                                        </div>
										   <hr />
										 <center><button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-user"></span> &nbsp;Ajouter </button>&nbsp;</center>
                                    </form>
                         
                            
                   
                           
                            <hr />
                            

                        </div>
                            </div>
                        </div>
						<div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Importer depuis Orbit
                        </div>
                        <div class="panel-body">
                            
                                         <label class="control-label" for="success">Importer tout les nouveaux Utilisateurs</label>  
                            <hr />
                            
                    <center><a href="import.php" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> &nbsp;Synchroniser </a>&nbsp;</center>
                           
                            <hr />
                         Nombre des utilisateurs ajoutés <strong>  <?php if (empty($_SESSION['usenew'])) echo '0'; ELSE echo $_SESSION['usenew']; ?></strong>
						
                            </div>
                        </div>
						
                </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				
                    &copy; 2015 Advans Tunisie IT DEPARTMENT 2015-2016 </a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
