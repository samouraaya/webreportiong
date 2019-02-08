/* retourne heure batch*/
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
/* retourne l'encours de l'agence 100*/
	$.ajax({
            type: "GET",
            url: "../controller/api/Encours_100",
            dataType: "json",
			beforeSend: function() {
              $('#encours100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#encours100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });			
/* retourne l'encours de l'agence 110*/
	$.ajax({
            type: "GET",
            url: "../controller/api/Encours_110",
            dataType: "json",
			beforeSend: function() {
              $('#encours110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#encours110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
/* retourne l'encours de l'agence 120*/
	$.ajax({

            type: "GET",
            url: "../controller/api/Encours_120",
            dataType: "json",
			beforeSend: function() {
              $('#encours120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#encours120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne l'encours de l'agence 130*/
	$.ajax({

            type: "GET",
            url: "../controller/api/Encours_130",
            dataType: "json",
			beforeSend: function() {
              $('#encours130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#encours130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de client l'agence 100*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_clt_act_100",
            dataType: "json",
			beforeSend: function() {
              $('#cltact100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#cltact100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne l'encours de l'agence total*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_clt_act_110",
            dataType: "json",
			beforeSend: function() {
              $('#cltact110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#cltact110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de client l'agence 120*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_clt_act_120",
            dataType: "json",
			beforeSend: function() {
              $('#cltact120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#cltact120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de client l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_clt_act_130",
            dataType: "json",
			beforeSend: function() {
              $('#cltact130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#cltact130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
/* retourne le nombre de client l'agence 110*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_auj_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecauj110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecauj110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
/* retourne le nombre de décaissement l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_auj_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecauj120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecauj120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de décaissement l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_auj_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbdecauj130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdecauj130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de décaissement l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_auj_110",
            dataType: "json",
			beforeSend: function() {
              $('#vldecauj110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecauj110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
/* retourne le volume de décaissement l'agence 120*/
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_auj_120",
            dataType: "json",
			beforeSend: function() {
              $('#vldecauj120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecauj120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de décaissement l'agence 130*/
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_auj_130",
            dataType: "json",
			beforeSend: function() {
              $('#vldecauj130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldecauj130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de décaissement l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbech100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbech100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de décaissement l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbech110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbech110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance prévu l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbech120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbech120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance prévu l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbech130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbech130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance prévu l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_imp_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbechimp100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbechimp100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance prévu l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_imp_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbechimp110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbechimp110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance impayé l'agence 120*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_imp_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbechimp120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbechimp120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance impayé l'agence 130*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_ech_imp_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbechimp130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbechimp130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de échéance impayé l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par0_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar0110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar0110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR0 l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par0_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar0100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar0100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR0 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par0_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar0120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar0120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR0 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par0_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar0130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar0130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR0 l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par0_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar0110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar0110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le VOLUME de PAR0 l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par0_100",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar0100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar0100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le VOLUME de PAR0 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par0_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar0120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar0120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le VOLUME de PAR0 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par0_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar0130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar0130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR0 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par30_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar30110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar30110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR30 l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par30_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar30100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar30100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR30 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par30_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar30120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar30120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 /* retourne le nombre de PAR30 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par30_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar0130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar30130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR30 l'agence 100*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par30_100",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar30100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar30100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR30 l'agence 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par30_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar30110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar30110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR30 l'agence 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par30_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar30120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar30120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR30 l'agence 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par30_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar30130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar30130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR7 l'agence 100*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par7_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar7100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar7100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR7 l'agence 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par7_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar7110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar7110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR7 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par7_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar7120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar7120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR7 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par7_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar7130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar7130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR7 l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par7_100",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar7100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar7100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR7 l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par7_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar7110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar7110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR7 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par7_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar7120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar7120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR7 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par7_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar7130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar7130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR90 l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par90_100",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar90100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar90100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR90 l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par90_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar90110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar90110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR90 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par90_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar90120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar90120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de PAR90 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_par90_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbpar90130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbpar90130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR90 l'agence 100*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par90_100",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar90100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar90100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR90 l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par90_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar90110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar90110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR90 l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par90_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar90120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar90120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de PAR90 l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_par90_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlpar90130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpar90130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de demande l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de demande l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre de demande l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#vldmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#vldmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#vldmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande cloturé l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/clo_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#clodmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#clodmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande cloturé l'agence 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/clo_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#clodmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#clodmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande cloturé l'agence 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/clo_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#clodmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#clodmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande pending l'agence 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/pen_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#pendmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#pendmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande pending l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/pen_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#pendmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#pendmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande pending l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/pen_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#pendmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#pendmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/rev_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#revdmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#revdmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 /* retourne le volume de demande reviewed l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/rev_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#revdmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#revdmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/rev_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#revdmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#revdmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/app_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#appdmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#appdmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande approved l'agence 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/app_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#appdmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#appdmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande approved l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/app_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#appdmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#appdmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande approved l'agence 130*/
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_pen_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlpendmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpendmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 /* retourne le volume de demande pending l'agence 120*/
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_pen_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlpendmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpendmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande pending l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_pen_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlpendmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlpendmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 130*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_rev_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlrevdmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlrevdmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_rev_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlrevdmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlrevdmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_rev_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlrevdmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlrevdmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande reviewed l'agence 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_app_dmd_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlappdmd130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlappdmd130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande approved l'agence 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_app_dmd_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlappdmd120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlappdmd120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume de demande approved l'agence 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_app_dmd_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlappdmd110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlappdmd110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le cumul des demandes de cette semaine 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_week_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd110week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd110week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le cumul des demandes de cette semaine 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_week_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd120week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd120week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le cumul des demandes de cette semaine 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_week_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd130week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd130week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre des crédits de cette semaine 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_week_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr110week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr110week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le nombre des crédits de cette semaine 120*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_week_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr120week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr120week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 /* retourne le nombre des crédits de cette semaine 130*/
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_week_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr130week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr130week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume des crédits de cette semaine 110*/	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_week_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr110week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr110week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume des crédits de cette semaine 120*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_week_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr120week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr120week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume des crédits de cette semaine 130*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_week_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr130week').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr130week').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* retourne le volume des crédits de cette semaine 110*/		
	$.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_month_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd110month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd110month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_month_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd120month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd120month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/cum_dmd_month_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbdmd130month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbdmd130month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_month_110",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr110month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr110month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_month_120",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr120month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr120month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/nb_cr_month_130",
            dataType: "json",
			beforeSend: function() {
              $('#nbcr130month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#nbcr130month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_month_110",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr110month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr110month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_month_120",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr120month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr120month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/vl_cr_month_130",
            dataType: "json",
			beforeSend: function() {
              $('#vlcr130month').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vlcr130month').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
