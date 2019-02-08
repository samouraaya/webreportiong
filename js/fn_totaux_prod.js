$( document ).ready(function(){
	 
setTimeout(function(){	 
	 
var nbdecmois110=parseFloat($("#nbdecmois110").text().replace(/ /g, ''));
var nbdecmois120=parseFloat($("#nbdecmois120").text().replace(/ /g, ''));
var nbdecmois130=parseFloat($("#nbdecmois130").text().replace(/ /g, ''));
var total=(nbdecmois110+nbdecmois120+nbdecmois130).toFixed(0);

//alert(total);
	document.getElementById('nbdecmoistotal').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
	

var vldecmois110=parseFloat($("#vldecmois110").text().replace(/ /g, ''));
var vldecmois120=parseFloat($("#vldecmois120").text().replace(/ /g, ''));
var vldecmois130=parseFloat($("#vldecmois130").text().replace(/ /g, ''));
var total=(vldecmois110+vldecmois120+vldecmois130).toFixed(0);
	document.getElementById('vldecmoistotal').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
	

var nbencmois110=parseFloat($("#nbencmois110").text().replace(/ /g, ''));
var nbencmois120=parseFloat($("#nbencmois120").text().replace(/ /g, ''));
var nbencmois130=parseFloat($("#nbencmois130").text().replace(/ /g, ''));
var total=(nbencmois110+nbencmois120+nbencmois130).toFixed(0);
	document.getElementById('nbencmoistotal').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
	

var vlencmois110=parseFloat($("#vlencmois110").text().replace(/ /g, ''));
var vlencmois120=parseFloat($("#vlencmois120").text().replace(/ /g, ''));
var vlencmois130=parseFloat($("#vlencmois130").text().replace(/ /g, ''));
var total=(vlencmois110+vlencmois120+vlencmois130).toFixed(0);
	document.getElementById('vlencmoistotal').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
	

var nbavgtrait110=parseFloat($("#nbavgtrait110").text().replace(/ /g, ''));
var nbavgtrait120=parseFloat($("#nbavgtrait120").text().replace(/ /g, ''));
var nbavgtrait130=parseFloat($("#nbavgtrait130").text().replace(/ /g, ''));
var total=((nbavgtrait110+nbavgtrait120+nbavgtrait130)/3).toFixed(0);
	document.getElementById('nbavgtraittotal').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 


},2000);	
 });