$.ajax({

            type: "GET",
            url: "../controller/api/fn_pf_nonaccrual_rec",
            dataType: "json",
            success: function (data) {
				var vl_pf_rec_nonaccrual = data[0].vl_pf_rec_nonaccrual;
				var nb_pf_rec_nonaccrual = data[0].nb_pf_rec_nonaccrual;
				
               $('#vl_pf_rec_nonaccrual').text(vl_pf_rec_nonaccrual);
			   $('#nb_pf_rec_nonaccrual').text(nb_pf_rec_nonaccrual);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
$.ajax({

            type: "GET",
            url: "../controller/api/fn_pf_chargeoff_rec",
            dataType: "json",
            success: function (data) {
				var vl_pf_rec_chargeoff = data[0].vl_pf_rec_chargeoff;
				var nb_pf_rec_chargeoff = data[0].nb_pf_rec_chargeoff;
				
               $('#vl_pf_rec_chargeoff').text(vl_pf_rec_chargeoff);
			   $('#nb_pf_rec_chargeoff').text(nb_pf_rec_chargeoff);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
$.ajax({

            type: "GET",
            url: "../controller/api/fn_pf_nb_pf_clot",
            dataType: "json",
            success: function (data) {

				var nb_pf_clot = data[0].nb_pf_clot;
				
			   $('#nb_pf_clot').text(nb_pf_clot);
            },
            error: function (result) {
                alert("Error");
            }
        });