
	var total_budget=$.ajax({
            type: "GET",
            url: "../controller/api/budget_information_branch",
            dataType: "json",
            success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence=data[i].agence;
				var nbmonth = data[i].nbmonth;
				var nbyear = data[i].nbyear;
				var summonth = data[i].summonth;
				var sumyear = data[i].sumyear;
				var nbencours = data[i].nbencours;
				var sumencours = data[i].sumencours;
				var par0 = data[i].per0;
				var par10 = data[i].per10;
				var par30 = data[i].per30;
				var par90 = data[i].per90;
				var ActiveOff = data[i].ActiveOff;
				var ech = data[i].ech;
				var taux_closed = data[i].taux_closed;
				var taux_refinanced = data[i].taux_refinanced;
$('#listedemande').append("<tr class='center_bold'><td ><center><b>"+agence+"</b><center></td><td>"+nbyear+"</td><td>"+sumyear+"</td><td>"+nbmonth+"</td><td>"+summonth+"</td><td>"+nbencours+"</td><td>"+sumencours+"</td><td>"+par0+"</td><td>"+par10+"</td><td>"+par30+"</td><td>"+par90+"</td><td>"+ActiveOff+"</td><td>"+ech+"</td><td>"+taux_closed+"</td><td>"+taux_refinanced+"</td></tr>").hide().fadeIn(500);         
			}
				
			},
            error: function (result) {
                alert("Error");
            }
        });
		
$.when(total_budget).done(function(a1) {
	$.ajax({
            type: "GET",
            url: "../controller/api/budget_information_branch_total",
            dataType: "json",
            success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var nbmonth = data[i].nbmonth;
				var nbyear = data[i].nbyear;
				var summonth = data[i].summonth;
				var sumyear = data[i].sumyear;
				var nbencours = data[i].nbencours;
				var sumencours = data[i].sumencours;
				var par0 = data[i].per0;
				var par10 = data[i].per10;
				var par30 = data[i].per30;
				var par90 = data[i].per90;
				var ActiveOff = data[i].ActiveOff;
				var ech = data[i].ech;
				var taux_closed = data[i].taux_closed;
				var taux_refinanced = data[i].taux_refinanced;
$('#footer_budget').append("<tr class='center_bold'><td ><center><b>Total</b><center></td><td>"+nbyear+"</td><td>"+sumyear+"</td><td>"+nbmonth+"</td><td>"+summonth+"</td><td>"+nbencours+"</td><td>"+sumencours+"</td><td>"+par0+"</td><td>"+par10+"</td><td>"+par30+"</td><td>"+par90+"</td><td>"+ActiveOff+"</td><td>"+ech+"</td><td>"+taux_closed+"</td><td>"+taux_refinanced+"</td></tr>").hide().fadeIn(500);         
			}
				
			},
            error: function (result) {
                alert("Error");
            }
        });
	
	});
	
	/*Décaissement ce Mois(Volume)*/
$.ajax({

            type: "GET",
            url: "../controller/api/top_dec_month",
            dataType: "json",
			beforeSend: function() {
              $('#vl_decaissement').text('loading...');
           },
            success: function (data) {
				var names = data[0].Dec;
               $('#vl_decaissement').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Décaissement ce Mois(Nombre)*/
$.ajax({

            type: "GET",
            url: "../controller/api/top_dec_month_nb",
            dataType: "json",
			beforeSend: function() {
              $('#nb_decaissement').text('loading...');
           },
            success: function (data) {
				var names = data[0].Dec;
               $('#nb_decaissement').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Encours(Volume)*/
$.ajax({

            type: "GET",
            url: "../controller/api/vl_encours",
            dataType: "json",
			beforeSend: function() {
              $('#vl_encours').text('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vl_encours').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Encours(Nombre)*/
$.ajax({

            type: "GET",
            url: "../controller/api/enc_total_budgetnb",
            dataType: "json",
			beforeSend: function() {
              $('#nb_encours').text('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nb_encours').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Décaissements (Depuis début année) Nombre*/
$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_total_budget",
            dataType: "json",
			beforeSend: function() {
              $('#dec_yearnb').text('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dec_yearnb').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Décaissements (Depuis début année) Volume*/
$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_total_budget",
            dataType: "json",
			beforeSend: function() {
              $('#dec_yearvl').text('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dec_yearvl').text('R: '+names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*************************Décaissement ce Mois(Volume)************************************/		
var return2 = $.ajax({ 
  dataType: "json",
  url: "../controller/api/top_dec_month",
  async: true,
  success: function(result) {ajax1=result[0].Dec;}                     
});
var return1=$.ajax({ 
  dataType: "json",
  url: "../controller/api/vl_dec_m_object_budget",
  async: true,
  success: function(result) {ajax2=result[0].nb; $('#obj_vl_decaissement').text('B: '+ajax2);}  
});
$.when( return1 , return2  ).done(function( a1, a2 ) {
	ajax1=parseFloat(ajax1.replace(/ /g, ''));
	ajax2=parseFloat(ajax2.replace(/ /g, ''));
   var data = (ajax1 / ajax2) *100; 
   if (data<100)
   {  
   $('#objvl').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
    $('#vl_decaissement')
    .css('color', '')
    .css('color', 'red');}
   else {
	$('#objvl').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#vl_decaissement')
    .css('color', '')
    .css('color', '#008237');}
});
/****************************Décaissement ce Mois(Nombre)*********************************/
var top_dec_month_nb = $.ajax({ 
  dataType: "json",
  url: "../controller/api/top_dec_month_nb",
  async: true,
  success: function(result) {ajax12=result[0].Dec;}                     
});
var nb_dec_object_budget=$.ajax({ 
  dataType: "json",
  url: "../controller/api/nb_dec_m_object_budget",
  async: true,
  success: function(result) {ajax21=result[0].nb; $('#obj_nb_decaissement').text('B: '+ajax21);}  
});
$.when( nb_dec_object_budget , top_dec_month_nb  ).done(function( a1, a2 ) {
	ajax12=parseFloat(ajax12.replace(/ /g, ''));
	ajax21=parseFloat(ajax21.replace(/ /g, ''));
   var data = (ajax12 / ajax21) *100; 
   if (data<100)
   {   
   $('#objnb').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
   $('#nb_decaissement')
    .css('color', '')
    .css('color', 'red');}
   else {
	$('#objnb').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#nb_decaissement')
    .css('color', '')
    .css('color', '#008237');}
});
/*****************************Encours(Volume)********************************/
var vl_encours = $.ajax({ 
  dataType: "json",
  url: "../controller/api/vl_encours",
  async: true,
  success: function(result) {vlencours=result[0].nb;}                     
});
var enc_total_budget_object=$.ajax({ 
  dataType: "json",
  url: "../controller/api/enc_total_budget_object",
  async: true,
  success: function(result) {enctotalbudgetobject=result[0].nb; $('#obj_vl_encours').text('B: '+enctotalbudgetobject);}  
});
$.when( vl_encours , enc_total_budget_object  ).done(function( a1, a2 ) {
	vlencours=parseFloat(vlencours.replace(/ /g, ''));
	enctotalbudgetobject=parseFloat(enctotalbudgetobject.replace(/ /g, ''));
   var data = (vlencours / enctotalbudgetobject) *100; 
   if (data<100)
   {
   $('#objvl_encours').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
   $('#vl_encours')
    .css('color', '')
    .css('color', 'red');}
   else 
   {
	$('#objvl_encours').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#vl_encours')
    .css('color', '')
    .css('color', '#008237');}
});
/********************************Encours(Nombre)*****************************/
var nb_encours = $.ajax({ 
  dataType: "json",
  url: "../controller/api/enc_total_budgetnb",
  async: true,
  success: function(result) {nbencours=result[0].nb;}                     
});
var enc_total_budget_objectnb=$.ajax({ 
  dataType: "json",
  url: "../controller/api/enc_total_budget_objectnb",
  async: true,
  success: function(result) {enctotalbudgetobjectnb=result[0].nb; $('#obj_nb_encours').text('B: '+enctotalbudgetobjectnb);}  
});
$.when( nb_encours , enc_total_budget_objectnb  ).done(function( a1, a2 ) {
	nbencours=parseFloat(nbencours.replace(/ /g, ''));
	enctotalbudgetobjectnb=parseFloat(enctotalbudgetobjectnb.replace(/ /g, ''));
   var data = (nbencours / enctotalbudgetobjectnb) *100; 
   if (data<100)
   {
   $('#objnb_encours').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
   $('#nb_encours')
    .css('color', '')
    .css('color', 'red');}
   else 
   {
	$('#objnb_encours').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#nb_encours')
    .css('color', '')
    .css('color', '#008237');}
});
/*******************************Décaissements (Depuis début année) Nombre******************************/
var nb_dec_total_budget = $.ajax({ 
  dataType: "json",
  url: "../controller/api/nb_dec_total_budget",
  async: true,
  success: function(result) {nbdectotalbudget=result[0].nb;}                     
});
var nb_dec_object_budget_year=$.ajax({ 
  dataType: "json",
  url: "../controller/api/nb_dec_object_budget_year",
  async: true,
  success: function(result) {nbdecobjectbudgetyear=result[0].nb; $('#obj_dec_yearnb').text('B: '+nbdecobjectbudgetyear);}  
});
$.when( nb_dec_total_budget , nb_dec_object_budget_year  ).done(function( a1, a2 ) {
	nbdectotalbudget=parseFloat(nbdectotalbudget.replace(/ /g, ''));
	nbdecobjectbudgetyear=parseFloat(nbdecobjectbudgetyear.replace(/ /g, ''));
   var data = (nbdectotalbudget / nbdecobjectbudgetyear) *100; 
   if (data<100)
   {
   $('#objnb_decyear').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
   $('#dec_yearnb')
    .css('color', '')
    .css('color', 'red');}
   else
   {
	$('#objnb_decyear').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#dec_yearnb')
    .css('color', '')
    .css('color', '#008237');}
});
/*******************************Décaissements (Depuis début année) Volume******************************/
var vl_dec_total_budget = $.ajax({ 
  dataType: "json",
  url: "../controller/api/vl_dec_total_budget",
  async: true,
  success: function(result) {vldectotalbudget=result[0].nb;}                     
});
var vl_dec_object_budgetyear=$.ajax({ 
  dataType: "json",
  url: "../controller/api/vl_dec_object_budgetyear",
  async: true,
  success: function(result) {vldecobjectbudgetyear=result[0].nb; $('#obj_dec_yearvl').text('B: '+vldecobjectbudgetyear);}  
});
$.when( vl_dec_total_budget , vl_dec_object_budgetyear  ).done(function( a1, a2 ) {
	vldectotalbudget=parseFloat(vldectotalbudget.replace(/ /g, ''));
	vldecobjectbudgetyear=parseFloat(vldecobjectbudgetyear.replace(/ /g, ''));
   var data = (vldectotalbudget / vldecobjectbudgetyear) *100; 
   if (data<100)
   {
   $('#objvl_decyear').append("<i  class='red'><i  class='fa fa-sort-desc'></i>"+ data.toFixed(2) +"% </i>Realisé");
   $('#dec_yearvl')
    .css('color', '')
    .css('color', 'red');}
   else 
   {
	$('#objvl_decyear').append("<i  class='green'><i  class='fa fa-sort-asc'></i>"+ data.toFixed(2) +"% </i>Realisé");
	$('#dec_yearvl')
    .css('color', '')
    .css('color', '#008237');}
});


