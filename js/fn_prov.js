/* retourne l'encours de l'agence 110*/
	$.ajax({
            type: "GET",
            url: "../controller/api/saintotal",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
	$.ajax({
            type: "GET",
            url: "../controller/api/saintotalprov",
            dataType: "json",
			beforeSend: function() {
              $('#saintotalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total",
            dataType: "json",
			beforeSend: function() {
              $('#par130total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_totalprov",
            dataType: "json",
			beforeSend: function() {
              $('#par130totalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130totalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total",
            dataType: "json",
			beforeSend: function() {
              $('#par60total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_totalprov",
            dataType: "json",
			beforeSend: function() {
              $('#par60totalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60totalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total",
            dataType: "json",
			beforeSend: function() {
              $('#par90total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_totalprov",
            dataType: "json",
			beforeSend: function() {
              $('#par90totalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90totalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total",
            dataType: "json",
			beforeSend: function() {
              $('#par180total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_totalprov",
            dataType: "json",
			beforeSend: function() {
              $('#par180totalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180totalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total",
            dataType: "json",
			beforeSend: function() {
              $('#par181total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_totalprov",
            dataType: "json",
			beforeSend: function() {
              $('#par181totalprov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181totalprov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_501",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_501prov",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total501",
            dataType: "json",
			beforeSend: function() {
              $('#par130total501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total501prov",
            dataType: "json",
			beforeSend: function() {
              $('#par130total501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total501",
            dataType: "json",
			beforeSend: function() {
              $('#par60total501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total501prov",
            dataType: "json",
			beforeSend: function() {
              $('#par60total501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total501",
            dataType: "json",
			beforeSend: function() {
              $('#par90total501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total501prov",
            dataType: "json",
			beforeSend: function() {
              $('#par90total501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total501",
            dataType: "json",
			beforeSend: function() {
              $('#par180total501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total501prov",
            dataType: "json",
			beforeSend: function() {
              $('#par180total501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total501",
            dataType: "json",
			beforeSend: function() {
              $('#par181total501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total501prov",
            dataType: "json",
			beforeSend: function() {
              $('#par181total501prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total501prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	////////////////////////////////////////////
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_511",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_511prov",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total511",
            dataType: "json",
			beforeSend: function() {
              $('#par130total511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total511prov",
            dataType: "json",
			beforeSend: function() {
              $('#par130total511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total511",
            dataType: "json",
			beforeSend: function() {
              $('#par60total511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total511prov",
            dataType: "json",
			beforeSend: function() {
              $('#par60total511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total511",
            dataType: "json",
			beforeSend: function() {
              $('#par90total511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total511prov",
            dataType: "json",
			beforeSend: function() {
              $('#par90total511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total511",
            dataType: "json",
			beforeSend: function() {
              $('#par180total511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total511prov",
            dataType: "json",
			beforeSend: function() {
              $('#par180total511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total511",
            dataType: "json",
			beforeSend: function() {
              $('#par181total511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total511prov",
            dataType: "json",
			beforeSend: function() {
              $('#par181total511prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total511prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	///////////////////////////////////////////////////////
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_521",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_521prov",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#saintotal521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total521",
            dataType: "json",
			beforeSend: function() {
              $('#par130total521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total521prov",
            dataType: "json",
			beforeSend: function() {
              $('#par130total521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par130total521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total521",
            dataType: "json",
			beforeSend: function() {
              $('#par60total521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_60_total521prov",
            dataType: "json",
			beforeSend: function() {
              $('#par60total521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par60total521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total521",
            dataType: "json",
			beforeSend: function() {
              $('#par90total521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_90_total521prov",
            dataType: "json",
			beforeSend: function() {
              $('#par90total521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par90total521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total521",
            dataType: "json",
			beforeSend: function() {
              $('#par180total521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_180_total521prov",
            dataType: "json",
			beforeSend: function() {
              $('#par180total521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par180total521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total521",
            dataType: "json",
			beforeSend: function() {
              $('#par181total521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_181_total521prov",
            dataType: "json",
			beforeSend: function() {
              $('#par181total521prov').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#par181total521prov').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
////////////////////////////////////////////////////////////////////////////////
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restsainm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_prov_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restsainprovm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainprovm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_totalprov_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1provm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1provm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30provm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30provm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/////////////////////////////////////////////////////////////////////////////////
$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restsainm501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainm501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_prov_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restsainprovm501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainprovm501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1m501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1m501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_totalprov_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1provm501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1provm501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30m501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30m501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru501",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30provm501').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30provm501').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
//////////////////////////////////////////////////////////////////////////////////////
$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restsainm511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainm511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_prov_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restsainprovm511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainprovm511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1m511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1m511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_totalprov_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1provm511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1provm511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30m511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30m511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru511",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30provm511').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30provm511').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
///////////////////////////////////////////////////////////////////////
$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restsainm521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainm521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_prov_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restsainprovm521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restsainprovm521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_total_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1m521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1m521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_1_30_totalprov_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restpar1provm521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar1provm521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30m521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30m521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par_31_total_restru521",
            dataType: "json",
			beforeSend: function() {
              $('#restpar30provm521').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#restpar30provm521').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });