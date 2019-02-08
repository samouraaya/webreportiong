var agence = sessionStorage.getItem("agence");
/*
	envoi le nombre des rim créés
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_rim_crees?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#rm_crees').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#rm_crees').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*
	envoi le nombre des demandes disbursed
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_la_disbursed?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#la_disbursed').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#la_disbursed').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
/*
	envoi le nombre des LI cree
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_li_crees?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#li_crees').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#li_crees').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
/*
	envoi le nombre des La Closed
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_la_closed?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#la_closed').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#la_closed').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*
	envoi le nombre des La reviewed
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_la_reviewed?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#la_reviewed').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#la_reviewed').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*
	envoi le nombre des La reviewed
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/fn_prospect?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#lead_crees').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#lead_crees').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*
	envoi l'heure du dernier batch 
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/heure_batch",
            dataType: "json",
			beforeSend: function() {
              $('#heure_batch').val('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#heure_batch').val(names);
            },
            error: function (result) {
                alert("Error");
            }
        });