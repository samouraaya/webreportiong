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
				 $("#000TN").click(function () {

                    $("#container").load('page_info.html');
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
				$("#decaismder").click(function () {

                    $("#container").load('lst_decaiss_m.html');
                });
				$("#decaism").click(function () {

                    $("#container").load('lst_decaiss.html');
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
				/*Rapport Maturité 08/02/2016*/
				$("#liste_maturite_40").click(function () {

                    $("#container").load('lst_maturite_40.html');
                });
				$("#passwd").click(function () {

                    window.location.href='../../cnx/'
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