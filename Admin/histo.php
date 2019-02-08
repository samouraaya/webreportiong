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
	<script src="https://cdn.jsdelivr.net/sweetalert2/3.2.3/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.jsdelivr.net/sweetalert2/3.2.3/sweetalert2.min.css" />
	      <script>
	
	  function Disbursmend_History() {
	$.ajax({

            type: "GET",
            url: "Disbursment_History.php",
			success: function (data1) 
			{
				swal({
			  title: 'Merci!',
			  text: "les décaissement du mois sont bien historisés",
			  type: 'success',
			  showCancelButton: false,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'OK',
			  cancelButtonText: 'No, cancel!',
			  confirmButtonClass: 'btn btn-success',
			  cancelButtonClass: 'btn btn-danger',
			  buttonsStyling: false
			})
			}
        });
             
}
function Outstanding_History() {
	$.ajax({

            type: "GET",
            url: "Outstanding_History.php",
			success: function (data1) 
			{
				swal({
			  title: 'Merci!',
			  text: "l'Encours du mois sont bien historisés",
			  type: 'success',
			  showCancelButton: false,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'OK',
			  cancelButtonText: 'No, cancel!',
			  confirmButtonClass: 'btn btn-success',
			  cancelButtonClass: 'btn btn-danger',
			  buttonsStyling: false
			})
			}
        });
             
}
	  </script>
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
                            
							<li><a class="menu-top-active" href="histo.php"><i  class="fa fa-history" ></i> Historique</a></li>
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
                        <h1 class="page-head-line"><i  class="fa fa-history" ></i> Historique</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    
       
						<div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Importer les décaissement depuis Orbit
                        </div>
                        <div class="panel-body">
                            
                                         <label class="control-label" for="success">Enregistrer l'historique</label>  
                            <hr />
                          <center><button  class="btn btn-success" onclick='Disbursmend_History();' id="vote">GO !</button>&nbsp;</center>
                           
                            <hr />
                        
						
                            </div>
                        </div>
						
                </div>
        </div>
		<div class="col-md-6">
                    
       
						<div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Importer l'Encours depuis Orbit
                        </div>
                        <div class="panel-body">
                            
                                         <label class="control-label" for="success">Enregistrer l'historique</label>  
                            <hr />
                          <center><button  class="btn btn-success" onclick='Outstanding_History();' id="vote">GO !</button>&nbsp;</center>
                           
                            <hr />
                        
						
                            </div>
                        </div>
						
                </div>
        </div>
    </div>
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				
                    &copy; 2015 Advans Tunisie IT DEPARTMENT 2015-2016 </a>
                </div>

            </div>
        </div>
    </footer>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
