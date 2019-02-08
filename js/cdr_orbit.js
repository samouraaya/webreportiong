var info_orbit=$.ajax({
            type: "GET",
            url: "../controller/api/fn_conforme_orbit",
            dataType: "json",

            success: function (data) {

				var DISNBORBIT = data[0].DISNB;
				var DISVOLORBIT = data[0].DISVOL;
				var OUTNB = data[0].OUTNB;
				var OUTVOL = data[0].OUTVOL;
				var PARNB = data[0].PARNB;
				var PARVOL = data[0].PARVOL;
				var CLOTNB = data[0].CLOTNB;
				var CLOTVOL = data[0].CLOTVOL;

			   $('#DISNBORBIT').html(DISNBORBIT);
			   $('#DISVOLORBIT').html(DISVOLORBIT);
			   $('#OUTNBORBIT').html(OUTNB);
			   $('#OUTVOLORBIT').html(OUTVOL);
			   $('#PARNBORBIT').html(PARNB);
			   $('#PARVOLORBIT').html(PARVOL);
			   $('#CLONBORBIT').html(CLOTNB);
			   $('#CLONBCDR').html(CLOTNB);
			   $('#CLOVOLORBIT').html(CLOTVOL);
			   
			   $('#CLONBECART').html('0');
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
var info_cdr_dec=$.ajax({
            type: "GET",
            url: "../controller/api/fn_conforme_cdr_dec",
            dataType: "json",

            success: function (data) {

				var DISVOLCDR = data[0].DISVOL;
				var DISNBCDR = data[0].DISNB;
				

			   $('#DISNBCDR').html(DISNBCDR);
			   $('#DISVOLCDR').html(DISVOLCDR);
			  
			   
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
var info_cdr_outstanding=$.ajax({
            type: "GET",
            url: "../controller/api/fn_conforme_cdr_outstanding",
            dataType: "json",

            success: function (data) {

				var Encours = data[0].Encours;
				var Nombre = data[0].Nombre;
				

			   $('#OUTNBCDR').html(Nombre);
			   $('#OUTVOLCDR').html(Encours);
			  
			   
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
var info_cdr_PAR=$.ajax({
            type: "GET",
            url: "../controller/api/fn_conforme_cdr_PAR",
            dataType: "json",

            success: function (data) {

				var Encours = data[0].Encours;
				var Nombre = data[0].Nombre;
				

			   $('#PARNBCDR').html(Nombre);
			   $('#PARVOLCDR').html(Encours);
			  
			   
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
$.when( info_orbit , info_cdr_dec  ).done(function( a1, a2 ) {
	
	DISVOLORBIT=$('#DISVOLORBIT').html();
	DISNBORBIT=$('#DISNBORBIT').html();
	DISNBCDR=$('#DISNBCDR').html();
	DISVOLCDR=$('#DISVOLCDR').html();
	
	DISVOLORBIT=parseFloat(DISVOLORBIT.replace(/ /g, ''));
	DISNBORBIT=parseFloat(DISNBORBIT.replace(/ /g, ''));
	
	DISVOLCDR=parseFloat(DISVOLCDR.replace(/ /g, ''));
	DISNBCDR=parseFloat(DISNBCDR.replace(/ /g, ''));
  
	var diff_dec_nb=DISNBORBIT-DISNBCDR;
	var diff_dec_vol=DISVOLORBIT-DISVOLCDR;
	
	$('#DISNBECART').html(diff_dec_nb);
	$('#DISVOLECART').html(diff_dec_vol);
	
});

$.when( info_orbit , info_cdr_outstanding  ).done(function( a1, a2 ) {
	
	OUTNBORBIT=$('#OUTNBORBIT').html();
	OUTVOLORBIT=$('#OUTVOLORBIT').html();
	OUTNBCDR=$('#OUTNBCDR').html();
	OUTVOLCDR=$('#OUTVOLCDR').html();
	
	OUTNBORBIT=parseFloat(OUTNBORBIT.replace(/ /g, ''));
	OUTVOLORBIT=parseFloat(OUTVOLORBIT.replace(/ /g, ''));
	
	OUTVOLCDR=parseFloat(OUTVOLCDR.replace(/ /g, ''));
	OUTNBCDR=parseFloat(OUTNBCDR.replace(/ /g, ''));
  
	var diff_out_nb=OUTNBORBIT-OUTNBCDR;
	var diff_out_vol=OUTVOLORBIT-OUTVOLCDR;
	
	$('#OUTNBECART').html(diff_out_nb);
	$('#OUTVOLECART').html(diff_out_vol);
	
});

$.when( info_orbit , info_cdr_PAR  ).done(function( a1, a2 ) {
	
	PARNBCDR=$('#PARNBCDR').html();
	PARVOLCDR=$('#PARVOLCDR').html();
	PARNBORBIT=$('#PARNBORBIT').html();
	PARVOLORBIT=$('#PARVOLORBIT').html();
	
	PARNBCDR=parseFloat(PARNBCDR.replace(/ /g, ''));
	PARVOLCDR=parseFloat(PARVOLCDR.replace(/ /g, ''));
	
	PARNBORBIT=parseFloat(PARNBORBIT.replace(/ /g, ''));
	PARVOLORBIT=parseFloat(PARVOLORBIT.replace(/ /g, ''));
  
	var diff_out_nb=PARNBCDR-PARNBORBIT;
	var diff_out_vol=PARVOLCDR-PARVOLORBIT;
	
	$('#PARNBECART').html(diff_out_nb);
	$('#PARVOLECART').html(diff_out_vol);
	
});