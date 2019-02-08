//////////////////////////////////

		var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Evolution de l'encours en Nombre",
		fontFamily: "arial black"

      },
		animationEnabled: true, 
		exportEnabled: true,
      toolTip:
      {
        enabled:true
      },
       axisY:{
				valueFormatString: "# ### ###",
				title: "Nombre d'encours",		  
				maximum: 2000
            },
       data: [
      {
		toolTipContent: "{y}",
		type: "column",
		markerSize: 10,
		name: "Encours",
		showInLegend: false,
		color: "#006B2C",
		dataPoints: total_dec_hist
     }
     ]
	 
   });
    chart.render();
	
	//////////////////////////////////

		var chart1 = new CanvasJS.Chart("chartContainer1",
    {
      title:{
        text: "Evolution de l'encours en Volume",
		fontFamily: "arial black"

      },
		animationEnabled: true, 
		exportEnabled: true,
      toolTip:
      {
        enabled:true
      },
		axisY:{
				valueFormatString: "# ### ###",
				title: "Volume d'encours",		  
				maximum: 6000000
            },
       data: [
      {
		toolTipContent: "{y} TND",
		type: "spline",
		markerSize: 10,
		name: "Encours",
		showInLegend: false,
		color: "#006B2C",
		dataPoints: total_encours_hist
     }
     ]
	 
   });
    chart1.render();
	
		