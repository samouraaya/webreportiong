var nb_connexion = sessionStorage.getItem("nb_connexion"); 
var pwd = sessionStorage.getItem("pwd"); 			
		
            $(document).ready(function () {
				if ((nb_connexion==0) && ((pwd=="advans") || (pwd=="Advans")))
				{
					window.location.href='../../cnx/'
				}
				else {
					
					$('#container').load('page_info.html');
			
				 $("#info_page").click(function () {

                    $("#container").load('page_info.html');
                });
				/*******************************/
				
					$("#reporting").click(function () {

                    $("#container").load('reporting.html');
                });
				$("#prod").click(function () {

                    $("#container").load('prod.html');
                });	
				$("#budgetm").click(function () {

                    $("#container").load('budgetm.html');
                });	
				$("#prodglob").click(function () {

                    $("#container").load('prod_synthetique.html');
                });	
				$("#global").click(function () {

                    $("#container").load('histo_global.html');
                });	
			$("#encours").click(function () {

                    $("#container").load('encours_hist_stats.html');
                });
			///////////////////////////////////////////	
				$("#stats").click(function () {

                    $("#container").load('../../module_graphs/graph_dg.html');
                });
			//////////////////////////////////
                $("#demande1").click(function () {

                    $("#container").load('lst_demande.html');
                });
			///////////////////////////////////	
				 $("#provision").click(function () {

                    $("#container").load('provision.html');
                });
				$("#provisionm").click(function () {

                    $("#container").load('provisionm.html');
                });
			//////////////////////////////////////////////////////
				 $("#budget").click(function () {

                    $("#container").load('budget.html');
                });
				
				/*******************************/
			
				$("#echattendu").click(function () {

                    $("#container").load('lst_ech_attendu.html');
                });
				$("#echj").click(function () {

                    $("#container").load('lst_ech_auj.html');
                });
			////////////////////////////////////////////	
				$("#impsimple").click(function () {

                    $("#container").load('lst_impaye.html');
                });
				
					$("#impdet").click(function () {

                    $("#container").load('lst_impaye_det.html');
                });
					$("#engage").click(function () {

                    $("#container").load('lst_engagement.html');
                });
					$("#resechencrous").click(function () {

                    $("#container").load('lst_respect_ech.html');
                });
					$("#resecheder").click(function () {

                    $("#container").load('lst_respect_ech_m.html');
                });
				$("#coorclt").click(function () {

                    $("#container").load('lst_coor_clt.html');
                });
				$("#cltmcours").click(function () {

                    $("#container").load('lst_clt_closed.html');
                });
				$("#decaismder").click(function () {

                    $("#container").load('lst_decaiss_m.html');
                });
				$("#decaism").click(function () {

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
				$("#transfere_cr").click(function () {

                    $("#container").load('lst_transfere_cr.html');
                });
				$("#clot_anticip_m").click(function () {

                    $("#container").load('lst_clot_anticip_m.html');
                });
				$("#clot_anticip").click(function () {

                    $("#container").load('lst_clot_anticip.html');
                });
				/*Liste demande CDR 13/01/2016 */
				$("#demandecdr").click(function () {

                    $("#container").load('lst_demande_cdr.html');
                });
				/*Rapport Maturité 08/02/2016*/
				$("#liste_maturite_40").click(function () {

                    $("#container").load('lst_maturite_40.html');
                });
				/*Onglet backoffice 22/02/2016 */
				$("#liste_regul").click(function () {

                    $("#container").load('lst_regul.html');
                });
				$("#liste_ech_bo").click(function () {

                    $("#container").load('liste_ech_bo.html');
                });
				/*Onglet protfeuille CDR 26/02/2016 */
				$("#portfeuille_cdr").click(function () {

                    $("#container").load('lst_portfeuille_cdr.html');
                });
				$("#reporting_info_client").click(function () {

                    $("#container").load('lst_portfeuille_cdr_bank.html');
                });
				$("#passwd").click(function () {

                    window.location.href='../../cnx/'
                });
				/*28/04/2016 Tirage Ligne Banque Mondiale*/
				$("#tirage_BM").click(function () {

                    $("#container").load('tirage_BM.html');
                });
				/*29/04/2016 Tirage Ligne Banque Mondiale*/
				$("#notification").click(function () {

                    $("#container").load('notification.html');
                });
				/*23/05/2016 Audit AC*/
				$("#audit_ac").click(function () {

                    $("#container").load('audit_ac.html');
                });
				/* 31/05/2016 Silatech*/
				$("#Silatech").click(function () {

                    $("#container").load('lst_reporting_silatech.html');
                });
				/* 27/06/2016 maturite_portefeuille*/
				$("#maturite_portefeuille").click(function () {

                    $("#container").load('maturite_portefeuille.html');
                });
				/* 05/07/2016 par_acm*/
				$("#par_acm").click(function () {

                    $("#container").load('par_acm.html');
                });
				/* 05/07/2016 par_acm*/
				$("#Rapport_ACM").click(function () {

                    $("#container").load('rapport_acm.html');
                });
				$("#reserve_credit").click(function () {

                    $("#container").load('reserve_credit.html');
                });
				/*07/10/2016 reporting_crm_hebdo*/
				$("#reporting_crm_hebdo").click(function () {

                    $("#container").load('reporting_crm_hebdo.html');
                });
				/*10/10/2016 conforme_cdr_orbit*/
				$("#cdr_orbit").click(function () {

                    $("#container").load('conforme_cdr_orbit.html');
                });
				/*Objectif importation*/
				$("#import_obj").click(function () {
                    $("#container").load('../../objectif/objectif.html');
                });
				/*Objectif importation*/
				$("#lst_cr_ref").click(function () {
                    $("#container").load('lst_cr_ref.html');
                });
				/*lst_reporting_frais_gage*/
				$("#lst_reporting_frais_gage").click(function () {
                    $("#container").load('lst_reporting_frais_gage.html');
                });
				/*lst_reporting_test_garantis*/
				$("#lst_reporting_test_garantis").click(function () {
                    $("#container").load('lst_reporting_test_garantis.html');
                });
				/*lst_reporting_test_garantis*/
				$("#lst_reporting_histo_gl").click(function () {
                    $("#container").load('lst_reporting_histo_gl.html');
                });
				/*****************************/
				$("#synth").click(function () {
                    $("#container").load('lst_rec_synthese.html');
                });
				/**********************/
				
				$("#clot").click(function () {
                    $("#container").load('lst_rec_cloture.html');
                });
				$("#clotprec").click(function () {
                    $("#container").load('lst_rec_cloture_precedent.html');
                });
				$("#flxremb").click(function () {
                    $("#container").load('lst_rec_flx_rem.html');
                });
				$("#flxrembprec").click(function () {
                    $("#container").load('lst_rec_flx_rem_prec.html');
                });
				
				
				$("#actn").click(function () {
                    $("#container").load('lst_rec_actions.html');
                });
				
					$("#strategie").click(function () {
                    $("#container").load('lst_rec_strategies.html');
                });
				
				
				}
            });