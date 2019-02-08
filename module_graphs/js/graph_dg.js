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
  url: "../../module_graphs/API/total_dec_agence_vl",
  success: function(result) {totaldecvl=result;}                     
});
$.when(total_dec_vl).done(function( a1 ) {
$(document).ready(function() {
  $('#totalvl').highcharts({
		
		
        title: {
            text: 'Volume  de prets decaisses (Total Advans)',
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
  url: "../../module_graphs/API/total_dec_agence_nb",
  success: function(result) {totaldecnb=result;}                     
});
$.when(total_dec_nb).done(function( a1 ) {
$(document).ready(function() {
  $('#totalnb').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de prets decaisses (Total Advans)',
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
  url: "../../module_graphs/API/total_dec_agence_vl_br",
  success: function(result) {totaldec=result;}                     
});
$.when(total_dec).done(function( a1 ) {
$(document).ready(function() {
  $('#agence_vl_br').highcharts({
        title: {
            text: 'Volume  de prets decaisses (par agence)',
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

/*********************total_decnb*****************************/
var total_decnb = $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_dec_agence_nb_br",
  success: function(result) {totaldecnb=result;}                     
});
$.when(total_decnb).done(function( a1 ) {
$(document).ready(function() {
  $('#decnb').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de prets decaisses (par agence)',
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
                color: '#808080'
            }]
        },
       
        
        series: totaldecnb
    });
  }); 
 });
/************************************************/ 
 var produit_dec = $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_dec_produit",
  success: function(result) {produitdec=result;}                     
});
$.when(produit_dec).done(function( a1 ) {
$(document).ready(function() {
  $('#produit').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Nombre de prets decaisses par produit (Total advans) ',
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
                text: 'Decaissement (En NB)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
       
        
        series: produitdec
    });
	
  }); 
 }); 
/***************total_Outstanding_vl*************************/
var total_Outstanding_vl = $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_Outstanding_vl",
  success: function(result) {totalOutstandingvl=result;}                     
});
$.when(total_Outstanding_vl).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingvl').highcharts({
		
		
        title: {
            text: 'Encours credits actifs (Total advans)',
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
  url: "../../module_graphs/API/total_Outstanding_nb",
  success: function(result) {totalOutstandingnb=result;}                     
});
$.when(total_Outstanding_nb).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingnb').highcharts({
		
		chart: {
            type: 'column'
        },
        title: {
            text: 'Encours credits actifs (Total advans)',
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
/***************Outstanding_vl_BR*************************/
var Outstanding_vl_br= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_Outstanding_vl_br",
  success: function(result) {Outstandingvlbr=result;}                     
});
$.when(Outstanding_vl_br).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingvlbr').highcharts({
		
		
        title: {
            text: 'Encours credits actifs (Par Agence)',
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
       
        
        series: Outstandingvlbr
    });
	
  }); 
 });  
 /***************Outstanding_nb_BR*************************/
var Outstanding_nb_br= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_Outstanding_nb_br",
  success: function(result) {Outstandingnbbr=result;}                     
});
$.when(Outstanding_nb_br).done(function( a1 ) {
$(document).ready(function() {
  $('#Outstandingnbbr').highcharts({
		
		chart: {
            type: 'column'
        },
        title: {
            text: 'Encours credits actifs (Par Agence)',
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
       
        
        series: Outstandingnbbr
    });
	
  }); 
 }); 
/***************Outstanding_CLS_Nbr*************************/
var Outstanding_CLS= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_outsanding_produit_nbr",
  success: function(result) {OutstandingCLS=result;}                     
});
$.when(Outstanding_CLS).done(function( a1 ) {
$(document).ready(function() {
  $('#OutstandingCLS').highcharts({
		
		chart: {
            type: 'column'
        },
        title: {
            text: 'Encours credits actifs (Par Produit)',
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
       
        
        series: OutstandingCLS
    });
	
  }); 
 }); 
/***************Outstanding_CLS_Vol*************************/
var Outstanding_CLS_vl= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/total_outsanding_produit_vl",
  success: function(result) {OutstandingCLSvl=result;}                     
});
$.when(Outstanding_CLS_vl).done(function( a1 ) {
$(document).ready(function() {
  $('#OutstandingCLSvl').highcharts({
		
        title: {
            text: 'Encours credits actifs (Par Produit)',
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
       
        
        series: OutstandingCLSvl
    });
	
  }); 
 }); 
/***************PAR0_VL_Branch*************************/
var PAR0_VL_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR0_Outstanding_vl_br",
  success: function(result) {PAR0VLBranch=result;}                     
});
$.when(PAR0_VL_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR0VLBranch').highcharts({
		
        title: {
            text: 'Par0 en montant (par agence) ',
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
 /***************PAR0_nb_Branch*************************/
var PAR0_nb_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR0_Outstanding_nb_br",
  success: function(result) {PAR0nbBranch=result;}                     
});
$.when(PAR0_nb_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR0NBBranch').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Par0 en nombre (par agence) ',
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
                text: 'PAR0 (En nombre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR0nbBranch
    });
	
  }); 
 }); 
/***************PAR30_VL_Branch*************************/
var PAR30_VL_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR30_Outstanding_vl_br",
  success: function(result) {PAR30VLBranch=result;}                     
});
$.when(PAR30_VL_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR30VLBranch').highcharts({
		
        title: {
            text: 'PAR30 en montant (par agence) ',
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
                text: 'PAR30 (En Volume)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR30VLBranch
    });
	
  }); 
 }); 
 /***************PAR30_nb_Branch*************************/
var PAR30_nb_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR30_Outstanding_nb_br",
  success: function(result) {PAR30nbBranch=result;}                     
});
$.when(PAR30_nb_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR30NBBranch').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'PAR30 en nombre (par agence) ',
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
                text: 'PAR30 (En nombre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR30nbBranch
    });
	
  }); 
 });  
/***************PAR90_VL_Branch*************************/
var PAR90_VL_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR90_Outstanding_vl_br",
  success: function(result) {PAR90VLBranch=result;}                     
});
$.when(PAR90_VL_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR90VLBranch').highcharts({
		
        title: {
            text: 'PAR90 en montant (par agence) ',
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
                text: 'PAR90 (En Volume)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR90VLBranch
    });
	
  }); 
 }); 
 /***************PAR90_nb_Branch*************************/
var PAR90_nb_Branch= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR90_Outstanding_nb_br",
  success: function(result) {PAR90nbBranch=result;}                     
});
$.when(PAR90_nb_Branch).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR90NBBranch').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'PAR90 en nombre (par agence) ',
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
                text: 'PAR90 (En nombre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR90nbBranch
    });
	
  }); 
 }); 
/***************PAR0_per_SEX*************************/
var PAR0_per_SEX= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR0_Outstanding_per_SEX",
  success: function(result) {PAR0perSEX=result;}                     
});
$.when(PAR0_per_SEX).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR0PERSEX').highcharts({
        title: {
            text: 'PAR0 en % (par genre) ',
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
                text: 'PAR0 en % (par genre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR0perSEX
    });
	
  }); 
 }); 
 /***************PAR30_per_SEX*************************/
var PAR30_per_SEX= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR30_Outstanding_per_SEX",
  success: function(result) {PAR30perSEX=result;}                     
});
$.when(PAR30_per_SEX).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR30PERSEX').highcharts({
        title: {
            text: 'PAR30 en % (par genre) ',
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
                text: 'PAR30 en % (par genre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR30perSEX
    });
	
  }); 
 }); 
  /***************PAR90_per_SEX*************************/
var PAR90_per_SEX= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR90_Outstanding_per_SEX",
  success: function(result) {PAR90perSEX=result;}                     
});
$.when(PAR90_per_SEX).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR90PERSEX').highcharts({
        title: {
            text: 'PAR90 en % (par genre) ',
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
                text: 'PAR90 en % (par genre)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR90perSEX
    });
	
  }); 
 }); 
/***************PAR0_per_SIC*************************/
var PAR0_per_SIC= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR0_Outstanding_per_SIC",
  success: function(result) {PAR0perSIC=result;}                     
});
$.when(PAR0_per_SIC).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR0PERSIC').highcharts({
        title: {
            text: 'PAR0 en % (par SIC) ',
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
                text: 'PAR0 en % (par SIC)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR0perSIC
    });
	
  }); 
 }); 
 /***************PAR30_per_SIC*************************/
var PAR30_per_SIC= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR30_Outstanding_per_SIC",
  success: function(result) {PAR30perSIC=result;}                     
});
$.when(PAR30_per_SIC).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR30PERSIC').highcharts({
        title: {
            text: 'PAR30 en % (par SIC) ',
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
                text: 'PAR30 en % (par SIC)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR30perSIC
    });
	
  }); 
 }); 
 /***************PAR90_per_SIC*************************/
var PAR90_per_SIC= $.ajax({ 
  dataType: "json",
  url: "../../module_graphs/API/PAR90_Outstanding_per_SIC",
  success: function(result) {PAR90perSIC=result;}                     
});
$.when(PAR90_per_SIC).done(function( a1 ) {
$(document).ready(function() {
  $('#PAR90PERSIC').highcharts({
        title: {
            text: 'PAR90 en % (par SIC) ',
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
                text: 'PAR90 en % (par SIC)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#4ca64c'
            }]
        },
       
        
        series: PAR90perSIC
    });
	
  }); 
 });