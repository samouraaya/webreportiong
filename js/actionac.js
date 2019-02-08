var nb_connexion = sessionStorage.getItem("nb_connexion"); 
var pwd = sessionStorage.getItem("pwd"); 			
		
            $(document).ready(function () {
				if ((nb_connexion==0) && ((pwd=="advans") || (pwd=="Advans")))
				{
					window.location.href='../../cnx/'
				}
				else {
			
			$('#container').load('audit_ac.html');
			
                $("#demande1").click(function () {

                    $("#container").load('lst_demande.html');
                });
				$("#stats").click(function () {

                    $("#container").load('statistique_da.html');
                });
				 $("#000TN").click(function () {

                    $("#container").load('page_info.html');
                });
				$("#echattend").click(function () {

                    $("#container").load('lst_ech_attendu.html');
                });
				$("#echjour").click(function () {

                    $("#container").load('lst_ech_auj.html');
                });
				$("#impsimple").click(function () {

                    $("#container").load('lst_impaye.html');
                });
					$("#impdet").click(function () {

                    $("#container").load('lst_impaye_det.html');
                });
					$("#engage").click(function () {

                    $("#container").load('lst_engagement.html');
                });
					$("#repectechm").click(function () {

                    $("#container").load('lst_respect_ech.html');
                });
					$("#repectechmder").click(function () {

                    $("#container").load('lst_respect_ech_m.html');
                });
				$("#coorclt").click(function () {

                    $("#container").load('lst_coor_clt.html');
                });
				$("#cltm").click(function () {

                    $("#container").load('lst_clt_closed.html');
                });
				$("#decaissmder").click(function () {

                    $("#container").load('lst_decaiss_m.html');
                });
				$("#decaissm").click(function () {

                    $("#container").load('lst_decaiss.html');
                });
				$("#demandeclose").click(function () {

                    $("#container").load('lst_dmd_closed.html');
                });
				$("#visitcrm").click(function () {

                    $("#container").load('lst_visite_crm.html');
                });
				$("#portfeuille").click(function () {

                    $("#container").load('lst_portfeuille.html');
                });
				$("#objectif").click(function () {

                    $("#container").load('fn_objectif.html');
                });
				$("#dqcagence").click(function () {

                    $("#container").load('dqc_agence/index.html');
                });
				$("#reporting").click(function () {

                    $("#container").load('reporting.html');
                });
				$("#global").click(function () {

                    $("#container").load('histo_global.html');
                });
				$("#passwd").click(function () {

                    window.location.href='../../cnx/'
                });
				$("#clot_anticip_m").click(function () {

                    $("#container").load('lst_clot_anticip_m.html');
                });
				/*18/04/2016 Audit AC*/
				$("#audit_ac").click(function () {

                    $("#container").load('audit_ac.html');
                });
				/*18/04/2016 Audit AC*/
				$("#liste_maturite_40").click(function () {

                    $("#container").load('lst_maturite_40.html');
                });
				$("#lst_endet_croise").click(function () {
                    $("#container").load('lst_endet_croise.html');
                });
				}
            });