var agence = sessionStorage.getItem("agence");

$.ajax({
            type: "GET",
            url: "dqc_agence/api/t1?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
				if (names==0)
				{$('#nombreerreurt1').html(names);}
			else {
				$('#nombreerreurt1').html(names);
			document.getElementById("nombreerreurt1").style.backgroundColor ="#FFB6B8";}
				
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t2?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt2').html(names);}
			else {
				$('#nombreerreurt2').html(names);
			document.getElementById("nombreerreurt2").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t3?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt3').html(names);}
			else {
				$('#nombreerreurt3').html(names);
			document.getElementById("nombreerreurt3").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t4?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt4').html(names);}
			else {
				$('#nombreerreurt4').html(names);
			document.getElementById("nombreerreurt4").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t5?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt5').html(names);}
			else {
				$('#nombreerreurt5').html(names);
			document.getElementById("nombreerreurt5").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t6?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt6').html(names);}
			else {
				$('#nombreerreurt6').html(names);
			document.getElementById("nombreerreurt6").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t7?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt7').html(names);}
			else {
				$('#nombreerreurt7').html(names);
			document.getElementById("nombreerreurt7").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t7bis?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt7bis').html(names);}
			else {
				$('#nombreerreurt7bis').html(names);
			document.getElementById("nombreerreurt7bis").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t8?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt8').html(names);}
			else {
				$('#nombreerreurt8').html(names);
			document.getElementById("nombreerreurt8").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t9?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt9').html(names);}
			else {
				$('#nombreerreurt9').html(names);
			document.getElementById("nombreerreurt9").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t10?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt10').html(names);}
			else {
				$('#nombreerreurt10').html(names);
			document.getElementById("nombreerreurt10").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t11?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt11').html(names);}
			else {
				$('#nombreerreurt11').html(names);
			document.getElementById("nombreerreurt11").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t12?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt12').html(names);}
			else {
				$('#nombreerreurt12').html(names);
			document.getElementById("nombreerreurt12").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t13?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt13').html(names);}
			else {
				$('#nombreerreurt13').html(names);
			document.getElementById("nombreerreurt13").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t14?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt14').html(names);}
			else {
				$('#nombreerreurt14').html(names);
			document.getElementById("nombreerreurt14").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t15?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt15').html(names);}
			else {
				$('#nombreerreurt15').html(names);
			document.getElementById("nombreerreurt15").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t17?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt17').html(names);}
			else {
				$('#nombreerreurt17').html(names);
			document.getElementById("nombreerreurt17").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t18?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt18').html(names);}
			else {
				$('#nombreerreurt18').html(names);
			document.getElementById("nombreerreurt18").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t19?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
              if (names==0)
				{$('#nombreerreurt19').html(names);}
			else {
				$('#nombreerreurt19').html(names);
			document.getElementById("nombreerreurt19").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t20?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt20').html(names);}
			else {
				$('#nombreerreurt20').html(names);
			document.getElementById("nombreerreurt20").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });
$.ajax({
            type: "GET",
            url: "dqc_agence/api/t21?agence="+agence,
            dataType: "json",
			
            success: function (data) {
				var names = data[0].nb;
               if (names==0)
				{$('#nombreerreurt21').html(names);}
			else {
				$('#nombreerreurt21').html(names);
			document.getElementById("nombreerreurt21").style.backgroundColor ="#FFB6B8";}
            },
            error: function (result) {
                alert("Error");
            }
        });