
	   var link="dqc_agence/controller/t1";
		$("#jqxButton").hide();
			function loadgrid(){
			$.getJSON(link+".php", function(data)
			{
			
			longeur=data[1].rows.length ;
			var columns = data[0].columns;
			var rows = data[1].rows;
			var source =
			{
			localdata: rows
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			$("#identifiant").jqxInput({ theme: 'office' });
            $('#jqxTextArea').jqxTextArea({ placeHolder: 'Enter un commentaire', height: 90, width: 600, minLength: 1 })
			$("#jqxButton").jqxButton({ theme: 'office' });
            $("#identifiant").width(150);
            $("#identifiant").height(23);
			$("#jqxgrid").jqxGrid({
				width: '100%',
                source: dataAdapter,
				selectionmode: 'singlecell',
				showfilterrow: true,
                filterable: true,
                pageable: true,
                height: '300px',
				theme: 'office',
                editable: false,
                columnsresize: false,
                columns: columns
			});
			 $("#popupWindow").jqxWindow({
                width: 800, resizable: true,theme: 'vert',  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });
            $("#popupWindow").on('open', function () {
                $("#identifiant").jqxInput('selectAll');
            });
			
			$("#jqxgrid").on('cellselect', function (event) {
                var column = $("#jqxgrid").jqxGrid('getcolumn', event.args.datafield);
                var value = $("#jqxgrid").jqxGrid('getcellvalue', event.args.rowindex, column.datafield);
                var displayValue = $("#jqxgrid").jqxGrid('getcellvalue', event.args.rowindex, column.displayfield);
				$("#identifiant").val(displayValue);
				var offset = $("#jqxgrid").offset();
				$("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });
				$("#popupWindow").jqxWindow('open');
				$(".jqx-window-close-button").hide();
				
            });
			$('#Cancel').bind('click', function (event) {
					$("#jqxgrid").jqxGrid('clearselection');
					$("#jqxgrid").jqxGrid('selectrow', 0);
					$("#jqxButton").hide();
			});
			});
			};
			function grid_histo(){
			$.getJSON(link+".php", function(data)
			{
			
			longeur=data[1].rows.length ;
			var columns = data[0].columns;
			var rows = data[1].rows;
			var source =
			{
			localdata: rows
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			$("#gridhisto").jqxGrid({
				width: '100%',
                source: dataAdapter,
				showfilterrow: true,
                filterable: true,
                pageable: true,
                height: '300px',
				theme: 'office',
                editable: false,
                columnsresize: false,
                columns: columns
			});
			});
			};
		/////////////////////////////////////////	
		$( "#historique" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			$('#histo').html("l'historique");
			link="dqc_agence/controller/historique";
			grid_histo();
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});
	
		/////////////////////////////////////////	
		$( "#T1" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t1";
			loadgrid();
			$('#result').html('T1');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});
			/////////////////////////////////////////	
		$( "#T2" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t2";
			loadgrid();
			$('#result').html('T2');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});
			/////////////////////////////////////////	
		$( "#T3" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t3";
			loadgrid();
			$('#result').html('T3');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});	
		/////////////////////////////////////////	
		$( "#T4" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t4";
			loadgrid();
			$('#result').html('T4');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});		
		/////////////////////////////////////////
		$( "#T5" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t5";
			loadgrid();
			$('#result').html('T5');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});
		/////////////////////////////////////////
		$( "#T6" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t6";
			loadgrid();
			$('#result').html('T6');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
			});
		/////////////////////////////////////////		
		$( "#T7" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t7";
			loadgrid();
			$('#result').html('T7');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});
			/////////////////////////////////////////		
		$( "#T7bis" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t7bis";
			loadgrid();
			$('#result').html('T7 Bis');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});
		/////////////////////////////////////////		
		$( "#T8" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t8";
			loadgrid();
			$('#result').html('T8');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T9" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t9";
			loadgrid();
			$('#result').html('T9');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T10" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t10";
			loadgrid();
			$('#result').html('T10');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
			/////////////////////////////////////////		
		$( "#T11" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t11";
			loadgrid();
			$('#result').html('T11');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
			/////////////////////////////////////////		
		$( "#T12" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t12";
			loadgrid();
			$('#result').html('T12');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T13" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t13";
			loadgrid();
			$('#result').html('T13');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T14" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t14";
			loadgrid();
			$('#result').html('T14');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T15" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t15";
			loadgrid();
			$('#result').html('T15');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);
										});	
		/////////////////////////////////////////		
		$( "#T17" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t17";
			loadgrid();
			$('#result').html('T17');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);

			});
		/////////////////////////////////////////		
		$( "#T18" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t18";
			loadgrid();
			$('#result').html('T18');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);

			});
		/////////////////////////////////////////		
		$( "#T19" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t19";
			loadgrid();
			$('#result').html('T19');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);

			});
		/////////////////////////////////////////		
		$( "#T20" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t20";
			loadgrid();
			$('#result').html('T20');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);

			});
		/////////////////////////////////////////		
		$( "#T21" ).click(function() {
			$('#img').show();
			$('#body').fadeTo("slow" ,0.6);
			link="dqc_agence/controller/t21";
			loadgrid();
			$('#result').html('T21');
			$('#img').hide();
			$('#body').fadeTo("slow" ,1);

			});	
			