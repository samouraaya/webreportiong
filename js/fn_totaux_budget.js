 /* % Total Nombre crédit décaissé depuis l'année*/
 $(document).ajaxComplete(function(){
var totalnbdec=parseFloat($("#totalnbdec").text().replace(/ /g, ''));
var totalnbobject=parseFloat($("#totalnbobject").text().replace(/ /g, ''));
document.getElementById('pernbtot').innerHTML = (((((totalnbdec)/totalnbobject)*100).toFixed(2)).toString()).concat('%');
 });
/* % Total volume crédit décaissé depuis l'année*/
  $(document).ajaxComplete(function(){
var totalvldec=parseFloat($("#vldectot").text().replace(/ /g, ''));
var totalvlobject=parseFloat($("#totalvlobject").text().replace(/ /g, ''));
document.getElementById('pervltot').innerHTML = (((((totalvldec)/totalvlobject)*100).toFixed(2)).toString()).concat('%');
 });
/* % Total Nombre crédit décaissé depuis le mois*/
   $(document).ajaxComplete(function(){
var dectotm=parseFloat($("#dectotm").text().replace(/ /g, ''));
var totaldectotmobject=parseFloat($("#totaldectotmobject").text().replace(/ /g, ''));
document.getElementById('perdecmnb').innerHTML = (((((dectotm)/totaldectotmobject)*100).toFixed(2)).toString()).concat('%');
 });
/* % Total Volume crédit décaissé depuis le mois*/
   $(document).ajaxComplete(function(){
var vldectotm=parseFloat($("#vldectotm").text().replace(/ /g, ''));
var totaldectotmobjectvl=parseFloat($("#totaldectotmobjectvl").text().replace(/ /g, ''));
document.getElementById('perdecmvl').innerHTML = (((((vldectotm)/totaldectotmobjectvl)*100).toFixed(2)).toString()).concat('%');
 });
/* % Total volume encours depuis le mois*/
   $(document).ajaxComplete(function(){
var totalendec=parseFloat($("#totalendec").text().replace(/ /g, ''));
var totalendecobject=parseFloat($("#totalendecobject").text().replace(/ /g, ''));
document.getElementById('perenc').innerHTML = (((((totalendec)/totalendecobject)*100).toFixed(2)).toString()).concat('%');
 });
/* % Total nombre encours depuis le mois*/
   $(document).ajaxComplete(function(){
var totalendecnb=parseFloat($("#totalendecnb").text().replace(/ /g, ''));
var totalendecobjectnb=parseFloat($("#totalendecobjectnb").text().replace(/ /g, ''));
document.getElementById('perencnb').innerHTML = (((((totalendecnb)/totalendecobjectnb)*100).toFixed(2)).toString()).concat('%');
 });

 
