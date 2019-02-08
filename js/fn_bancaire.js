 /* % de bancarisation client produit 501*/
 
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_110_501",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire110501').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire110501').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_100_501",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire100501').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire100501').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });

				
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_120_501",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire120501').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire120501').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_130_501",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire130501').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire130501').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_501",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire501').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire501').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 /* % de bancarisation client produit 511*/
 
 
  $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_110_511",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire110511').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire110511').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_100_511",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire100511').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire100511').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });

				
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_120_511",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire120511').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire120511').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_130_511",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire130511').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire130511').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_511",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire511').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire511').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
/* % de bancarisation client produit 521*/
 
 
  $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_110_521",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire110521').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire110521').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_100_521",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire100521').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire100521').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });

				
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_120_521",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire120521').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire120521').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_130_521",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire130521').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire130521').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_521",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire521').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire521').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
/* Total bencaire*/

 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_100",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire100').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire100').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_110",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire110').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire110').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_120",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire120').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire120').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });

 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total_130",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire130').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire130').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });
		
 $.ajax({

            type: "GET",
            url: "../controller/api/bancaire_total",
            dataType: "json",
			beforeSend: function() {
              $('#bancaire').html('loading...');
           },
            success: function (data) {
				var names = data[0].nb;
               $('#bancaire').html(names.concat('%'));
            },
            error: function (result) {
                alert("Error");
            }
        });