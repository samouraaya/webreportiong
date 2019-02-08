var agence = sessionStorage.getItem("agence");

/*
	envoi l'heure du dernier batch 
*/
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
/*
	envoi le nombre des demandes en statut pending
*/
 $.ajax({

            type: "GET",
            url: "../controller/api/data_da_dashbord?agence="+agence,
            dataType: "json",
			beforeSend: function() {
              $('#nb_pending').val('loading...');
			  $('#nb_pending_10').val('loading...');
			  $('#decaissement_clt').val('loading...');
			  $('#decaissement_vl').val('loading...');
			  $('#nb_clt').val('loading...');
			  $('#vl_clt').val('loading...');
			  $('#par0').val('loading...');
			  $('#volpar0').val('loading...');
			  $('#per_par0').val('loading...');
			  $('#impaye_penal').val('loading...');
			  $('#par30').val('loading...');
			  $('#vlpar30').val('loading...');
			  $('#per_par30').val('loading...');
			  $('#par10').val('loading...');
			  $('#vlpar10').val('loading...');
			  $('#per_par10').val('loading...');
			  
           },
            success: function (data) {
				
				var nbpending = data[0].nbpending;
				var nbpending10 = data[0].nbpending10;
				var nbdec = data[0].nbdec;
				var vldec = data[0].vldec;
				var nbclt = data[0].nbclt;
				var vlclt = data[0].vlclt;
				var NBPAR0 = data[0].NBPAR0;
				var Vlpar0 = data[0].Vlpar0;
				var perPar0 = data[0].perPar0;
				var NBPAR10 = data[0].NBPAR10;
				var vlpar10 = data[0].vlpar10;
				var perPAR10 = data[0].perPAR10;
				var NBPAR30 = data[0].NBPAR30;
				var VLpar30 = data[0].VLpar30;
				var perPar30 = data[0].perPar30;
				var moydec = data[0].moydec;
				
               $('#nb_pending').val(nbpending);
			   $('#nb_pending_10').val(nbpending10);
			   $('#decaissement_clt').val(nbdec);
			   $('#decaissement_vl').val(vldec);
			   $('#nb_clt').val(nbclt);
			   $('#vl_clt').val(vlclt);
			   $('#par0').val(NBPAR0);
			   $('#volpar0').val(Vlpar0);
			   $('#per_par0').val(perPar0+' %');
			   $('#par10').val(NBPAR10);
			   $('#vlpar10').val(vlpar10);
			   $('#per_par10').val(perPAR10+' %');
			   $('#par30').val(NBPAR30);
			   $('#vlpar30').val(VLpar30);
			   $('#per_par30').val(perPar30+' %');
			   $('#vl_moyenne_dec').val(moydec);
            },
            error: function (result) {
                alert("Error");
            }
        });