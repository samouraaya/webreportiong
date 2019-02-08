ACM=$.ajax({
            type: "GET",
            url: "../controller/api/fn_par_acm",
            dataType: "json",

            success: function (data) {
				var vlSain = data[0].vlSain;
				var vlPAR0 = data[0].vlPAR0;
				var vlPAR30 = data[0].vlPAR30;
				var vlPAR60 = data[0].vlPAR60;
				var vlPAR90 = data[0].vlPAR90;
				var vlPAR120 = data[0].vlPAR120;
				var vlPAR180 = data[0].vlPAR180;
				var vlPAR365 = data[0].vlPAR365;
				var nbSain = data[0].nbSain;
				var nbPAR0 = data[0].nbPAR0;
				var nbPAR30 = data[0].nbPAR30;
				var nbPAR60 = data[0].nbPAR60;
				var nbPAR90 = data[0].nbPAR90;
				var nbPAR120 = data[0].nbPAR120;
				var nbPAR180 = data[0].nbPAR180;
				var nbPAR365 = data[0].nbPAR365;
				var vlTotalsous = data[0].vlTotalsous;
				var nbTotalsous = data[0].nbTotalsous;

				
               $('#vlSain').html(vlSain);
			   $('#vlPAR0').html(vlPAR0);
			   $('#vlPAR30').html(vlPAR30);
			   $('#vlPAR60').html(vlPAR60);
			   $('#vlPAR90').html(vlPAR90);
			   $('#vlPAR120').html(vlPAR120);
			   $('#vlPAR180').html(vlPAR180);
			   $('#vlPAR365').html(vlPAR365);
			   $('#nbSain').html(nbSain);
			   $('#nbPAR0').html(nbPAR0);
			   $('#nbPAR30').html(nbPAR30);
			   $('#nbPAR60').html(nbPAR60);
			   $('#nbPAR90').html(nbPAR90);
			   $('#nbPAR120').html(nbPAR120);
			   $('#nbPAR180').html(nbPAR180);
			   $('#nbPAR365').html(nbPAR365);
			   $('#vlSoustotal').html(vlTotalsous);
			   $('#nbSoustotal').html(nbTotalsous);

            },
            error: function (result) {
                alert("Error");
            }
        });	
		
$.ajax({
            type: "GET",
            url: "../controller/api/fn_par_acm_perte",
            dataType: "json",

            success: function (data) {

				var vlTotalpertemonth = data[0].vlTotalpertemonth;
				var nbTotalpertemonth = data[0].nbTotalpertemonth;
				var nbrefinanced = data[0].nbrefinanced;
				var vlrefinanced = data[0].vlrefinanced;
				var nbTotal = data[0].nbTotal;
				var vlTotal = data[0].vlTotal;
				var vlTotalperte = data[0].vlTotalperte;
				var nbTotalperte = data[0].nbTotalperte;
				var vlTotalpertemonth = data[0].vlTotalpertemonth;
				var nbTotalpertemonth = data[0].nbTotalpertemonth;
				
				var nbcltSain = data[0].nbcltSain;
				var nbcltPAR0 = data[0].nbcltPAR0;
				var nbcltPAR30 = data[0].nbcltPAR30;
				var nbcltPAR60 = data[0].nbcltPAR60;
				var nbcltPAR90 = data[0].nbcltPAR90;
				var nbcltPAR120 = data[0].nbcltPAR120;
				var nbcltPAR180 = data[0].nbcltPAR180;
				var nbcltPAR365 = data[0].nbcltPAR365;
				var nbcltTotalsous = data[0].nbcltTotalsous;
				var nbcltTotal = data[0].nbcltTotal;
				var VLREMBPERTE = data[0].VLREMBPERTE;

			   $('#vlTotalpertemonth').html(vlTotalpertemonth);
			   $('#nbTotalpertemonth').html(nbTotalpertemonth);
			   $('#nbrefinanced').html(nbrefinanced);
			   $('#vlrefinanced').html(vlrefinanced);
			   $('#nbTOTAL').html(nbTotal);
			   $('#nbcltTotal').html(nbcltTotal);
			   $('#vlTOTAL').html(vlTotal);
			   
			   $('#VLREMBPERTE').html(VLREMBPERTE);

			   $('#vlTotalperte').html(vlTotalperte);
			   $('#nbTotalperte').html(nbTotalperte);
			   $('#vlTotalpertemonth').html(vlTotalpertemonth);
			   $('#nbTotalpertemonth').html(nbTotalpertemonth);
			   
			   $('#nbcltSain').html(nbcltSain);
			   $('#nbcltPAR0').html(nbcltPAR0);
			   $('#nbcltPAR30').html(nbcltPAR30);
			   $('#nbcltPAR60').html(nbcltPAR60);
			   $('#nbcltPAR90').html(nbcltPAR90);
			   $('#nbcltPAR120').html(nbcltPAR120);
			   $('#nbcltPAR180').html(nbcltPAR180);
			   $('#nbcltPAR365').html(nbcltPAR365);
			   $('#nbcltTotalsous').html(nbcltTotalsous);
            },
            error: function (result) {
                alert("Error");
            }
        });	