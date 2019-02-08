var iduser = sessionStorage.getItem("iduser"); 

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
            url: "../controller/api/data_cc_dashbord?iduser="+iduser,
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
				var NbDec = data[0].NbDec;
				var VlDec = data[0].VlDec;
				var NbClt = data[0].NbClt;
				var Vlclt = data[0].Vlclt;
				var NbPar0 = data[0].NbPar0;
				var VlPar0 = data[0].VlPar0;
				var perPar0 = data[0].perPar0;
				var NbPar10 = data[0].NbPar10;
				var VlPar10 = data[0].VlPar10;
				var perPar10 = data[0].perPar10;
				var NbPar30 = data[0].NbPar30;
				var VlPar30 = data[0].VlPar30;
				var perPar30 = data[0].perPar30;
				var nbpenal = data[0].nbpenal;
				
               $('#nb_pending').val(nbpending);
			   $('#nb_pending_10').val(nbpending10);
			   $('#decaissement_clt').val(NbDec);
			   $('#decaissement_vl').val(VlDec);
			   $('#nb_clt').val(NbClt);
			   $('#vl_clt').val(Vlclt);
			   $('#par0').val(NbPar0);
			   $('#volpar0').val(VlPar0);
			   $('#per_par0').val(perPar0+' %');
			   $('#par10').val(NbPar10);
			   $('#vlpar10').val(VlPar10);
			   $('#per_par10').val(perPar10+' %');
			   $('#par30').val(NbPar30);
			   $('#vlpar30').val(VlPar30);
			   $('#impaye_penal').val(nbpenal);
			   $('#per_par30').val(perPar30+' %');
			   
            },
            error: function (result) {
                alert("Error");
            }
        });
