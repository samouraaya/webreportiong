
/*Somme de l'encours*/
 $( document ).ready(function(){
	 setTimeout(function(){
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));	 
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
var total=(encours100+encours110+encours130+encours120+encours210).toFixed(0);
	document.getElementById('totalencours').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
	
 

 /*Somme de le nombre des clients actifs*/
  
var cltact100=parseFloat($("#cltact100").text().replace(' ', ''));	  
var cltact110=parseFloat($("#cltact110").text().replace(' ', ''));
var cltact120=parseFloat($("#cltact120").text().replace(' ', ''));
var cltact130=parseFloat($("#cltact130").text().replace(' ', ''));
var cltact210=parseFloat($("#cltact210").text().replace(' ', ''));
document.getElementById('totalclt').innerHTML = cltact110+cltact120+cltact130+cltact100+cltact210;
 
 /*Somme de le nombre des crédits décaissés aujourd'hui*/
   
var nbdecauj110=parseFloat($("#nbdecauj110").text().replace(' ', ''));
var nbdecauj120=parseFloat($("#nbdecauj120").text().replace(' ', ''));
var nbdecauj130=parseFloat($("#nbdecauj130").text().replace(' ', ''));
var nbdecauj210=parseFloat($("#nbdecauj210").text().replace(' ', ''));
document.getElementById('totaldecauj').innerHTML = nbdecauj110+nbdecauj120+nbdecauj130+nbdecauj210;
 
 /*Somme de le volume des crédits décaissés aujourd'hui*/
    
var vldecauj110=parseFloat($("#vldecauj110").text().replace(/ /g, ''));
var vldecauj130=parseFloat($("#vldecauj130").text().replace(/ /g, ''));
var vldecauj120=parseFloat($("#vldecauj120").text().replace(/ /g, ''));
var vldecauj210=parseFloat($("#vldecauj210").text().replace(/ /g, ''));
var total=(vldecauj110+vldecauj120+vldecauj130+vldecauj210).toFixed(0);
document.getElementById('totalvldecauj').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
 
 /*Somme de le nombre des échéances attendus*/
    
var nbech100=parseFloat($("#nbech100").text().replace(' ', ''));		
var nbech110=parseFloat($("#nbech110").text().replace(' ', ''));
var nbech120=parseFloat($("#nbech120").text().replace(' ', ''));
var nbech130=parseFloat($("#nbech130").text().replace(' ', ''));
var nbech210=parseFloat($("#nbech210").text().replace(' ', ''));
document.getElementById('totalech').innerHTML = nbech110+nbech120+nbech130+nbech100+nbech210;
 
 /*Somme de le nombre des échéances impayés*/
     
var nbechimp100=parseFloat($("#nbechimp100").text().replace(' ', ''));		 
var nbechimp110=parseFloat($("#nbechimp110").text().replace(' ', ''));
var nbechimp120=parseFloat($("#nbechimp120").text().replace(' ', ''));
var nbechimp130=parseFloat($("#nbechimp130").text().replace(' ', ''));
var nbechimp210=parseFloat($("#nbechimp210").text().replace(' ', ''));
document.getElementById('totalnbechimp').innerHTML = nbechimp110+nbechimp120+nbechimp130+nbechimp100+nbechimp210;
 
 /*% des échéances payés a temps 100*/
    
var nbechimp100=parseFloat($("#nbechimp100").text().replace(' ', ''));
var nbech100=parseFloat($("#nbech100").text().replace(' ', ''));
if (nbech100=!'0')
document.getElementById('per100').innerHTML = (((((nbech100-nbechimp100)/nbech100)*100).toFixed(2)).toString()).concat('%');
else document.getElementById('per100').innerHTML ='0.00%';
 
 /*% des échéances payés a temps 110*/
    
var nbechimp110=parseFloat($("#nbechimp110").text().replace(' ', ''));
var nbech110=parseFloat($("#nbech110").text().replace(' ', ''));
document.getElementById('per110').innerHTML = (((((nbech110-nbechimp110)/nbech110)*100).toFixed(2)).toString()).concat('%');
 
/*% des échéances payés a temps 120*/ 
    
var nbechimp120=parseFloat($("#nbechimp120").text().replace(' ', ''));
var nbech120=parseFloat($("#nbech120").text().replace(' ', ''));
document.getElementById('per120').innerHTML = (((((nbech120-nbechimp120)/nbech120)*100).toFixed(2)).toString()).concat('%');
 
 /*% des échéances payés a temps 130*/
     
var nbechimp130=parseFloat($("#nbechimp130").text().replace(' ', ''));
var nbech130=parseFloat($("#nbech130").text().replace(' ', ''));
document.getElementById('per130').innerHTML = (((((nbech130-nbechimp130)/nbech130)*100).toFixed(2)).toString()).concat('%');

 /*% des échéances payés a temps 210*/
     
var nbechimp210=parseFloat($("#nbechimp210").text().replace(' ', ''));
var nbech210=parseFloat($("#nbech210").text().replace(' ', ''));
if (nbech210=!'0')
document.getElementById('per210').innerHTML = (((((nbech210-nbechimp210)/nbech210)*100).toFixed(2)).toString()).concat('%');
else document.getElementById('per210').innerHTML ='0.00%';
 
 /*% des échéances payés a temps */
      
var totalnbechimp=parseFloat($("#totalnbechimp").text().replace(' ', ''));
var totalech=parseFloat($("#totalech").text().replace(' ', ''));
document.getElementById('totalper').innerHTML = (((((totalech-totalnbechimp)/totalech)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par0 agence 100 */
      
var vlpar0100=parseFloat($("#vlpar0100").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
document.getElementById('perpar100').innerHTML = (((((vlpar0100)/encours100)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par0 agence 110 */
      
var vlpar0110=parseFloat($("#vlpar0110").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
document.getElementById('perpar0100').innerHTML = (((((vlpar0110)/encours110)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par0 agence 120 */
      
var vlpar0120=parseFloat($("#vlpar0120").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
document.getElementById('perpar0120').innerHTML = (((((vlpar0120)/encours120)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par0 agence 130 */
      
var vlpar0130=parseFloat($("#vlpar0130").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
document.getElementById('perpar0130').innerHTML = (((((vlpar0130)/encours130)*100).toFixed(2)).toString()).concat('%');

  /*% Par0 agence 210 */
      
var vlpar0210=parseFloat($("#vlpar0210").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
document.getElementById('perpar0210').innerHTML = (((((vlpar0210)/encours210)*100).toFixed(2)).toString()).concat('%');
 
 /*Somme de le nombre de PAR0*/
  
var nbpar0100=parseFloat($("#nbpar0100").text().replace(' ', ''));	  
var nbpar0110=parseFloat($("#nbpar0110").text().replace(' ', ''));
var nbpar0120=parseFloat($("#nbpar0120").text().replace(' ', ''));
var nbpar0130=parseFloat($("#nbpar0130").text().replace(' ', ''));
var nbpar0210=parseFloat($("#nbpar0210").text().replace(' ', ''));
document.getElementById('totalnbpar0').innerHTML = nbpar0110+nbpar0120+nbpar0130+nbpar0100+nbpar0210;
 
	/*Somme de PAR0*/
 
var encours100=parseFloat($("#vlpar0100").text().replace(/ /g, ''));	 
var encours110=parseFloat($("#vlpar0110").text().replace(/ /g, ''));
var encours120=parseFloat($("#vlpar0120").text().replace(/ /g, ''));
var encours130=parseFloat($("#vlpar0130").text().replace(/ /g, ''));
var vlpar0210=parseFloat($("#vlpar0210").text().replace(/ /g, ''));
var total=(encours110+encours130+encours120+encours100+vlpar0210).toFixed(0);
document.getElementById('totalvlpar0').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 

 	
   /*% Par0 total */
      
var totalvlpar0=parseFloat($("#totalvlpar0").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
var totalencours=encours110+encours120+encours130+encours100+encours210;
document.getElementById('perpar0total').innerHTML = (((((totalvlpar0)/totalencours)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par7 agence 100 */
      
var vlpar7100=parseFloat($("#vlpar7100").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
document.getElementById('perpar710').innerHTML = (((((vlpar7100)/encours100)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par7 agence 110 */
      
var vlpar7110=parseFloat($("#vlpar7110").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
document.getElementById('perpar7100').innerHTML = (((((vlpar7110)/encours110)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par7 agence 120 */
      
var vlpar7120=parseFloat($("#vlpar7120").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
document.getElementById('perpar7120').innerHTML = (((((vlpar7120)/encours120)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par7 agence 130 */
      
var vlpar7130=parseFloat($("#vlpar7130").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
document.getElementById('perpar7130').innerHTML = (((((vlpar7130)/encours130)*100).toFixed(2)).toString()).concat('%');

  /*% Par7 agence 210 */
      
var vlpar7210=parseFloat($("#vlpar7210").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
document.getElementById('perpar7210').innerHTML = (((((vlpar7210)/encours210)*100).toFixed(2)).toString()).concat('%');
 
 /*Somme de le nombre de PAR7*/
  
var nbpar7100=parseFloat($("#nbpar7100").text().replace(' ', ''));	  
var nbpar7110=parseFloat($("#nbpar7110").text().replace(' ', ''));
var nbpar7120=parseFloat($("#nbpar7120").text().replace(' ', ''));
var nbpar7130=parseFloat($("#nbpar7130").text().replace(' ', ''));
var nbpar7210=parseFloat($("#nbpar7210").text().replace(' ', ''));
document.getElementById('totalnbpar7').innerHTML = nbpar7110+nbpar7120+nbpar7130+nbpar7210;
 
	/*Somme de PAR7*/
 
var encours100=parseFloat($("#vlpar7100").text().replace(/ /g, ''));	 
var encours110=parseFloat($("#vlpar7110").text().replace(/ /g, ''));
var encours120=parseFloat($("#vlpar7120").text().replace(/ /g, ''));
var encours130=parseFloat($("#vlpar7130").text().replace(/ /g, ''));
var encours210=parseFloat($("#vlpar7210").text().replace(/ /g, ''));
var total=(encours110+encours130+encours120+encours100+encours210).toFixed(0);
document.getElementById('totalvlpar7').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 

 	
   /*% Par7 total */
      
var totalvlpar7=parseFloat($("#totalvlpar7").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
var totalencours=encours110+encours120+encours130+encours100+encours210;
document.getElementById('perpar7total').innerHTML = (((((totalvlpar7)/totalencours)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par30 agence 100 */
      
var vlpar30100=parseFloat($("#vlpar30100").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
document.getElementById('perpar3010').innerHTML = (((((vlpar30100)/encours100)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par30 agence 110 */
      
var vlpar30110=parseFloat($("#vlpar30110").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
document.getElementById('perpar30100').innerHTML = (((((vlpar30110)/encours110)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par30 agence 120 */
      
var vlpar30120=parseFloat($("#vlpar30120").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
document.getElementById('perpar30120').innerHTML = (((((vlpar30120)/encours120)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par30 agence 130 */
      
var vlpar30130=parseFloat($("#vlpar30130").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
document.getElementById('perpar30130').innerHTML = (((((vlpar30130)/encours130)*100).toFixed(2)).toString()).concat('%');

  /*% Par30 agence 210 */
      
var vlpar30210=parseFloat($("#vlpar30210").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
document.getElementById('perpar30210').innerHTML = (((((vlpar30210)/encours210)*100).toFixed(2)).toString()).concat('%');
 
 /*Somme de le nombre de PAR30*/
  
var nbpar30100=parseFloat($("#nbpar30100").text().replace(' ', ''));
var nbpar30110=parseFloat($("#nbpar30110").text().replace(' ', ''));
var nbpar30120=parseFloat($("#nbpar30120").text().replace(' ', ''));
var nbpar30130=parseFloat($("#nbpar30130").text().replace(' ', ''));
var nbpar30210=parseFloat($("#nbpar30210").text().replace(' ', ''));
document.getElementById('totalnbpar30').innerHTML = nbpar30210+nbpar30110+nbpar30120+nbpar30130+nbpar30100;
 
	/*Somme de PAR30*/
 
var encours100=parseFloat($("#vlpar30100").text().replace(' ', ''));
var encours110=parseFloat($("#vlpar30110").text().replace(' ', ''));
var encours120=parseFloat($("#vlpar30120").text().replace(' ', ''));
var encours130=parseFloat($("#vlpar30130").text().replace(' ', ''));
var vlpar30210=parseFloat($("#vlpar30210").text().replace(' ', ''));
var total=(encours110+encours130+encours120+encours100+vlpar30210).toFixed(0);
document.getElementById('totalvlpar30').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
 	
   /*% Par30 total */
      
var totalvlpar30=parseFloat($("#totalvlpar30").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
var totalencours=encours110+encours120+encours130+encours100+encours210;
document.getElementById('perpar30total').innerHTML = (((((totalvlpar30)/totalencours)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par90 agence 100 */
      
var vlpar90100=parseFloat($("#vlpar90100").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
document.getElementById('perpar9010').innerHTML = (((((vlpar90100)/encours100)*100).toFixed(2)).toString()).concat('%');
 
 /*% Par90 agence 110 */
      
var vlpar90110=parseFloat($("#vlpar90110").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
document.getElementById('perpar90100').innerHTML = (((((vlpar90110)/encours110)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par90 agence 120 */
      
var vlpar90120=parseFloat($("#vlpar90120").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
document.getElementById('perpar90120').innerHTML = (((((vlpar90120)/encours120)*100).toFixed(2)).toString()).concat('%');
 
  /*% Par90 agence 130 */
      
var vlpar90130=parseFloat($("#vlpar90130").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
document.getElementById('perpar90130').innerHTML = (((((vlpar90130)/encours130)*100).toFixed(2)).toString()).concat('%');

  /*% Par90 agence 210 */
      
var vlpar90210=parseFloat($("#vlpar90210").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
document.getElementById('perpar90210').innerHTML = (((((vlpar90210)/encours210)*100).toFixed(2)).toString()).concat('%');
 
 /*Somme de le nombre de PAR90*/
  
var nbpar90100=parseFloat($("#nbpar90100").text().replace(' ', ''));	  
var nbpar90110=parseFloat($("#nbpar90110").text().replace(' ', ''));
var nbpar90120=parseFloat($("#nbpar90120").text().replace(' ', ''));
var nbpar90130=parseFloat($("#nbpar90130").text().replace(' ', ''));
var nbpar90210=parseFloat($("#nbpar90210").text().replace(' ', ''));
document.getElementById('totalnbpar90').innerHTML = nbpar90110+nbpar90120+nbpar90130+nbpar90100+nbpar90210;
 
	/*Somme de PAR90*/
 
var encours100=parseFloat($("#vlpar90100").text().replace(/ /g, ''));	 
var encours110=parseFloat($("#vlpar90110").text().replace(/ /g, ''));
var encours120=parseFloat($("#vlpar90120").text().replace(/ /g, ''));
var encours130=parseFloat($("#vlpar90130").text().replace(/ /g, ''));
var vlpar90210=parseFloat($("#vlpar90210").text().replace(/ /g, ''));
var total=(encours110+encours130+encours120+encours100+vlpar90210).toFixed(0);
document.getElementById('totalvlpar90').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 
 	
   /*% Par90 total */
      
var totalvlpar90=parseFloat($("#totalvlpar90").text().replace(/ /g, ''));
var encours100=parseFloat($("#encours100").text().replace(/ /g, ''));
var encours110=parseFloat($("#encours110").text().replace(/ /g, ''));
var encours120=parseFloat($("#encours120").text().replace(/ /g, ''));
var encours130=parseFloat($("#encours130").text().replace(/ /g, ''));
var encours210=parseFloat($("#encours210").text().replace(/ /g, ''));
var totalencours=encours110+encours120+encours130+encours210;
document.getElementById('perpar90total').innerHTML = (((((totalvlpar90)/totalencours)*100).toFixed(2)).toString()).concat('%');
 
 /*Somme de le Nb nouvelles demandes de prêt*/
   
var nbdmd110=parseFloat($("#nbdmd110").text().replace(' ', ''));
var nbdmd120=parseFloat($("#nbdmd120").text().replace(' ', ''));
var nbdmd130=parseFloat($("#nbdmd130").text().replace(' ', ''));
var nbdmd210=parseFloat($("#nbdmd210").text().replace(' ', ''));
document.getElementById('nbdmdtot').innerHTML = nbdmd110+nbdmd120+nbdmd130+nbdmd210;
 
 /*Somme de le Volume nouvelles demandes de prêt*/
   
var vldmd110=parseFloat($("#vldmd110").text().replace(/ /g, ''));
var vldmd120=parseFloat($("#vldmd120").text().replace(/ /g, ''));
var vldmd130=parseFloat($("#vldmd130").text().replace(/ /g, ''));
var vldmd210=parseFloat($("#vldmd210").text().replace(/ /g, ''));
var total=(vldmd110+vldmd120+vldmd130+vldmd210).toFixed(0);
document.getElementById('vldmdtot').innerHTML = accounting.formatMoney(total, "", 0, " ", ","); 

 
 /*Somme de le Nb demandes closed*/
   
var clodmd110=parseFloat($("#clodmd110").text().replace(' ', ''));
var clodmd120=parseFloat($("#clodmd120").text().replace(' ', ''));
var clodmd130=parseFloat($("#clodmd130").text().replace(' ', ''));
var clodmd210=parseFloat($("#clodmd210").text().replace(' ', ''));
document.getElementById('clodmdtot').innerHTML = clodmd110+clodmd120+clodmd130+clodmd210;
 
 /*Somme de Stock de demandes (nombre) 110*/
   
var pendmd110=parseFloat($("#pendmd110").text().replace(' ', ''));
var revdmd110=parseFloat($("#revdmd110").text().replace(' ', ''));
var appdmd110=parseFloat($("#appdmd110").text().replace(' ', ''));
document.getElementById('stock110dmd').innerHTML = pendmd110+revdmd110+appdmd110;
 
 /*Somme de Stock de demandes (nombre) 120*/
   
var pendmd120=parseFloat($("#pendmd120").text().replace(' ', ''));
var revdmd120=parseFloat($("#revdmd120").text().replace(' ', ''));
var appdmd120=parseFloat($("#appdmd120").text().replace(' ', ''));
document.getElementById('stock120dmd').innerHTML = pendmd120+revdmd120+appdmd120;
 
 /*Somme de Stock de demandes (nombre) 130*/
   
var pendmd130=parseFloat($("#pendmd130").text().replace(' ', ''));
var revdmd130=parseFloat($("#revdmd130").text().replace(' ', ''));
var appdmd130=parseFloat($("#appdmd130").text().replace(' ', ''));
document.getElementById('stock130dmd').innerHTML = pendmd130+revdmd130+appdmd130;

 /*Somme de Stock de demandes (nombre) 210*/
   
var pendmd210=parseFloat($("#pendmd210").text().replace(' ', ''));
var revdmd210=parseFloat($("#revdmd210").text().replace(' ', ''));
var appdmd210=parseFloat($("#appdmd210").text().replace(' ', ''));
document.getElementById('stock210dmd').innerHTML = pendmd210+revdmd210+appdmd210;
 
 /*Somme de Stock de demandes (nombre)*/
   
var stock110dmd=parseFloat($("#stock110dmd").text().replace(' ', ''));
var stock120dmd=parseFloat($("#stock120dmd").text().replace(' ', ''));
var stock130dmd=parseFloat($("#stock130dmd").text().replace(' ', ''));
var stock210dmd=parseFloat($("#stock210dmd").text().replace(' ', ''));
document.getElementById('stocktotaldmd').innerHTML = stock110dmd+stock120dmd+stock130dmd+stock210dmd;
 
 /*Somme de Stock de demandes (nombre) pending*/
   
var pendmd110=parseFloat($("#pendmd110").text().replace(' ', ''));
var pendmd120=parseFloat($("#pendmd120").text().replace(' ', ''));
var pendmd130=parseFloat($("#pendmd130").text().replace(' ', ''));
var pendmd210=parseFloat($("#pendmd210").text().replace(' ', ''));
document.getElementById('stockpendmd').innerHTML = pendmd110+pendmd120+pendmd130+pendmd210;
 
 /*Somme de Stock de demandes (nombre) reviewed*/
   
var revdmd110=parseFloat($("#revdmd110").text().replace(' ', ''));
var revdmd120=parseFloat($("#revdmd120").text().replace(' ', ''));
var revdmd130=parseFloat($("#revdmd130").text().replace(' ', ''));
var revdmd210=parseFloat($("#revdmd210").text().replace(' ', ''));
document.getElementById('stockrevdmd').innerHTML = revdmd110+revdmd120+revdmd130+revdmd210;
 
  /*Somme de Stock de demandes (nombre) approved*/
   
var appdmd110=parseFloat($("#appdmd110").text().replace(' ', ''));
var appdmd120=parseFloat($("#appdmd120").text().replace(' ', ''));
var appdmd130=parseFloat($("#appdmd130").text().replace(' ', ''));
var appdmd210=parseFloat($("#appdmd210").text().replace(' ', ''));
document.getElementById('stockappdmd').innerHTML = appdmd110+appdmd120+appdmd130+appdmd210;
 
 /*Somme de Stock de demandes (volume) 110*/
   
var vlpendmd110=parseFloat($("#vlpendmd110").text().replace(/ /g, ''));
var vlrevdmd110=parseFloat($("#vlrevdmd110").text().replace(/ /g, ''));
var vlappdmd110=parseFloat($("#vlappdmd110").text().replace(/ /g, ''));
var total=(vlpendmd110+vlrevdmd110+vlappdmd110).toFixed(0);
document.getElementById('vlstock110dmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");

 
 /*Somme de Stock de demandes (volume) 120*/
   
var vlpendmd120=parseFloat($("#vlpendmd120").text().replace(/ /g, ''));
var vlrevdmd120=parseFloat($("#vlrevdmd120").text().replace(/ /g, ''));
var vlappdmd120=parseFloat($("#vlappdmd120").text().replace(/ /g, ''));
var total=(vlpendmd120+vlrevdmd120+vlappdmd120).toFixed(0);
document.getElementById('vlstock120dmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Somme de Stock de demandes (volume) 130*/
   
var vlpendmd130=parseFloat($("#vlpendmd130").text().replace(/ /g, ''));
var vlrevdmd130=parseFloat($("#vlrevdmd130").text().replace(/ /g, ''));
var vlappdmd130=parseFloat($("#vlappdmd130").text().replace(/ /g, ''));
var total=(vlpendmd130+vlrevdmd130+vlappdmd130).toFixed(0);
document.getElementById('vlstock130dmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Somme de Stock de demandes (volume) 210*/
   
var vlpendmd210=parseFloat($("#vlpendmd210").text().replace(/ /g, ''));
var vlrevdmd210=parseFloat($("#vlrevdmd210").text().replace(/ /g, ''));
var vlappdmd210=parseFloat($("#vlappdmd210").text().replace(/ /g, ''));
var total=(vlpendmd210+vlrevdmd210+vlappdmd210).toFixed(0);
document.getElementById('vlstock210dmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Somme de Stock de demandes (volume)*/
   
var vlstock110dmd=parseFloat($("#vlstock110dmd").text().replace(/ /g, ''));
var vlstock120dmd=parseFloat($("#vlstock120dmd").text().replace(/ /g, ''));
var vlstock130dmd=parseFloat($("#vlstock130dmd").text().replace(/ /g, ''));
var vlstock210dmd=parseFloat($("#vlstock210dmd").text().replace(/ /g, ''));
var total=(vlstock110dmd+vlstock120dmd+vlstock130dmd+vlstock210dmd).toFixed(0);
document.getElementById('vlstocktotaldmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Somme de Stock de demandes (volume) pending*/
   
var vlpendmd110=parseFloat($("#vlpendmd110").text().replace(/ /g, ''));
var vlpendmd120=parseFloat($("#vlpendmd120").text().replace(/ /g, ''));
var vlpendmd130=parseFloat($("#vlpendmd130").text().replace(/ /g, ''));
var vlpendmd210=parseFloat($("#vlpendmd210").text().replace(/ /g, ''));
var total=(vlpendmd110+vlpendmd120+vlpendmd130+vlpendmd210).toFixed(0);
document.getElementById('vlstockpendmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Somme de Stock de demandes (volume) reviewed*/
   
var vlrevdmd110=parseFloat($("#vlrevdmd110").text().replace(/ /g, ''));
var vlrevdmd120=parseFloat($("#vlrevdmd120").text().replace(/ /g, ''));
var vlrevdmd130=parseFloat($("#vlrevdmd130").text().replace(/ /g, ''));
var vlrevdmd210=parseFloat($("#vlrevdmd210").text().replace(/ /g, ''));
var total=(vlrevdmd110+vlrevdmd120+vlrevdmd130+vlrevdmd210).toFixed(0);
document.getElementById('vlstockrevdmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
  /*Somme de Stock de demandes (volume) approved*/
   
var vlappdmd110=parseFloat($("#vlappdmd110").text().replace(/ /g, ''));
var vlappdmd120=parseFloat($("#vlappdmd120").text().replace(/ /g, ''));
var vlappdmd130=parseFloat($("#vlappdmd130").text().replace(/ /g, ''));
var vlappdmd210=parseFloat($("#vlappdmd210").text().replace(/ /g, ''));
var total=(vlappdmd110+vlappdmd120+vlappdmd130+vlappdmd210).toFixed(0);
document.getElementById('vlstockappdmd').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
  /*Somme de Nb de nouvelles demandes de prêt*/
   
var nbdmd110week=parseFloat($("#nbdmd110week").text().replace(' ', ''));
var nbdmd120week=parseFloat($("#nbdmd120week").text().replace(' ', ''));
var nbdmd130week=parseFloat($("#nbdmd130week").text().replace(' ', ''));
var nbdmd210week=parseFloat($("#nbdmd210week").text().replace(' ', ''));
document.getElementById('nbdmdtotalweek').innerHTML = nbdmd110week+nbdmd120week+nbdmd130week+nbdmd210week;
 
  /*Somme de Nbr crédits décaissés*/
   
var nbcr110week=parseFloat($("#nbcr110week").text().replace(' ', ''));
var nbcr120week=parseFloat($("#nbcr120week").text().replace(' ', ''));
var nbcr130week=parseFloat($("#nbcr130week").text().replace(' ', ''));
var nbcr210week=parseFloat($("#nbcr210week").text().replace(' ', ''));
document.getElementById('nbcrtotalweek').innerHTML = nbcr110week+nbcr120week+nbcr130week+nbcr210week;
 
 /*Volume crédits décaissés*/
   
var vlcr110week=parseFloat($("#vlcr110week").text().replace(/ /g, ''));
var vlcr120week=parseFloat($("#vlcr120week").text().replace(/ /g, ''));
var vlcr130week=parseFloat($("#vlcr130week").text().replace(/ /g, ''));
var vlcr210week=parseFloat($("#vlcr210week").text().replace(/ /g, ''));
var total=(vlcr110week+vlcr120week+vlcr130week+vlcr210week).toFixed(0);
document.getElementById('vlcrtotalweek').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Montant moyen décaissé 110*/
   
var vlcr110week=parseFloat($("#vlcr110week").text().replace(/ /g, ''));
var nbcr110week=parseFloat($("#nbcr110week").text().replace(/ /g, ''));
var total=(vlcr110week/nbcr110week).toFixed(0);
document.getElementById('moycr110week').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
  /*Montant moyen décaissé 120*/
   
var vlcr120week=parseFloat($("#vlcr120week").text().replace(/ /g, ''));
var nbcr120week=parseFloat($("#nbcr120week").text().replace(/ /g, ''));
var total=(vlcr120week/nbcr120week).toFixed(0);
document.getElementById('moycr120week').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Montant moyen décaissé 130*/
   
var vlcr130week=parseFloat($("#vlcr130week").text().replace(/ /g, ''));
var nbcr130week=parseFloat($("#nbcr130week").text().replace(/ /g, ''));
var total=(vlcr130week/nbcr130week).toFixed(0);
document.getElementById('moycr130week').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");

 /*Montant moyen décaissé 210*/
   
var vlcr210week=parseFloat($("#vlcr210week").text().replace(/ /g, ''));
var nbcr210week=parseFloat($("#nbcr210week").text().replace(/ /g, ''));
var total=(vlcr210week/nbcr210week).toFixed(0);
document.getElementById('moycr210week').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Montant moyen décaissé 130*/
   
var vlcrtotalweek=parseFloat($("#vlcrtotalweek").text().replace(/ /g, ''));
var nbcrtotalweek=parseFloat($("#nbcrtotalweek").text().replace(/ /g, ''));
var total=(vlcrtotalweek/nbcrtotalweek).toFixed(0);
document.getElementById('moycrtotweek').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");


 
 /*Somme de Nb de nouvelles demandes de prêt*/
   
var nbdmd110month=parseFloat($("#nbdmd110month").text().replace(' ', ''));
var nbdmd120month=parseFloat($("#nbdmd120month").text().replace(' ', ''));
var nbdmd130month=parseFloat($("#nbdmd130month").text().replace(' ', ''));
var nbdmd210month=parseFloat($("#nbdmd210month").text().replace(' ', ''));
document.getElementById('nbdmdtotalmonth').innerHTML = nbdmd110month+nbdmd120month+nbdmd130month+nbdmd210month;
 
  /*Somme de Nbr crédits décaissés*/
   
var nbcr110month=parseFloat($("#nbcr110month").text().replace(' ', ''));
var nbcr120month=parseFloat($("#nbcr120month").text().replace(' ', ''));
var nbcr130month=parseFloat($("#nbcr130month").text().replace(' ', ''));
var nbcr210month=parseFloat($("#nbcr210month").text().replace(' ', ''));
document.getElementById('nbcrtotalmonth').innerHTML = nbcr110month+nbcr120month+nbcr130month+nbcr210month;
 
 /*Volume crédits décaissés*/
   
var vlcr110month=parseFloat($("#vlcr110month").text().replace(/ /g, ''));
var vlcr120month=parseFloat($("#vlcr120month").text().replace(/ /g, ''));
var vlcr130month=parseFloat($("#vlcr130month").text().replace(/ /g, ''));
var vlcr210month=parseFloat($("#vlcr210month").text().replace(/ /g, ''));
var total=(vlcr110month+vlcr120month+vlcr130month+vlcr210month).toFixed(0);
document.getElementById('vlcrtotalmonth').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Montant moyen décaissé 110*/
   
var vlcr110month=parseFloat($("#vlcr110month").text().replace(/ /g, ''));
var nbcr110month=parseFloat($("#nbcr110month").text().replace(/ /g, ''));
var total=(vlcr110month/nbcr110month).toFixed(0);
document.getElementById('moycr110month').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
  /*Montant moyen décaissé 120*/
   
var vlcr120month=parseFloat($("#vlcr120month").text().replace(/ /g, ''));
var nbcr120month=parseFloat($("#nbcr120month").text().replace(/ /g, ''));
var total=(vlcr120month/nbcr120month).toFixed(0);
document.getElementById('moycr120month').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");

 
 /*Montant moyen décaissé 130*/
   
var vlcr130month=parseFloat($("#vlcr130month").text().replace(/ /g, ''));
var nbcr130month=parseFloat($("#nbcr130month").text().replace(/ /g, ''));
var total=(vlcr130month/nbcr130month).toFixed(0);
document.getElementById('moycr130month').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");

 /*Montant moyen décaissé 210*/
   
var vlcr210month=parseFloat($("#vlcr210month").text().replace(/ /g, ''));
var nbcr210month=parseFloat($("#nbcr210month").text().replace(/ /g, ''));
var total=(vlcr210month/nbcr210month).toFixed(0);
document.getElementById('moycr210month').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 /*Montant moyen décaissé 130*/
   
var vlcrtotalmonth=parseFloat($("#vlcrtotalmonth").text().replace(/ /g, ''));
var nbcrtotalmonth=parseFloat($("#nbcrtotalmonth").text().replace(/ /g, ''));
var total=(vlcrtotalmonth/nbcrtotalmonth).toFixed(0);
document.getElementById('moycrtotmonth').innerHTML = accounting.formatMoney(total, "", 0, " ", ",");
 
 },3000);	
 });