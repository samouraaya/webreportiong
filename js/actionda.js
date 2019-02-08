var nb_connexion = sessionStorage.getItem("nb_connexion"); 
var pwd = sessionStorage.getItem("pwd"); 			
		
            $(document).ready(function () {
				if ((nb_connexion==0) && ((pwd=="advans") || (pwd=="Advans")))
				{
					window.location.href='../../cnx/'
				}
				else {
			
			$('#container').load('page_info.html');
			
                $("#demande1").click(function () {

                    $("#container").load('lst_demande.html');
                });
                $("#caisse_principal").click(function () {

                    $("#container").load('caisse_principal.html');
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
				/*Rapport Maturité 08/02/2016*/
				$("#liste_maturite_40").click(function () {

                    $("#container").load('lst_maturite_40.html');
                });
				$("#passwd").click(function () {

                    window.location.href='../../cnx/'
                });
				$("#clot_anticip_m").click(function () {

                    $("#container").load('lst_clot_anticip_m.html');
                });
				/*23/05/2016 Audit AC*/
				$("#audit_ac").click(function () {

                    $("#container").load('audit_ac.html');
                });
				/*30/06/2016 GRAPH DA */
				$("#stats").click(function () {

                    $("#container").load('../../module_graph_da/graph_da.html');
                });
				/*23/08/2016 fn_transfere_cr.php*/
				$("#transfere_cr").click(function () {

                    $("#container").load('lst_transfere_cr.html');
                });
				
				/******30062016 Histo global**************/
				$("#global").click(function () {

                    $("#container").load('histo_global.html');
                });
				/*07/10/2016 reporting_crm_hebdo*/
				$("#reporting_crm_hebdo").click(function () {

                    $("#container").load('reporting_crm_hebdo.html');
               
                });
				$("#lst_endet_croise").click(function () {
                    $("#container").load('lst_endet_croise.html');
                });
				$("#lst_r_abondan").click(function () {
                        $("#container").load('lst_r_abondan.html');
                    });
                    $("#lst_r_clients_credit_complem").click(function () {
                        $("#container").load('lst_r_clients_credit_complem.html');
                    });
				}
            });