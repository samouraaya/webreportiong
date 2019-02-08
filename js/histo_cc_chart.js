function loadchart(id_cc)
{		
	/*********************************/
Highcharts.theme = {
   colors: ["#006B2C", "#FFCC00", "#2491f9", "#b1f435", "#c8b03e", "#95C11F", "#A7A7A7",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
   chart: {
      backgroundColor: null,
      style: {
         fontFamily: "Dosis, sans-serif"
      }
   },
   title: {
      style: {
         fontSize: '16px',
         fontWeight: 'bold',
         textTransform: 'uppercase'
      }
   },
   tooltip: {
      borderWidth: 0,
      backgroundColor: 'rgba(219,219,216,0.8)',
      shadow: false
   },
   legend: {
      itemStyle: {
         fontWeight: 'bold',
         fontSize: '13px'
      }
   },
   xAxis: {
      gridLineWidth: 1,
      labels: {
         style: {
            fontSize: '12px'
         }
      }
   },
   yAxis: {
      minorTickInterval: 'auto',
      title: {
         style: {
            textTransform: 'uppercase'
         }
      },
      labels: {
         style: {
            fontSize: '12px'
         }
      }
   },
   plotOptions: {
      candlestick: {
         lineColor: '#404048'
      }
   },


   // General
   background2: '#F0F0EA'

};
Highcharts.setOptions(Highcharts.theme);
/*************************/	
var utc = new Date(new Date().setMonth(new Date().getMonth()-12));    
utc=utc.toJSON().slice(0,10);
			var cc=id_cc;
			var res_cc_volume = $.ajax({ 
  dataType: "json",
  url: "../controller/api/fn_histo_cc_chart_vl?cc="+cc,
  success: function(result) {rescc=result;}                     
});
             $.when(res_cc_volume).done(function( a1 ) {
$(document).ready(function() {
  $('#volumedec').highcharts({
		
		
        title: {
            text: 'Volume  de prets decaisses ',
            x: -20 //center
        },
		
        xAxis: { type: 'datetime' },
tooltip: {
            xDateFormat: '%Y-%m',
            shared: true
        },		
    plotOptions: {
        series: {
            pointStart: moment.utc(utc).valueOf(), 
            pointInterval: 31*24*60*60*1000
        }
    },
        yAxis: {
            title: {
                text: 'Decaissement (En Volume)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: rescc
    });
	
  }); 
 });
 var res_cc_nbr = $.ajax({ 
  dataType: "json",
  url: "../controller/api/fn_histo_cc_chart_nbr?cc="+cc,
  success: function(result) {resccnbr=result;}                     
});
             $.when(res_cc_nbr).done(function( a1 ) {
$(document).ready(function() {
  $('#nbrdec').highcharts({
		
		chart: {
            type: 'column'
        },
		
        title: {
            text: 'Nombre  de prets decaisses ',
            x: -20 //center
        },
		
        xAxis: { type: 'datetime' },
tooltip: {
            xDateFormat: '%Y-%m',
            shared: true
        },		
    plotOptions: {
        series: {
            pointStart: moment.utc(utc).valueOf(), 
            pointInterval: 31*24*60*60*1000
        }
    },
        yAxis: {
            title: {
                text: 'Decaissement (En Nombre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: resccnbr
    });
	
  }); 
 });
}