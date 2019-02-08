<!DOCTYPE html>
<?php
session_start();
include('database.php');
				//ini_set('display_errors','off');
				$pdo = Database1::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo1 = Database::connect();
				$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				if (empty ($_SESSION['login'])) header('Location:deconnexion.php');
				$user=$_SESSION['login'];
				$sql1="select name from user where user like '%" . $user . "%'";

			
	$sql3="select * from user order by agence";
	$sql4="select count(*) from user where status in ('Active')";
	$sql5="select count(*) from ad_gb_rsm where status in ('Active') and employee_id<>0";
	$sql6="select count(*) from ad_gb_rsm where status in ('Closed') ";
	$sql7="select max(cast(create_dt as date)) from ad_gb_rsm where status in ('Active')";
				
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	
    <title>Administration Webreporting</title>
	<link rel="icon" type="image/gif" href="imageedit.gif" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/sweet-alert.css" rel="stylesheet" />
	<link rel="stylesheet" href="jqGrid/css/jquery-ui.css">
	<link rel="stylesheet" href="jqGrid/css/ui.jqgrid-bootstrap.css">
	    
	<script src="jqGrid/js/jquery-1.10.2.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="jqGrid/js/jquery.jqGrid.min.js"></script>
	<script type="text/javascript" src="jqGrid/js/i18n/grid.locale-en.js"></script>

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
                            <li><a class="menu-top-active" href="accueuil.php"><i  class="fa fa-graduation-cap" ></i> Dashboard</a></li>
							<li><a href="histo.php"><i  class="fa fa-history" ></i> Historique</a></li>
                           
                        </ul>
						<ul id="menu-top" class="nav navbar-nav navbar-right">
							<li><a><?php foreach ($pdo->query($sql1) as $row) echo $row[0];?>  <i  class="fa fa-user-secret" ></i></a></li>
                            <li><a  href="deconnexion.php">Exit <i  class="fa fa-sign-out" ></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

                <div class="col-md-12">
                    <h4 class="page-head-line"><i  class="fa fa-graduation-cap" ></i> Dashboard</h4>

               

            <div class="row">
                 <div class="col-md-3 ">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-users dashboard-div-icon" ></i>
 
                         <h5><?php foreach ($pdo->query($sql4) as $row1) echo $row1[0];  ?> Active Webreporting User</h5>
                    </div>
                </div>
				
                 <div class="col-md-3">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-child dashboard-div-icon" ></i>
                       
                         <h5><?php foreach ($pdo1->query($sql5) as $row) echo $row[0];  ?> Acrive User in Orbit </h5>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-times-circle-o dashboard-div-icon" ></i>
                       
                         <h5><?php foreach ($pdo1->query($sql6) as $row) echo $row[0];  ?> Closed User in Orbit </h5>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-space-shuttle dashboard-div-icon" ></i>
                       
                         <h6>last Date User added : <?php foreach ($pdo1->query($sql7) as $row) echo $row[0];  ?>  </h6>
                    </div>
                </div>
            </div>

           <hr />
            <div class="col-md-12">

<center><table id="navgrid" ></table></center>	
    <div id="pagernav" style="position:relative;"></div>
	
<script type="text/javascript"> 	
jQuery("#navgrid").jqGrid({
   url:'Affiche_user.php',
	datatype: "json",
	styleUI : 'Bootstrap',
   	
   	colModel:[
		{ label: 'ID USER',width:50,align:"center", name: 'id',editable:true,editoptions:{readonly:true,size:10},searchtype:"integer"},
		{ label: 'Name',width:200,align:"center", name: 'name',editable:true,editoptions:{size:30},stype: "select", searchoptions:{dataUrl:'rsm.php'}},
		{ label: 'User Name',width:50,align:"center", name: 'login',editable:true,editoptions:{size:10}},
		{ label: 'Password',width: 70,align:"center", name: 'mdp',sorttype: "integer",editable:true,editoptions:{size:10} ,hidden:true},
		{ label: 'Branch',width:50,align:"center", name: 'agence',editable:true,edittype:"select",editoptions:{size:10,dataUrl:'branch_name.php'},searchtype:"integer" ,stype: "select", searchoptions:{dataUrl:'branch_name.php'}},
		{ label: 'Security Class',width:50,align:"center", name: 'poste' ,editable:true,edittype:"select",editoptions:{size:10,dataUrl:'classcode.php'},searchtype:"integer",stype: "select", searchoptions:{dataUrl:'classcode.php'}},
		{ label: 'Status',width:50,align:"center", name: 'status', edittype:'select' ,editable:true,editoptions:{size:10,value:{'Active':'Active','Closed':'Closed','Inactive':'Inactive'}},searchtype:"string",stype: "select",searchoptions: { value:"Active:Active;Closed:Closed;Inactive:Inactive"} },
   	],
   	rowNum: 10000,
	pgbuttons: false,    
	pgtext: false,
	autowidth:true,
   	pager: '#pagernav',
	loadonce: true,
	caption: "User Manager",
   	sortname: 'id',
    viewrecords: true,
    sortorder: "desc",
	editurl:"adduse.php",
	height:500
});
$("#navgrid").jqGrid('navGrid','#pagernav',{add:true,del:true,edit:true,search:true,refresh:false,view:true},
	{						closeOnEscape:true
							,closeAfterEdit:true
							,checkOnUpdate : true
							,checkOnSubmit : true
							,errorTextFormat: function (data) {
							return 'Error: ' + data.responseText
							}
							,afterSubmit: function () {
    $(this).jqGrid("setGridParam", {datatype: 'json'});
    return [true];
		}
							}
						,{},{},{multipleSearch:true}).navButtonAdd('#pagernav',{
   caption:"Synchronize", 
   title : "Synchronize with ORBIT",
   buttonicon:"glyphicon glyphicon-magnet", 
   onClickButton: function(){ 
     Synchronize();
	 
   }, 
   position:"first"
}).navButtonAdd('#pagernav',{
   caption:"Reset PW", 
   title : "Reset Password",
   buttonicon:"glyphicon glyphicon-random", 
   onClickButton: function(){ 
     reset_psw();
	 
   }, 
   position:"first"
});

function Synchronize() {

				 $.ajax({
            type: "GET",
            url: "import.php",
            success: function (data) {
	swal({ 
  title: "Information",
  text: "Users imported / updated with success.",
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn btn-success",
  confirmButtonText: "OK",
  closeOnConfirm: true 
  },
  function(){
window.location.href = "accueuil.php";
});

            },
						});
			}
function reset_psw() {
            var grid = $("#navgrid");
            var rowKey = grid.jqGrid('getGridParam',"selrow");
            if (rowKey)
			{
				 $.ajax({
            type: "GET",
            url: "reset_psw.php?id="+rowKey,
            success: function (data) {
	swal({ 
  title: "Information",
  text: "Password Reseted.",
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn btn-success",
  confirmButtonText: "OK",
  closeOnConfirm: true 
  },
  function(){
	window.location.href = "accueuil.php";

});

            },
						});
			}
            else
            alert("Select Row Please");
        }
           

 </script>
							 <hr />
                </div>
            
       </div>
</body>
</html>
