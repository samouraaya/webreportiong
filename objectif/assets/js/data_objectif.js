$.ajax({

            type: "GET",
            url: "../../objectif/data_objectif.php",
            dataType: "json",
		     success: function (data) {
				for ( var i = 0; i < data.length; i++ ) {
				var obj_nb_month_dis = data[i].obj_nb_month_dis;
				var obj_vl_month_dis = data[i].obj_vl_month_dis;
				var obj_nb_year_dis = data[i].obj_nb_year_dis;
				var obj_vl_year_dis = data[i].obj_vl_year_dis;
				var obj_nb_out = data[i].obj_nb_out;
				var obj_vl_out = data[i].obj_vl_out;
				var month = data[i].month;
				var year = data[i].year;
				var rsm = data[i].rsm;
				var date_import = data[i].date_import;
$('#data_objectif').append("<tr><td><b><center>"+month+"/"+year+"</center></b></td><td>"+obj_nb_month_dis+"</td><td>"+obj_vl_month_dis+"</td><td>"+obj_nb_year_dis+"</td><td>"+obj_vl_year_dis+"</td><td>"+obj_nb_out+"</td><td>"+obj_vl_out+"</td><td>"+rsm+"</td>td>"+date_import+"</td></tr>").hide().fadeIn(500);
            }
			},
            error: function (result) {
                alert("Error");
            }
        });