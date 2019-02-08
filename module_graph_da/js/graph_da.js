var agence = sessionStorage.getItem("agence"); 

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
/*************total_dec_vl***************************/
var total_dec_vl = $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_dec_agence_vl?agence="+agence,
  success: function(result) {totaldecvl=result;}                     
});
$.when(total_dec_vl).done(function( a1 ) {
$(document).ready(function() {
  $('#totalvl').highcharts({
		
		
        title: {
            text: 'Volume  de prets decaisses - 12 derniers mois - ',
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
       
        
        series: totaldecvl
    });
	
  }); 
 }); 
/**************************************/
var total_dec_nb = $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_dec_agence_nb?agence="+agence,
  success: function(result) {totaldecnb=result;}                     
});
$.when(total_dec_nb).done(function( a1 ) {
$(document).ready(function() {
  $('#totalnb').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de prets decaisses - 12 derniers mois - ',
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
       
        
        series: totaldecnb
    });
  }); 
 }); 
/***************total_dec***********************/
var total_dec = $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/Moy_dec_agence_vl_br?agence="+agence,
  success: function(result) {totaldec=result;}                     
});
$.when(total_dec).done(function( a1 ) {
$(document).ready(function() {
  $('#total_dec').highcharts({
        title: {
            text: 'Montant moyen decaisse - 12 derniers mois - ',
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
                color: '#808080'
            }]
        },
       
        
        series: totaldec
    });
  }); 
 }); 

/***************total_Outstanding_vl*************************/
var total_Outstanding_vl = $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_Outstanding_vl?agence="+agence,
  success: function(result) {totalOutstandingvl=result;}                     
});
$.when(total_Outstanding_vl).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingvl').highcharts({
		
		
        title: {
            text: 'Encours credits actifs - 12 derniers mois - ',
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
                text: 'Encours (En Volume)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: totalOutstandingvl
    });
	
  }); 
 });  
/***************total_Outstanding_nb*************************/
var total_Outstanding_nb = $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_Outstanding_nb?agence="+agence,
  success: function(result) {totalOutstandingnb=result;}                     
});
$.when(total_Outstanding_nb).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingnb').highcharts({
		
		chart: {
            type: 'column'
        },
        title: {
            text: 'Encours credits actifs - 12 derniers mois - ',
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
                text: 'Encours (En Nombre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: totalOutstandingnb
    });
	
  }); 
 });   




/***************PAR0_VL_Branch*************************/
var PAR0_VL_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/PAR0_Outstanding_vl_br?agence="+agence,
  success: function(result) {PAR0VLBranch=result;}                     
});
$.when(PAR0_VL_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR0VLBranch').highcharts({
		
		
        title: {
            text: 'PAR en % - 12 derniers mois - ',
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
                text: 'PAR0 (En Volume)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR0VLBranch
    });
	
  }); 
 }); 
 
/***************total_demande_agence_nbr*************************/
var total_demande_agence_nbr= $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_demande_agence_nbr?agence="+agence,
  success: function(result) {totaldemandeagencenbr=result;}                     
});
$.when(total_demande_agence_nbr).done(function( a1 ) {
$(document).ready(function() {
  $('#total_demande_agence_nbr').highcharts({
		
		chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de nouvelles demandes - 12 derniers mois -',
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
                text: 'Nombre de nouvelles demandes'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: totaldemandeagencenbr
    });
	
  }); 
 }); 
 
/***************total_demande_agence_moy*************************/
var total_demande_agence_moy= $.ajax({ 
  dataType: "json",
  url: "../../module_graph_da/API/total_demande_agence_moy?agence="+agence,
  success: function(result) {totaldemandeagencemoy=result;}                     
});
$.when(total_demande_agence_moy).done(function( a1 ) {
$(document).ready(function() {
  $('#total_demande_agence_moy').highcharts({
		
        title: {
            text: 'Montant moyen des nouvelles demandes - 12 derniers mois - ',
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
                text: 'Montant moyen des nouvelles demandes'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: totaldemandeagencemoy
    });
	
  }); 
 }); 
 