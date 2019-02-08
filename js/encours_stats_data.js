		var total_dec_hist;
		$.getJSON("../controller/api/encours_nb_stats", function (result) {total_dec_hist=result; });
		
		var total_encours_hist;
		$.getJSON("../controller/api/encours_vl_stats", function (result) {total_encours_hist=result; });
		
