///////////////////*****Fonctions productivité synthetique 110 ****///////////////////////	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_cr_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecmois110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecmois110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_cr_110",
            dataType: "json",
			beforeSend: function() {
              $('#vldecmois110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecmois110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_avg_trait_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbavgtrait110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbavgtrait110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_encours_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbencmois110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbencmois110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_encours_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlencmois110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlencmois110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
///////////////////*****Fonctions productivité synthetique 120 ****///////////////////////	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_cr_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecmois120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecmois120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_avg_trait_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbavgtrait120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbavgtrait120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_cr_120",
            dataType: "json",
			beforeSend: function() {
              $('#vldecmois120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecmois120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_encours_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbencmois120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbencmois120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_encours_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlencmois120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlencmois120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
///////////////////*****Fonctions productivité synthetique 130 ****///////////////////////	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_cr_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecmois130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecmois130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_cr_130",
            dataType: "json",
			beforeSend: function() {
              $('#vldecmois130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecmois130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_nb_encours_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbencmois130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbencmois130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_vl_encours_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlencmois130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlencmois130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/fn_avg_trait_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbavgtrait130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbavgtrait130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	