
// setup grid print capability.  Add print button to navigation bar and bind to click.
    function setPrintGrid(gid,pid,pgTitle){
        // print button title.
        var btnTitle = 'Imprimer ';
        // setup print button in the grid top navigation bar.
        $('#'+gid).jqGrid('navSeparatorAdd','#'+gid+'_toppager_left', {sepclass :'ui-separator'});
        $('#'+gid).jqGrid('navButtonAdd','#'+gid+'_toppager_left', {caption: 'Imprimer', title: btnTitle, position: 'last', buttonicon: 'ui-icon-print', onClickButton: function() {    PrintGrid();    } });
    
        // setup print button in the grid bottom navigation bar.
        $('#'+gid).jqGrid('navSeparatorAdd','#'+pid, {sepclass : "ui-separator"});
        $('#'+gid).jqGrid('navButtonAdd','#'+pid, { title: btnTitle,caption: 'Imprimer', position: 'last', buttonicon: 'ui-icon-print', onClickButton: function() { PrintGrid();    } });
	
    
        function PrintGrid(){
            // attach print container style and div to DOM.
	
            $('head').append('<style type="text/css">.prt-hide {display:none;}</style>');
            $('body').append('<div id="prt-container" class="prt-hide"></div>');
    
            // copy and append grid view to print div container.
            $('#gview_'+gid).clone().appendTo('#prt-container').css({'page-break-after':'auto'});
			
            // remove navigation divs.
            $('#prt-container div').remove('.ui-jqgrid-toppager,.ui-jqgrid-titlebar,.ui-jqgrid-pager');
			 $('#prt-container .ui-jqgrid-bdiv').css({ 'height': 'auto' });
            $('#prt-container .ui-jqgrid-sdiv').before($('#prt-container .ui-jqgrid-bdiv'));
			
            // print the contents of the print container.    
            $('#prt-container').printElement({pageTitle:pgTitle, overrideElementCSS:[{href:'../../css/print-container.css',media:'print'}]});
            // remove print container style and div from DOM after printing is done.
            $('head style').remove();
            $('body #prt-container').remove();
			
        }
		
    }
