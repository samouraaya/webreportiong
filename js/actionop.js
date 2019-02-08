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
				
                $("#demande1").click(function () {

                    $("#container").load('lst_demande.html');
                });
				 $("#budget").click(function () {

                    $("#container").load('budget.html');
                });
				$("#echattendu").click(function () {

                    $("#container").load('lst_ech_attendu.html');
                });
				$("#echj").click(function () {

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
				$("#dqcagence").click(function () {

                    $("#container").load('dqc_agence/index.html');
                });
				$("#reporting").click(function () {

                    $("#container").load('reporting.html');
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
				/*23/05/2016 Audit AC*/
				$("#imprelance").click(function () {

                    $("#container").load('lst_impaye_relance.html');
				 });
				/*07/10/2016 reporting_crm_hebdo*/
				$("#reporting_crm_hebdo").click(function () {

                    $("#container").load('reporting_crm_hebdo.html');
               
                });
				/*Onglet protfeuille CDR 16/12/2016 */
				$("#portfeuille_cdr").click(function () {

                    $("#container").load('lst_portfeuille_cdr.html');
                });
					/**************Recouvrement*/
						$("#synth").click(function () {
                    $("#container").load('lst_rec_synthese.html');
                });
		
				
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