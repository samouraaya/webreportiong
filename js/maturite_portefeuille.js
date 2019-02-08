/******************Créances Saines (0.5 %)***********************/
	sain1day_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain1day",
            dataType: "json",
			beforeSend: function() {
              $('#sain1day').html('calcul en cours...');
           },
            success: function (data) {
				var sain1day = data[0].nb;
               $('#sain1day').html(sain1day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	sain1week_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain1week",
            dataType: "json",
			beforeSend: function() {
              $('#sain1week').html('calcul en cours...');
           },
            success: function (data) {
				var sain1week = data[0].nb;
               $('#sain1week').html(sain1week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	sain1month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain1month",
            dataType: "json",
			beforeSend: function() {
              $('#sain1month').html('calcul en cours...');
           },
            success: function (data) {
				var sain1month = data[0].nb;
               $('#sain1month').html(sain1month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	sain2month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain2month",
            dataType: "json",
			beforeSend: function() {
              $('#sain2month').html('calcul en cours...');
           },
            success: function (data) {
				var sain2month = data[0].nb;
               $('#sain2month').html(sain2month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	sain3month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain3month",
            dataType: "json",
			beforeSend: function() {
              $('#sain3month').html('calcul en cours...');
           },
            success: function (data) {
				var sain3month = data[0].nb;
               $('#sain3month').html(sain3month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	sain6month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain6month",
            dataType: "json",
			beforeSend: function() {
              $('#sain6month').html('calcul en cours...');
           },
            success: function (data) {
				var sain6month = data[0].nb;
               $('#sain6month').html(sain6month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	sain12month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain12month",
            dataType: "json",
			beforeSend: function() {
              $('#sain12month').html('calcul en cours...');
           },
            success: function (data) {
				var sain12month = data[0].nb;
               $('#sain12month').html(sain12month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	sain24month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain24month",
            dataType: "json",
			beforeSend: function() {
              $('#sain24month').html('calcul en cours...');
           },
            success: function (data) {
				var sain24month = data[0].nb;
               $('#sain24month').html(sain24month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	sain36month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain36month",
            dataType: "json",
			beforeSend: function() {
              $('#sain36month').html('calcul en cours...');
           },
            success: function (data) {
				var sain36month = data[0].nb;
               $('#sain36month').html(sain36month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	sain60month_tot=$.ajax({
            type: "GET",
            url: "../controller/api/sain60month",
            dataType: "json",
			beforeSend: function() {
              $('#sain60month').html('calcul en cours...');
           },
            success: function (data) {
				var sain60month = data[0].nb;
               $('#sain60month').html(sain60month);
            },
            error: function (result) {
                alert("Error");
            }
        });
$.when(sain1day_tot,sain1week_tot,sain1month_tot,sain2month_tot,sain3month_tot,sain6month_tot,sain12month_tot,sain24month_tot,sain36month_tot,sain60month_tot).done(function(a1) {
	
	$.ajax({
            type: "GET",
            url: "../controller/api/sain_total_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#saintotal').html('calcul en cours...');
           },
            success: function (data) {
				var sain_total = data[0].nb;
               $('#saintotal').html(sain_total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par1total').html('calcul en cours...');
           },
            success: function (data) {
				var par1total = data[0].nb;
               $('#par1total').html(par1total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par30total').html('calcul en cours...');
           },
            success: function (data) {
				var par30total = data[0].nb;
               $('#par30total').html(par30total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par60_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par60total').html('calcul en cours...');
           },
            success: function (data) {
				var par60total = data[0].nb;
               $('#par60total').html(par60total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par90_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par90total').html('calcul en cours...');
           },
            success: function (data) {
				var par90total = data[0].nb;
               $('#par90total').html(par90total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par120_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par120total').html('calcul en cours...');
           },
            success: function (data) {
				var par120total = data[0].nb;
               $('#par120total').html(par120total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par180_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par180total').html('calcul en cours...');
           },
            success: function (data) {
				var par180total = data[0].nb;
               $('#par180total').html(par180total);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#sainretotal').html('calcul en cours...');
           },
            success: function (data) {
				var sainretotal = data[0].nb;
               $('#sainretotal').html(sainretotal);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $('#par1retotal').html('calcul en cours...');
           },
            success: function (data) {
				var par1retotal = data[0].nb;
               $('#par1retotal').html(par1retotal);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re_tot_maturite",
            dataType: "json",
			beforeSend: function() {
              $(par30retotal).html('calcul en cours...');
           },
            success: function (data) {
				var par30retotal = data[0].nb;
               $('#par30retotal').html(par30retotal);
            },
            error: function (result) {
                alert("Error");
            }
        });
  
});
/******************PAR Entre 1 et 30 jours (10 %)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par11day",
            dataType: "json",
			beforeSend: function() {
              $('#par11day').html('calcul en cours...');
           },
            success: function (data) {
				var par11day = data[0].nb;
               $('#par11day').html(par11day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par11week",
            dataType: "json",
			beforeSend: function() {
              $('#par11week').html('calcul en cours...');
           },
            success: function (data) {
				var par11week = data[0].nb;
               $('#par11week').html(par11week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par11month",
            dataType: "json",
			beforeSend: function() {
              $('#par11month').html('calcul en cours...');
           },
            success: function (data) {
				var par11month = data[0].nb;
               $('#par11month').html(par11month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par12month",
            dataType: "json",
			beforeSend: function() {
              $('#par12month').html('calcul en cours...');
           },
            success: function (data) {
				var par12month = data[0].nb;
               $('#par12month').html(par12month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par13month",
            dataType: "json",
			beforeSend: function() {
              $('#par13month').html('calcul en cours...');
           },
            success: function (data) {
				var par13month = data[0].nb;
               $('#par13month').html(par13month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par16month",
            dataType: "json",
			beforeSend: function() {
              $('#par16month').html('calcul en cours...');
           },
            success: function (data) {
				var par16month = data[0].nb;
               $('#par16month').html(par16month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par112month",
            dataType: "json",
			beforeSend: function() {
              $('#par112month').html('calcul en cours...');
           },
            success: function (data) {
				var par112month = data[0].nb;
               $('#par112month').html(par112month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par124month",
            dataType: "json",
			beforeSend: function() {
              $('#par124month').html('calcul en cours...');
           },
            success: function (data) {
				var par124month = data[0].nb;
               $('#par124month').html(par124month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par136month",
            dataType: "json",
			beforeSend: function() {
              $('#par136month').html('calcul en cours...');
           },
            success: function (data) {
				var par136month = data[0].nb;
               $('#par136month').html(par136month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par160month",
            dataType: "json",
			beforeSend: function() {
              $('#par160month').html('calcul en cours...');
           },
            success: function (data) {
				var par160month = data[0].nb;
               $('#par160month').html(par160month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************PAR Entre 31 et 60 jours (40 %)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par301day",
            dataType: "json",
			beforeSend: function() {
              $('#par301day').html('calcul en cours...');
           },
            success: function (data) {
				var par301day = data[0].nb;
               $('#par301day').html(par301day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par301week",
            dataType: "json",
			beforeSend: function() {
              $('#par301week').html('calcul en cours...');
           },
            success: function (data) {
				var par301week = data[0].nb;
               $('#par301week').html(par301week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par301month",
            dataType: "json",
			beforeSend: function() {
              $('#par301month').html('calcul en cours...');
           },
            success: function (data) {
				var par301month = data[0].nb;
               $('#par301month').html(par301month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par302month",
            dataType: "json",
			beforeSend: function() {
              $('#par302month').html('calcul en cours...');
           },
            success: function (data) {
				var par302month = data[0].nb;
               $('#par302month').html(par302month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par303month",
            dataType: "json",
			beforeSend: function() {
              $('#par303month').html('calcul en cours...');
           },
            success: function (data) {
				var par303month = data[0].nb;
               $('#par303month').html(par303month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par306month",
            dataType: "json",
			beforeSend: function() {
              $('#par306month').html('calcul en cours...');
           },
            success: function (data) {
				var par306month = data[0].nb;
               $('#par306month').html(par306month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par3012month",
            dataType: "json",
			beforeSend: function() {
              $('#par3012month').html('calcul en cours...');
           },
            success: function (data) {
				var par3012month = data[0].nb;
               $('#par3012month').html(par3012month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par3024month",
            dataType: "json",
			beforeSend: function() {
              $('#par3024month').html('calcul en cours...');
           },
            success: function (data) {
				var par3024month = data[0].nb;
               $('#par3024month').html(par3024month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par3036month",
            dataType: "json",
			beforeSend: function() {
              $('#par3036month').html('calcul en cours...');
           },
            success: function (data) {
				var par3036month = data[0].nb;
               $('#par3036month').html(par3036month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par3060month",
            dataType: "json",
			beforeSend: function() {
              $('#par3060month').html('calcul en cours...');
           },
            success: function (data) {
				var par3060month = data[0].nb;
               $('#par3060month').html(par3060month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************PAR Entre 61 et 90 jours (70 %)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par601day",
            dataType: "json",
			beforeSend: function() {
              $('#par601day').html('calcul en cours...');
           },
            success: function (data) {
				var par601day = data[0].nb;
               $('#par601day').html(par601day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par601week",
            dataType: "json",
			beforeSend: function() {
              $('#par601week').html('calcul en cours...');
           },
            success: function (data) {
				var par601week = data[0].nb;
               $('#par601week').html(par601week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par601month",
            dataType: "json",
			beforeSend: function() {
              $('#par601month').html('calcul en cours...');
           },
            success: function (data) {
				var par601month = data[0].nb;
               $('#par601month').html(par601month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par602month",
            dataType: "json",
			beforeSend: function() {
              $('#par602month').html('calcul en cours...');
           },
            success: function (data) {
				var par602month = data[0].nb;
               $('#par602month').html(par602month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par603month",
            dataType: "json",
			beforeSend: function() {
              $('#par603month').html('calcul en cours...');
           },
            success: function (data) {
				var par603month = data[0].nb;
               $('#par603month').html(par603month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par606month",
            dataType: "json",
			beforeSend: function() {
              $('#par606month').html('calcul en cours...');
           },
            success: function (data) {
				var par606month = data[0].nb;
               $('#par606month').html(par606month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par6012month",
            dataType: "json",
			beforeSend: function() {
              $('#par6012month').html('calcul en cours...');
           },
            success: function (data) {
				var par6012month = data[0].nb;
               $('#par6012month').html(par6012month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par6024month",
            dataType: "json",
			beforeSend: function() {
              $('#par6024month').html('calcul en cours...');
           },
            success: function (data) {
				var par6024month = data[0].nb;
               $('#par6024month').html(par6024month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par6036month",
            dataType: "json",
			beforeSend: function() {
              $('#par6036month').html('calcul en cours...');
           },
            success: function (data) {
				var par6036month = data[0].nb;
               $('#par6036month').html(par6036month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par6060month",
            dataType: "json",
			beforeSend: function() {
              $('#par6060month').html('calcul en cours...');
           },
            success: function (data) {
				var par6060month = data[0].nb;
               $('#par6060month').html(par6060month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************PAR Entre 91 et 180 jours (100 %)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par901day",
            dataType: "json",
			beforeSend: function() {
              $('#par901day').html('calcul en cours...');
           },
            success: function (data) {
				var par901day = data[0].nb;
               $('#par901day').html(par901day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par901week",
            dataType: "json",
			beforeSend: function() {
              $('#par901week').html('calcul en cours...');
           },
            success: function (data) {
				var par901week = data[0].nb;
               $('#par901week').html(par901week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par901month",
            dataType: "json",
			beforeSend: function() {
              $('#par901month').html('calcul en cours...');
           },
            success: function (data) {
				var par901month = data[0].nb;
               $('#par901month').html(par901month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par902month",
            dataType: "json",
			beforeSend: function() {
              $('#par902month').html('calcul en cours...');
           },
            success: function (data) {
				var par902month = data[0].nb;
               $('#par902month').html(par902month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par903month",
            dataType: "json",
			beforeSend: function() {
              $('#par903month').html('calcul en cours...');
           },
            success: function (data) {
				var par903month = data[0].nb;
               $('#par903month').html(par903month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par906month",
            dataType: "json",
			beforeSend: function() {
              $('#par906month').html('calcul en cours...');
           },
            success: function (data) {
				var par906month = data[0].nb;
               $('#par906month').html(par906month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par9012month",
            dataType: "json",
			beforeSend: function() {
              $('#par9012month').html('calcul en cours...');
           },
            success: function (data) {
				var par9012month = data[0].nb;
               $('#par9012month').html(par9012month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par9024month",
            dataType: "json",
			beforeSend: function() {
              $('#par9024month').html('calcul en cours...');
           },
            success: function (data) {
				var par9024month = data[0].nb;
               $('#par9024month').html(par9024month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par9036month",
            dataType: "json",
			beforeSend: function() {
              $('#par9036month').html('calcul en cours...');
           },
            success: function (data) {
				var par9036month = data[0].nb;
               $('#par9036month').html(par9036month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par9060month",
            dataType: "json",
			beforeSend: function() {
              $('#par9060month').html('calcul en cours...');
           },
            success: function (data) {
				var par9060month = data[0].nb;
               $('#par9060month').html(par9060month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************PAR Entre 121 et 180 jours (100 %)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par1201day",
            dataType: "json",
			beforeSend: function() {
              $('#par1201day').html('calcul en cours...');
           },
            success: function (data) {
				var par1201day = data[0].nb;
               $('#par1201day').html(par1201day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1201week",
            dataType: "json",
			beforeSend: function() {
              $('#par1201week').html('calcul en cours...');
           },
            success: function (data) {
				var par1201week = data[0].nb;
               $('#par1201week').html(par1201week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1201month",
            dataType: "json",
			beforeSend: function() {
              $('#par1201month').html('calcul en cours...');
           },
            success: function (data) {
				var par1201month = data[0].nb;
               $('#par1201month').html(par1201month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1202month",
            dataType: "json",
			beforeSend: function() {
              $('#par1202month').html('calcul en cours...');
           },
            success: function (data) {
				var par1202month = data[0].nb;
               $('#par1202month').html(par1202month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1203month",
            dataType: "json",
			beforeSend: function() {
              $('#par1203month').html('calcul en cours...');
           },
            success: function (data) {
				var par1203month = data[0].nb;
               $('#par1203month').html(par1203month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1206month",
            dataType: "json",
			beforeSend: function() {
              $('#par1206month').html('calcul en cours...');
           },
            success: function (data) {
				var par1206month = data[0].nb;
               $('#par1206month').html(par1206month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par12012month",
            dataType: "json",
			beforeSend: function() {
              $('#par12012month').html('calcul en cours...');
           },
            success: function (data) {
				var par12012month = data[0].nb;
               $('#par12012month').html(par12012month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par12024month",
            dataType: "json",
			beforeSend: function() {
              $('#par12024month').html('calcul en cours...');
           },
            success: function (data) {
				var par12024month = data[0].nb;
               $('#par12024month').html(par12024month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par12036month",
            dataType: "json",
			beforeSend: function() {
              $('#par12036month').html('calcul en cours...');
           },
            success: function (data) {
				var par12036month = data[0].nb;
               $('#par12036month').html(par12036month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par12060month",
            dataType: "json",
			beforeSend: function() {
              $('#par12060month').html('calcul en cours...');
           },
            success: function (data) {
				var par12060month = data[0].nb;
               $('#par12060month').html(par12060month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************PAR >180 jours***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par1801day",
            dataType: "json",
			beforeSend: function() {
              $('#par1801day').html('calcul en cours...');
           },
            success: function (data) {
				var par1801day = data[0].nb;
               $('#par1801day').html(par1801day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1801week",
            dataType: "json",
			beforeSend: function() {
              $('#par1801week').html('calcul en cours...');
           },
            success: function (data) {
				var par1801week = data[0].nb;
               $('#par1801week').html(par1801week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1801month",
            dataType: "json",
			beforeSend: function() {
              $('#par1801month').html('calcul en cours...');
           },
            success: function (data) {
				var par1801month = data[0].nb;
               $('#par1801month').html(par1801month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1802month",
            dataType: "json",
			beforeSend: function() {
              $('#par1802month').html('calcul en cours...');
           },
            success: function (data) {
				var par1802month = data[0].nb;
               $('#par1802month').html(par1802month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1803month",
            dataType: "json",
			beforeSend: function() {
              $('#par1803month').html('calcul en cours...');
           },
            success: function (data) {
				var par1803month = data[0].nb;
               $('#par1803month').html(par1803month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1806month",
            dataType: "json",
			beforeSend: function() {
              $('#par1806month').html('calcul en cours...');
           },
            success: function (data) {
				var par1806month = data[0].nb;
               $('#par1806month').html(par1806month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par18012month",
            dataType: "json",
			beforeSend: function() {
              $('#par18012month').html('calcul en cours...');
           },
            success: function (data) {
				var par18012month = data[0].nb;
               $('#par18012month').html(par18012month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par18024month",
            dataType: "json",
			beforeSend: function() {
              $('#par18024month').html('calcul en cours...');
           },
            success: function (data) {
				var par18024month = data[0].nb;
               $('#par18024month').html(par18024month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par18036month",
            dataType: "json",
			beforeSend: function() {
              $('#par18036month').html('calcul en cours...');
           },
            success: function (data) {
				var par18036month = data[0].nb;
               $('#par18036month').html(par18036month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par18060month",
            dataType: "json",
			beforeSend: function() {
              $('#par18060month').html('calcul en cours...');
           },
            success: function (data) {
				var par18060month = data[0].nb;
               $('#par18060month').html(par18060month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************Restructuré - Sain (20%)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre1day",
            dataType: "json",
			beforeSend: function() {
              $('#sainre1day').html('calcul en cours...');
           },
            success: function (data) {
				var sainre1day = data[0].nb;
               $('#sainre1day').html(sainre1day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre1week",
            dataType: "json",
			beforeSend: function() {
              $('#sainre1week').html('calcul en cours...');
           },
            success: function (data) {
				var sainre1week = data[0].nb;
               $('#sainre1week').html(sainre1week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre1month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre1month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre1month = data[0].nb;
               $('#sainre1month').html(sainre1month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre2month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre2month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre2month = data[0].nb;
               $('#sainre2month').html(sainre2month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre3month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre3month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre3month = data[0].nb;
               $('#sainre3month').html(sainre3month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre6month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre6month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre6month = data[0].nb;
               $('#sainre6month').html(sainre6month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre12month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre12month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre12month = data[0].nb;
               $('#sainre12month').html(sainre12month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre24month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre24month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre24month = data[0].nb;
               $('#sainre24month').html(sainre24month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre36month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre36month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre36month = data[0].nb;
               $('#sainre36month').html(sainre36month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/sainre60month",
            dataType: "json",
			beforeSend: function() {
              $('#sainre60month').html('calcul en cours...');
           },
            success: function (data) {
				var sainre60month = data[0].nb;
               $('#sainre60month').html(sainre60month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************estructuré - PAR Entre 1 et 30 jours (50%))***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re1day",
            dataType: "json",
			beforeSend: function() {
              $('#par1re1day').html('calcul en cours...');
           },
            success: function (data) {
				var par1re1day = data[0].nb;
               $('#par1re1day').html(par1re1day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re1week",
            dataType: "json",
			beforeSend: function() {
              $('#par1re1week').html('calcul en cours...');
           },
            success: function (data) {
				var par1re1week = data[0].nb;
               $('#par1re1week').html(par1re1week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re1month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re1month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re1month = data[0].nb;
               $('#par1re1month').html(par1re1month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re2month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re2month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re2month = data[0].nb;
               $('#par1re2month').html(par1re2month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re3month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re3month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re3month = data[0].nb;
               $('#par1re3month').html(par1re3month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re6month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re6month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re6month = data[0].nb;
               $('#par1re6month').html(par1re6month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re12month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re12month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re12month = data[0].nb;
               $('#par1re12month').html(par1re12month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re24month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re24month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re24month = data[0].nb;
               $('#par1re24month').html(par1re24month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re36month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re36month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re36month = data[0].nb;
               $('#par1re36month').html(par1re36month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par1re60month",
            dataType: "json",
			beforeSend: function() {
              $('#par1re60month').html('calcul en cours...');
           },
            success: function (data) {
				var par1re60month = data[0].nb;
               $('#par1re60month').html(par1re60month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	/******************Restructuré/PAR >= 31 jours (100%)***********************/
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re1day",
            dataType: "json",
			beforeSend: function() {
              $('#par30re1day').html('calcul en cours...');
           },
            success: function (data) {
				var par30re1day = data[0].nb;
               $('#par30re1day').html(par30re1day);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re1week",
            dataType: "json",
			beforeSend: function() {
              $('#par30re1week').html('calcul en cours...');
           },
            success: function (data) {
				var par30re1week = data[0].nb;
               $('#par30re1week').html(par30re1week);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re1month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re1month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re1month = data[0].nb;
               $('#par30re1month').html(par30re1month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re2month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re2month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re2month = data[0].nb;
               $('#par30re2month').html(par30re2month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re3month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re3month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re3month = data[0].nb;
               $('#par30re3month').html(par30re3month);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re6month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re6month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re6month = data[0].nb;
               $('#par30re6month').html(par30re6month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re12month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re12month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re12month = data[0].nb;
               $('#par30re12month').html(par30re12month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re24month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re24month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re24month = data[0].nb;
               $('#par30re24month').html(par30re24month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re36month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re36month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re36month = data[0].nb;
               $('#par30re36month').html(par30re36month);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({
            type: "GET",
            url: "../controller/api/par30re60month",
            dataType: "json",
			beforeSend: function() {
              $('#par30re60month').html('calcul en cours...');
           },
            success: function (data) {
				var par30re60month = data[0].nb;
               $('#par30re60month').html(par30re60month);
            },
            error: function (result) {
                alert("Error");
            }
        });
			
		