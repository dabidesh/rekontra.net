//
var element, elKr;
//var flag=false;
window.onload=function() {
  element= getElementById0('nav');
  addEvent('click', element, pokKrij);
}

function pokKrij() {
    elKr= getElementById0('nav-ul');
    //alert(elKr.style.display);
    if (elKr.style.display === "none") 
      elKr.style.display= 'block';
    else
      elKr.style.display= 'none';
}

function getElementById0(name) {
var o= document.getElementById
? document.getElementById(name) : document.all
? document.all[name] : document.layers[name];
return o;
}
function addEvent(event, elem, func) {
   if (elem.addEventListener)  // W3C DOM
      elem.addEventListener(event,func,false);
   else if (elem.attachEvent) { // Експлодър DOM
      elem.attachEvent("on"+event, func);
   }
   else {
      elem[event] = func;
   }
}
