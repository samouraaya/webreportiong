/*fonction qui retourne le total d'encours*/
$.when($.getScript('../../js/fn_reporting.js')).done(function(){ 
		
		var encours110=$('#encours110').text();
		alert(encours110);
		document.getElementById('totalencours').innerHTML = encours110;
 })
	
	