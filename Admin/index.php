<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="icon" type="image/gif" href="imageedit.gif" />
    <title>Administration Webreporting</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <header>
	
        <div class="container">
			  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          

                  <center>  <img src="advtn.gif" width="100" height="30"/> </center>
                

            </div>
            <div class="row">
                <div class="col-md-12">
                    
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Administration Of Webreporting </h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">

                     <h4>  <strong>Authentification  :</strong></h4>
                    <br />
					<form accept-charset="UTF-8" method="post" name="login" action="authentification.php" role="form">
                     <label>Enter Login : </label>
                        <input type="text" name="login" class="form-control" required="required" />
                        <label>Enter Mot de pass :  </label>
                        <input type="password" name="password" class="form-control" required="required" />
                        <hr />
                         <input class="btn btn-lg btn-success btn-block" type="submit" value="Connexion">
						</form>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                         <strong> Main advantages :</strong>
                        <ul>
                            <li>
                                User friendly and customized
                            </li>
                            <li>
                                Fast and easy access to reporting for CO but also Managers
                            </li>
                            <li>
                                CO do not need Orbit anymore 
                            </li>
                            <li>
                                Combines both detailed and synthetic reports.
                            </li>
                        </ul>
                       
                    </div>
                    <div class="alert alert-success">
                         <strong> Main characteristics:</strong>
                        <ul>
                            <li>
                               In-house developed web-base plateform

                            </li>
                            <li>
                                 Multi-source: Orbit, CRM and budget
                            </li>
                            <li>
                               Possibility of being used on smartphones to access reports on the field
                            </li>
                            <li>
                                 Remote access.
                            </li>
                        </ul>
                       
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
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
