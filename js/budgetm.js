/////////////////////////////////////////////////	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_110_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });			
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_120_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });			
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_130_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_210_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_total_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totalnbdec').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalnbdec').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_object_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totalnbobject').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalnbobject').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
/////////////////////////////////////////////////	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_110_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_120_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_130_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_210_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_total_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_object_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totalvlobject').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalvlobject').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
/////////////////////////////////////////////////	
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_130_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot130m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot130m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_110_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot110m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot110m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_120_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot120m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot120m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_210_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#dectot210m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectot210m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_tot_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#dectotm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#dectotm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });		
	$.ajax({

            type: "GET",
            url: "../controller/api/nb_dec_m_object_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totaldectotmobject').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totaldectotmobject').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/////////////////////////////////////////////////	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_110_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot110m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot110m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_120_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot120m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot120m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_130_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot130m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot130m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_210_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectot210m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectot210m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_tot_budget_mm",
            dataType: "json",
			beforeSend: function() {
              $('#vldectotm').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#vldectotm').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/vl_dec_m_object_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totaldectotmobjectvl').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totaldectotmobjectvl').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/////////////////////////////////////////////////		
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_110_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#entot110m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot110m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_120_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#entot120m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot120m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_130_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#entot130m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot130m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_210_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#entot210m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot210m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_100_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#entot100m').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot100m').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_total_budgetm",
            dataType: "json",
			beforeSend: function() {
              $('#totalendec').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalendec').html(names);
            },
            error: function (result) {
                alert("Error");
            }
	});
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_total_budgetm_object",
            dataType: "json",
			beforeSend: function() {
              $('#totalendecobject').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalendecobject').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Nombre Encours Budget*/	
	
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_100_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#entot100mnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot100mnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_110_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#entot110mnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot110mnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_120_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#entot120mnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot120mnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_210_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#entot210mnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot210mnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_130_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#entot130mnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#entot130mnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_total_budgetmnb",
            dataType: "json",
			beforeSend: function() {
              $('#totalendecnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalendecnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/enc_total_budgetm_objectnb",
            dataType: "json",
			beforeSend: function() {
              $('#totalendecobjectnb').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#totalendecobjectnb').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_100m",
            dataType: "json",
			beforeSend: function() {
              $('#par0100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par0100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_110m",
            dataType: "json",
			beforeSend: function() {
              $('#par0110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par0110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_120m",
            dataType: "json",
			beforeSend: function() {
              $('#par0120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par0120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_130m",
            dataType: "json",
			beforeSend: function() {
              $('#par0130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par0130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_210m",
            dataType: "json",
			beforeSend: function() {
              $('#par0210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par0210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/par1_totalm",
            dataType: "json",
			beforeSend: function() {
              $('#partotal').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#partotal').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_100m",
            dataType: "json",
			beforeSend: function() {
              $('#par30100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_110m",
            dataType: "json",
			beforeSend: function() {
              $('#par30110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_120m",
            dataType: "json",
			beforeSend: function() {
              $('#par30120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_130m",
            dataType: "json",
			beforeSend: function() {
              $('#par30130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_210m",
            dataType: "json",
			beforeSend: function() {
              $('#par30210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/par30_totalm",
            dataType: "json",
			beforeSend: function() {
              $('#par30total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par30total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_100m",
            dataType: "json",
			beforeSend: function() {
              $('#par90100').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90100').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_110m",
            dataType: "json",
			beforeSend: function() {
              $('#par90110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_120m",
            dataType: "json",
			beforeSend: function() {
              $('#par90120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_130m",
            dataType: "json",
			beforeSend: function() {
              $('#par90130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_210m",
            dataType: "json",
			beforeSend: function() {
              $('#par90210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });	
	$.ajax({

            type: "GET",
            url: "../controller/api/par90_totalm",
            dataType: "json",
			beforeSend: function() {
              $('#par90total').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#par90total').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
/*Taux Passage En perte %*/
$.ajax({

            type: "GET",
            url: "../controller/api/chargeoffm_total",
            dataType: "json",
			beforeSend: function() {
              $('#chargeoffmtotal').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#chargeoffmtotal').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({

            type: "GET",
            url: "../controller/api/chargeoffm_110",
            dataType: "json",
			beforeSend: function() {
              $('#chargeoffm110').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#chargeoffm110').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({

            type: "GET",
            url: "../controller/api/chargeoffm_120",
            dataType: "json",
			beforeSend: function() {
              $('#chargeoffm120').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#chargeoffm120').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({

            type: "GET",
            url: "../controller/api/chargeoffm_130",
            dataType: "json",
			beforeSend: function() {
              $('#chargeoffm130').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#chargeoffm130').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({

            type: "GET",
            url: "../controller/api/chargeoffm_210",
            dataType: "json",
			beforeSend: function() {
              $('#chargeoffm210').html('calcul en cours...');
           },
            success: function (data) {
				var names = data[0].nb+'%';
               $('#chargeoffm210').html(names);
            },
            error: function (result) {
                alert("Error");
            }
        });