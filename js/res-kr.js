//
var element, elKr;
var flag=false;
window.onload=function() {
  element= getElementById0('nav');
  addEvent('click', element, pokKrij);
}

function pokKrij() {
    elKr= getElementById0('nav-ul');
    if (flag==true) {
      elKr.style.display= 'none';
      flag=false;
    }
    else {
      elKr.style.display= 'block';
      flag=true;
     }
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
