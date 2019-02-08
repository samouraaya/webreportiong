var nb_connexion = sessionStorage.getItem("nb_connexion"); 
var pwd = sessionStorage.getItem("pwd"); 			
		
            $(document).ready(function () {
				if ((nb_connexion==0) && ((pwd=="advans") || (pwd=="Advans")))
				{
					$("#container").load('change_pwd.html');
					alert('Merci de changer votre mot de passe suite a votre 1ere Connexion')
				}
				else {
			
			$('#container').load('provisionm.html');
			
				 $("#info_page").click(function () {

                    $("#container").load('page_info.html');
                });
				
				$("#provisionm").click(function () {

                    $("#container").load('provisionm.html');
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

                    $("#container").load('change_pwd.html');
                });
				}
            });