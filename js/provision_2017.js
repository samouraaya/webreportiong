	$.ajax({
            type: "GET",
            url: "../controller/api/Provision_prood_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Sain').html('calcul en cours...');
			  $('#Sainnb').html('calcul en cours...');
			  $('#Total').html('calcul en cours...');
			  $('#PAR0').html('calcul en cours...');
			  $('#PAR0RES').html('calcul en cours...');
			  $('#PAR30').html('calcul en cours...');
			  $('#PAR60').html('calcul en cours...');
			  $('#PAR90').html('calcul en cours...');
			  $('#PAR180').html('calcul en cours...');
			  $('#PAR30RES').html('calcul en cours...');
			  $('#Totalnb').html('calcul en cours...');
			  $('#SainRESnb').html('calcul en cours...');
			  $('#SainRES').html('calcul en cours...');
			  $('#PAR0nb').html('calcul en cours...');
			  $('#nbPAR0').html('calcul en cours...');
			  $('#nbPAR30').html('calcul en cours...');
			  $('#PAR60nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180nb').html('calcul en cours...');
			  $('#PAR30RESnb').html('calcul en cours...');
			  $('#PAR120').html('calcul en cours...');
			  $('#PAR120nb').html('calcul en cours...');
			  $('#PAR90nb').html('calcul en cours...');
			  
           },
            success: function (data) {
				var Sain = data[0].Sain;
				var Sainnb = data[0].Sainnb;
				var Total = data[0].Total;
				var PAR0 = data[0].PAR0;
				var PAR0RES = data[0].PAR0RES;
				var PAR30 = data[0].PAR30;
				var PAR60 = data[0].PAR60;
				var PAR90 = data[0].PAR90;
				var PAR180 = data[0].PAR180;
				var PAR30RES = data[0].PAR30RES;
				var Totalnb = data[0].Totalnb;
				var SainRESnb = data[0].SainRESnb;
				var SainRES = data[0].SainRES;
				var PAR0nb = data[0].PAR0nb;
				var nbPAR0 = data[0].nbPAR0;
				var nbPAR30 = data[0].nbPAR30;
				var PAR60nb = data[0].PAR60nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180nb = data[0].PAR180nb;
				var PAR30RESnb = data[0].PAR30RESnb;
				var PAR120nb = data[0].PAR120nb;
				var PAR120 = data[0].PAR120;
				var PAR90nb = data[0].PAR90nb;
				
				var provadvtn=parseFloat(Sain.replace(/ /g, '').replace(',', '.'));
				var provacmpar0=parseFloat(PAR0.replace(/ /g, '').replace(',', '.'));
				var provacmpar30=parseFloat(PAR30.replace(/ /g, '').replace(',', '.'));
				var provacmpar60=parseFloat(PAR60.replace(/ /g, '').replace(',', '.'));
				var provacmpar90=parseFloat(PAR90.replace(/ /g, '').replace(',', '.'));
				var provacmpar180=parseFloat(PAR180.replace(/ /g, '').replace(',', '.'));
				var provacmpar120=parseFloat(PAR120.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES=parseFloat(PAR0RES.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES=parseFloat(PAR30RES.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES=parseFloat(SainRES.replace(/ /g, '').replace(',', '.'));
				
				var totalprovadvtn = (provadvtn*0.005)+(provacmpar0*0.1)+(provacmpar30*0.4)+(provacmpar60*0.7)+(provacmpar90*1)+(provacmpar120*1)+(provacmpar180*1)+(provacmSainRES*0.2)+(provacmPAR0RES*0.5)+(provacmPAR30RES*1);
				
				var totalprovacm = (provadvtn*0)+(provacmpar0*0.1)+(provacmpar30*0.25)+(provacmpar60*0.5)+(provacmpar90*0.75)+(provacmpar120*1)+(provacmpar180*1)+(provacmSainRES*0.25)+(provacmPAR0RES*0.25)+(provacmPAR30RES*0.25);
				
               $('#Sain').html(Sain); $('#provacmsain').html(((provadvtn*0).toFixed(3)).replace('.', ',')); $('#provadvtnsain').html(((provadvtn*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain').html(((provadvtn*0-provadvtn*0.005).toFixed(3)).replace('.', ','));
			   $('#Sainnb').html(Sainnb);
			   $('#Total').html(Total); $('#Totalproadvntn').html(((totalprovadvtn*1).toFixed(3)).replace('.', ',')); $('#Totalprovacm').html(((totalprovacm*1).toFixed(3)).replace('.', ',')); $('#Totalprovdiff').html(((totalprovacm*1-totalprovadvtn*1).toFixed(3)).replace('.', ','));
			   $('#PAR0').html(PAR0); $('#provacmpar0').html(((provacmpar0*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0').html(((provacmpar0*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0').html(((provacmpar0*0.1-provacmpar0*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES').html(PAR0RES); $('#provacmPAR0res').html(((provacmPAR0RES*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnPAR0res').html(((provacmPAR0RES*0.5).toFixed(3)).replace('.', ',')); $('#provdiffPAR0res').html(((provacmPAR0RES*0.25-provacmPAR0RES*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30').html(PAR30); $('#provacmpar30').html(((provacmpar30*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30').html(((provacmpar30*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30').html(((provacmpar30*0.25-provacmpar30*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60').html(PAR60); $('#provacmpar60').html(((provacmpar60*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60').html(((provacmpar60*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60').html(((provacmpar60*0.5-provacmpar60*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90').html(PAR90); $('#provacmpar90').html(((provacmpar90*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90').html(((provacmpar90*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90').html(((provacmpar90*0.75-provacmpar90*1).toFixed(3)).replace('.', ','));
			   $('#PAR180').html(PAR180); $('#provacmpar180').html(((provacmpar180*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180').html(((provacmpar180*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180').html(((provacmpar180*1-provacmpar180*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES').html(PAR30RES); $('#provacmPAR30res').html(((provacmPAR30RES*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnPAR30res').html(((provacmPAR30RES*1).toFixed(3)).replace('.', ',')); $('#provdiffPAR30res').html(((provacmPAR30RES*0.25-provacmPAR30RES*1).toFixed(3)).replace('.', ','));
			   $('#Totalnb').html(Totalnb);
			   $('#SainRESnb').html(SainRESnb);
			   $('#SainRES').html(SainRES); $('#provacmsainres').html(((provacmSainRES*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnsainres').html(((provacmSainRES*0.2).toFixed(3)).replace('.', ',')); $('#provdiffsainres').html(((provacmSainRES*0.25-provacmSainRES*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0nb').html(PAR0nb);
			   $('#nbPAR0').html(nbPAR0);
			   $('#nbPAR30').html(nbPAR30);
			   $('#PAR60nb').html(PAR60nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180nb').html(PAR180nb);
			   $('#PAR30RESnb').html(PAR30RESnb);
			   $('#PAR120nb').html(PAR120nb);
			   $('#PAR120').html(PAR120); $('#provacmpar120').html(((provacmpar120*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120').html(((provacmpar120*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120').html(((provacmpar120*1-provacmpar120*1).toFixed(3)).replace('.', ','));
			   $('#PAR90nb').html(PAR90nb);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
	

	$.ajax({
            type: "GET",
            url: "../controller/api/Provision_prood501_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Total501').html('calcul en cours...');
			  $('#Sain501').html('calcul en cours...');
			  $('#SainRES501').html('calcul en cours...');
			  $('#PAR0501').html('calcul en cours...');
			  $('#PAR0RES501').html('calcul en cours...');
			  $('#PAR30501').html('calcul en cours...');
			  $('#PAR60501').html('calcul en cours...');
			  $('#PAR90501').html('calcul en cours...');
			  $('#PAR180501').html('calcul en cours...');
			  $('#PAR30RES501').html('calcul en cours...');
			  $('#Total501nb').html('calcul en cours...');
			  $('#Sain501nb').html('calcul en cours...');
			  $('#SainRES501nb').html('calcul en cours...');
			  $('#PAR0501nb').html('calcul en cours...');
			  $('#PAR0RES501nb').html('calcul en cours...');
			  $('#PAR30501nb').html('calcul en cours...');
			  $('#PAR60501nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180501nb').html('calcul en cours...');
			  $('#PAR30RES501nb').html('calcul en cours...');
			  $('#PAR120501nb').html('calcul en cours...');
			  $('#PAR120501').html('calcul en cours...');
			  $('#PAR90501nb').html('calcul en cours...');

			  
           },
            success: function (data) {
				var Total501 = data[0].Total501;
				var Sain501 = data[0].Sain501;
				var SainRES501 = data[0].SainRES501;
				var PAR0501 = data[0].PAR0501;
				var PAR0RES501 = data[0].PAR0RES501;
				var PAR30501 = data[0].PAR30501;
				var PAR60501 = data[0].PAR60501;
				var PAR90501 = data[0].PAR90501;
				var PAR180501 = data[0].PAR180501;
				var PAR30RES501 = data[0].PAR30RES501;
				var Total501nb = data[0].Total501nb;
				var Sain501nb = data[0].Sain501nb;
				var SainRES501nb = data[0].SainRES501nb;
				var PAR0501nb = data[0].PAR0501nb;
				var PAR0RES501nb = data[0].PAR0RES501nb;
				var PAR30501nb = data[0].PAR30501nb;
				var PAR60501nb = data[0].PAR60501nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180501nb = data[0].PAR180501nb;
				var PAR30RES501nb = data[0].PAR30RES501nb;
				var PAR120501nb = data[0].PAR120501nb;
				var PAR120501 = data[0].PAR120501;
				var PAR90501nb = data[0].PAR90501nb;

				
				var provadvtn501=parseFloat(Sain501.replace(/ /g, '').replace(',', '.'));
				var provacmpar0501=parseFloat(PAR0501.replace(/ /g, '').replace(',', '.'));
				var provacmpar30501=parseFloat(PAR30501.replace(/ /g, '').replace(',', '.'));
				var provacmpar60501=parseFloat(PAR60501.replace(/ /g, '').replace(',', '.'));
				var provacmpar90501=parseFloat((PAR90501.replace(/ /g, '')).replace(',', '.'));
				var provacmpar180501=parseFloat((PAR180501.replace(/ /g, '')).replace(',', '.'));
				var provacmpar120501=parseFloat(PAR120501.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES501=parseFloat(PAR0RES501.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES501=parseFloat(PAR30RES501.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES501=parseFloat(SainRES501.replace(/ /g, '').replace(',', '.'));
				
				
				var totalprovadvtn501 = (provadvtn501*0.005)+(provacmpar0501*0.1)+(provacmpar30501*0.4)+(provacmpar60501*0.7)+(provacmpar90501*1)+(provacmpar120501*1)+(provacmpar180501*1)+(provacmSainRES501*0.2)+(provacmPAR0RES501*0.5)+(provacmPAR30RES501*1);
				
				var totalprovacm501 = (provadvtn501*0)+(provacmpar0501*0.1)+(provacmpar30501*0.25)+(provacmpar60501*0.5)+(provacmpar90501*0.75)+(provacmpar120501*1)+(provacmpar180501*1)+(provacmSainRES501*0.25)+(provacmPAR0RES501*0.25)+(provacmPAR30RES501*0.25);
				
				
               $('#Total501').html(Total501); $('#Totalproadvntn501').html(((totalprovadvtn501*1).toFixed(3)).replace('.', ',')); $('#Totalproacm501').html(((totalprovacm501*1).toFixed(3)).replace('.', ',')); $('#provdiffres501').html(((totalprovacm501*1-totalprovadvtn501*1).toFixed(3)).replace('.', ','));
			   $('#Sain501').html(Sain501); $('#provacmsain501').html(provadvtn501*0); $('#provadvtnsain501').html(((provadvtn501*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain501').html(((provadvtn501*0-provadvtn501*0.005).toFixed(3)).replace('.', ','));
			   $('#SainRES501').html(SainRES501);  $('#provadvtnsainres501').html(((provacmSainRES501*0.2).toFixed(3)).replace('.', ',')); $('#provacmsainres501').html(((provacmSainRES501*0.25).toFixed(3)).replace('.', ',')); $('#provdiffsainres501').html(((provacmSainRES501*0.25-provacmSainRES501*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0501').html(PAR0501);  $('#provacmpar0501').html(((provacmpar0501*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0501').html(((provacmpar0501*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0501').html(((provacmpar0501*0.1-provacmpar0501*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES501').html(PAR0RES501); $('#provadvtnpar0res501').html(((provacmPAR0RES501*0.5).toFixed(3)).replace('.', ',')); $('#provacmpar0res501').html(((provacmPAR0RES501*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar0res501').html(((provacmPAR0RES501*0.25-provacmPAR0RES501*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30501').html(PAR30501); $('#provacmpar30501').html(((provacmpar30501*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30501').html(((provacmpar30501*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30501').html(((provacmpar30501*0.25-provacmpar30501*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60501').html(PAR60501); $('#provacmpar60501').html(((provacmpar60501*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60501').html(((provacmpar60501*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60501').html(((provacmpar60501*0.5-provacmpar60501*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90501').html(PAR90501); $('#provacmpar90501').html(((provacmpar90501*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90501').html(((provacmpar90501*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90501').html(((provacmpar90501*0.75-provacmpar90501*1).toFixed(3)).replace('.', ','));
			   $('#PAR180501').html(PAR180501); $('#provacmpar180501').html(((provacmpar180501*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180501').html(((provacmpar180501*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180501').html(((provacmpar180501*1-provacmpar180501*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES501').html(PAR30RES501); $('#provadvtnpar30res501').html(((provacmPAR30RES501*1).toFixed(3)).replace('.', ',')); $('#provacmpar30res501').html(((provacmPAR30RES501*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar30res501').html(((provacmPAR30RES501*0.25-provacmPAR30RES501*1).toFixed(3)).replace('.', ','));
			   $('#Total501nb').html(Total501nb); 
			   $('#Sain501nb').html(Sain501nb);
			   $('#SainRES501nb').html(SainRES501nb);
			   $('#PAR0501nb').html(PAR0501nb);
			   $('#PAR0RES501nb').html(PAR0RES501nb);
			   $('#PAR30501nb').html(PAR30501nb);
			   $('#PAR60501nb').html(PAR60501nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180501nb').html(PAR180501nb);
			   $('#PAR30RES501nb').html(PAR30RES501nb);
			   $('#PAR120501nb').html(PAR120501nb);
			   $('#PAR120501').html(PAR120501); $('#provacmpar120501').html(((provacmpar120501*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120501').html(((provacmpar120501*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120501').html(((provacmpar120501*1-provacmpar120501*1).toFixed(3)).replace('.', ','));
			   $('#PAR90501nb').html(PAR90501nb);
			   
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
	$.ajax({
            type: "GET",
            url: "../controller/api/Provision_prood511_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Total511').html('calcul en cours...');
			  $('#Sain511').html('calcul en cours...');
			  $('#SainRES511').html('calcul en cours...');
			  $('#PAR0511').html('calcul en cours...');
			  $('#PAR0RES511').html('calcul en cours...');
			  $('#PAR30511').html('calcul en cours...');
			  $('#PAR60511').html('calcul en cours...');
			  $('#PAR90511').html('calcul en cours...');
			  $('#PAR180511').html('calcul en cours...');
			  $('#PAR30RES511').html('calcul en cours...');
			  $('#Total511nb').html('calcul en cours...');
			  $('#Sain511nb').html('calcul en cours...');
			  $('#SainRES511nb').html('calcul en cours...');
			  $('#PAR0511nb').html('calcul en cours...');
			  $('#PAR0RES511nb').html('calcul en cours...');
			  $('#PAR30511nb').html('calcul en cours...');
			  $('#PAR60511nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180511nb').html('calcul en cours...');
			  $('#PAR30RES511nb').html('calcul en cours...');
			  $('#PAR120511nb').html('calcul en cours...');
			  $('#PAR120511').html('calcul en cours...');
			  $('#PAR90511nb').html('calcul en cours...');

			  
           },
            success: function (data) {
				var Total511 = data[0].Total511;
				var Sain511 = data[0].Sain511;
				var SainRES511 = data[0].SainRES511;
				var PAR0511 = data[0].PAR0511;
				var PAR0RES511 = data[0].PAR0RES511;
				var PAR30511 = data[0].PAR30511;
				var PAR60511 = data[0].PAR60511;
				var PAR90511 = data[0].PAR90511;
				var PAR180511 = data[0].PAR180511;
				var PAR30RES511 = data[0].PAR30RES511;
				var Total511nb = data[0].Total511nb;
				var Sain511nb = data[0].Sain511nb;
				var SainRES511nb = data[0].SainRES511nb;
				var PAR0511nb = data[0].PAR0511nb;
				var PAR0RES511nb = data[0].PAR0RES511nb;
				var PAR30511nb = data[0].PAR30511nb;
				var PAR60511nb = data[0].PAR60511nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180511nb = data[0].PAR180511nb;
				var PAR30RES511nb = data[0].PAR30RES511nb;
				var PAR120511nb = data[0].PAR120511nb;
				var PAR120511 = data[0].PAR120511;
				var PAR90511nb = data[0].PAR90511nb;

				
				var provadvtn511=parseFloat(Sain511.replace(/ /g, '').replace(',', '.'));
				var provacmpar0511=parseFloat(PAR0511.replace(/ /g, '').replace(',', '.'));
				var provacmpar30511=parseFloat(PAR30511.replace(/ /g, '').replace(',', '.'));
				var provacmpar60511=parseFloat(PAR60511.replace(/ /g, '').replace(',', '.'));
				var provacmpar90511=parseFloat((PAR90511.replace(/ /g, '')).replace(',', '.'));
				var provacmpar180511=parseFloat((PAR180511.replace(/ /g, '')).replace(',', '.'));
				var provacmpar120511=parseFloat(PAR120511.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES511=parseFloat(PAR0RES511.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES511=parseFloat(PAR30RES511.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES511=parseFloat(SainRES511.replace(/ /g, '').replace(',', '.'));
				
				
				var totalprovadvtn511 = (provadvtn511*0.005)+(provacmpar0511*0.1)+(provacmpar30511*0.4)+(provacmpar60511*0.7)+(provacmpar90511*1)+(provacmpar120511*1)+(provacmpar180511*1)+(provacmSainRES511*0.2)+(provacmPAR0RES511*0.5)+(provacmPAR30RES511*1);
				
				var totalprovacm511 = (provadvtn511*0)+(provacmpar0511*0.1)+(provacmpar30511*0.25)+(provacmpar60511*0.5)+(provacmpar90511*0.75)+(provacmpar120511*1)+(provacmpar180511*1)+(provacmSainRES511*0.25)+(provacmPAR0RES511*0.25)+(provacmPAR30RES511*0.25);
				
				
               $('#Total511').html(Total511); $('#Totalproadvntn511').html(((totalprovadvtn511*1).toFixed(3)).replace('.', ',')); $('#Totalproacm511').html(((totalprovacm511*1).toFixed(3)).replace('.', ',')); $('#provdiffres511').html(((totalprovacm511*1-totalprovadvtn511*1).toFixed(3)).replace('.', ','));
			   $('#Sain511').html(Sain511); $('#provacmsain511').html(provadvtn511*0); $('#provadvtnsain511').html(((provadvtn511*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain511').html(((provadvtn511*0-provadvtn511*0.005).toFixed(3)).replace('.', ','));
			   $('#SainRES511').html(SainRES511);  $('#provadvtnsainres511').html(((provacmSainRES511*0.2).toFixed(3)).replace('.', ',')); $('#provacmsainres511').html(((provacmSainRES511*0.25).toFixed(3)).replace('.', ',')); $('#provdiffsainres511').html(((provacmSainRES511*0.25-provacmSainRES511*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0511').html(PAR0511);  $('#provacmpar0511').html(((provacmpar0511*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0511').html(((provacmpar0511*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0511').html(((provacmpar0511*0.1-provacmpar0511*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES511').html(PAR0RES511); $('#provadvtnpar0res511').html(((provacmPAR0RES511*0.5).toFixed(3)).replace('.', ',')); $('#provacmpar0res511').html(((provacmPAR0RES511*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar0res511').html(((provacmPAR0RES511*0.25-provacmPAR0RES511*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30511').html(PAR30511); $('#provacmpar30511').html(((provacmpar30511*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30511').html(((provacmpar30511*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30511').html(((provacmpar30511*0.25-provacmpar30511*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60511').html(PAR60511); $('#provacmpar60511').html(((provacmpar60511*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60511').html(((provacmpar60511*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60511').html(((provacmpar60511*0.5-provacmpar60511*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90511').html(PAR90511); $('#provacmpar90511').html(((provacmpar90511*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90511').html(((provacmpar90511*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90511').html(((provacmpar90511*0.75-provacmpar90511*1).toFixed(3)).replace('.', ','));
			   $('#PAR180511').html(PAR180511); $('#provacmpar180511').html(((provacmpar180511*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180511').html(((provacmpar180511*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180511').html(((provacmpar180511*1-provacmpar180511*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES511').html(PAR30RES511); $('#provadvtnpar30res511').html(((provacmPAR30RES511*1).toFixed(3)).replace('.', ',')); $('#provacmpar30res511').html(((provacmPAR30RES511*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar30res511').html(((provacmPAR30RES511*0.25-provacmPAR30RES511*1).toFixed(3)).replace('.', ','));
			   $('#Total511nb').html(Total511nb); 
			   $('#Sain511nb').html(Sain511nb);
			   $('#SainRES511nb').html(SainRES511nb);
			   $('#PAR0511nb').html(PAR0511nb);
			   $('#PAR0RES511nb').html(PAR0RES511nb);
			   $('#PAR30511nb').html(PAR30511nb);
			   $('#PAR60511nb').html(PAR60511nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180511nb').html(PAR180511nb);
			   $('#PAR30RES511nb').html(PAR30RES511nb);
			   $('#PAR120511nb').html(PAR120511nb);
			   $('#PAR120511').html(PAR120511); $('#provacmpar120511').html(((provacmpar120511*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120511').html(((provacmpar120511*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120511').html(((provacmpar120511*1-provacmpar120511*1).toFixed(3)).replace('.', ','));
			   $('#PAR90511nb').html(PAR90511nb);
			   
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
	$.ajax({
            type: "GET",
            url: "../controller/api/Provision_prood521_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Total521').html('calcul en cours...');
			  $('#Sain521').html('calcul en cours...');
			  $('#SainRES521').html('calcul en cours...');
			  $('#PAR0521').html('calcul en cours...');
			  $('#PAR0RES521').html('calcul en cours...');
			  $('#PAR30521').html('calcul en cours...');
			  $('#PAR60521').html('calcul en cours...');
			  $('#PAR90521').html('calcul en cours...');
			  $('#PAR180521').html('calcul en cours...');
			  $('#PAR30RES521').html('calcul en cours...');
			  $('#Total521nb').html('calcul en cours...');
			  $('#Sain521nb').html('calcul en cours...');
			  $('#SainRES521nb').html('calcul en cours...');
			  $('#PAR0521nb').html('calcul en cours...');
			  $('#PAR0RES521nb').html('calcul en cours...');
			  $('#PAR30521nb').html('calcul en cours...');
			  $('#PAR60521nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180521nb').html('calcul en cours...');
			  $('#PAR30RES521nb').html('calcul en cours...');
			  $('#PAR120521nb').html('calcul en cours...');
			  $('#PAR120521').html('calcul en cours...');
			  $('#PAR90521nb').html('calcul en cours...');

			  
           },
            success: function (data) {
				var Total521 = data[0].Total521;
				var Sain521 = data[0].Sain521;
				var SainRES521 = data[0].SainRES521;
				var PAR0521 = data[0].PAR0521;
				var PAR0RES521 = data[0].PAR0RES521;
				var PAR30521 = data[0].PAR30521;
				var PAR60521 = data[0].PAR60521;
				var PAR90521 = data[0].PAR90521;
				var PAR180521 = data[0].PAR180521;
				var PAR30RES521 = data[0].PAR30RES521;
				var Total521nb = data[0].Total521nb;
				var Sain521nb = data[0].Sain521nb;
				var SainRES521nb = data[0].SainRES521nb;
				var PAR0521nb = data[0].PAR0521nb;
				var PAR0RES521nb = data[0].PAR0RES521nb;
				var PAR30521nb = data[0].PAR30521nb;
				var PAR60521nb = data[0].PAR60521nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180521nb = data[0].PAR180521nb;
				var PAR30RES521nb = data[0].PAR30RES521nb;
				var PAR120521nb = data[0].PAR120521nb;
				var PAR120521 = data[0].PAR120521;
				var PAR90521nb = data[0].PAR90521nb;

				
				var provadvtn521=parseFloat(Sain521.replace(/ /g, '').replace(',', '.'));
				var provacmpar0521=parseFloat(PAR0521.replace(/ /g, '').replace(',', '.'));
				var provacmpar30521=parseFloat(PAR30521.replace(/ /g, '').replace(',', '.'));
				var provacmpar60521=parseFloat(PAR60521.replace(/ /g, '').replace(',', '.'));
				var provacmpar90521=parseFloat((PAR90521.replace(/ /g, '')).replace(',', '.'));
				var provacmpar180521=parseFloat((PAR180521.replace(/ /g, '')).replace(',', '.'));
				var provacmpar120521=parseFloat(PAR120521.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES521=parseFloat(PAR0RES521.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES521=parseFloat(PAR30RES521.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES521=parseFloat(SainRES521.replace(/ /g, '').replace(',', '.'));
				
				
				var totalprovadvtn521 = (provadvtn521*0.005)+(provacmpar0521*0.1)+(provacmpar30521*0.4)+(provacmpar60521*0.7)+(provacmpar90521*1)+(provacmpar120521*1)+(provacmpar180521*1)+(provacmSainRES521*0.2)+(provacmPAR0RES521*0.5)+(provacmPAR30RES521*1);
				
				var totalprovacm521 = (provadvtn521*0)+(provacmpar0521*0.1)+(provacmpar30521*0.25)+(provacmpar60521*0.5)+(provacmpar90521*0.75)+(provacmpar120521*1)+(provacmpar180521*1)+(provacmSainRES521*0.25)+(provacmPAR0RES521*0.25)+(provacmPAR30RES521*0.25);
				
				
               $('#Total521').html(Total521); $('#Totalproadvntn521').html(((totalprovadvtn521*1).toFixed(3)).replace('.', ',')); $('#Totalproacm521').html(((totalprovacm521*1).toFixed(3)).replace('.', ',')); $('#provdiffres521').html(((totalprovacm521*1-totalprovadvtn521*1).toFixed(3)).replace('.', ','));
			   $('#Sain521').html(Sain521); $('#provacmsain521').html(provadvtn521*0); $('#provadvtnsain521').html(((provadvtn521*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain521').html(((provadvtn521*0-provadvtn521*0.005).toFixed(3)).replace('.', ','));
			   $('#SainRES521').html(SainRES521);  $('#provadvtnsainres521').html(((provacmSainRES521*0.2).toFixed(3)).replace('.', ',')); $('#provacmsainres521').html(((provacmSainRES521*0.25).toFixed(3)).replace('.', ',')); $('#provdiffsainres521').html(((provacmSainRES521*0.25-provacmSainRES521*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0521').html(PAR0521);  $('#provacmpar0521').html(((provacmpar0521*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0521').html(((provacmpar0521*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0521').html(((provacmpar0521*0.1-provacmpar0521*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES521').html(PAR0RES521); $('#provadvtnpar0res521').html(((provacmPAR0RES521*0.5).toFixed(3)).replace('.', ',')); $('#provacmpar0res521').html(((provacmPAR0RES521*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar0res521').html(((provacmPAR0RES521*0.25-provacmPAR0RES521*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30521').html(PAR30521); $('#provacmpar30521').html(((provacmpar30521*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30521').html(((provacmpar30521*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30521').html(((provacmpar30521*0.25-provacmpar30521*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60521').html(PAR60521); $('#provacmpar60521').html(((provacmpar60521*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60521').html(((provacmpar60521*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60521').html(((provacmpar60521*0.5-provacmpar60521*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90521').html(PAR90521); $('#provacmpar90521').html(((provacmpar90521*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90521').html(((provacmpar90521*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90521').html(((provacmpar90521*0.75-provacmpar90521*1).toFixed(3)).replace('.', ','));
			   $('#PAR180521').html(PAR180521); $('#provacmpar180521').html(((provacmpar180521*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180521').html(((provacmpar180521*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180521').html(((provacmpar180521*1-provacmpar180521*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES521').html(PAR30RES521); $('#provadvtnpar30res521').html(((provacmPAR30RES521*1).toFixed(3)).replace('.', ',')); $('#provacmpar30res521').html(((provacmPAR30RES521*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar30res521').html(((provacmPAR30RES521*0.25-provacmPAR30RES521*1).toFixed(3)).replace('.', ','));
			   $('#Total521nb').html(Total521nb); 
			   $('#Sain521nb').html(Sain521nb);
			   $('#SainRES521nb').html(SainRES521nb);
			   $('#PAR0521nb').html(PAR0521nb);
			   $('#PAR0RES521nb').html(PAR0RES521nb);
			   $('#PAR30521nb').html(PAR30521nb);
			   $('#PAR60521nb').html(PAR60521nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180521nb').html(PAR180521nb);
			   $('#PAR30RES521nb').html(PAR30RES521nb);
			   $('#PAR120521nb').html(PAR120521nb);
			   $('#PAR120521').html(PAR120521); $('#provacmpar120521').html(((provacmpar120521*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120521').html(((provacmpar120521*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120521').html(((provacmpar120521*1-provacmpar120521*1).toFixed(3)).replace('.', ','));
			   $('#PAR90521nb').html(PAR90521nb);
			   
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
	$.ajax({
		
            type: "GET",
            url: "../controller/api/Provision_prood531_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Total531').html('calcul en cours...');
			  $('#Sain531').html('calcul en cours...');
			  $('#SainRES531').html('calcul en cours...');
			  $('#PAR0531').html('calcul en cours...');
			  $('#PAR0RES531').html('calcul en cours...');
			  $('#PAR30531').html('calcul en cours...');
			  $('#PAR60531').html('calcul en cours...');
			  $('#PAR90531').html('calcul en cours...');
			  $('#PAR180531').html('calcul en cours...');
			  $('#PAR30RES531').html('calcul en cours...');
			  $('#Total531nb').html('calcul en cours...');
			  $('#Sain531nb').html('calcul en cours...');
			  $('#SainRES531nb').html('calcul en cours...');
			  $('#PAR0531nb').html('calcul en cours...');
			  $('#PAR0RES531nb').html('calcul en cours...');
			  $('#PAR30531nb').html('calcul en cours...');
			  $('#PAR60531nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180531nb').html('calcul en cours...');
			  $('#PAR30RES531nb').html('calcul en cours...');
			  $('#PAR120531nb').html('calcul en cours...');
			  $('#PAR120531').html('calcul en cours...');
			  $('#PAR90531nb').html('calcul en cours...');

			  
           },
            success: function (data) {
				var Total531 = data[0].Total531;
				var Sain531 = data[0].Sain531;
				var SainRES531 = data[0].SainRES531;
				var PAR0531 = data[0].PAR0531;
				var PAR0RES531 = data[0].PAR0RES531;
				var PAR30531 = data[0].PAR30531;
				var PAR60531 = data[0].PAR60531;
				var PAR90531 = data[0].PAR90531;
				var PAR180531 = data[0].PAR180531;
				var PAR30RES531 = data[0].PAR30RES531;
				var Total531nb = data[0].Total531nb;
				var Sain531nb = data[0].Sain531nb;
				var SainRES531nb = data[0].SainRES531nb;
				var PAR0531nb = data[0].PAR0531nb;
				var PAR0RES531nb = data[0].PAR0RES531nb;
				var PAR30531nb = data[0].PAR30531nb;
				var PAR60531nb = data[0].PAR60531nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180531nb = data[0].PAR180531nb;
				var PAR30RES531nb = data[0].PAR30RES531nb;
				var PAR120531nb = data[0].PAR120531nb;
				var PAR120531 = data[0].PAR120531;
				var PAR90531nb = data[0].PAR90531nb;

				
				var provadvtn531=parseFloat(Sain531.replace(/ /g, '').replace(',', '.'));
				var provacmpar0531=parseFloat(PAR0531.replace(/ /g, '').replace(',', '.'));
				var provacmpar30531=parseFloat(PAR30531.replace(/ /g, '').replace(',', '.'));
				var provacmpar60531=parseFloat(PAR60531.replace(/ /g, '').replace(',', '.'));
				var provacmpar90531=parseFloat((PAR90531.replace(/ /g, '')).replace(',', '.'));
				var provacmpar180531=parseFloat((PAR180531.replace(/ /g, '')).replace(',', '.'));
				var provacmpar120531=parseFloat(PAR120531.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES531=parseFloat(PAR0RES531.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES531=parseFloat(PAR30RES531.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES531=parseFloat(SainRES531.replace(/ /g, '').replace(',', '.'));
				
				
				var totalprovadvtn531 = (provadvtn531*0.005)+(provacmpar0531*0.1)+(provacmpar30531*0.4)+(provacmpar60531*0.7)+(provacmpar90531*1)+(provacmpar120531*1)+(provacmpar180531*1)+(provacmSainRES531*0.2)+(provacmPAR0RES531*0.5)+(provacmPAR30RES531*1);
				
				var totalprovacm531 = (provadvtn531*0)+(provacmpar0531*0.1)+(provacmpar30531*0.25)+(provacmpar60531*0.5)+(provacmpar90531*0.75)+(provacmpar120531*1)+(provacmpar180531*1)+(provacmSainRES531*0.25)+(provacmPAR0RES531*0.25)+(provacmPAR30RES531*0.25);
				
				
               $('#Total531').html(Total531); $('#Totalproadvntn531').html(((totalprovadvtn531*1).toFixed(3)).replace('.', ',')); $('#Totalproacm531').html(((totalprovacm531*1).toFixed(3)).replace('.', ',')); $('#provdiffres531').html(((totalprovacm531*1-totalprovadvtn531*1).toFixed(3)).replace('.', ','));
			   $('#Sain531').html(Sain531); $('#provacmsain531').html(provadvtn531*0); $('#provadvtnsain531').html(((provadvtn531*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain531').html(((provadvtn531*0-provadvtn531*0.005).toFixed(3)).replace('.', ','));
			   $('#SainRES531').html(SainRES531);  $('#provadvtnsainres531').html(((provacmSainRES531*0.2).toFixed(3)).replace('.', ',')); $('#provacmsainres531').html(((provacmSainRES531*0.25).toFixed(3)).replace('.', ',')); $('#provdiffsainres531').html(((provacmSainRES531*0.25-provacmSainRES531*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0531').html(PAR0531);  $('#provacmpar0531').html(((provacmpar0531*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0531').html(((provacmpar0531*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0531').html(((provacmpar0531*0.1-provacmpar0531*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES531').html(PAR0RES531); $('#provadvtnpar0res531').html(((provacmPAR0RES531*0.5).toFixed(3)).replace('.', ',')); $('#provacmpar0res531').html(((provacmPAR0RES531*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar0res531').html(((provacmPAR0RES531*0.25-provacmPAR0RES531*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30531').html(PAR30531); $('#provacmpar30531').html(((provacmpar30531*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30531').html(((provacmpar30531*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30531').html(((provacmpar30531*0.25-provacmpar30531*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60531').html(PAR60531); $('#provacmpar60531').html(((provacmpar60531*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60531').html(((provacmpar60531*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60531').html(((provacmpar60531*0.5-provacmpar60531*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90531').html(PAR90531); $('#provacmpar90531').html(((provacmpar90531*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90531').html(((provacmpar90531*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90531').html(((provacmpar90531*0.75-provacmpar90531*1).toFixed(3)).replace('.', ','));
			   $('#PAR180531').html(PAR180531); $('#provacmpar180531').html(((provacmpar180531*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180531').html(((provacmpar180531*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180531').html(((provacmpar180531*1-provacmpar180531*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES531').html(PAR30RES531); $('#provadvtnpar30res531').html(((provacmPAR30RES531*1).toFixed(3)).replace('.', ',')); $('#provacmpar30res531').html(((provacmPAR30RES531*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar30res531').html(((provacmPAR30RES531*0.25-provacmPAR30RES531*1).toFixed(3)).replace('.', ','));
			   $('#Total531nb').html(Total531nb); 
			   $('#Sain531nb').html(Sain531nb);
			   $('#SainRES531nb').html(SainRES531nb);
			   $('#PAR0531nb').html(PAR0531nb);
			   $('#PAR0RES531nb').html(PAR0RES531nb);
			   $('#PAR30531nb').html(PAR30531nb);
			   $('#PAR60531nb').html(PAR60531nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180531nb').html(PAR180531nb);
			   $('#PAR30RES531nb').html(PAR30RES531nb);
			   $('#PAR120531nb').html(PAR120531nb);
			   $('#PAR120531').html(PAR120531); $('#provacmpar120531').html(((provacmpar120531*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120531').html(((provacmpar120531*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120531').html(((provacmpar120531*1-provacmpar120531*1).toFixed(3)).replace('.', ','));
			   $('#PAR90531nb').html(PAR90531nb);
			   
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
		
		$.ajax({
            type: "GET",
            url: "../controller/api/Provision_prood541_total_2017",
            dataType: "json",
			beforeSend: function() {
              $('#Total541').html('calcul en cours...');
			  $('#Sain541').html('calcul en cours...');
			  $('#SainRES541').html('calcul en cours...');
			  $('#PAR0541').html('calcul en cours...');
			  $('#PAR0RES541').html('calcul en cours...');
			  $('#PAR30541').html('calcul en cours...');
			  $('#PAR60541').html('calcul en cours...');
			  $('#PAR90541').html('calcul en cours...');
			  $('#PAR180541').html('calcul en cours...');
			  $('#PAR30RES541').html('calcul en cours...');
			  $('#Total541nb').html('calcul en cours...');
			  $('#Sain541nb').html('calcul en cours...');
			  $('#SainRES541nb').html('calcul en cours...');
			  $('#PAR0541nb').html('calcul en cours...');
			  $('#PAR0RES541nb').html('calcul en cours...');
			  $('#PAR30541nb').html('calcul en cours...');
			  $('#PAR60541nb').html('calcul en cours...');
			  $('#PAR9051nb').html('calcul en cours...');
			  $('#PAR180541nb').html('calcul en cours...');
			  $('#PAR30RES541nb').html('calcul en cours...');
			  $('#PAR120541nb').html('calcul en cours...');
			  $('#PAR120541').html('calcul en cours...');
			  $('#PAR90541nb').html('calcul en cours...');

			  
           },
            success: function (data) {
				var Total541 = data[0].Total541;
				var Sain541 = data[0].Sain541;
				var SainRES541 = data[0].SainRES541;
				var PAR0541 = data[0].PAR0541;
				var PAR0RES541 = data[0].PAR0RES541;
				var PAR30541 = data[0].PAR30541;
				var PAR60541 = data[0].PAR60541;
				var PAR90541 = data[0].PAR90541;
				var PAR180541 = data[0].PAR180541;
				var PAR30RES541 = data[0].PAR30RES541;
				var Total541nb = data[0].Total541nb;
				var Sain541nb = data[0].Sain541nb;
				var SainRES541nb = data[0].SainRES541nb;
				var PAR0541nb = data[0].PAR0541nb;
				var PAR0RES541nb = data[0].PAR0RES541nb;
				var PAR30541nb = data[0].PAR30541nb;
				var PAR60541nb = data[0].PAR60541nb;
				var PAR9051nb = data[0].PAR9051nb;
				var PAR180541nb = data[0].PAR180541nb;
				var PAR30RES541nb = data[0].PAR30RES541nb;
				var PAR120541nb = data[0].PAR120541nb;
				var PAR120541 = data[0].PAR120541;
				var PAR90541nb = data[0].PAR90541nb;

				
				var provadvtn541=parseFloat(Sain541.replace(/ /g, '').replace(',', '.'));
				var provacmpar0541=parseFloat(PAR0541.replace(/ /g, '').replace(',', '.'));
				var provacmpar30541=parseFloat(PAR30541.replace(/ /g, '').replace(',', '.'));
				var provacmpar60541=parseFloat(PAR60541.replace(/ /g, '').replace(',', '.'));
				var provacmpar90541=parseFloat((PAR90541.replace(/ /g, '')).replace(',', '.'));
				var provacmpar180541=parseFloat((PAR180541.replace(/ /g, '')).replace(',', '.'));
				var provacmpar120541=parseFloat(PAR120541.replace(/ /g, '').replace(',', '.'));
				var provacmPAR0RES541=parseFloat(PAR0RES541.replace(/ /g, '').replace(',', '.'));
				var provacmPAR30RES541=parseFloat(PAR30RES541.replace(/ /g, '').replace(',', '.'));
				var provacmSainRES541=parseFloat(SainRES541.replace(/ /g, '').replace(',', '.'));
				
				
				var totalprovadvtn541 = (provadvtn541*0.005)+(provacmpar0541*0.1)+(provacmpar30541*0.4)+(provacmpar60541*0.7)+(provacmpar90541*1)+(provacmpar120541*1)+(provacmpar180541*1)+(provacmSainRES541*0.2)+(provacmPAR0RES541*0.5)+(provacmPAR30RES541*1);
				
				var totalprovacm541 = (provadvtn541*0)+(provacmpar0541*0.1)+(provacmpar30541*0.25)+(provacmpar60541*0.5)+(provacmpar90541*0.75)+(provacmpar120541*1)+(provacmpar180541*1)+(provacmSainRES541*0.25)+(provacmPAR0RES541*0.25)+(provacmPAR30RES541*0.25);
				
				
               $('#Total541').html(Total541); $('#Totalproadvntn541').html(((totalprovadvtn541*1).toFixed(3)).replace('.', ',')); $('#Totalproacm541').html(((totalprovacm541*1).toFixed(3)).replace('.', ',')); $('#provdiffres541').html(((totalprovacm541*1-totalprovadvtn541*1).toFixed(3)).replace('.', ','));
			   $('#Sain541').html(Sain541); $('#provacmsain541').html(provadvtn541*0); $('#provadvtnsain541').html(((provadvtn541*0.005).toFixed(3)).replace('.', ',')); $('#provdiffsain541').html(((provadvtn541*0-provadvtn541*0.005).toFixed(3)).replace('.', ','));
			   $('#SainRES541').html(SainRES541);  $('#provadvtnsainres541').html(((provacmSainRES541*0.2).toFixed(3)).replace('.', ',')); $('#provacmsainres541').html(((provacmSainRES541*0.25).toFixed(3)).replace('.', ',')); $('#provdiffsainres541').html(((provacmSainRES541*0.25-provacmSainRES541*0.2).toFixed(3)).replace('.', ','));
			   $('#PAR0541').html(PAR0541);  $('#provacmpar0541').html(((provacmpar0541*0.1).toFixed(3)).replace('.', ',')); $('#provadvtnpar0541').html(((provacmpar0541*0.1).toFixed(3)).replace('.', ',')); $('#provdiffpar0541').html(((provacmpar0541*0.1-provacmpar0541*0.1).toFixed(3)).replace('.', ','));
			   $('#PAR0RES541').html(PAR0RES541); $('#provadvtnpar0res541').html(((provacmPAR0RES541*0.5).toFixed(3)).replace('.', ',')); $('#provacmpar0res541').html(((provacmPAR0RES541*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar0res541').html(((provacmPAR0RES541*0.25-provacmPAR0RES541*0.5).toFixed(3)).replace('.', ','));
			   $('#PAR30541').html(PAR30541); $('#provacmpar30541').html(((provacmpar30541*0.25).toFixed(3)).replace('.', ',')); $('#provadvtnpar30541').html(((provacmpar30541*0.4).toFixed(3)).replace('.', ',')); $('#provdiffpar30541').html(((provacmpar30541*0.25-provacmpar30541*0.4).toFixed(3)).replace('.', ','));
			   $('#PAR60541').html(PAR60541); $('#provacmpar60541').html(((provacmpar60541*0.5).toFixed(3)).replace('.', ',')); $('#provadvtnpar60541').html(((provacmpar60541*0.7).toFixed(3)).replace('.', ',')); $('#provdiffpar60541').html(((provacmpar60541*0.5-provacmpar60541*0.7).toFixed(3)).replace('.', ','));
			   $('#PAR90541').html(PAR90541); $('#provacmpar90541').html(((provacmpar90541*0.75).toFixed(3)).replace('.', ',')); $('#provadvtnpar90541').html(((provacmpar90541*1).toFixed(3)).replace('.', ',')); $('#provdiffpar90541').html(((provacmpar90541*0.75-provacmpar90541*1).toFixed(3)).replace('.', ','));
			   $('#PAR180541').html(PAR180541); $('#provacmpar180541').html(((provacmpar180541*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar180541').html(((provacmpar180541*1).toFixed(3)).replace('.', ',')); $('#provdiffpar180541').html(((provacmpar180541*1-provacmpar180541*1).toFixed(3)).replace('.', ','));
			   $('#PAR30RES541').html(PAR30RES541); $('#provadvtnpar30res541').html(((provacmPAR30RES541*1).toFixed(3)).replace('.', ',')); $('#provacmpar30res541').html(((provacmPAR30RES541*0.25).toFixed(3)).replace('.', ',')); $('#provdiffpar30res541').html(((provacmPAR30RES541*0.25-provacmPAR30RES541*1).toFixed(3)).replace('.', ','));
			   $('#Total541nb').html(Total541nb); 
			   $('#Sain541nb').html(Sain541nb);
			   $('#SainRES541nb').html(SainRES541nb);
			   $('#PAR0541nb').html(PAR0541nb);
			   $('#PAR0RES541nb').html(PAR0RES541nb);
			   $('#PAR30541nb').html(PAR30541nb);
			   $('#PAR60541nb').html(PAR60541nb);
			   $('#PAR9051nb').html(PAR9051nb);
			   $('#PAR180541nb').html(PAR180541nb);
			   $('#PAR30RES541nb').html(PAR30RES541nb);
			   $('#PAR120541nb').html(PAR120541nb);
			   $('#PAR120541').html(PAR120541); $('#provacmpar120541').html(((provacmpar120541*1).toFixed(3)).replace('.', ',')); $('#provadvtnpar120541').html(((provacmpar120541*1).toFixed(3)).replace('.', ',')); $('#provdiffpar120541').html(((provacmpar120541*1-provacmpar120541*1).toFixed(3)).replace('.', ','));
			   $('#PAR90541nb').html(PAR90541nb);
			   
            },
            error: function (result) {
                alert("Error");
            }
        });