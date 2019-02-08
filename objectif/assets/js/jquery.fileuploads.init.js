
/**
* Theme: Flacto Admin Template
* Author: Coderthemes
 * Email: coderthemes@gmail.com
* File Uploads
*/

$(document).ready(function(){

	'use-strict';

    //Example 2
    $('#filer_input2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['csv'],
        changeInput: true,
        showThumbs: true,
        addMore: true,
		captions: {
            button: "<i class='fa fa-plus' aria-hidden='true'></i>",
            feedback: "Choisissez un fichier csv",
            feedback2: "fichier uploader",
            drop: "Drop file here to Upload",
            removeConfirmation: "Êtes-vous sûr de vouloir supprimer ce fichier?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Merci de choisir un fichier de format CSV.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        },
		 uploadFile: {
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            beforeSend: function(){},
            success: function(data, el){
				
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                });
				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
                if (regex.test($("#filer_input2").val().toLowerCase())) {
                    if (typeof (FileReader) != "undefined") {
                        var reader = new FileReader();
						var error='Importé';
						var rsm = sessionStorage.getItem("nom");
                        reader.onload = function (e) {
                            var table = $("<table class='table table-striped'> <thead><tr><th>Mois</th><th>Année</th><th>NB Objectif du Mois Dec</th><th>vl Objectif du Mois Dec</th><th>NB Objectif Année Dec</th><th>vl Objectif Année Dec</th><th>NB Objectif Encours</th><th>vl Objectif Encours</th><th>Statut</th></tr></thead></table");
                            var rows = e.target.result.split("\n");
							
                            for (var i = 0; i < rows.length-1; i++) {
								if (i>0)
								{
                                var row = $("<tr />");
                                var cells = rows[i].split(";");
								//alert(cells.length);
								cells[0] = cells[0].replace(/ /g, '');
								cells[1] = cells[1].replace(/ /g, '');
								cells[2] = cells[2].replace(/ /g, '');
								cells[3] = cells[3].replace(/ /g, '');
								cells[4] = cells[4].replace(/ /g, '');
								cells[5] = cells[5].replace(/ /g, '');
								cells[6] = cells[6].replace(/ /g, '');
								cells[7] = cells[7].replace(/ /g, '');
								
								alert(cells[0]);
								if($.isNumeric(cells[0]) && $.isNumeric(cells[1]) && $.isNumeric(cells[2]) && $.isNumeric(cells[3]) && $.isNumeric(cells[4]) && $.isNumeric(cells[5]) && $.isNumeric(cells[6]) && $.isNumeric(cells[7]))
								{
								$.ajax({
							url: '../../objectif/form_upload.php?obj_nb_month_dis='+cells[2]+'&obj_vl_month_dis='+cells[3]+'&obj_nb_year_dis='+cells[4]+'&obj_vl_year_dis='+cells[5]+'&obj_nb_out='+cells[6]+'&obj_vl_out='+cells[7]+'&month='+cells[0]+'&year='+cells[1]+'&rsm='+rsm,
							dataType: 'json'
							}); 
							error='Importé';
							}
							else 
							{
								error='Non Importé';
							}
                                for (var j = 0; j < cells.length; j++) {
									
                                    var cell = $("<td />");
                                    cell.html(cells[j]);
                                    row.append(cell);
                                }
								
								if (error=='Non Importé')
									{
									row.append('<div class=\"jFiler-item-others text-danger\"><i class=\"fa fa-warning\"></i> failed</div>');
									}
								else
								{
									row.append('<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>');
								}
                                table.append(row);
								
                            }
						}
                            $("#dvCSV").html('');
                            $("#dvCSV").append(table);
                        }
                        reader.readAsText($("#filer_input2")[0].files[0]);
                    } else {
                        alert("This browser does not support HTML5.");
                    }
                } else {
                    alert("Please upload a valid CSV file.");
                }
            },
            error: function(el){
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
                });
            },
            statusCode: null,
            onProgress: null,
            onComplete: null
        },
    });
$( "#trash" ).click(function() {
  $("#dvCSV").html('');
  alert('ok');
});
 });	