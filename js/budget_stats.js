
                var chart = new CanvasJS.Chart("chartContainer4", {
				axisY:{
						valueFormatString: " # ###", 
						maximum: 800000
						},

			title:{
				text: "Evolution du volume décaissé en TND Par Agence 2016",
				fontFamily: "arial black"
			},  
                        animationEnabled: true, 
						exportEnabled: true,
                    data: [
                        {	toolTipContent: "{y} TND",
							type: "spline",
							markerSize: 10,
							name: "Agence 110",
							showInLegend: true,
							color: "rgba(0,47,47,.7)",
                            dataPoints: agence110
                        },  
						{	toolTipContent: "{y} TND",
							type: "spline",
							markerSize: 10,
							name: "Agence 120",
							showInLegend: true,
							color: "rgba(232,204,6,.7)",
                            dataPoints: agence120
                        }
						,  
						{	toolTipContent: "{y} TND",
							type: "spline",
							markerSize: 10,
							name: "Agence 130",
							showInLegend: true,
							color: "rgba(132 ,212 ,29,.7)",
                            dataPoints: agence130
                        }
                    ],  legend:{
            cursor:"pointer",
			fontSize: 20,
            itemclick: function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else {
                e.dataSeries.visible = true;
              }
            	chart.render();
            }
          },
                });
			chart.render();
