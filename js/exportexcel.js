    function setExportGrid(gid,pid,pgTitle,name){
        
        var btnTitle = 'Export Excel';
		var name=s;
		
		 $('#'+gid).jqGrid('navSeparatorAdd','#'+pid, {sepclass : "ui-separator"});
        $('#'+gid).jqGrid('navButtonAdd','#'+pid, { title: btnTitle,caption: 'Export Excel', position: 'last', buttonicon: 'ui-icon-arrowthick-1-s', onClickButton: function() { exportgrid();} });
    
		 function exportgrid()
			{
			
			export_table_to_excel('gview_'+gid,name.concat(new Date().getFullYear()).concat('_').concat(new Date().getMonth()+1).concat('_').concat(new Date().getDate()));
			
			}
    }
