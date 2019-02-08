
//////////////////////////////////

			var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Evolution du volume décaissé en TND 2016",
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
				title: "Volume de décaissement",		  
				maximum: 1500000
            },
       data: [
      {
		toolTipContent: "{y} TND",
		type: "spline",
		showInLegend: false,
		markerSize: 10,
		color: "rgba(29,112,45,.7)",
		dataPoints: total_dec
     }
     ]
	 
   });

    chart.render();
////////////////////////////////////// 


			CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#8FCF3C",
				"#456B35",
				"#9C9E4B"
                ]);
			var chart2 = new CanvasJS.Chart("chartContainer2",
    {	colorSet: "greenShades",
      title:{
        text: "Répartition de l'encours par agence",
		fontFamily: "arial black"

      },

	  showInLegend: false,
	  legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center",
			fontSize: 20,
		},
		animationEnabled: true, 
		exportEnabled: true,
      toolTip:
      {
        enabled:true
      },
	theme: "theme1",
       data: [
      {
			type: "pie",
			indexLabelFontFamily: "Garamond",       
			indexLabelFontSize: 20,
			indexLabelFontWeight: "bold",
			startAngle:0,
			indexLabelFontColor: "MistyRose",       
			indexLabelLineColor: "darkgrey", 
			indexLabelPlacement: "inside", 
			toolTipContent: "{label}: {y}DT",
			showInLegend: false,
			indexLabel: "#percent%", 
			dataPoints: total_encrous
     }
     ]
	 
   });

    chart2.render();
////////////////////////////////////// 
   

			CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#8FCF3C",
				"#456B35",
				"#9C9E4B"
                ]);
			var chart3 = new CanvasJS.Chart("chartContainer3",
    {	colorSet: "greenShades",
      title:{
        text: "Historique du nombre de décaissements par agence 2016",
		fontFamily: "arial black"

      },
	    axisY:{
				valueFormatString: "# ### ###",
				title: "Nombre ",		  
//				maximum: 400
            },
	  showInLegend: true,
	  legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center",
			fontSize: 20,
		},
		animationEnabled: true, 
		exportEnabled: true,
      toolTip:
      {
        enabled:true
      },
	theme: "theme1",
       data: [
      {
			type: "stackedColumn",
			toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
			name: "110",
			showInLegend: "true",
			dataPoints: nb_dec_110
     }, 
	 {
			type: "stackedColumn",
			toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
			name: "120",
			showInLegend: "true",
			dataPoints: nb_dec_120
     }, 
	 {
			type: "stackedColumn",
			toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
			name: "130",
			showInLegend: "true",
			dataPoints: nb_dec_130
     }
     ]
	 
   });

    chart3.render();
	////////////////////////////////////// 
   


			CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#1D702D",
				"#B1221C"
                ]);
			var chart4 = new CanvasJS.Chart("chartContainer1",
    {	colorSet: "greenShades",
      title:{
        text: "Atteinte de l'objectif en nombre 2016",
		fontFamily: "arial black"

      },
	  showInLegend: true,
	  legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center",
			fontSize: 20,
		},
		animationEnabled: true, 
		exportEnabled: true,
      toolTip:
      {
        enabled:true
      },
	    axisY:{
				valueFormatString: "# ### ###",
				title: "Nombre ",		  
				maximum: 600
            },
	theme: "theme1",
       data: [
      {
			type: "column",	
			name: "Atteinte",
			legendText: "Atteinte",
			showInLegend: true, 
			dataPoints: nb_dec_tot
     }, 
	 {
			type: "column",	
			name: "Objectif",
			legendText: "Objectif",
			showInLegend: true,
			dataPoints:[
				{label: "Janvier", y: 190},
				{label: "Février", y: 230},
				{label: "Mars", y: 272},
				{label: "Avril", y: 328},
				{label: "Mai", y: 377},
				{label: "Juin", y: 266},
				{label: "Juillet", y: 257},
				{label: "Aout", y: 272},
				{label: "Septembre", y: 428},
				{label: "Octobre", y: 474},
				{label: "novembre", y: 454},
				{label: "Décembre", y: 548}]
     }
     ]
	 
   });

    chart4.render();
	
//////////////////////////////////

		var chart5 = new CanvasJS.Chart("chartContainer4",
    {
      title:{
        text: "Evolution des demandes en volume 2016",
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
				title: "Volume de demandes",		  
				maximum: 4500000
            },
       data: [
      {
		toolTipContent: "{y} TND",
		type: "spline",
		markerSize: 10,
		name: "Encours",
		showInLegend: false,
		color: "#006B2C",
		dataPoints: vl_demande_stats
     }
     ]
	 
   });
    chart5.render();
	//////////////////////////////////

		var chart6 = new CanvasJS.Chart("chartContainer5",
    {
      title:{
        text: "Evolution des demandes en nombre 2016",
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
				title: "Nombre de demandes",		  
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
		dataPoints: nb_demande_stats
     }
     ]
	 
   });
    chart6.render();