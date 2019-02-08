
var id_produit = localStorage.getItem('id');
var return1= $.ajax({

            type: "GET",
            url: "../controller/api/credit_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
			
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var encoursvl = data[i].encours_vl;
				var encoursnb = data[i].encours_nb;
				var decaissementNb = data[i].decaissementNb;
				var decaissementVL = data[i].decaissementVL;
				var NBECH = data[i].NBECH;
				var ECHIMP = data[i].ECHIMP;
				var perech = data[i].perech;
$('#credit').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+encoursvl+"</td><td>"+encoursnb+"</td><td>"+decaissementNb+"</td><td>"+decaissementVL+"</td><td>"+perech+"</td><td>"+NBECH+"</td><td>"+ECHIMP+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) 
			{
                alert("Error");
            }
} );

$.when(return1).done(function(a1) {
	
	$( "#loadingcredit" ).hide();
	var id_produit = localStorage.getItem('id');
	
$.ajax({

            type: "GET",
            url: "../controller/api/credit_total_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var encoursvl = data[i].encours_vl;
				var encoursnb = data[i].encours_nb;
				var decaissementNb = data[i].decaissementNb;
				var decaissementVL = data[i].decaissementVL;
				var NBECH = data[i].NBECH;
				var ECHIMP = data[i].ECHIMP;
				var perech = data[i].perech;
$('#footer_credit').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+encoursvl+"</td><td>"+encoursnb+"</td><td>"+decaissementNb+"</td><td>"+decaissementVL+"</td><td>"+perech+"</td><td>"+NBECH+"</td><td>"+ECHIMP+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
	
});


/*AJAX PAR*/
var par=$.ajax({

            type: "GET",
            url: "../controller/api/par_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var nbpar0 = data[i].nbpar0;
				var vlpar0 = data[i].vlpar0;
				var perpar0 = data[i].perpar0;
				var nbpar7 = data[i].nbpar7;
				var vlpar7 = data[i].vlpar7;
				var perpar7 = data[i].perpar7;
				var nbpar30 = data[i].nbpar30;
				var vlpar30 = data[i].vlpar30;
				var perpar30 = data[i].perpar30;
				var nbpar90 = data[i].nbpar90;
				var vlpar90 = data[i].vlpar90;
				var perpar90 = data[i].perpar90;
$('#par').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+nbpar0+"</td><td>"+vlpar0+"</td><td>"+perpar0+"</td><td>"+nbpar7+"</td><td>"+vlpar7+"</td><td>"+perpar7+"</td><td>"+nbpar30+"</td><td>"+vlpar30+"</td><td>"+perpar30+"</td><td>"+nbpar90+"</td><td>"+vlpar90+"</td><td>"+perpar90+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
		
		
$.when(par).done(function(a1) {
	$( "#loadingpar" ).hide();
$.ajax({

            type: "GET",
            url: "../controller/api/par_total_produit",
			data: { 
             id_produit: id_produit, 

              },
            dataType: "json",
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var nbpar0 = data[i].nbpar0;
				var vlpar0 = data[i].vlpar0;
				var perpar0 = data[i].perpar0;
				var nbpar7 = data[i].nbpar7;
				var vlpar7 = data[i].vlpar7;
				var perpar7 = data[i].perpar7;
				var nbpar30 = data[i].nbpar30;
				var vlpar30 = data[i].vlpar30;
				var perpar30 = data[i].perpar30;
				var nbpar90 = data[i].nbpar90;
				var vlpar90 = data[i].vlpar90;
				var perpar90 = data[i].perpar90;
$('#footer_par').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+nbpar0+"</td><td>"+vlpar0+"</td><td>"+perpar0+"</td><td>"+nbpar7+"</td><td>"+vlpar7+"</td><td>"+perpar7+"</td><td>"+nbpar30+"</td><td>"+vlpar30+"</td><td>"+perpar30+"</td><td>"+nbpar90+"</td><td>"+vlpar90+"</td><td>"+perpar90+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
	
});


/*AJAX demande*/
var demande=$.ajax({

            type: "GET",
            url: "../controller/api/demande_reporting_produit",
            dataType: "json",
			data: { 
             id_produit:id_produit, 
			 },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var nbdmdnew = data[i].nbdmdnew;
				var vldmdnew = data[i].vldmdnew;
				var nbdmdclo = data[i].nbdmdclo;
				var nbstock = data[i].nbstock;
				var nbstockpen = data[i].nbstockpen;
				var nbstockrev = data[i].nbstockrev;
				var nbstockapp = data[i].nbstockapp;
				var vlstock = data[i].vlstock;
				var vlstockpen = data[i].vlstockpen;
				var vlstockrev = data[i].vlstockrev;
				var vlstockapp = data[i].vlstockapp;
				$('#dem').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+nbdmdnew+"</td><td>"+vldmdnew+"</td><td>"+nbdmdclo+"</td><td>"+nbstock+"</td><td>"+nbstockpen+"</td><td>"+nbstockrev+"</td><td>"+nbstockapp+"</td><td>"+vlstock+"</td><td>"+vlstockpen+"</td><td>"+vlstockrev+"</td><td>"+vlstockapp+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
		
		
$.when(demande).done(function(a1) {
$( "#loadingdem" ).hide();	
$.ajax({

            type: "GET",
            url: "../controller/api/demande_reporting_total_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var nbdmdnew = data[i].nbdmdnew;
				var vldmdnew = data[i].vldmdnew;
				var nbdmdclo = data[i].nbdmdclo;
				var nbstock = data[i].nbstock;
				var nbstockpen = data[i].nbstockpen;
				var nbstockrev = data[i].nbstockrev;
				var nbstockapp = data[i].nbstockapp;
				var vlstock = data[i].vlstock;
				var vlstockpen = data[i].vlstockpen;
				var vlstockrev = data[i].vlstockrev;
				var vlstockapp = data[i].vlstockapp;
				$('#footer_dem').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+nbdmdnew+"</td><td>"+vldmdnew+"</td><td>"+nbdmdclo+"</td><td>"+nbstock+"</td><td>"+nbstockpen+"</td><td>"+nbstockrev+"</td><td>"+nbstockapp+"</td><td>"+vlstock+"</td><td>"+vlstockpen+"</td><td>"+vlstockrev+"</td><td>"+vlstockapp+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
	
});

/*AJAX Cumul week*/
var cumul_week_reporting=$.ajax({

            type: "GET",
            url: "../controller/api/cumul_week_reporting_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var cumdmdweek = data[i].cumdmdweek;
				var cumdecnbweek = data[i].cumdecnbweek;
				var cumdecvlweek = data[i].cumdecvlweek;
				var moydec = data[i].moydec;
				$('#cumweek').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+cumdmdweek+"</td><td>"+cumdecnbweek+"</td><td>"+cumdecvlweek+"</td><td>"+moydec+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
		
		
$.when(cumul_week_reporting).done(function(a1) {
$( "#loadingcumweek" ).hide();	
$.ajax({

            type: "GET",
            url: "../controller/api/cumul_week_reporting_total_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var cumdmdweek = data[i].cumdmdweek;
				var cumdecnbweek = data[i].cumdecnbweek;
				var cumdecvlweek = data[i].cumdecvlweek;
				var moydec = data[i].moydec;
				$('#footer_cumweek').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+cumdmdweek+"</td><td>"+cumdecnbweek+"</td><td>"+cumdecvlweek+"</td><td>"+moydec+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
	
});

/*AJAX Cumul month*/
var cumul_month_reporting=$.ajax({

            type: "GET",
            url: "../controller/api/cumul_month_reporting_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var cumdmdweek = data[i].cumdmdweek;
				var cumdecnbweek = data[i].cumdecnbweek;
				var cumdecvlweek = data[i].cumdecvlweek;
				var moydec = data[i].moydec;
				$('#cummonth').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+cumdmdweek+"</td><td>"+cumdecnbweek+"</td><td>"+cumdecvlweek+"</td><td>"+moydec+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
		
		
$.when(cumul_month_reporting).done(function(a1) {
$( "#loadingcummonth" ).hide();	
$.ajax({

            type: "GET",
            url: "../controller/api/cumul_month_reporting_total_produit",
            dataType: "json",
			data: { 
             id_produit: id_produit, 

              },
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var agence = data[i].agence;
				var cumdmdweek = data[i].cumdmdweek;
				var cumdecnbweek = data[i].cumdecnbweek;
				var cumdecvlweek = data[i].cumdecvlweek;
				var moydec = data[i].moydec;
				$('#footer_cummonth').append("<tr class='even_pointer'><td><b><center>"+agence+"</center></b></td><td>"+cumdmdweek+"</td><td>"+cumdecnbweek+"</td><td>"+cumdecvlweek+"</td><td>"+moydec+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });
	
});