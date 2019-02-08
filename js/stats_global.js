var total_dec;
			$.getJSON("../controller/api/som_decaiss_total", function (result) {total_dec=result; });
var total_encrous;
			$.getJSON("../controller/api/som_encours_per", function (result) {total_encrous=result; });
var nb_dec_110;
			$.getJSON("../controller/api/nb_dec_br_110", function (result) {nb_dec_110=result; });
var nb_dec_120;
			$.getJSON("../controller/api/nb_dec_br_120", function (result) {nb_dec_120=result; });
var nb_dec_130;
			$.getJSON("../controller/api/nb_dec_br_130", function (result) {nb_dec_130=result; });
var nb_dec_tot;
			$.getJSON("../controller/api/nb_dec_tot", function (result) {nb_dec_tot=result; });
var vl_demande_stats;
		$.getJSON("../controller/api/vl_demande_stats", function (result) {vl_demande_stats=result; });
var nb_demande_stats;
		$.getJSON("../controller/api/nb_demande_stats", function (result) {nb_demande_stats=result; });
/*var histo_cc_chart;
		$.getJSON("../controller/api/fn_histo_cc_chart", function (result) {histo_cc_chart=result; });*/